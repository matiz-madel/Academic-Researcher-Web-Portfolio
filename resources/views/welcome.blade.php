<!DOCTYPE html>
@php
    // 1. Declaração inicial segura (garante que nunca darão erro de "Undefined variable")
        $profile = null;
        $languages = collect();
        $external_links = collect();
        $educations = collect();
        $employments = collect();
        $works = collect();
        $activities = collect();
        $fundings = collect();

        // 2. Abastecimento das variáveis se as tabelas existirem
        if (\Illuminate\Support\Facades\Schema::hasTable('profiles')) {
            $profile = \App\Models\Profile::first();
        }

        if (\Illuminate\Support\Facades\Schema::hasTable('languages')) {
            $languages = \App\Models\Language::where('is_active', true)->orderBy('sort')->get();
        }

        if (\Illuminate\Support\Facades\Schema::hasTable('external_links')) {
            $external_links = \App\Models\ExternalLink::orderBy('sort')->get();
        }

        // Novas declarações adicionadas:
        if (\Illuminate\Support\Facades\Schema::hasTable('education')) {
            // Assume-se que o nome do model é Education e a tabela é education
            $educations = \App\Models\Education::orderBy('start_date', 'desc')->get();
        }

        if (\Illuminate\Support\Facades\Schema::hasTable('employments')) {
            $employments = \App\Models\Employment::orderBy('start_date', 'desc')->get();
        }

        if (\Illuminate\Support\Facades\Schema::hasTable('works')) {
            $works = \App\Models\Work::orderBy('publication_date', 'desc')->get();
        }

        if (\Illuminate\Support\Facades\Schema::hasTable('professional_activities')) {
            $activities = \App\Models\ProfessionalActivity::orderBy('start_date', 'desc')->get();
        }

        if (\Illuminate\Support\Facades\Schema::hasTable('fundings')) {
            $fundings = \App\Models\Funding::orderBy('start_date', 'desc')->get();
        }
@endphp
<html lang="{{ app()->getLocale() }}"
      x-data="{
          isDark: false,
          checkTime() {
              const now = new Date();
              const hours = now.getHours();
              const minutes = now.getMinutes();

              // O modo escuro é ativado se for antes das 06
              // ou se for 18h ou mais tarde.
              this.isDark = (hours < 6) || (hours >= 18);
          },
          init() {
              // Checa o horário assim que a página carrega
              this.checkTime();

              // Reavalia o horário a cada 1 minuto (60000ms) caso o usuário deixe a aba aberta
              setInterval(() => this.checkTime(), 60000);

              // Mantém a regra de imprimir sempre no modo claro
              window.addEventListener('beforeprint', () => {
                  document.documentElement.classList.remove('dark');
              });
              window.addEventListener('afterprint', () => {
                  if (this.isDark) document.documentElement.classList.add('dark');
              });
          }
      }"
      :class="isDark? 'dark' : ''">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $profile ? $profile->first_name . ' ' . $profile->last_name : 'Matiz Madel' }}</title>

    {{-- Open Graph / LinkedIn / Facebook --}}
    <meta property="og:type" content="profile">
    <meta property="og:title" content="{{ $profile ? $profile->first_name . ' ' . $profile->last_name : 'Matiz Madel' }}">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:image" content="{{ asset('storage/' . ($profile->avatar_jpeg ?? 'default-share-image.jpg')) }}">
    <meta property="og:description" content="{{ $profile->bio ?? 'Law student and researcher focusing on International Law.' }}">
    @if($profile)
        <meta property="profile:first_name" content="{{ $profile->first_name }}">
        <meta property="profile:last_name" content="{{ $profile->last_name }}">
    @endif
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $profile ? $profile->first_name . ' ' . $profile->last_name : 'Matiz Madel' }}">
    <meta name="twitter:description" content="{{ $profile->bio ?? 'Law student and researcher focusing on International Law.' }}">
    <meta name="twitter:image" content="{{ asset('storage/' . ($profile->avatar_jpeg ?? 'default-share-image.jpg')) }}">

    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @php
        // 1. Prepara a lista de cargos juntando o principal com as variações
        $jobTitles = [];
        if (isset($profile)) {
            // Adiciona o cargo principal se ele existir
            if ($profile->subtitle) {
                $jobTitles[] = $profile->subtitle;
            }

            // Trata as variações de forma segura
            if (!empty($profile->subtitle_variations)) {
                $variations = $profile->subtitle_variations;

                // Se vier do banco como uma String (texto ou JSON), converte para Array
                if (is_string($variations)) {
                    $decoded = json_decode($variations, true);
                    $variations = is_array($decoded) ? $decoded : [$variations];
                }

                // Agora é seguro usar o array_merge
                $jobTitles = array_merge($jobTitles, $variations);
            }
        }
    @endphp
    {{-- 2. Injeção invisível do Schema.org para os robôs do Google e LLMs --}}
    @if(isset($profile))
        <script type="application/ld+json">
            {
              "@@context": "https://schema.org/",
          "@@type": "Person",
          "name": "{{ $profile->first_name }} {{ $profile->last_name }}",
          "jobTitle": {!! json_encode($jobTitles) !!},
          "url": "{{ url()->current() }}",
          "image": "{{ asset('storage/' . $profile->avatar_jpeg) }}",
          "knowsLanguage": [
            { "@@type": "Language", "name": "Portuguese", "alternateName": "pt" },
            { "@@type": "Language", "name": "French", "alternateName": "fr" },
            { "@@type": "Language", "name": "English", "alternateName": "en" },
            { "@@type": "Language", "name": "Spanish", "alternateName": "es" }
          ],
          "alumniOf": {
            "@@type": "CollegeOrUniversity",
            "name": "Universidade Federal do Paraná",
            "alternateName": "UFPR",
            "location": {
              "@@type": "Place",
              "address": {
                "@@type": "PostalAddress",
                "addressLocality": "Curitiba",
                "addressRegion": "Paraná",
                "addressCountry": "BR"
              }
            }
          },
          "seeks": {
            "@@type": "Demand",
            "itemOffered": {
              "@@type": "EducationalOccupationalProgram",
              "name": "Postgraduate Research in International Law",
              "provider": {
                "@@type": "CollegeOrUniversity",
                "name": "Université Paris 1 Panthéon-Sorbonne",
                "location": {
                  "@@type": "Place",
                  "addressCountry": "FR"
                }
              }
            }
          }
        }
        </script>
    @endif
