{{-- Action Buttons: PDF Download or Print --}}
<div class="absolute top-6 left-6 flex items-center space-x-1 bg-white/70 dark:bg-slate-900/70 backdrop-blur-md p-1 rounded-xl shadow-sm border border-slate-200/50 dark:border-slate-700/50 transition-colors duration-300 print:hidden z-50">
    @if($public_profile && $public_profile->getTranslation('resume_pdf', app()->getLocale(), false))
        <a href="{{ route('resume.download') }}"
           target="_blank"
           title="{{ __('admin.fields.download_resume') }}"
           class="w-9 h-9 flex items-center justify-center rounded-lg text-xl text-slate-600 dark:text-slate-300 hover:bg-slate-200/50 dark:hover:bg-slate-800/50 hover:text-slate-900 dark:hover:text-white transition-all duration-300"
           aria-label="{{ __('admin.fields.download_resume') }}">
            {{-- Future SVG implementation: Replace the span below with <svg class="w-5 h-5 text-current">...</svg> --}}
            <span>📄</span>
        </a>
    @else
        <button onclick="window.print()"
                title="{{ __('admin.fields.print') }}"
                class="w-9 h-9 flex items-center justify-center rounded-lg text-xl text-slate-600 dark:text-slate-300 hover:bg-slate-200/50 dark:hover:bg-slate-800/50 hover:text-slate-900 dark:hover:text-white transition-all duration-300"
                aria-label="{{ __('admin.fields.print') }}">
            {{-- Future SVG implementation: Replace the span below with <svg class="w-5 h-5 text-current">...</svg> --}}
            <span>🖨️</span>
        </button>
    @endif
</div>

{{-- Language Switcher --}}
@if($languages->isNotEmpty())
    <nav aria-label="{{ __('admin.fields.language_selection') }}"
         class="absolute top-6 right-6 flex items-center space-x-1 bg-white/70 dark:bg-slate-900/70 backdrop-blur-md p-1 rounded-xl shadow-sm border border-slate-200/50 dark:border-slate-700/50 transition-colors duration-300 print:hidden z-50">
        @foreach($languages as $language)
            @php
                $isActiveLocale = app()->getLocale() === $language->code;
            @endphp

            <a href="{{ route('lang.switch', $language->code) }}"
               hreflang="{{ $language->code }}"
               rel="alternate"
               title="{{ __('admin.fields.change_language').' - '.$language->language_name }}"
               aria-label="Change System Language"
               class="relative flex items-center justify-center w-9 h-9 rounded-full text-xl transition-all duration-300
                      {{ $isActiveLocale ? 'bg-white dark:bg-slate-800 shadow-sm ring-1 ring-slate-200 dark:ring-slate-700' : 'opacity-40 hover:opacity-100 hover:bg-slate-200/50 dark:hover:bg-slate-800/50 grayscale hover:grayscale-0' }}">

                {{--
                    Container for the flag.
                    Currently rendering the emoji from $language->flag.
                    Future SVG implementation: Replace the span with an <img> or <svg>
                    using w-5 h-5 to maintain the internal proportion.
                --}}
                <span class="flex items-center justify-center">
                    {{ $language->flag }}
                </span>
            </a>
        @endforeach
    </nav>
@endif
