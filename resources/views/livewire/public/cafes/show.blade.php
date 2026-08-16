<div class="min-h-screen">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <!-- Back Button -->
        <a href="{{ route('public.cafes') }}" class="inline-flex items-center text-orange-600 hover:text-orange-800 mb-6">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
            </svg>
            Kembali ke Cafe
        </a>

        <!-- Cafe Header -->
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-zinc-900 dark:text-white mb-2">{{ $cafe->name }}</h1>
            <p class="text-zinc-600 dark:text-zinc-400">{{ $cafe->address ?? 'Alamat belum tersedia' }}</p>
        </div>

        <!-- Featured Image -->
        @if($cafe->featured_image)
            <div class="mb-8 rounded-lg overflow-hidden">
                <img src="{{ $cafe->featured_image }}" alt="{{ $cafe->name }}" class="w-full h-96 object-cover">
            </div>
        @else
            <div class="mb-8 h-96 bg-gradient-to-br from-orange-400 to-orange-600 rounded-lg flex items-center justify-center">
                <svg class="w-24 h-24 text-white opacity-50" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z"></path>
                </svg>
            </div>
        @endif

        <!-- Info Grid -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mb-8">
            <!-- Main Info -->
            <div class="lg:col-span-2 space-y-6">
                <!-- Description -->
                @if($cafe->description)
                    <div class="bg-white dark:bg-zinc-800 rounded-lg p-6 border border-zinc-200 dark:border-zinc-700">
                        <h2 class="text-xl font-semibold mb-4 text-zinc-900 dark:text-white">Deskripsi</h2>
                        <p class="text-zinc-600 dark:text-zinc-400">{{ $cafe->description }}</p>
                    </div>
                @endif

                <!-- Signature Menu -->
                @if($cafe->signature_menu)
                    <div class="bg-white dark:bg-zinc-800 rounded-lg p-6 border border-zinc-200 dark:border-zinc-700">
                        <h2 class="text-xl font-semibold mb-4 text-zinc-900 dark:text-white">Menu Andalan</h2>
                        <p class="text-zinc-600 dark:text-zinc-400">{{ $cafe->signature_menu }}</p>
                    </div>
                @endif

                <!-- Facilities -->
                @if($cafe->facilities && is_array($cafe->facilities) && count($cafe->facilities) > 0)
                    <div class="bg-white dark:bg-zinc-800 rounded-lg p-6 border border-zinc-200 dark:border-zinc-700">
                        <h2 class="text-xl font-semibold mb-4 text-zinc-900 dark:text-white">Fasilitas</h2>
                        <div class="flex flex-wrap gap-2">
                            @foreach($cafe->facilities as $facility)
                                <span class="px-3 py-1 bg-orange-100 text-orange-800 rounded-full text-sm">{{ $facility }}</span>
                            @endforeach
                        </div>
                        <div class="mt-4 flex gap-4">
                            @if($cafe->has_wifi)
                                <span class="inline-flex items-center px-3 py-1 bg-blue-100 text-blue-800 rounded-full text-sm">
                                    ✓ WiFi
                                </span>
                            @endif
                            @if($cafe->has_parking)
                                <span class="inline-flex items-center px-3 py-1 bg-green-100 text-green-800 rounded-full text-sm">
                                    ✓ Parkir
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
                        @if($cafe->rating)
                            <div class="flex justify-between">
                                <span class="text-zinc-600 dark:text-zinc-400">Rating</span>
                                <span class="font-semibold text-zinc-900 dark:text-white">{{ $cafe->rating }}/5</span>
                            </div>
                        @endif
                        @if($cafe->average_price)
                            <div class="flex justify-between">
                                <span class="text-zinc-600 dark:text-zinc-400">Harga Rata-rata</span>
                                <span class="font-semibold text-zinc-900 dark:text-white">Rp {{ number_format($cafe->average_price, 0) }}</span>
                            </div>
                        @endif
                        @if($cafe->operating_hours)
                            <div class="flex justify-between">
                                <span class="text-zinc-600 dark:text-zinc-400">Jam Operasional</span>
                                <span class="font-semibold text-zinc-900 dark:text-white">{{ $cafe->operating_hours }}</span>
                            </div>
                        @endif
                        @if($cafe->latitude && $cafe->longitude)
                            <div class="flex justify-between">
                                <span class="text-zinc-600 dark:text-zinc-400">Koordinat</span>
                                <span class="font-semibold text-zinc-900 dark:text-white text-sm">{{ $cafe->latitude }}, {{ $cafe->longitude }}</span>
                            </div>
                        @endif
                    </div>
                </div>

                <!-- Google Maps -->
                @if($cafe->google_maps_url)
                    <div class="bg-white dark:bg-zinc-800 rounded-lg p-6 border border-zinc-200 dark:border-zinc-700">
                        <h2 class="text-xl font-semibold mb-4 text-zinc-900 dark:text-white">Lokasi</h2>
                        <a href="{{ $cafe->google_maps_url }}" target="_blank" class="block w-full text-center px-4 py-3 bg-orange-600 text-white rounded-lg hover:bg-orange-700">
                            Lihat di Google Maps
                        </a>
                    </div>
                @endif

                <!-- Contact -->
                @if($cafe->contact)
                    <div class="bg-white dark:bg-zinc-800 rounded-lg p-6 border border-zinc-200 dark:border-zinc-700">
                        <h2 class="text-xl font-semibold mb-4 text-zinc-900 dark:text-white">Kontak</h2>
                        <p class="text-zinc-600 dark:text-zinc-400">{{ $cafe->contact }}</p>
                    </div>
                @endif

                <!-- Instagram -->
                @if($cafe->instagram)
                    <div class="bg-white dark:bg-zinc-800 rounded-lg p-6 border border-zinc-200 dark:border-zinc-700">
                        <h2 class="text-xl font-semibold mb-4 text-zinc-900 dark:text-white">Instagram</h2>
                        <a href="{{ $cafe->instagram }}" target="_blank" class="block w-full text-center px-4 py-3 bg-pink-600 text-white rounded-lg hover:bg-pink-700">
                            Kunjungi Instagram
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
