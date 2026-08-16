<div class="min-h-screen">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <h1 class="text-3xl font-bold text-zinc-900 dark:text-white mb-4">Rekomendasi Destinasi Wisata</h1>
        <p class="text-zinc-600 dark:text-zinc-400 mb-8">
            Rekomendasi dihitung menggunakan metode Simple Additive Weighting (SAW) berdasarkan kriteria:
            Kebersihan, Fasilitas, Aksesibilitas, Keindahan, dan Biaya.
        </p>

        @if($error)
            <div class="p-4 bg-red-50 dark:bg-red-900/20 border border-red-200 dark:border-red-800 rounded-lg mb-8">
                <p class="text-red-700 dark:text-red-300">{{ $error }}</p>
            </div>
        @endif

        @if(empty($sawResult))
            <div class="p-8 text-center border border-zinc-200 dark:border-zinc-700 rounded-lg">
                <p class="text-zinc-500">Tidak ada data rekomendasi tersedia</p>
            </div>
        @else
            <!-- Criteria Info -->
            <div class="bg-blue-50 dark:bg-blue-900/20 border border-blue-200 dark:border-blue-800 rounded-lg p-6 mb-8">
                <h2 class="text-lg font-semibold mb-4 text-zinc-900 dark:text-white">Kriteria Penilaian</h2>
                <div class="grid grid-cols-2 md:grid-cols-5 gap-4 text-sm">
                    <div>
                        <div class="font-medium">C1: Kebersihan</div>
                        <div class="text-zinc-600 dark:text-zinc-400">Benefit (25%)</div>
                    </div>
                    <div>
                        <div class="font-medium">C2: Fasilitas</div>
                        <div class="text-zinc-600 dark:text-zinc-400">Benefit (20%)</div>
                    </div>
                    <div>
                        <div class="font-medium">C3: Aksesibilitas</div>
                        <div class="text-zinc-600 dark:text-zinc-400">Benefit (20%)</div>
                    </div>
                    <div>
                        <div class="font-medium">C4: Keindahan</div>
                        <div class="text-zinc-600 dark:text-zinc-400">Benefit (25%)</div>
                    </div>
                    <div>
                        <div class="font-medium">C5: Biaya</div>
                        <div class="text-zinc-600 dark:text-zinc-400">Cost (10%)</div>
                    </div>
                </div>
            </div>

            <!-- Ranking -->
            <div class="space-y-6">
                @foreach($sawResult['ranking'] as $item)
                    <div class="bg-white dark:bg-zinc-800 rounded-lg shadow-lg overflow-hidden border border-zinc-200 dark:border-zinc-700 {{ $item['rank'] === 1 ? 'ring-2 ring-yellow-400' : '' }}">
                        @if($item['rank'] === 1)
                            <div class="bg-yellow-400 text-yellow-900 text-center py-2 font-semibold">
                                🏆 Rekomendasi Teratas
                            </div>
                        @endif
                        <div class="p-6">
                            <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                                <div class="flex items-center gap-4">
                                    <div class="text-4xl font-bold text-blue-600">#{{ $item['rank'] }}</div>
                                    <div>
                                        <h3 class="text-xl font-semibold text-zinc-900 dark:text-white">{{ $item['beach']->name }}</h3>
                                        <p class="text-zinc-600 dark:text-zinc-400">{{ $item['beach']->address ?? 'Alamat belum tersedia' }}</p>
                                    </div>
                                </div>
                                <div class="flex items-center gap-4">
                                    <div class="text-right">
                                        <div class="text-2xl font-bold text-blue-600">{{ $item['score'] }}</div>
                                        <div class="text-sm text-zinc-600 dark:text-zinc-400">Score</div>
                                    </div>
                                    @if($item['beach']->rating)
                                        <div class="text-center">
                                            <div class="text-xl font-semibold text-green-600">{{ $item['beach']->rating }}/5</div>
                                            <div class="text-sm text-zinc-600 dark:text-zinc-400">Rating</div>
                                        </div>
                                    @endif
                                    @if($item['beach']->ticket_price)
                                        <div class="text-center">
                                            <div class="text-lg font-semibold text-zinc-900 dark:text-white">Rp {{ number_format($item['beach']->ticket_price, 0) }}</div>
                                            <div class="text-sm text-zinc-600 dark:text-zinc-400">Tiket</div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="mt-4 flex justify-end">
                                <a href="{{ route('public.destinations.show', $item['beach']->slug) }}" class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                                    Lihat Detail
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</div>
