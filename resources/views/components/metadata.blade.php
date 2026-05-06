@if($metadata?->favicon)
    <link rel="icon" type="image/x-icon" href="{{ asset('storage/' . $metadata->favicon) }}">
@else
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
@endif

<title>{{ $public_profile?->full_name ?? config('app.name') }} @if($metadata?->title_suffix) - {{ $metadata->title_suffix }} @endif</title>
<meta name="description" content="{{ $metadata?->description }}">
<meta name="author" content="{{ $public_profile?->full_name ?? config('app.name') }}">

<meta property="og:image" content="{{ asset('storage/' . ($metadata?->og_image ?? 'default-share-image.jpg')) }}">

<meta name="keywords" content="{{ is_array($metadata?->keywords) ? implode(', ', $metadata->keywords) : $metadata?->keywords }}">
<meta name="theme-color" content="{{ $metadata?->theme_color ?? '#ffffff' }}">
<meta name="robots" content="{{ $metadata?->robots ?? 'index, follow' }}">

{{-- Safely parse fields and construct JSON-LD purely in PHP --}}
@php
    $sameAsLinks = [];
    $metaTagsToRender = [];

    // 1. Process metadata resolved fields (HTML Meta Tags & Subsidiaries)
    if (!empty($metadata?->resolved_fields)) {
        $jsonLdReservedKeys = ['knows_about', 'name', 'url', 'type', 'Person'];
        
        foreach ($metadata->resolved_fields as $key => $value) {
            if (in_array($key, $jsonLdReservedKeys)) {
                continue;
            }

            $content = is_array($value) ? implode(', ', $value) : $value;
            $isUrl = filter_var($content, FILTER_VALIDATE_URL) !== false;
            $isSocialUrlMeta = str_contains($key, 'url');

            // Subsidiary logic: Any valid URL goes to sameAs (unless it's a structural tag like og:url)
            if ($isUrl && !$isSocialUrlMeta) {
                $sameAsLinks[] = $content; // Store raw URL
            } else {
                $metaTagsToRender[$key] = $content;
            }
        }
    }

    // 2. Inject External Links
    if (isset($external_links) && $external_links->isNotEmpty()) {
        foreach ($external_links as $externalLink) {
            $url = $externalLink->getTranslation('url', app()->getLocale());
            if (filter_var($url, FILTER_VALIDATE_URL)) {
                $sameAsLinks[] = $url;
            }
        }
    }
    
    // 3. Build the complete Schema.org JSON-LD object dynamically
    $jsonLd = [
        '@context' => 'https://schema.org/',
        '@type' => 'Person',
        'name' => $public_profile?->full_name ?? config('app.name'),
        'url' => url()->current(),
    ];

    // Map alternateName from aliases casted array
    if (!empty($public_profile?->aliases)) {
        $jsonLd['alternateName'] = $public_profile->aliases;
    }

    // Map jobTitle merging subtitle and subtitle_variations
    if (!empty($public_profile?->all_titles)) {
        $jsonLd['jobTitle'] = $public_profile->all_titles;
    }

    // Map knowsLanguage from active languages
    if (isset($languages) && $languages->isNotEmpty()) {
        $jsonLd['knowsLanguage'] = $languages->pluck('code')->toArray();
    }

    // Map alumniOf from unique Educations
    if (isset($educations) && $educations->isNotEmpty()) {
        $institutions = $educations->map(function($edu) {
            return $edu->getTranslation('institution', app()->getLocale());
        })->unique()->filter()->values();

        if ($institutions->isNotEmpty()) {
            $jsonLd['alumniOf'] = $institutions->map(function($inst) {
                return [
                    '@type' => 'CollegeOrUniversity',
                    'name' => $inst
                ];
            })->toArray();
        }
    }

    // Finalize sameAs and knowsAbout
    $sameAsLinks = array_values(array_unique($sameAsLinks));
    if (!empty($sameAsLinks)) {
        $jsonLd['sameAs'] = $sameAsLinks;
    }

    if (!empty($metadata?->resolved_fields['knows_about'])) {
        $jsonLd['knowsAbout'] = $metadata->resolved_fields['knows_about'];
    }
@endphp

{{-- Render Standard HTML Meta Tags --}}
@foreach($metaTagsToRender as $key => $content)
    @if(str_starts_with($key, 'og:'))
        <meta property="{{ $key }}" content="{{ $content }}">
    @else
        <meta name="{{ $key }}" content="{{ $content }}">
    @endif
@endforeach

{{-- Render JSON-LD Knowledge Graph securely --}}
<script type="application/ld+json">
    {!! json_encode($jsonLd, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE) !!}
</script>