</head>
<body class="bg-slate-50 dark:bg-slate-900 text-slate-800 dark:text-slate-200 font-sans antialiased selection:bg-blue-200 dark:selection:bg-blue-900 transition-colors duration-300">

<div class="absolute top-6 left-6 flex items-center space-x-2 bg-white dark:bg-slate-800 p-1.5 rounded-xl shadow-sm border border-slate-200 dark:border-slate-700 transition-colors duration-300 print:hidden">

    @if($profile && $profile->resume_pdf)
        {{-- Se o PDF existir, botão de Download --}}
        <a href="{{ route('resume.download') }}"
           target="_blank"
           title="{{ __('admin.fields.download_resume') }}"
           class="px-2 py-1 text-xl opacity-60 hover:opacity-100 hover:scale-110 transition-all duration-200"
           aria-label="{{ __('admin.fields.download_resume') }}">
            💾
        </a>
    @else
        {{-- Fallback: Se não houver PDF, botão de Imprimir --}}
        <button onclick="window.print()"
                title="{{ __('admin.print') }}"
                class="px-2 py-1 text-xl opacity-60 hover:opacity-100 hover:scale-110 transition-all duration-200"
                aria-label="{{ __('admin.fields.print') }}">
            🖨️
        </button>
    @endif

</div>
<div class="absolute top-6 right-6 flex items-center space-x-2 bg-white dark:bg-slate-800 p-1.5 rounded-xl shadow-sm border border-slate-200 dark:border-slate-700 transition-colors duration-300 print:hidden">


    {{-- Idiomas (Prioridade Visual Alta) --}}
    @foreach($languages as $language)
        <a href="{{ route('lang.switch', $language->code) }}"
           aria-label="{{__('admin.fields.change_language')}}"
           title="{{ $language->language_name }}"
           class="px-2 py-1 rounded-lg text-xl transition-all duration-200 flex items-center justify-center
               {{ app()->getLocale() === $language->code? 'bg-slate-100 scale-110 shadow-sm opacity-100' : 'hover:bg-slate-50 hover:scale-110 opacity-50 hover:opacity-100 grayscale-50 hover:grayscale-0' }}">
            {{ $language->flag }}
        </a>
    @endforeach
