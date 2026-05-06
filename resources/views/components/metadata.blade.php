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

    // 1. Initialize the Schema.org JSON-LD object
    $jsonLd = [
        '@context' => 'https://schema.org/',
        '@type' => 'Person',
        'name' => $public_profile?->full_name ?? config('app.name'),
        'url' => url()->current(),
    ];

    // 2. Process metadata resolved fields (Dynamic JSON-LD & Meta Tags)
    if (!empty($metadata?->resolved_fields)) {
        foreach ($metadata->resolved_fields as $key => $value) {
            $content = is_array($value) ? implode(', ', $value) : $value;

            // Social meta tags (e.g., og:title, twitter:card) stay in HTML
            if (str_contains($key, ':')) {
                $metaTagsToRender[$key] = $content;
            }
            // Valid URLs go to sameAs
            elseif (filter_var($content, FILTER_VALIDATE_URL)) {
                $sameAsLinks[] = $content;
            }
            // NEW FALLBACK: Everything else injects directly into the JSON-LD
            else {
                // Automatically fixes knows_about to schema standard knowsAbout
                $jsonLd[$key === 'knows_about' ? 'knowsAbout' : $key] = $content;
            }
        }
    }

    // 3. Inject External Links
    if (isset($external_links) && $external_links->isNotEmpty()) {
        foreach ($external_links as $link) {
            if ($url = filter_var($link->getTranslation('url', app()->getLocale()), FILTER_VALIDATE_URL)) {
                $sameAsLinks[] = $url;
            }
        }
    }

    // 4. Map dynamic properties from other Models
    if (!empty($public_profile?->aliases)) {
        $jsonLd['alternateName'] = $public_profile->aliases;
    }

    if (!empty($public_profile?->all_titles)) {
        $jsonLd['jobTitle'] = $public_profile->all_titles;
    }

    if (isset($languages) && $languages->isNotEmpty()) {
        $jsonLd['knowsLanguage'] = $languages->pluck('code')->toArray();
    }

    if (isset($educations) && $educations->isNotEmpty()) {
        $institutions = $educations->map->getTranslation('institution', app()->getLocale())->unique()->filter()->values();
        if ($institutions->isNotEmpty()) {
            $jsonLd['alumniOf'] = $institutions->map(fn($inst) => [
                '@type' => 'CollegeOrUniversity',
                'name' => $inst
            ])->toArray();
        }
    }

    // Finalize sameAs
    if (!empty($sameAsLinks)) {
        $jsonLd['sameAs'] = array_values(array_unique($sameAsLinks));
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
