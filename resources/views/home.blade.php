<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}"
      x-data="themeHandler()"
      :class="isDark ? 'dark' : ''">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    {{-- Include Metadata Component --}}
    @include('components.metadata')

    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body
    class="bg-slate-50 dark:bg-slate-900 text-slate-800 dark:text-slate-200 font-sans antialiased selection:bg-blue-200 dark:selection:bg-blue-900 transition-colors duration-300">

{{-- Top Actions (PDF & Language) --}}
@include('components.top-actions')

<div class="max-w-3xl mx-auto py-30 px-6">
    {{-- PublicProfile Header --}}
    @include('components.profile')

    {{-- Categories Sections --}}
    @include('components.categories')
</div>

<script>
    function themeHandler() {
        return {
            isDark: false,
            checkTime() {
                const hours = new Date().getHours();
                this.isDark = (hours < 6) || (hours >= 18);
            },
            init() {
                this.checkTime();
                setInterval(() => this.checkTime(), 60000);
                window.addEventListener('beforeprint', () => document.documentElement.classList.remove('dark'));
                window.addEventListener('afterprint', () => {
                    if (this.isDark) document.documentElement.classList.add('dark');
                });
            }
        }
    }
</script>
</body>
</html>
