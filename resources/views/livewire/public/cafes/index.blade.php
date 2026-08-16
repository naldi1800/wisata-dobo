<div class="min-h-screen">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <h1 class="text-3xl font-bold text-zinc-900 dark:text-white mb-8">Cafe</h1>

        <!-- Search -->
        <div class="mb-8">
            <input
                wire:model.live="search"
                type="text"
                placeholder="Cari cafe..."
                class="w-full px-4 py-3 border border-zinc-200 dark:border-zinc-700 rounded-lg bg-white dark:bg-zinc-800"
            />
        </div>

        <!-- Cafe Grid -->
        @if($cafes->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($cafes as $cafe)
                    <div class="bg-white dark:bg-zinc-800 rounded-lg shadow-lg overflow-hidden border border-zinc-200 dark:border-zinc-700">
                        @if($cafe->featured_image)
                            <div class="h-48 bg-zinc-200 dark:bg-zinc-700">
                                <img src="{{ $cafe->featured_image }}" alt="{{ $cafe->name }}" class="w-full h-full object-cover">
                            </div>
                        @else
                            <div class="h-48 bg-gradient-to-br from-orange-400 to-orange-600 flex items-center justify-center">
                                <svg class="w-16 h-16 text-white opacity-50" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z"></path>
                                </svg>
                            </div>
                        @endif
                        <div class="p-4">
                            <h3 class="font-semibold text-lg text-zinc-900 dark:text-white mb-2">{{ $cafe->name }}</h3>
                            <p class="text-sm text-zinc-600 dark:text-zinc-400 mb-3">{{ $cafe->address ?? 'Alamat belum tersedia' }}</p>
                            <div class="flex items-center justify-between mb-3">
                                @if($cafe->rating)
                                    <span class="inline-flex items-center px-2 py-1 text-xs font-medium bg-green-100 text-green-800 rounded-full">
                                        {{ $cafe->rating }}/5
                                    </span>
                                @endif
                                @if($cafe->average_price)
                                    <span class="text-sm text-zinc-600 dark:text-zinc-400">
                                        Rata-rata Rp {{ number_format($cafe->average_price, 0) }}
                                    </span>
                                @endif
                            </div>
                            @if($cafe->operating_hours)
                                <div class="text-xs text-zinc-500 mb-3">{{ $cafe->operating_hours }}</div>
                            @endif
                            <a href="{{ route('public.cafes.show', $cafe->slug) }}" class="block w-full text-center px-4 py-2 bg-orange-600 text-white rounded-lg hover:bg-orange-700 text-sm">
                                Lihat Detail
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="mt-8 flex justify-center">
                {{ $cafes->links() }}
            </div>
        @else
            <div class="text-center py-12">
                <p class="text-zinc-600 dark:text-zinc-400">Tidak ada cafe yang ditemukan.</p>
            </div>
        @endif
    </div>
</div>
