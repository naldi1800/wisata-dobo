<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? 'Smart Tourism - Kabupaten Kepulauan Aru' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-white dark:bg-zinc-900">
    <!-- Navigation -->
    <nav class="bg-white dark:bg-zinc-800 border-b border-zinc-200 dark:border-zinc-700">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <!-- Logo -->
                <div class="flex items-center">
                    <a href="{{ route('public.home') }}" class="flex items-center gap-2">
                        <div class="w-8 h-8 bg-blue-600 rounded-lg flex items-center justify-center">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <span class="text-xl font-bold text-zinc-900 dark:text-white">Smart Tourism</span>
                    </a>
                </div>

                <!-- Desktop Menu -->
                <div class="hidden md:flex items-center gap-6">
                    <a href="{{ route('public.home') }}" class="text-zinc-700 dark:text-zinc-300 hover:text-blue-600 dark:hover:text-blue-400">Beranda</a>
                    <a href="{{ route('public.destinations') }}" class="text-zinc-700 dark:text-zinc-300 hover:text-blue-600 dark:hover:text-blue-400">Destinasi</a>
                    <a href="{{ route('public.recommendations') }}" class="text-zinc-700 dark:text-zinc-300 hover:text-blue-600 dark:hover:text-blue-400">Rekomendasi</a>
                    <a href="{{ route('public.hotels') }}" class="text-zinc-700 dark:text-zinc-300 hover:text-blue-600 dark:hover:text-blue-400">Hotel</a>
                    <a href="{{ route('public.cafes') }}" class="text-zinc-700 dark:text-zinc-300 hover:text-blue-600 dark:hover:text-blue-400">Cafe</a>
                    <a href="{{ route('public.about') }}" class="text-zinc-700 dark:text-zinc-300 hover:text-blue-600 dark:hover:text-blue-400">Tentang</a>
                    <a href="{{ route('public.destinations') }}" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                        Temukan Wisata
                    </a>
                </div>

                <!-- Mobile Menu Button -->
                <div class="md:hidden">
                    <button id="mobile-menu-button" class="text-zinc-700 dark:text-zinc-300">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div id="mobile-menu" class="hidden md:hidden border-t border-zinc-200 dark:border-zinc-700">
            <div class="px-4 py-3 space-y-2">
                <a href="{{ route('public.home') }}" class="block py-2 text-zinc-700 dark:text-zinc-300">Beranda</a>
                <a href="{{ route('public.destinations') }}" class="block py-2 text-zinc-700 dark:text-zinc-300">Destinasi</a>
                <a href="{{ route('public.recommendations') }}" class="block py-2 text-zinc-700 dark:text-zinc-300">Rekomendasi</a>
                <a href="{{ route('public.hotels') }}" class="block py-2 text-zinc-700 dark:text-zinc-300">Hotel</a>
                <a href="{{ route('public.cafes') }}" class="block py-2 text-zinc-700 dark:text-zinc-300">Cafe</a>
                <a href="{{ route('public.about') }}" class="block py-2 text-zinc-700 dark:text-zinc-300">Tentang</a>
                <a href="{{ route('public.destinations') }}" class="block py-2 px-4 bg-blue-600 text-white rounded-lg text-center">
                    Temukan Wisata
                </a>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main>
        {{ $slot }}
    </main>

    <!-- Footer -->
    <footer class="bg-zinc-50 dark:bg-zinc-800 border-t border-zinc-200 dark:border-zinc-700 mt-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <div class="text-center text-zinc-600 dark:text-zinc-400">
                <p>&copy; {{ date('Y') }} Smart Tourism - Kabupaten Kepulauan Aru</p>
            </div>
        </div>
    </footer>

    <!-- Mobile Menu Script -->
    <script>
        document.getElementById('mobile-menu-button').addEventListener('click', function() {
            const menu = document.getElementById('mobile-menu');
            menu.classList.toggle('hidden');
        });
    </script>
</body>
</html>
