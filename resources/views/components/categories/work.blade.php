@props(['data'])
<section>
    <h2 class="text-2xl font-bold text-slate-900 dark:text-white mb-6">{{ __('admin.resources.work.plural') }}</h2>
    <div class="space-y-6">
        @foreach($data as $work)
            <div class="bg-white dark:bg-slate-800 p-6 rounded-xl border border-slate-200 dark:border-slate-700 shadow-sm flex flex-col h-full">

                {{-- Publication Header (Type and Date) --}}
                <div class="flex items-center space-x-2 mb-3">
                            <span class="px-2.5 py-0.5 rounded-md bg-blue-50 dark:bg-blue-900/30 text-blue-700 dark:text-blue-400 text-xs font-semibold tracking-wide uppercase">
                                {{ $work->type?->getLabel() }}
                            </span>
                    @if($work->publication_date)
                        <span class="text-sm text-slate-400 dark:text-slate-500">
                                    <time datetime="{{ $work->publication_date->format('Y-m-d') }}">
                                        {{ $work->publication_year }}
                                    </time>
                                </span>
                    @endif
                </div>

                {{-- Title --}}
                <h3 class="text-xl font-bold text-slate-900 dark:text-white mb-1">
                    @if($work->url)
                        <a href="{{ $work->url }}" target="_blank" rel="noopener noreferrer" class="hover:text-blue-600 dark:hover:text-blue-400 transition-colors">
                            {{ $work->title }}
                        </a>
                    @else
                        {{ $work->title }}
                    @endif
                </h3>

                {{-- Isolated DOI --}}
                @if($work->doi)
                    <div class="mt-auto mb-3">
                        <div class="pb-4">
                            <p class="text-xs text-slate-500 dark:text-slate-400 font-mono">
                                <span class="font-semibold">DOI:</span> {{ $work->doi }}
                            </p>
                        </div>
                    </div>
                @endif

                {{-- Abstract --}}
                @if($work->abstract)
                    <div class="mt-auto mb-3">
                        <p class="text-slate-600 dark:text-slate-400 text-sm leading-relaxed">
                            {{ $work->abstract }}
                        </p>
                    </div>
                @endif

                {{-- Keywords (using Model Accessor) --}}
                @if(!empty($work->valid_keywords))
                    <div class="mt-5 flex flex-wrap gap-2">
                        @foreach($work->valid_keywords as $keyword)
                            <span class="px-2.5 py-1 rounded-md text-slate-500 dark:text-slate-400 text-xs font-medium border border-slate-200 dark:border-slate-700">
                                        {{ trim($keyword) }}
                                    </span>
                        @endforeach
                    </div>
                @endif

                {{-- Expandable Content --}}
                @if($work->content)
                    <div x-data="{ open: false }" class="print:hidden mt-4">
                        <button @click="open = !open"
                                class="inline-flex items-center gap-1.5 text-sm font-semibold text-blue-600 dark:text-blue-400 hover:text-blue-800 dark:hover:text-blue-300 transition-colors focus:outline-none whitespace-nowrap">
                            <span x-show="!open">{{ __('admin.fields.show_content')}}</span>
                            <span x-show="open" style="display: none;">{{ __('admin.fields.hide_content') }}</span>

                            <svg :class="{'rotate-180': open}" class="transform transition-transform duration-300 flex-shrink-0" style="width: 16px; height: 16px;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>

                        <div x-show="open"
                             x-transition.opacity
                             style="display: none;"
                             class="mt-4 p-4 bg-slate-50 dark:bg-slate-900/50 rounded-lg text-slate-600 dark:text-slate-400 text-sm leading-relaxed prose dark:prose-invert max-w-none border border-slate-100 dark:border-slate-700/50">
                            {!! $work->content !!}
                        </div>
                    </div>
                @endif

                {{-- Spacer --}}
                <div class="mt-4 pt-6">
                    {{-- Attachments Downloads (using Model Accessor) --}}
                    @if(!empty($work->attachments_data))
                        <div class="print:hidden my-5 flex flex-wrap gap-3">
                            @foreach($work->attachments_data as $index => $data)
                                <a href="{{ route('work.download', ['work' => $work->id, 'index' => $index]) }}"
                                   class="inline-flex items-center space-x-2 px-4 py-2 bg-slate-50 dark:bg-slate-900 border border-slate-200 dark:border-slate-700 rounded-lg text-xs font-bold text-slate-700 dark:text-slate-300 hover:bg-blue-50 dark:hover:bg-slate-800 hover:text-blue-700 dark:hover:text-blue-400 hover:border-blue-200 dark:hover:border-slate-600 transition-all shadow-sm">
                                    <span class="text-blue-500 dark:text-blue-400 text-sm">📎</span>
                                    <span>{{ $data['extension'] }}</span>
                                </a>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        @endforeach
    </div>
</section>
