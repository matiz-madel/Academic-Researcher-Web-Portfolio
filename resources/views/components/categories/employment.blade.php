@props(['data'])
<section>
    <h2 id="employment-heading" class="text-2xl font-bold text-slate-900 dark:text-white mb-6">{{ __('admin.resources.employment.plural') }}</h2>
    <ol class="space-y-6">
        @foreach($data as $employment)
            <li class="border-l border-slate-200 dark:border-slate-800 pl-5 ml-2 transition-all duration-300 hover:border-slate-400 dark:hover:border-slate-500">
                <h3 class="text-lg font-semibold text-slate-800 dark:text-slate-200">{{ $employment->role }}</h3>
                <p class="text-slate-600 dark:text-slate-400">
                    {{ $employment->organization }}
                    @if($employment->department)
                        ({{ $employment->department }})
                    @endif
                </p>

                @if($employment->start_date || $employment->city || $employment->country)
                    <p class="text-sm text-slate-400 dark:text-slate-500 mt-1">
                        @if($employment->start_date)
                            <time datetime="{{ $employment->start_date->format('Y-m-d') }}">
                                {{ $employment->start_year }}
                            </time>
                            —
                            @if($employment->end_date)
                                <time datetime="{{ $employment->end_date->format('Y-m-d') }}">
                                    {{ $employment->end_year }}
                                </time>
                                @else
                                    {{ __('admin.fields.currently') }}
                                @endif
                                @endif

                                @if($employment->city || $employment->country)
                                    &bull; {{ $employment->city }}, {{ $employment->country }}
                            @endif
                    </p>
                @endif
            </li>
        @endforeach
    </ol>
</section>
