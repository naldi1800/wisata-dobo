<div>
    <!-- Hero Section -->
    <section class="bg-gradient-to-r from-blue-600 to-blue-800 text-white py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h1 class="text-4xl md:text-5xl font-bold mb-4">
                    Sistem Informasi Smart Tourism
                    <br>Kabupaten Kepulauan Aru
                </h1>
                <p class="text-xl md:text-2xl text-blue-100 mb-8 max-w-3xl mx-auto">
                    Temukan destinasi wisata pantai terbaik dengan rekomendasi berbasis metode Simple Additive Weighting (SAW)
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="{{ route('public.destinations') }}" class="px-8 py-3 bg-white text-blue-600 rounded-lg font-semibold hover:bg-blue-50">
                        Lihat Destinasi
                    </a>
                    <a href="{{ route('public.recommendations') }}" class="px-8 py-3 bg-blue-700 text-white rounded-lg font-semibold hover:bg-blue-800 border border-blue-500">
                        Lihat Rekomendasi
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Featured Destinations -->
    <section class="py-16 bg-white dark:bg-zinc-900">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-3xl font-bold text-center mb-12 text-zinc-900 dark:text-white">
                Destinasi Wisata Pantai
            </h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                @foreach($featuredBeaches as $beach)
                    <div class="bg-white dark:bg-zinc-800 rounded-lg shadow-lg overflow-hidden border border-zinc-200 dark:border-zinc-700">
                        @if($beach['featured_image'])
                            <div class="h-48 bg-zinc-200 dark:bg-zinc-700">
                                <img src="{{ $beach['featured_image'] }}" alt="{{ $beach['name'] }}" class="w-full h-full object-cover">
                            </div>
                        @else
                            <div class="h-48 bg-gradient-to-br from-blue-400 to-blue-600 flex items-center justify-center">
                                <svg class="w-16 h-16 text-white opacity-50" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                        @endif
                        <div class="p-4">
                            <h3 class="font-semibold text-lg text-zinc-900 dark:text-white mb-2">{{ $beach['name'] }}</h3>
                            <p class="text-sm text-zinc-600 dark:text-zinc-400 mb-3">{{ $beach['address'] ?? 'Alamat belum tersedia' }}</p>
                            <div class="flex items-center justify-between mb-3">
                                @if($beach['rating'])
                                    <span class="inline-flex items-center px-2 py-1 text-xs font-medium bg-green-100 text-green-800 rounded-full">
                                        {{ $beach['rating'] }}/5
                                    </span>
                                @endif
                                @if($beach['ticket_price'])
                                    <span class="text-sm text-zinc-600 dark:text-zinc-400">
                                        Rp {{ number_format($beach['ticket_price'], 0) }}
                                    </span>
                                @endif
                            </div>
                            <a href="{{ route('public.destinations.show', $beach['slug']) }}" class="block w-full text-center px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 text-sm">
                                Lihat Detail
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Top Recommendations -->
    @if(!empty($topRecommendations))
    <section class="py-16 bg-zinc-50 dark:bg-zinc-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-3xl font-bold text-center mb-4 text-zinc-900 dark:text-white">
                Rekomendasi Teratas
            </h2>
            <p class="text-center text-zinc-600 dark:text-zinc-400 mb-12">
                Berdasarkan perhitungan metode Simple Additive Weighting (SAW)
            </p>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @foreach($topRecommendations as $item)
                    <div class="bg-white dark:bg-zinc-900 rounded-lg shadow-lg overflow-hidden border border-zinc-200 dark:border-zinc-700 {{ $item['rank'] === 1 ? 'ring-2 ring-yellow-400' : '' }}">
                        @if($item['rank'] === 1)
                            <div class="bg-yellow-400 text-yellow-900 text-center py-2 font-semibold">
                                🏆 Rekomendasi Teratas
                            </div>
                        @endif
                        <div class="p-6">
                            <div class="flex items-center justify-between mb-4">
                                <span class="text-2xl font-bold text-blue-600">#{{ $item['rank'] }}</span>
                                <span class="inline-flex items-center px-3 py-1 text-sm font-medium bg-blue-100 text-blue-800 rounded-full">
                                    Score: {{ $item['score'] }}
                                </span>
                            </div>
                            <h3 class="font-semibold text-xl text-zinc-900 dark:text-white mb-2">{{ $item['beach']->name }}</h3>
                            <div class="space-y-2 text-sm text-zinc-600 dark:text-zinc-400">
                                @if($item['beach']->rating)
                                    <div>Rating: {{ $item['beach']->rating }}/5</div>
                                @endif
                                @if($item['beach']->ticket_price)
                                    <div>Harga Tiket: Rp {{ number_format($item['beach']->ticket_price, 0) }}</div>
                                @endif
                            </div>
                            <a href="{{ route('public.destinations.show', $item['beach']->slug) }}" class="block mt-4 text-center px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 text-sm">
                                Lihat Detail
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif
</div>
