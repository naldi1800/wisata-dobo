<div class="min-h-screen">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <!-- Back Button -->
        <a href="{{ route('public.hotels') }}" class="inline-flex items-center text-purple-600 hover:text-purple-800 mb-6">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
            </svg>
            Kembali ke Hotel
        </a>

        <!-- Hotel Header -->
        <div class="mb-8">
            @if($hotel->hotel_class)
                <span class="inline-block px-3 py-1 text-sm font-medium bg-purple-100 text-purple-800 rounded-full mb-2">{{ $hotel->hotel_class }}</span>
            @endif
            <h1 class="text-3xl font-bold text-zinc-900 dark:text-white mb-2">{{ $hotel->name }}</h1>
            <p class="text-zinc-600 dark:text-zinc-400">{{ $hotel->address ?? 'Alamat belum tersedia' }}</p>
        </div>

        <!-- Featured Image -->
        @if($hotel->featured_image)
            <div class="mb-8 rounded-lg overflow-hidden">
                <img src="{{ asset('assets/images/hotels/' . $hotel->featured_image) }}" alt="{{ $hotel->name }}" class="w-full h-96 object-cover">
            </div>
        @else
            <div class="mb-8 h-96 bg-gradient-to-br from-purple-400 to-purple-600 rounded-lg flex items-center justify-center">
                <svg class="w-24 h-24 text-white opacity-50" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                </svg>
            </div>
        @endif

        <!-- Info Grid -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mb-8">
            <!-- Main Info -->
            <div class="lg:col-span-2 space-y-6">
                <!-- Description -->
                @if($hotel->description)
                    <div class="bg-white dark:bg-zinc-800 rounded-lg p-6 border border-zinc-200 dark:border-zinc-700">
                        <h2 class="text-xl font-semibold mb-4 text-zinc-900 dark:text-white">Deskripsi</h2>
                        <p class="text-zinc-600 dark:text-zinc-400">{{ $hotel->description }}</p>
                    </div>
                @endif

                <!-- Facilities -->
                @if($hotel->facilities && is_array($hotel->facilities) && count($hotel->facilities) > 0)
                    <div class="bg-white dark:bg-zinc-800 rounded-lg p-6 border border-zinc-200 dark:border-zinc-700">
                        <h2 class="text-xl font-semibold mb-4 text-zinc-900 dark:text-white">Fasilitas</h2>
                        <div class="flex flex-wrap gap-2">
                            @foreach($hotel->facilities as $facility)
                                <span class="px-3 py-1 bg-purple-100 text-purple-800 rounded-full text-sm">{{ $facility }}</span>
                            @endforeach
                        </div>
                        <div class="mt-4 flex gap-4">
                            @if($hotel->has_parking)
                                <span class="inline-flex items-center px-3 py-1 bg-green-100 text-green-800 rounded-full text-sm">
                                    ✓ Parkir
                                </span>
                            @endif
                            @if($hotel->has_pool)
                                <span class="inline-flex items-center px-3 py-1 bg-blue-100 text-blue-800 rounded-full text-sm">
                                    ✓ Kolam Renang
                                </span>
                            @endif
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
                        @if($hotel->rating)
                            <div class="flex justify-between">
                                <span class="text-zinc-600 dark:text-zinc-400">Rating</span>
                                <span class="font-semibold text-zinc-900 dark:text-white">{{ $hotel->rating }}/5</span>
                            </div>
                        @endif
                        @if($hotel->price_start)
                            <div class="flex justify-between">
                                <span class="text-zinc-600 dark:text-zinc-400">Harga Mulai</span>
                                <span class="font-semibold text-zinc-900 dark:text-white">Rp {{ number_format($hotel->price_start, 0) }}</span>
                            </div>
                        @endif
                        @if($hotel->room_count)
                            <div class="flex justify-between">
                                <span class="text-zinc-600 dark:text-zinc-400">Jumlah Kamar</span>
                                <span class="font-semibold text-zinc-900 dark:text-white">{{ $hotel->room_count }}</span>
                            </div>
                        @endif
                        @if($hotel->check_in_time)
                            <div class="flex justify-between">
                                <span class="text-zinc-600 dark:text-zinc-400">Check-in</span>
                                <span class="font-semibold text-zinc-900 dark:text-white">{{ $hotel->check_in_time }}</span>
                            </div>
                        @endif
                        @if($hotel->check_out_time)
                            <div class="flex justify-between">
                                <span class="text-zinc-600 dark:text-zinc-400">Check-out</span>
                                <span class="font-semibold text-zinc-900 dark:text-white">{{ $hotel->check_out_time }}</span>
                            </div>
                        @endif
                        @if($hotel->latitude && $hotel->longitude)
                            <div class="flex justify-between">
                                <span class="text-zinc-600 dark:text-zinc-400">Koordinat</span>
                                <span class="font-semibold text-zinc-900 dark:text-white text-sm">{{ $hotel->latitude }}, {{ $hotel->longitude }}</span>
                            </div>
                        @endif
                    </div>
                </div>

                <!-- Google Maps -->
                @if($hotel->google_maps_url)
                    <div class="bg-white dark:bg-zinc-800 rounded-lg p-6 border border-zinc-200 dark:border-zinc-700">
                        <h2 class="text-xl font-semibold mb-4 text-zinc-900 dark:text-white">Lokasi</h2>
                        <a href="{{ $hotel->google_maps_url }}" target="_blank" class="block w-full text-center px-4 py-3 bg-purple-600 text-white rounded-lg hover:bg-purple-700">
                            Lihat di Google Maps
                        </a>
                    </div>
                @endif

                <!-- Contact -->
                @if($hotel->contact)
                    <div class="bg-white dark:bg-zinc-800 rounded-lg p-6 border border-zinc-200 dark:border-zinc-700">
                        <h2 class="text-xl font-semibold mb-4 text-zinc-900 dark:text-white">Kontak</h2>
                        <p class="text-zinc-600 dark:text-zinc-400">{{ $hotel->contact }}</p>
                    </div>
                @endif

                <!-- Website -->
                @if($hotel->website)
                    <div class="bg-white dark:bg-zinc-800 rounded-lg p-6 border border-zinc-200 dark:border-zinc-700">
                        <h2 class="text-xl font-semibold mb-4 text-zinc-900 dark:text-white">Website</h2>
                        <a href="{{ $hotel->website }}" target="_blank" class="block w-full text-center px-4 py-3 bg-purple-600 text-white rounded-lg hover:bg-purple-700">
                            Kunjungi Website
                        </a>
                    </div>
                @endif

                <!-- Video -->
                @if($hotel->video)
                    <div class="bg-white dark:bg-zinc-800 rounded-lg p-6 border border-zinc-200 dark:border-zinc-700">
                        <h2 class="text-xl font-semibold mb-4 text-zinc-900 dark:text-white">Video</h2>
                        <a href="{{ $hotel->video }}" target="_blank" class="block w-full text-center px-4 py-3 bg-red-600 text-white rounded-lg hover:bg-red-700">
                            Tonton Video
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
