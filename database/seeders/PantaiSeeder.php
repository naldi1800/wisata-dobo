<?php

namespace Database\Seeders;

use App\Models\Beach;
use Illuminate\Database\Seeder;

class PantaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // A1: Pantai Papaliseran
        Beach::create([
            'name' => 'Pantai Papaliseran',
            'slug' => 'pantai-papaliseran',
            'address' => 'Desa Papaliseran, Kecamatan Pulau-Pulau Aru, Kabupaten Kepulauan Aru, Maluku',
            'latitude' => -6.103,
            'longitude' => 134.487,
            'description' => 'Pantai Papaliseran merupakan salah satu pantai alami di Kabupaten Kepulauan Aru dengan hamparan pasir putih, air laut yang jernih, serta suasana yang masih asri. Pantai ini cocok untuk bersantai, menikmati pemandangan matahari terbit maupun terbenam, serta aktivitas fotografi alam.',
            'operating_hours' => '24 Jam',
            'ticket_price' => 10000.00,
            'ticket_price_min' => 25000.00,
            'ticket_price_max' => null,
            'facilities' => ['Area parkir sederhana', 'tempat duduk sederhana', 'area bermain pantai'],
            'featured_image' => null,
            'video' => null,
            'google_maps_url' => 'https://maps.app.goo.gl/SccrwEzRnJktRkCV9',
            'contact' => 'Pemerintah Desa Papaliseran',
            'rating' => 4.50,
            // SAW Criteria
            'cleanliness' => 5,
            'facility_score' => 5,
            'accessibility' => 5,
            'beauty' => 5,
            'is_active' => true,
        ]);

        // A2: Pantai Pasir Karuni (Note: CSV shows "Pantai Pasir Kurnia")
        Beach::create([
            'name' => 'Pantai Pasir Karuni',
            'slug' => 'pantai-pasir-karuni',
            'address' => 'Desa Pasir Kurnia, Kecamatan Pulau-Pulau Aru, Kabupaten Kepulauan Aru, Maluku',
            'latitude' => -6.087,
            'longitude' => 134.521,
            'description' => 'Pantai Pasir Kurnia memiliki garis pantai berpasir putih dengan ombak yang relatif tenang dan panorama laut yang indah. Pantai ini menjadi salah satu destinasi wisata lokal yang cocok untuk rekreasi keluarga, berenang, dan menikmati keindahan alam pesisir Kepulauan Aru.',
            'operating_hours' => '24 Jam',
            'ticket_price' => 20000.00,
            'ticket_price_min' => 20000.00,
            'ticket_price_max' => null,
            'facilities' => ['Area parkir', 'gazebo sederhana', 'tempat sampah', 'area swafoto'],
            'featured_image' => null,
            'video' => null,
            'google_maps_url' => 'https://maps.app.goo.gl/pFXq7K8NHpBdViyE6',
            'contact' => 'Pemerintah Desa Pasir Kurnia',
            'rating' => 4.40,
            // SAW Criteria
            'cleanliness' => 5,
            'facility_score' => 5,
            'accessibility' => 5,
            'beauty' => 5,
            'is_active' => true,
        ]);

        // A3: Pantai Durjela
        Beach::create([
            'name' => 'Pantai Durjela',
            'slug' => 'pantai-durjela',
            'address' => 'Kabupaten Kepulauan Aru',
            'latitude' => null,
            'longitude' => null,
            'description' => 'Pantai Durjela adalah destinasi wisata yang terkenal dengan keindahan alamnya di Kepulauan Aru.',
            'operating_hours' => null,
            'ticket_price' => 10000.00,
            'ticket_price_min' => 10000.00,
            'ticket_price_max' => 10000.00,
            'facilities' => null,
            'featured_image' => null,
            'video' => null,
            'google_maps_url' => null,
            'contact' => null,
            'rating' => 4.00,
            // SAW Criteria
            'cleanliness' => 4,
            'facility_score' => 3,
            'accessibility' => 2,
            'beauty' => 5,
            'is_active' => true,
        ]);

        // A4: Pantai Batu Kora
        Beach::create([
            'name' => 'Pantai Batu Kora',
            'slug' => 'pantai-batu-kora',
            'address' => 'Kabupaten Kepulauan Aru',
            'latitude' => null,
            'longitude' => null,
            'description' => 'Pantai Batu Kora menawarkan pemandangan batu-batu karang yang indah di sepanjang garis pantai.',
            'operating_hours' => null,
            'ticket_price' => 15000.00,
            'ticket_price_min' => 15000.00,
            'ticket_price_max' => 15000.00,
            'facilities' => null,
            'featured_image' => null,
            'video' => null,
            'google_maps_url' => null,
            'contact' => null,
            'rating' => 4.00,
            // SAW Criteria
            'cleanliness' => 4,
            'facility_score' => 4,
            'accessibility' => 4,
            'beauty' => 5,
            'is_active' => true,
        ]);
    }
}
