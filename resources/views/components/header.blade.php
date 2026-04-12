<header class="mb-16 border-b border-slate-200 dark:border-slate-700 pb-8 flex flex-col md:flex-row md:justify-between md:items-start gap-6 transition-colors duration-300">
    <div class="flex flex-col space-y-6">

        {{-- Profile Picture & Basic Info --}}
        <div class="flex items-center space-x-6">
            {{-- Profile Picture Container (Mask extracted to CSS) --}}
            <div @click="modalOpen = true" class="relative w-32 h-32 shrink-0 rounded-full overflow-hidden shadow-lg border-2 border-slate-100 dark:border-slate-700 group cursor-pointer bg-white dark:bg-slate-800 isolate transform-gpu mask-radial-gradient">
                {{-- Images logic remains the same... --}}
            </div>

            {{-- Typography Info --}}
            <div>
                <h1 class="text-4xl font-extrabold text-slate-900 dark:text-white tracking-tight">
                    {{ $profile ? $profile->first_name. ' '. $profile->last_name : __('portfolio.default_name') }}
                </h1>
                <p class="text-xl text-slate-600 dark:text-slate-300 font-light">
                    {{ $profile ? $profile->subtitle : __('portfolio.default_role') }}
                </p>

                {{-- Aliases --}}
                @if($profile && $profile->aliases)
                    <p class="text-sm text-slate-400 dark:text-slate-500 mt-1 font-mono tracking-wide">
                        {{ implode(' • ', $profile->aliases) }}
                    </p>
                @endif

                {{-- Contact Info Logic remains here... --}}
            </div>
        </div>

        {{-- Biography --}}
        @if($profile && $profile->bio)
            <p class="text-base text-slate-500 dark:text-slate-400 leading-relaxed max-w-2xl">
                {{ $profile->bio }}
            </p>
        @endif

        {{-- External Links (Dynamic color is acceptable inline, but opacity is handled via CSS variable) --}}
        <div class="flex flex-col space-y-4">
            @if($external_links->isNotEmpty())
                <div class="print:hidden flex flex-wrap gap-2">
                    @foreach($external_links as $link)
                        <a href="{{ $link->url }}" target="_blank"
                           style="--badge-color: {{ $link->color }};"
                           class="dynamic-badge inline-flex items-center px-4 py-1.5 rounded-full text-slate-900 dark:text-white text-sm font-semibold shadow-md hover:brightness-90 hover:scale-105 transition-all duration-200">
                            {{ $link->label }}
                        </a>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
</header>
