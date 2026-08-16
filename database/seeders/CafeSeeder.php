<?php

namespace Database\Seeders;

use App\Models\Cafe;
use Illuminate\Database\Seeder;

class CafeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Cafe 1: Cafe Gospel
        Cafe::create([
            'name' => 'Cafe Gospel',
            'slug' => 'cafe-gospel',
            'address' => 'Jl. Pattimura, Dobo, Kecamatan Pulau-Pulau Aru, Kabupaten Kepulauan Aru, Maluku',
            'latitude' => -5.7742,
            'longitude' => 134.2135,
            'description' => 'Cafe yang menjadi salah satu tempat berkumpul masyarakat dan wisatawan di Kota Dobo. Menyediakan berbagai pilihan makanan ringan, minuman, serta suasana yang nyaman untuk bersantai maupun bekerja.',
            'operating_hours' => '09.00 - 22.00 WIT',
            'average_price' => 35000.00,
            'signature_menu' => 'Kopi Susu Gospel, Nasi Goreng Seafood, Es Kopi Aren',
            'facilities' => ['Wi-Fi', 'Toilet', 'Area Indoor & Outdoor', 'Stop Kontak', 'Musholla'],
            'has_wifi' => true,
            'has_parking' => true,
            'featured_image' => null,
            'google_maps_url' => 'https://maps.app.goo.gl/3q8BzJq9LypRiN6D9',
            'contact' => null,
            'instagram' => null,
            'rating' => 4.50,
            'is_active' => true,
        ]);

        // Cafe 2: Cafe tanpa nama di CSV (alamat: Jl. Yos Sudarso)
        Cafe::create([
            'name' => 'Cafe Yos Sudarso',
            'slug' => 'cafe-yos-sudarso',
            'address' => 'Jl. Yos Sudarso, Dobo, Kecamatan Pulau-Pulau Aru, Kabupaten Kepulauan Aru, Maluku',
            'latitude' => -5.7756,
            'longitude' => 134.2148,
            'description' => 'Cafe yang menawarkan suasana santai dengan pilihan menu makanan dan minuman khas lokal maupun modern. Cocok sebagai tempat bersantai bersama keluarga maupun teman setelah berwisata.',
            'operating_hours' => '10.00 - 23.00 WIT',
            'average_price' => 40000.00,
            'signature_menu' => 'Ikan Bakar, Mie Goreng Seafood, Cappuccino, Jus Buah Segar',
            'facilities' => ['Wi-Fi', 'Toilet', 'Area Outdoor', 'Live Music (akhir pekan)', 'Stop Kontak'],
            'has_wifi' => true,
            'has_parking' => true,
            'featured_image' => null,
            'google_maps_url' => 'https://maps.app.goo.gl/nQUPCWTvF5YnsGH49',
            'contact' => null,
            'instagram' => null,
            'rating' => 4.40,
            'is_active' => true,
        ]);
    }
}
