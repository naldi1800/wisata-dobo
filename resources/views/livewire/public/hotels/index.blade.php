<div class="min-h-screen">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <h1 class="text-3xl font-bold text-zinc-900 dark:text-white mb-8">Hotel</h1>

        <!-- Search -->
        <div class="mb-8">
            <input
                wire:model.live="search"
                type="text"
                placeholder="Cari hotel..."
                class="w-full px-4 py-3 border border-zinc-200 dark:border-zinc-700 rounded-lg bg-white dark:bg-zinc-800"
            />
        </div>

        <!-- Hotel Grid -->
        @if($hotels->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($hotels as $hotel)
                    <div class="bg-white dark:bg-zinc-800 rounded-lg shadow-lg overflow-hidden border border-zinc-200 dark:border-zinc-700">
                        @if($hotel->featured_image)
                            <div class="h-48 bg-zinc-200 dark:bg-zinc-700">
                                <img src="{{ asset('assets/images/hotels/' . $hotel->featured_image) }}" alt="{{ $hotel->name }}" class="w-full h-full object-cover">
                            </div>
                        @else
                            <div class="h-48 bg-gradient-to-br from-purple-400 to-purple-600 flex items-center justify-center">
                                <svg class="w-16 h-16 text-white opacity-50" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                                </svg>
                            </div>
                        @endif
                        <div class="p-4">
                            @if($hotel->hotel_class)
                                <span class="inline-block px-2 py-1 text-xs font-medium bg-purple-100 text-purple-800 rounded-full mb-2">{{ $hotel->hotel_class }}</span>
                            @endif
                            <h3 class="font-semibold text-lg text-zinc-900 dark:text-white mb-2">{{ $hotel->name }}</h3>
                            <p class="text-sm text-zinc-600 dark:text-zinc-400 mb-3">{{ $hotel->address ?? 'Alamat belum tersedia' }}</p>
                            <div class="flex items-center justify-between mb-3">
                                @if($hotel->rating)
                                    <span class="inline-flex items-center px-2 py-1 text-xs font-medium bg-green-100 text-green-800 rounded-full">
                                        {{ $hotel->rating }}/5
                                    </span>
                                @endif
                                @if($hotel->price_start)
                                    <span class="text-sm text-zinc-600 dark:text-zinc-400">
                                        Mulai Rp {{ number_format($hotel->price_start, 0) }}
                                    </span>
                                @endif
                            </div>
                            <a href="{{ route('public.hotels.show', $hotel->slug) }}" class="block w-full text-center px-4 py-2 bg-purple-600 text-white rounded-lg hover:bg-purple-700 text-sm">
                                Lihat Detail
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="mt-8 flex justify-center">
                {{ $hotels->links() }}
            </div>
        @else
            <div class="text-center py-12">
                <p class="text-zinc-600 dark:text-zinc-400">Tidak ada hotel yang ditemukan.</p>
            </div>
        @endif
    </div>
</div>
