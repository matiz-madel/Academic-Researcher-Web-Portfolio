<div>
    {{-- Dynamic Title --}}
    @if(isset($isPdf) && $isPdf)
        <title>{{ $pdfTitle ?? __('portfolio.resume_title') }}</title>
    @else
        <title>{{ $profile ? $profile->first_name . ' ' . $profile->last_name : config('app.name') }}</title>
    @endif

    {{-- Open Graph / Social Media --}}
    <meta property="og:type" content="profile">
    <meta property="og:title" content="{{ $profile ? $profile->first_name . ' ' . $profile->last_name : config('app.name') }}">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:image" content="{{ asset('storage/' . ($profile->avatar_jpeg ?? 'default-share-image.jpg')) }}">
    <meta property="og:description" content="{{ $profile->bio ?? __('portfolio.default_bio') }}">

    @if($profile)
        <meta property="profile:first_name" content="{{ $profile->first_name }}">
        <meta property="profile:last_name" content="{{ $profile->last_name }}">
    @endif

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $profile ? $profile->first_name . ' ' . $profile->last_name : config('app.name') }}">
    <meta name="twitter:description" content="{{ $profile->bio ?? __('portfolio.default_bio') }}">
    <meta name="twitter:image" content="{{ asset('storage/' . ($profile->avatar_jpeg ?? 'default-share-image.jpg')) }}">

    {{-- JSON-LD Schema --}}
    @php
        $jobTitles = [];
        if (isset($profile)) {
            if ($profile->subtitle) $jobTitles[] = $profile->subtitle;
            if (!empty($profile->subtitle_variations)) {
                $variations = $profile->subtitle_variations;
                if (is_string($variations)) {
                    $decoded = json_decode($variations, true);
                    $variations = is_array($decoded) ? $decoded : [$variations];
                }
                $jobTitles = array_merge($jobTitles, $variations);
            }
        }
    @endphp

    @if(isset($profile))
        <script type="application/ld+json">
            {
              "@@context": "https://schema.org/",
          "@@type": "Person",
          "name": "{{ $profile->first_name }} {{ $profile->last_name }}",
          "jobTitle": {!! json_encode($jobTitles) !!},
          "url": "{{ url()->current() }}",
          "image": "{{ asset('storage/' . $profile->avatar_jpeg) }}",
          "knowsLanguage": [
            { "@@type": "Language", "name": "Portuguese", "alternateName": "pt" },
            { "@@type": "Language", "name": "French", "alternateName": "fr" },
            { "@@type": "Language", "name": "English", "alternateName": "en" },
            { "@@type": "Language", "name": "Spanish", "alternateName": "es" }
          ],
          "alumniOf": {
            "@@type": "CollegeOrUniversity",
            "name": "Universidade Federal do Paraná",
            "alternateName": "UFPR"
          }
        }
        </script>
    @endif
</div>
