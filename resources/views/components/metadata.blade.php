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

{{-- Safely parse fields: Separate HTML meta tags from JSON-LD sameAs links --}}
@php
    $sameAsLinks = [];
    $metaTagsToRender = [];

    // Reserved keys that have explicit places in JSON-LD
    $jsonLdReservedKeys = ['knows_about', 'name', 'url', 'type', 'Person'];

    // 1. Process metadata resolved fields (from the Metadata model)
    if (!empty($metadata?->resolved_fields)) {
        foreach ($metadata->resolved_fields as $key => $value) {
            if (in_array($key, $jsonLdReservedKeys)) {
                continue;
            }

            $content = is_array($value) ? implode(', ', $value) : $value;

            $isUrl = filter_var($content, FILTER_VALIDATE_URL) !== false;
            $isOrcid = $key === 'orcid';
            $isSocialUrlMeta = str_contains($key, 'url');

            if (($isUrl || $isOrcid) && !$isSocialUrlMeta) {
                $link = $content;
                if ($isOrcid && !str_starts_with($link, 'http')) {
                    $link = 'https://orcid.org/' . $link;
                }
                $sameAsLinks[] = '"' . $link . '"';
            } else {
                $metaTagsToRender[$key] = $content;
            }
        }
    }

    // 2. Inject External Links (from the ExternalLink model) into the sameAs array
    // This respects encapsulation as the data is provided by the HomeController
    if (isset($external_links) && $external_links->isNotEmpty()) {
        foreach ($external_links as $externalLink) {
            // Get the translated URL based on the current app locale
            $url = $externalLink->getTranslation('url', app()->getLocale());
            
            if (filter_var($url, FILTER_VALIDATE_URL)) {
                $sameAsLinks[] = '"' . $url . '"';
            }
        }
    }

    // Ensure unique links in case a URL exists in both Metadata and External Links
    $sameAsLinks = array_unique($sameAsLinks);
@endphp

@foreach($metaTagsToRender as $key => $content)
    @if(str_starts_with($key, 'og:'))
        <meta property="{{ $key }}" content="{{ $content }}">
    @else
        <meta name="{{ $key }}" content="{{ $content }}">
    @endif
@endforeach

{{-- JSON-LD Knowledge Graph (Using @@ to prevent Blade parsing errors) --}}
<script type="application/ld+json">
    {
      "@@context": "https://schema.org/",
  "@@type": "Person",
  "name": "{{ $public_profile ? $public_profile->full_name : '' }}",
  "url": "{{ url()->current() }}",
  "sameAs": [
    {!! implode(",\n    ", $sameAsLinks) !!}
  ],
  "knowsAbout": {!! json_encode($metadata->resolved_fields['knows_about'] ?? []) !!}
    }
</script>
