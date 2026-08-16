<div class="min-h-screen">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <!-- Back Button -->
        <a href="{{ route('public.destinations') }}" class="inline-flex items-center text-blue-600 hover:text-blue-800 mb-6">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
            </svg>
            Kembali ke Destinasi
        </a>

        <!-- Beach Header -->
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-zinc-900 dark:text-white mb-2">{{ $beach->name }}</h1>
            <p class="text-zinc-600 dark:text-zinc-400">{{ $beach->address ?? 'Alamat belum tersedia' }}</p>
        </div>

        <!-- Featured Image -->
        @if($beach->featured_image)
            <div class="mb-8 rounded-lg overflow-hidden">
                <img src="{{ $beach->featured_image }}" alt="{{ $beach->name }}" class="w-full h-96 object-cover">
            </div>
        @else
            <div class="mb-8 h-96 bg-gradient-to-br from-blue-400 to-blue-600 rounded-lg flex items-center justify-center">
                <svg class="w-24 h-24 text-white opacity-50" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
            </div>
        @endif

        <!-- Info Grid -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mb-8">
            <!-- Main Info -->
            <div class="lg:col-span-2 space-y-6">
                <!-- Description -->
                @if($beach->description)
                    <div class="bg-white dark:bg-zinc-800 rounded-lg p-6 border border-zinc-200 dark:border-zinc-700">
                        <h2 class="text-xl font-semibold mb-4 text-zinc-900 dark:text-white">Deskripsi</h2>
                        <p class="text-zinc-600 dark:text-zinc-400">{{ $beach->description }}</p>
                    </div>
                @endif

                <!-- SAW Criteria -->
                <div class="bg-white dark:bg-zinc-800 rounded-lg p-6 border border-zinc-200 dark:border-zinc-700">
                    <h2 class="text-xl font-semibold mb-4 text-zinc-900 dark:text-white">Nilai Penilaian SAW</h2>
                    <div class="grid grid-cols-2 md:grid-cols-5 gap-4">
                        <div class="text-center">
                            <div class="text-2xl font-bold text-blue-600">{{ $beach->cleanliness }}</div>
                            <div class="text-sm text-zinc-600 dark:text-zinc-400">Kebersihan</div>
                        </div>
                        <div class="text-center">
                            <div class="text-2xl font-bold text-blue-600">{{ $beach->facility_score }}</div>
                            <div class="text-sm text-zinc-600 dark:text-zinc-400">Fasilitas</div>
                        </div>
                        <div class="text-center">
                            <div class="text-2xl font-bold text-blue-600">{{ $beach->accessibility }}</div>
                            <div class="text-sm text-zinc-600 dark:text-zinc-400">Aksesibilitas</div>
                        </div>
                        <div class="text-center">
                            <div class="text-2xl font-bold text-blue-600">{{ $beach->beauty }}</div>
                            <div class="text-sm text-zinc-600 dark:text-zinc-400">Keindahan</div>
                        </div>
                        <div class="text-center">
                            <div class="text-2xl font-bold text-blue-600">{{ number_format($beach->ticket_price, 0) }}</div>
                            <div class="text-sm text-zinc-600 dark:text-zinc-400">Biaya</div>
                        </div>
                    </div>
                </div>

                <!-- Facilities -->
                @if($beach->facilities && is_array($beach->facilities) && count($beach->facilities) > 0)
                    <div class="bg-white dark:bg-zinc-800 rounded-lg p-6 border border-zinc-200 dark:border-zinc-700">
                        <h2 class="text-xl font-semibold mb-4 text-zinc-900 dark:text-white">Fasilitas</h2>
                        <div class="flex flex-wrap gap-2">
                            @foreach($beach->facilities as $facility)
                                <span class="px-3 py-1 bg-blue-100 text-blue-800 rounded-full text-sm">{{ $facility }}</span>
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>

            <!-- Sidebar Info -->
            <div class="space-y-6">
                <!-- Quick Info -->
                <div class="bg-white dark:bg-zinc-800 rounded-lg p-6 border border-zinc-200 dark:border-zinc-700">
                    <h2 class="text-xl font-semibold mb-4 text-zinc-900 dark:text-white">Informasi</h2>
                    <div class="space-y-3">
                        @if($beach->rating)
                            <div class="flex justify-between">
                                <span class="text-zinc-600 dark:text-zinc-400">Rating</span>
                                <span class="font-semibold text-zinc-900 dark:text-white">{{ $beach->rating }}/5</span>
                            </div>
                        @endif
                        @if($beach->ticket_price)
                            <div class="flex justify-between">
                                <span class="text-zinc-600 dark:text-zinc-400">Harga Tiket</span>
                                <span class="font-semibold text-zinc-900 dark:text-white">Rp {{ number_format($beach->ticket_price, 0) }}</span>
                            </div>
                        @endif
                        @if($beach->operating_hours)
                            <div class="flex justify-between">
                                <span class="text-zinc-600 dark:text-zinc-400">Jam Operasional</span>
                                <span class="font-semibold text-zinc-900 dark:text-white">{{ $beach->operating_hours }}</span>
                            </div>
                        @endif
                        @if($beach->latitude && $beach->longitude)
                            <div class="flex justify-between">
                                <span class="text-zinc-600 dark:text-zinc-400">Koordinat</span>
                                <span class="font-semibold text-zinc-900 dark:text-white text-sm">{{ $beach->latitude }}, {{ $beach->longitude }}</span>
                            </div>
                        @endif
                    </div>
                </div>

                <!-- Google Maps -->
                @if($beach->google_maps_url)
                    <div class="bg-white dark:bg-zinc-800 rounded-lg p-6 border border-zinc-200 dark:border-zinc-700">
                        <h2 class="text-xl font-semibold mb-4 text-zinc-900 dark:text-white">Lokasi</h2>
                        <a href="{{ $beach->google_maps_url }}" target="_blank" class="block w-full text-center px-4 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                            Lihat di Google Maps
                        </a>
                    </div>
                @endif

                <!-- Contact -->
                @if($beach->contact)
                    <div class="bg-white dark:bg-zinc-800 rounded-lg p-6 border border-zinc-200 dark:border-zinc-700">
                        <h2 class="text-xl font-semibold mb-4 text-zinc-900 dark:text-white">Kontak</h2>
                        <p class="text-zinc-600 dark:text-zinc-400">{{ $beach->contact }}</p>
                    </div>
                @endif

                <!-- Video -->
                @if($beach->video)
                    <div class="bg-white dark:bg-zinc-800 rounded-lg p-6 border border-zinc-200 dark:border-zinc-700">
                        <h2 class="text-xl font-semibold mb-4 text-zinc-900 dark:text-white">Video</h2>
                        <a href="{{ $beach->video }}" target="_blank" class="block w-full text-center px-4 py-3 bg-red-600 text-white rounded-lg hover:bg-red-700">
                            Tonton Video
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
