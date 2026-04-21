@props(['data'])
<section>
    <h2 class="text-2xl font-bold text-slate-900 dark:text-white mb-6">{{ __('admin.resources.education.plural') }}</h2>
    <div class="space-y-6">
        @foreach($data as $education)
            <div class="border-l-2 border-slate-300 dark:border-slate-700 pl-4 ml-2">
                <h3 class="text-lg font-semibold text-slate-800 dark:text-slate-200">{{ $education->degree }}</h3>
                <p class="text-slate-600 dark:text-slate-400">{{ $education->institution }}</p>
                @if($education->start_date || $education->city || $education->country)
                    <p class="text-sm text-slate-400 dark:text-slate-500 mt-1">
                        @if($education->start_date)
                            <time datetime="{{ $education->start_date->format('Y-m-d') }}">
                                {{ $education->start_year }}
                            </time>
                            —
                            @if($education->end_date)
                                <time datetime="{{ $education->end_date->format('Y-m-d') }}">
                                    {{ $education->end_year }}
                                </time>
                                @else
                                    {{ __('admin.fields.currently') }}
                                @endif
                                @endif
                                @if($education->city || $education->country)
                                    &bull; {{ $education->city }}, {{ $education->country }}
                            @endif
                    </p>
                @endif
            </div>
        @endforeach
    </div>
</section>
