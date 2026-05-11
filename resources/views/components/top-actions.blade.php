{{-- PDF or Print Button --}}
<div class="absolute top-6 left-6 flex items-center space-x-2 bg-white dark:bg-slate-800 p-1.5 rounded-xl shadow-sm border border-slate-200 dark:border-slate-700 transition-colors duration-300 print:hidden z-50">
    @if($public_profile && $public_profile->getTranslation('resume_pdf', app()->getLocale(), false))
        <a href="{{ route('resume.download') }}"
           target="_blank"
           title="{{ __('admin.fields.download_resume') }}"
           class="px-2 py-1 text-xl opacity-60 hover:opacity-100 hover:scale-110 transition-all duration-200"
           aria-label="{{ __('admin.fields.download_resume') }}">
            📄
        </a>
    @else
        <button onclick="window.print()"
                title="{{ __('admin.fields.print') }}"
                class="px-2 py-1 text-xl opacity-60 hover:opacity-100 hover:scale-110 transition-all duration-200"
                aria-label="{{ __('admin.fields.print') }}">
            🖨️
        </button>
    @endif
</div>

{{-- Language Switcher --}}
@if($languages->isNotEmpty())
    <nav aria-label="{{ __('admin.fields.language_selection') }}" class="absolute top-6 right-6 flex items-center space-x-2 bg-white dark:bg-slate-800 p-1.5 rounded-xl shadow-sm border border-slate-200 dark:border-slate-700 transition-colors duration-300 print:hidden">
        @foreach($languages as $language)
            <a href="{{ route('lang.switch', $language->code) }}"
               hreflang="{{ $language->code }}"
               rel="alternate"
               title="{{ __('admin.fields.change_language').' - '.$language->language_name }}"
               aria-label="Change System Language"
               class="w-8 h-8 rounded-full text-xs font-bold transition-all duration-300 flex items-center justify-center
                    {{ app()->getLocale() === $language->code ? 'bg-slate-800 dark:bg-slate-200 text-white dark:text-slate-900 shadow-md' : 'text-slate-500 hover:bg-slate-200 dark:hover:bg-slate-800' }}" >
               {{ $language->flag }}
            </a>
        @endforeach
    </nav>
@endif

