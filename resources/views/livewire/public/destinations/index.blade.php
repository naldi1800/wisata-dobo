<div class="min-h-screen">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <h1 class="text-3xl font-bold text-zinc-900 dark:text-white mb-8">Destinasi Wisata Pantai</h1>

        <!-- Search -->
        <div class="mb-8">
            <input
                wire:model.live="search"
                type="text"
                placeholder="Cari destinasi..."
                class="w-full px-4 py-3 border border-zinc-200 dark:border-zinc-700 rounded-lg bg-white dark:bg-zinc-800"
            />
        </div>

        <!-- Beach Grid -->
        @if($beaches->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($beaches as $beach)
                    <div class="bg-white dark:bg-zinc-800 rounded-lg shadow-lg overflow-hidden border border-zinc-200 dark:border-zinc-700">
                        @if($beach->featured_image)
                            <div class="h-48 bg-zinc-200 dark:bg-zinc-700">
                                <img src="{{ asset('assets/images/beaches/' . $beach->featured_image) }}" alt="{{ $beach->name }}" class="w-full h-full object-cover">
                            </div>
                        @else
                            <div class="h-48 bg-gradient-to-br from-blue-400 to-blue-600 flex items-center justify-center">
                                <svg class="w-16 h-16 text-white opacity-50" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                        @endif
                        <div class="p-4">
                            <h3 class="font-semibold text-lg text-zinc-900 dark:text-white mb-2">{{ $beach->name }}</h3>
                            <p class="text-sm text-zinc-600 dark:text-zinc-400 mb-3">{{ $beach->address ?? 'Alamat belum tersedia' }}</p>
                            <div class="flex items-center justify-between mb-3">
                                @if($beach->rating)
                                    <span class="inline-flex items-center px-2 py-1 text-xs font-medium bg-green-100 text-green-800 rounded-full">
                                        {{ $beach->rating }}/5
                                    </span>
                                @endif
                                @if($beach->ticket_price)
                                    <span class="text-sm text-zinc-600 dark:text-zinc-400">
                                        Rp {{ number_format($beach->ticket_price, 0) }}
                                    </span>
                                @endif
                            </div>
                            <a href="{{ route('public.destinations.show', $beach->slug) }}" class="block w-full text-center px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 text-sm">
                                Lihat Detail
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="mt-8 flex justify-center">
                {{ $beaches->links() }}
            </div>
        @else
            <div class="text-center py-12">
                <p class="text-zinc-600 dark:text-zinc-400">Tidak ada destinasi yang ditemukan.</p>
            </div>
        @endif
    </div>
</div>
