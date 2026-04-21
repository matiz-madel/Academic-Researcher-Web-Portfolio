@if($metadata?->favicon)
    <link rel="icon" type="image/x-icon" href="{{ asset('storage/' . $metadata->favicon) }}">
@else
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
@endif

<title>{{ $public_profile?->full_name ?? config('app.name') }} @if($metadata?->title_suffix) - {{ $metadata->title_suffix }} @endif</title><meta name="description" content="{{ $metadata?->description }}">

<meta name="description" content="{{ $metadata?->description }}">
<meta name="author" content="{{ $public_profile?->full_name ?? config('app.name') }}">

<meta property="og:image" content="{{ asset('storage/' . ($metadata?->og_image ?? 'default-share-image.jpg')) }}">

<meta name="keywords" content="{{ is_array($metadata?->keywords) ? implode(', ', $metadata->keywords) : $metadata?->keywords }}">
<meta name="theme-color" content="{{ $metadata?->theme_color ?? '#ffffff' }}">
<meta name="robots" content="{{ $metadata?->robots ?? 'index, follow' }}">

@if($metadata && $metadata->resolved_fields)
    @foreach($metadata->resolved_fields as $key => $value)

        {{-- Safely skip keys handled specifically in JSON-LD --}}
        @if(in_array($key, ['knows_about', 'orcid', 'google_scholar']))
            @continue
        @endif

        @php
            // Ensure arrays are converted to comma-separated strings for HTML content
            $content = is_array($value) ? implode(', ', $value) : $value;
        @endphp

        @if(str_starts_with($key, 'og:'))
            <meta property="{{ $key }}" content="{{ $content }}">
        @else
            <meta name="{{ $key }}" content="{{ $content }}">
        @endif
    @endforeach
@endif

{{-- JSON-LD Knowledge Graph (Using @@ to prevent Blade parsing errors) --}}
<script type="application/ld+json">
    {
      "@@context": "https://schema.org/",
  "@@type": "Person",
  "name": "{{ $public_profile ? $public_profile->full_name : '' }}",
  "url": "{{ url()->current() }}",
  "sameAs": [
    "{{ $metadata->resolved_fields['google_scholar'] ?? '' }}",
    "https://orcid.org/{{ $metadata->resolved_fields['orcid'] ?? '' }}"
  ],
  "knowsAbout": {!! json_encode($metadata->resolved_fields['knows_about'] ?? []) !!}
    }
</script>
