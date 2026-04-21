@props(['data'])
<section>
    <h2 class="text-2xl font-bold text-slate-900 dark:text-white mb-6">{{ __('admin.resources.funding.plural') }}</h2>
    <div class="space-y-6">
        @foreach($data as $funding)
            <div class="bg-white dark:bg-slate-800 p-5 rounded-lg border border-slate-200 dark:border-slate-700">
                <div class="flex items-center justify-between mb-2">
                    <span class="text-xs font-bold text-slate-500 dark:text-slate-400 uppercase tracking-wider">{{ $funding->funding_type?->getLabel() }}</span>
                    @if($funding->start_date)
                        <span class="text-sm text-slate-400 dark:text-slate-500">
                                    @if($funding->start_date)
                                <time datetime="{{ $funding->start_date->format('Y-m-d') }}">
                                            {{ $funding->start_year }}
                                        </time>
                                —
                            @endif
                            @if($funding->end_date)
                                <time datetime="{{ $funding->end_date->format('Y-m-d') }}">
                                            {{ $funding->end_year }}
                                        </time>
                            @else
                                {{ __('admin.fields.currently') }}
                            @endif
                                </span>
                    @endif
                </div>
                <h3 class="text-md font-bold text-slate-900 dark:text-white">
                    @if($funding->url)
                        <a href="{{ $funding->url }}" target="_blank" rel="noopener noreferrer" class="hover:opacity-80 transition-opacity duration-200">
                            {{ $funding->title }}
                        </a>
                    @else
                        {{ $funding->title }}
                    @endif
                </h3>
                <p class="text-sm text-slate-600 dark:text-slate-400 mt-1">{{ $funding->agency }}</p>
            </div>
        @endforeach
    </div>
</section>