</div>
<div class="max-w-3xl mx-auto py-30 px-6">
    <header class="mb-16 border-b border-slate-200 dark:border-slate-700 pb-8 flex flex-col md:flex-row md:justify-between md:items-start gap-6 transition-colors duration-300">

        {{-- Lado Esquerdo: Todo o conteúdo do Perfil --}}
        <div class="flex flex-col space-y-6">

            {{-- Grupo 1: Foto e Info Básica Centralizados --}}
            <div class="flex items-center space-x-6">

                {{-- Bloco do Modal da Foto --}}
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
                     @scroll.window="playGif()">

                    {{-- Foto Pequena do Perfil --}}
                    <div @click="modalOpen = true" class="relative w-32 h-32 shrink-0 rounded-full overflow-hidden shadow-lg border-2 border-slate-100 dark:border-slate-700 group cursor-pointer bg-white dark:bg-slate-800">

                        @if($profile && $profile->avatar_jpeg)
                            <img src="{{ asset('storage/'. $profile->avatar_jpeg) }}" alt="{{__('admin.fields.profile_picture_avatar')}}"
                                 class="absolute inset-0 w-full h-full object-cover transition-opacity duration-500 md:group-hover:opacity-0"
                                 :class="isPlaying? 'opacity-0 md:opacity-100' : 'opacity-100'">
                        @else
                            <div class="absolute inset-0 w-full h-full bg-slate-900 dark:bg-slate-100 flex items-center justify-center text-white dark:text-slate-900 text-3xl font-serif font-bold">MM</div>
                        @endif

                        @if($profile && $profile->avatar_gif)
                            {{-- O atributo :src injeta o tempo atual dinamicamente --}}
                            <img :src="'{{ asset('storage/'. $profile->avatar_gif) }}?t=' + gifTimestamp" alt="{{__('admin.fields.profile_picture_avatar')}}"
                                 class="absolute inset-0 w-full h-full object-cover transition-opacity duration-500 md:group-hover:opacity-100"
                                 :class="isPlaying? 'opacity-100 md:opacity-0' : 'opacity-0'">
                        @endif
                    </div>

                    {{-- Modal em Tela Cheia --}}
                    <template x-teleport="body">
                        <div x-show="modalOpen" x-cloak style="display: none;" class="fixed inset-0 z-50 flex items-center justify-center bg-black/80 p-4" x-transition.opacity>
                            <div class="absolute inset-0" @click="modalOpen = false"></div>
                            <div class="relative max-w-2xl w-full" x-transition>
                                <button @click="modalOpen = false" class="absolute -top-10 right-0 text-white text-4xl hover:text-gray-300">&times;</button>

                                @if($profile && $profile->avatar_jpeg)
                                    <div class="relative w-full h-auto group">
                                        <img src="{{ asset('storage/'. $profile->avatar_jpeg) }}" alt="{{__('admin.fields.profile_picture_avatar')}}"
                                             class="w-full h-auto rounded-sm shadow-2xl transition-opacity duration-500 md:group-hover:opacity-0"
                                             :class="isPlaying? 'opacity-0' : 'opacity-100'">

                                        @if($profile->avatar_gif)
                                            {{-- O GIF do modal responde à mesma variável de tempo --}}
                                            <img :src="'{{ asset('storage/'. $profile->avatar_gif) }}?t=' + gifTimestamp" alt="{{__('admin.fields.profile_picture_avatar_in_motion')}}"
                                                 class="absolute inset-0 w-full h-full object-cover rounded-sm shadow-2xl transition-opacity duration-500 md:group-hover:opacity-100"
                                                 :class="isPlaying? 'opacity-100' : 'opacity-0'">
                                        @endif
                                    </div>
                                @endif
                            </div>
                        </div>
                    </template>
                </div>

                {{-- Textos Básicos --}}
                <div>
                    <h1 class="text-4xl font-extrabold text-slate-900 dark:text-white tracking-tight">
                        {{ $profile ? $profile->first_name. ' '. $profile->last_name : 'Matiz Madel' }}
                    </h1>
                    <p class="text-xl text-slate-600 dark:text-slate-300 font-light">
                        {{ $profile ? $profile->subtitle : 'Pesquisadora' }}
                    </p>

                    @if($profile && $profile->aliases)
                        <p class="text-sm text-slate-400 dark:text-slate-500 mt-1 font-mono tracking-wide">
                            {{ implode(' • ', $profile->aliases) }}
                        </p>
                    @endif

                    {{-- E-mail e Telefone Lado a Lado --}}
                    @if($profile && ($profile->email || $profile->phone))
                        <div class="flex flex-wrap items-center mt-2 gap-3 text-sm font-medium text-slate-500 dark:text-slate-400">
                            @if($profile->email)
                                <a href="mailto:{{ $profile->email }}" class="hover:text-blue-800 dark:hover:text-blue-400 transition-colors flex items-center gap-2">
                                    {{ $profile->email }}
                                </a>
                            @endif

                            {{-- Divisor (O ponto no meio) se ambos existirem --}}
                            @if($profile->email && $profile->phone)
                                <span class="text-slate-300 dark:text-slate-600">•</span>
                            @endif

                            @if($profile->phone)
                                @php
                                    $cleanPhone = preg_replace('/[^0-9]/', '', $profile->phone);
                                    if ($profile->is_whatsapp) {
                                        $phoneLink = "https://api.whatsapp.com/send/?phone={$cleanPhone}";
                                        if ($profile->default_message) {
                                            $phoneLink.= '&'. http_build_query(['text' => $profile->default_message], '', '&', PHP_QUERY_RFC3986);
                                        }
                                    } else {
                                        $phoneLink = "tel:{$cleanPhone}";
                                    }
                                @endphp
                                <a href="{{ $phoneLink }}" target="_blank" class="hover:text-blue-800 dark:hover:text-blue-400 transition-colors flex items-center gap-2">
                                    {{ $profile->phone }}
                                </a>
                            @endif
                        </div>
                    @endif
                </div>

            </div>

            {{-- Grupo 2: Biografia (Se existir) --}}
            @if($profile && $profile->bio)
                <p class="text-base text-slate-500 dark:text-slate-400 leading-relaxed max-w-2xl">
                    {{ $profile->bio }}
                </p>
            @endif

            {{-- Grupo 3: Links Externos --}}
            <div class="flex flex-col space-y-4">

                {{-- Links Externos como Bolinhas (Badges) --}}
                @if($external_links->isNotEmpty())
                    <div class="print:hidden flex flex-wrap gap-2">
                        @foreach($external_links as $link)
                            <a href="{{ $link->url }}" target="_blank"
                               style="background-color: {{ $link->color }}80;"
                               class="inline-flex items-center px-4 py-1.5 rounded-full text-slate-900 dark:text-white text-sm font-semibold shadow-md hover:brightness-90 hover:scale-105 transition-all duration-200">
                                {{ $link->label }}
                            </a>
                        @endforeach
                    </div>
                @endif
                @if($external_links->isNotEmpty())
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

    @if($educations->isNotEmpty())
        <section class="mb-12">
            <h2 class="text-2xl font-bold text-slate-900 mb-6">{{ __('admin.resources.education.plural') }}</h2>
            <div class="space-y-6">
                @foreach($educations as $education)
                    <div class="border-l-2 border-slate-300 pl-4 ml-2">
                        <h3 class="text-lg font-semibold text-slate-800">{{ $education->degree }}</h3>
                        <p class="text-slate-600">
                            {{ $education->institution }}
                        </p>
                        <p class="text-sm text-slate-400 mt-1">
                            <time datetime="{{ \Carbon\Carbon::parse($education->start_date)->format('Y-m-d') }}">
                                {{ \Carbon\Carbon::parse($education->start_date)->format('d/m/Y') }}
                            </time>
                            —
                            @if($education->end_date)
                                <time datetime="{{ \Carbon\Carbon::parse($education->end_date)->format('Y-m-d') }}">
                                    {{ \Carbon\Carbon::parse($education->end_date)->format('d/m/Y') }}
                                </time>
                            @else
                                {{ __('admin.fields.currently') }}
                            @endif
                            {{ $education->end_date ? \Carbon\Carbon::parse($education->end_date)->format('Y') : __('admin.fields.currently') }}
                            @if($education->city || $education->country)
                                &bull; {{ $education->city }}, {{ $education->country }}
                            @endif
                        </p>
                    </div>
                @endforeach
            </div>
        </section>
    @endif

    @if($employments->isNotEmpty())
        <section class="mb-12">
            <h2 class="text-2xl font-bold text-slate-900 mb-6">{{ __('admin.resources.employment.plural') }}</h2>
            <div class="space-y-6">
                @foreach($employments as $employment)
                    <div class="border-l-2 border-slate-300 pl-4 ml-2">
                        <h3 class="text-lg font-semibold text-slate-800">{{ $employment->role }}</h3>
                        <p class="text-slate-600">
                            {{$employment->organization }}
                            @if($employment->department)
                                ({{ $employment->department }})
                            @endif
                        </p>
                        <p class="text-sm text-slate-400 mt-1">
                            {{ \Carbon\Carbon::parse($employment->start_date)->format('Y') }} —
                            {{ $employment->end_date? \Carbon\Carbon::parse($employment->end_date)->format('Y') : __('admin.fields.currently') }}
                        </p>
                    </div>
                @endforeach
            </div>
        </section>
    @endif

    @if($works->isNotEmpty())
        <section class="mb-12">
            <h2 class="text-2xl font-bold text-slate-900 mb-6">{{ __('admin.resources.work.plural') }}</h2>
            <div class="space-y-6">
                @foreach($works as $work)
                    <div class="bg-white p-6 rounded-xl border border-slate-200 shadow-sm">
                        <div class="flex items-center space-x-2 mb-2">
                                <span class="px-2.5 py-0.5 rounded-md bg-blue-50 text-blue-700 text-xs font-semibold tracking-wide uppercase">
                                    {{ $work->type?->getLabel() }}
                                </span>
                            <span class="text-sm text-slate-400">{{ \Carbon\Carbon::parse($work->publication_date)->format('Y') }}</span>
                        </div>
                        <h3 class="text-xl font-bold text-slate-900 mb-2">
                            @if($work->url)
                                <a href="{{ $work->url }}" target="_blank" class="hover:text-blue-600 transition">{{ $work->title }}</a>
                            @else
                                {{ $work->title }}
                            @endif
                        </h3>
                        @if($work->abstract)
                            <p class="text-slate-600 text-sm leading-relaxed mb-3">{{ $work->abstract }}</p>
                        @endif
                        @if(!empty($work->attachments))
                            <div class="mt-4 flex flex-wrap gap-2">
                                @foreach($work->attachments as $attachment)
                                    @php
                                        $extension = pathinfo($attachment, PATHINFO_EXTENSION);
                                        $isPdf = strtolower($extension) === 'pdf';
                                    @endphp

                                    <a href="{{ asset('storage/' . $attachment) }}"
                                       target="_blank"
                                       class="inline-flex items-center space-x-1.5 px-3 py-1.5 bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-md text-xs font-medium text-slate-600 dark:text-slate-300 hover:bg-blue-50 hover:text-blue-600 transition-colors">

                                        {{-- Ícone condicional --}}
                                        @if($isPdf)
                                            <span class="text-red-500">📄</span>
                                        @else
                                            <span class="text-blue-500">📎</span>
                                        @endif

                                        <span>{{ strtoupper($extension) }} File</span>
                                    </a>
                                @endforeach
                            </div>
                        @endif
                        @if($work->doi)
                            <p class="text-xs text-slate-500 font-mono">DOI: {{ $work->doi }}</p>
                        @endif
                    </div>
                @endforeach
            </div>
        </section>
    @endif

    @if($activities->isNotEmpty())
        <section class="mb-12">
            <h2 class="text-2xl font-bold text-slate-900 mb-6">{{ __('admin.resources.professional_activity.plural') }}</h2>
            <div class="space-y-6">
                @foreach($activities as $activity)
                    <div class="border-l-2 border-slate-300 pl-4 ml-2">
                        <div class="flex items-center space-x-2 mb-1">
                            <span class="text-sm font-semibold text-slate-500 uppercase tracking-wide">{{ $activity->activity_type?->getLabel() }}</span>
                        </div>
                        <h3 class="text-lg font-semibold text-slate-800">{{ $activity->title }}</h3>
                        <p class="text-slate-600">{{ $activity->organization }}</p>
                        <p class="text-sm text-slate-400 mt-1">{{ \Carbon\Carbon::parse($activity->start_date)->format('Y') }}</p>
                    </div>
                @endforeach
            </div>
        </section>
    @endif

    @if($fundings->isNotEmpty())
        <section class="mb-12">
            <h2 class="text-2xl font-bold text-slate-900 mb-6">{{ __('admin.resources.funding.plural') }}</h2>
            <div class="space-y-6">
                @foreach($fundings as $funding)
                    <div class="bg-white p-5 rounded-lg border border-slate-200">
                        <div class="flex items-center justify-between mb-2">
                            <span class="text-xs font-bold text-slate-500 uppercase tracking-wider">{{ $funding->funding_type?->getLabel() }}</span>
                            <span class="text-sm text-slate-400">{{ \Carbon\Carbon::parse($funding->start_date)->format('Y') }}</span>
                        </div>
                        <h3 class="text-md font-bold text-slate-900">{{ $funding->title }}</h3>
                        <p class="text-sm text-slate-600 mt-1">{{ $funding->agency }}</p>
                    </div>
                @endforeach
            </div>
        </section>
    @endif
</div>
</body>
</html>
