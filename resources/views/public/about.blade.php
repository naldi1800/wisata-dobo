@extends('layouts.public')

@section('title', 'Tentang - Smart Tourism')

@section('content')
<div class="min-h-screen">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <h1 class="text-3xl font-bold text-zinc-900 dark:text-white mb-8">Tentang Sistem</h1>

        <div class="space-y-8">
            <!-- About Section -->
            <div class="bg-white dark:bg-zinc-800 rounded-lg p-8 border border-zinc-200 dark:border-zinc-700">
                <h2 class="text-2xl font-semibold mb-4 text-zinc-900 dark:text-white">Sistem Informasi Smart Tourism</h2>
                <p class="text-zinc-600 dark:text-zinc-400 mb-4">
                    Sistem Informasi Smart Tourism Kabupaten Kepulauan Aru adalah platform digital yang menyediakan informasi wisata pantai, hotel, dan cafe di Kabupaten Kepulauan Aru. Sistem ini menggunakan metode Simple Additive Weighting (SAW) untuk memberikan rekomendasi destinasi wisata terbaik berdasarkan berbagai kriteria penilaian.
                </p>
                <p class="text-zinc-600 dark:text-zinc-400">
                    Dengan sistem ini, wisatawan dapat dengan mudah menemukan informasi lengkap tentang destinasi wisata, akomodasi hotel, dan tempat kuliner cafe yang tersedia di Kabupaten Kepulauan Aru, serta mendapatkan rekomendasi yang objektif berdasarkan penilaian kualitas.
                </p>
            </div>

            <!-- Features Section -->
            <div class="bg-white dark:bg-zinc-800 rounded-lg p-8 border border-zinc-200 dark:border-zinc-700">
                <h2 class="text-2xl font-semibold mb-4 text-zinc-900 dark:text-white">Fitur Utama</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <h3 class="text-lg font-semibold mb-2 text-zinc-900 dark:text-white">Informasi Destinasi</h3>
                        <p class="text-zinc-600 dark:text-zinc-400">Informasi lengkap tentang pantai wisata di Kabupaten Kepulauan Aru termasuk fasilitas, harga tiket, dan lokasi.</p>
                    </div>
                    <div>
                        <h3 class="text-lg font-semibold mb-2 text-zinc-900 dark:text-white">Rekomendasi SAW</h3>
                        <p class="text-zinc-600 dark:text-zinc-400">Sistem rekomendasi berbasis metode Simple Additive Weighting untuk membantu wisatawan memilih destinasi terbaik.</p>
                    </div>
                    <div>
                        <h3 class="text-lg font-semibold mb-2 text-zinc-900 dark:text-white">Informasi Hotel</h3>
                        <p class="text-zinc-600 dark:text-zinc-400">Daftar hotel dengan informasi lengkap tentang fasilitas, harga, dan ketersediaan kamar.</p>
                    </div>
                    <div>
                        <h3 class="text-lg font-semibold mb-2 text-zinc-900 dark:text-white">Informasi Cafe</h3>
                        <p class="text-zinc-600 dark:text-zinc-400">Informasi cafe dan tempat kuliner dengan menu andalan, jam operasional, dan fasilitas.</p>
                    </div>
                </div>
            </div>

            <!-- SAW Method Section -->
            <div class="bg-blue-50 dark:bg-blue-900/20 rounded-lg p-8 border border-blue-200 dark:border-blue-800">
                <h2 class="text-2xl font-semibold mb-4 text-zinc-900 dark:text-white">Metode Simple Additive Weighting (SAW)</h2>
                <p class="text-zinc-600 dark:text-zinc-400 mb-4">
                    Simple Additive Weighting (SAW) adalah metode pengambilan keputusan multi-kriteria yang digunakan untuk menentukan rekomendasi destinasi wisata. Metode ini mengevaluasi alternatif berdasarkan beberapa kriteria dengan bobot yang telah ditentukan.
                </p>
                <div class="mt-4">
                    <h3 class="text-lg font-semibold mb-2 text-zinc-900 dark:text-white">Kriteria Penilaian</h3>
                    <ul class="list-disc list-inside text-zinc-600 dark:text-zinc-400 space-y-1">
                        <li>C1: Kebersihan (Bobot 25%)</li>
                        <li>C2: Fasilitas (Bobot 20%)</li>
                        <li>C3: Aksesibilitas (Bobot 20%)</li>
                        <li>C4: Keindahan (Bobot 25%)</li>
                        <li>C5: Biaya (Bobot 10%)</li>
                    </ul>
                </div>
            </div>

            <!-- Contact Section -->
            <div class="bg-white dark:bg-zinc-800 rounded-lg p-8 border border-zinc-200 dark:border-zinc-700">
                <h2 class="text-2xl font-semibold mb-4 text-zinc-900 dark:text-white">Kontak</h2>
                <p class="text-zinc-600 dark:text-zinc-400">
                    Untuk informasi lebih lanjut atau pertanyaan seputar sistem, silakan hubungi administrator sistem.
                </p>
            </div>
        </div>
    </div>
</div>
@endsection
