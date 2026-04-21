@props(['data'])
<section>
    <h2 class="text-2xl font-bold text-slate-900 dark:text-white mb-6">{{ __('admin.resources.professional_activity.plural') }}</h2>
    <div class="space-y-6">
        @foreach($data as $activity)
            <div class="border-l-2 border-slate-300 dark:border-slate-700 pl-4 ml-2">
                <div class="flex items-center space-x-2 mb-1">
                    <span class="text-sm font-semibold text-slate-500 dark:text-slate-400 uppercase tracking-wide">{{ $activity->activity_type?->getLabel() }}</span>
                </div>
                <h3 class="text-lg font-semibold text-slate-800 dark:text-slate-200">
                    @if($activity->url)
                        <a href="{{ $activity->url }}" target="_blank" rel="noopener noreferrer" class="hover:text-blue-600 dark:hover:text-blue-400 transition-colors">
                            {{ $activity->title }}
                        </a>
                    @else
                        {{ $activity->title }}
                    @endif
                </h3>
                <p class="text-slate-600 dark:text-slate-400">{{ $activity->organization }}</p>
                @if($activity->start_date)
                    <p class="text-sm text-slate-400 dark:text-slate-500 mt-1">
                        @if($activity->start_date)
                            <time datetime="{{ $activity->start_date->format('Y-m-d') }}">
                                {{ $activity->start_year }}
                            </time>
                            —
                        @endif
                        @if($activity->end_date)
                            <time datetime="{{ $activity->end_date->format('Y-m-d') }}">
                                {{ $activity->end_year }}
                            </time>
                        @else
                            {{ __('admin.fields.currently') }}
                        @endif
                    </p>
                @endif
            </div>
        @endforeach
    </div>
</section>
