{{-- PDF or Print Button --}}
<div class="absolute top-6 left-6 flex items-center space-x-2 bg-white dark:bg-slate-800 p-1.5 rounded-xl shadow-sm border border-slate-200 dark:border-slate-700 transition-colors duration-300 print:hidden z-50">
    @if($public_profile && $public_profile->resume_pdf)
        <a href="{{ route('resume.download') }}"
           target="_blank"
           title="{{ __('admin.fields.download_resume') }}"
           class="px-2 py-1 text-xl opacity-60 hover:opacity-100 hover:scale-110 transition-all duration-200"
           aria-label="Download Curriculum">
            📄
        </a>
    @else
        <button onclick="window.print()"
                title="{{ __('admin.fields.print') }}"
                class="px-2 py-1 text-xl opacity-60 hover:opacity-100 hover:scale-110 transition-all duration-200"
                aria-label="Print Page">
            🖨️
        </button>
    @endif
</div>

{{-- Language Switcher --}}
@if($languages->isNotEmpty())
    <div class="absolute top-6 right-6 flex items-center space-x-2 bg-white dark:bg-slate-800 p-1.5 rounded-xl shadow-sm border border-slate-200 dark:border-slate-700 transition-colors duration-300 print:hidden">
        @foreach($languages as $language)
            <a href="{{ route('lang.switch', $language->code) }}"
               title="{{ __('admin.fields.change_language').' - '.$language->language_name }}"
               aria-label="Change System Language"
               class="px-2 py-1 rounded-lg text-xl transition-all duration-200 flex items-center justify-center
                      {{ app()->getLocale() === $language->code ? 'bg-slate-100 scale-110 shadow-sm opacity-100' : 'hover:bg-slate-50 hover:scale-110 opacity-50 hover:opacity-100 grayscale-50 hover:grayscale-0' }}" >
                {{ $language->flag }}
            </a>
        @endforeach
    </div>
@endif

