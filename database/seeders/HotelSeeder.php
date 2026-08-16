<?php

namespace Database\Seeders;

use App\Models\Hotel;
use Illuminate\Database\Seeder;

class HotelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Hotel 1: Hotel Apex Dobo
        Hotel::create([
            'name' => 'Hotel Apex Dobo',
            'slug' => 'hotel-apex-dobo',
            'address' => 'Jl. Ali Moertopo, Dobo, Kecamatan Pulau-Pulau Aru, Kabupaten Kepulauan Aru, Maluku',
            'latitude' => -5.7735,
            'longitude' => 134.2128,
            'description' => 'Hotel yang berada di pusat Kota Dobo dengan akses mudah menuju pelabuhan, pusat perbelanjaan, dan perkantoran. Cocok untuk wisatawan maupun perjalanan bisnis.',
            'hotel_class' => 'Melati / Hotel Lokal',
            'check_in_time' => '14.00 WIT',
            'check_out_time' => '12.00 WIT',
            'price_start' => null,
            'room_count' => 25,
            'facilities' => ['Wi-Fi', 'AC', 'TV', 'Restoran', 'Room Service', 'Laundry', 'Air Panas'],
            'has_parking' => true,
            'has_pool' => true,
            'featured_image' => null,
            'video' => null,
            'google_maps_url' => 'https://maps.app.goo.gl/oJGJcaLkRgiUchbf9',
            'contact' => null,
            'website' => null,
            'rating' => 9.40,
            'is_active' => true,
        ]);

        // Hotel 2: Hotel Eora Dobo
        Hotel::create([
            'name' => 'Hotel Eora Dobo',
            'slug' => 'hotel-eora-dobo',
            'address' => 'Jl. Pattimura, Dobo, Kecamatan Pulau-Pulau Aru, Kabupaten Kepulauan Aru, Maluku',
            'latitude' => 5.7751,
            'longitude' => 134.2145,
            'description' => 'Hotel yang menyediakan akomodasi bagi wisatawan dan pelaku perjalanan dinas dengan lokasi strategis di Kota Dobo serta akses mudah ke berbagai fasilitas umum.',
            'hotel_class' => 'Melati / Hotel Lokal',
            'check_in_time' => '14.00 WIT',
            'check_out_time' => '12.00 WIT',
            'price_start' => 400000.00,
            'room_count' => 30,
            'facilities' => ['Wi-Fi', 'AC', 'TV', 'Restoran', 'Ruang Pertemuan', 'Laundry', 'Air Panas'],
            'has_parking' => true,
            'has_pool' => false,
            'featured_image' => null,
            'video' => null,
            'google_maps_url' => 'https://maps.app.goo.gl/xavvgZoYBXRucEhD8',
            'contact' => null,
            'website' => null,
            'rating' => 8.90,
            'is_active' => true,
        ]);
    }
}
