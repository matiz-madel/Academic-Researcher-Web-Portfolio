<header class="mb-16 border-b border-slate-200 dark:border-slate-700 pb-8 flex flex-col md:flex-row md:justify-between md:items-start gap-6 transition-colors duration-300">
    <div class="flex flex-col space-y-6">

        {{-- PublicProfile Picture & Basic Info --}}
        <div class="flex items-center space-x-6">
            {{-- PublicProfile Picture Container (Mask extracted to CSS) --}}
            <div x-data="{
                modalOpen: false,
                isPlaying: false,
                gifTimestamp: Date.now(),
                playGif() {
                    if (this.isPlaying) return;
                    this.isPlaying = true;
                    this.gifTimestamp = Date.now();
                    setTimeout(() => { this.isPlaying = false; }, 5000);
                }
            }"
            @if($public_profile?->has_gif) @scroll.window="playGif()" @endif>

                <div @click="modalOpen = true" class="relative w-32 h-32 shrink-0 rounded-full overflow-hidden shadow-lg border-2 border-slate-100 dark:border-slate-700 group cursor-pointer bg-white dark:bg-slate-800">

                    {{-- Static Avatar OR Gray Fallback --}}
                    @if($public_profile?->has_avatar)
                        <img src="{{ asset('storage/'. $public_profile->avatar_jpeg) }}"
                             alt="{{__('admin.fields.profile_picture_avatar')}}"
                             class="absolute inset-0 w-full h-full object-cover transition-opacity duration-500 {{ $public_profile->has_gif ? 'md:group-hover:opacity-0' : '' }}"
                             @if($public_profile->has_gif) :class="isPlaying ? 'opacity-0' : 'opacity-100'" @endif>
                    @else
                        <div class="absolute inset-0 w-full h-full bg-slate-200 dark:bg-slate-700 transition-opacity duration-500 {{ $public_profile?->has_gif ? 'md:group-hover:opacity-0' : '' }}"
                             @if($public_profile?->has_gif) :class="isPlaying ? 'opacity-0' : 'opacity-100'" @endif>
                        </div>
                    @endif

                    {{-- Animated GIF (Conditional Rendering) --}}
                    @if($public_profile?->has_gif)
                        <img :src="`{{ asset('storage/'. $public_profile->avatar_gif) }}?t=${gifTimestamp}`"
                             alt="{{__('admin.fields.profile_picture_gif')}}"
                             class="absolute inset-0 w-full h-full object-cover transition-opacity duration-500 opacity-0 md:group-hover:opacity-100"
                             :class="isPlaying ? 'opacity-100' : 'opacity-0'">
                    @endif
                </div>

                <template x-teleport="body">
                    <div x-show="modalOpen" x-cloak style="display: none;" class="fixed inset-0 z-50 flex items-center justify-center bg-black/80 p-4" x-transition.opacity>
                        <div class="absolute inset-0" @click="modalOpen = false"></div>
                        <div class="relative max-w-2xl w-full" x-transition>
                            <button @click="modalOpen = false" class="absolute -top-10 right-0 text-white text-4xl hover:text-gray-300">&times;</button>

                            <div class="relative w-full aspect-square md:aspect-auto group">
                                {{-- Modal Static Avatar OR Gray Fallback --}}
                                @if($public_profile?->has_avatar)
                                    <img src="{{ asset('storage/'. $public_profile->avatar_jpeg) }}" alt="{{__('admin.fields.profile_picture_avatar')}}"
                                         class="w-full h-auto rounded-sm shadow-2xl transition-opacity duration-500 {{ $public_profile->has_gif ? 'md:group-hover:opacity-0' : '' }}"
                                         @if($public_profile->has_gif) :class="isPlaying? 'opacity-0' : 'opacity-100'" @endif>
                                @else
                                    <div class="w-full h-full min-h-75 bg-slate-200 dark:bg-slate-800 rounded-sm shadow-2xl transition-opacity duration-500 {{ $public_profile?->has_gif ? 'md:group-hover:opacity-0' : '' }}"
                                         @if($public_profile?->has_gif) :class="isPlaying? 'opacity-0' : 'opacity-100'" @endif>
                                    </div>
                                @endif

                                {{-- Modal Animated GIF --}}
                                @if($public_profile?->has_gif)
                                    <img :src="'{{ asset('storage/'. $public_profile->avatar_gif) }}?t=' + gifTimestamp" alt="{{__('admin.fields.profile_picture_avatar_in_motion')}}"
                                         class="absolute inset-0 w-full h-full object-cover rounded-sm shadow-2xl transition-opacity duration-500 md:group-hover:opacity-100"
                                         :class="isPlaying? 'opacity-100' : 'opacity-0'">
                                @endif
                            </div>
                        </div>
                    </div>
                </template>
            </div>

            {{-- Typography Info --}}
            <div>
                <h1 class="text-3xl font-extrabold text-slate-900 dark:text-white tracking-tight">
                    {{ $public_profile ? $public_profile->full_name : __('admin.fields.without_name') }}
                </h1>
                <p class="text-xl text-slate-600 dark:text-slate-300 font-light">
                    {{ $public_profile ? $public_profile->subtitle : __('admin.fields.without_role') }}
                </p>

                {{-- Aliases --}}
                @if($public_profile && $public_profile->aliases)
                    <div class="flex flex-wrap gap-2 mt-2">
                        @foreach($public_profile->aliases as $alias)
                            @if(!empty($alias))
                                <span class="px-2 py-1 text-xs bg-gray-200 rounded-full dark:bg-gray-700">
                                {{ $alias }}
                            </span>
                            @endif
                        @endforeach
                    </div>
                @endif

                {{-- Contact Info --}}
                @if($public_profile && ($public_profile->email || $public_profile->phone))
                    <div class="flex flex-wrap items-center mt-2 gap-3 text-sm font-medium text-slate-500 dark:text-slate-400">
                        @if($public_profile->email)
                            <a href="mailto:{{ $public_profile->email }}" class="hover:text-blue-800 dark:hover:text-blue-400 transition-colors flex items-center gap-2">
                                {{ $public_profile->email }}
                            </a>
                        @endif

                        @if($public_profile->email && $public_profile->phone)
                            <span class="text-slate-300 dark:text-slate-600">•</span>
                        @endif

                        @if($public_profile->phone)
                            {{-- Using the ContactLink Accessor from the PublicProfile Model --}}
                            <a href="{{ $public_profile->contact_link }}" target="_blank" class="hover:text-blue-800 dark:hover:text-blue-400 transition-colors flex items-center gap-2">
                                {{ $public_profile->phone }}
                            </a>
                        @endif
                    </div>
                @endif
            </div>
        </div>

        {{-- Biography --}}
        @if($public_profile && $public_profile->bio)
            <p class="text-base text-slate-500 dark:text-slate-400 leading-relaxed max-w-2xl">
                {{ $public_profile->bio }}
            </p>
        @endif

        {{-- External Links (Dynamic color is acceptable inline, but opacity is handled via CSS variable) --}}
        <div class="flex flex-col space-y-4">
            @if($external_links->isNotEmpty())
                <div class="print:hidden flex flex-wrap gap-2">
                    @foreach($external_links as $link)
                        <a href="{{ $link->url }}" target="_blank"
                           style="background-color: {{ $link->color }}80;"
                           class="inline-flex items-center px-4 py-2 leading-none rounded-full text-slate-900 dark:text-white text-sm font-semibold shadow-md hover:brightness-90 hover:scale-105 transition-all duration-200">
                            {{ $link->label }}
                        </a>
                    @endforeach
                </div>
                <div class="hidden print:block w-max self-center">
                    <ul class="pl-5 text-sm text-black">
                        @foreach($external_links as $link)
                            <li><strong>{{ $link->label }}:</strong> {{ $link->url }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
    </div>
</header>
