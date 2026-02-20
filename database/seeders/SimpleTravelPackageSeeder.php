<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SimpleTravelPackageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Delete existing data safely
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('travel_packages')->delete();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        
        $packages = [
            [
                'id' => 1,
                'package_name' => 'Penjemputan Hotel Lombok',
                'image_1' => 'empty-image.png',
                'image_2' => 'empty-image.png', 
                'image_3' => 'empty-image.png',
                'duration' => '1 Hari',
                'tour_type' => 'Business Trip Tour',
                'price_start_from' => 150000,
                'overview' => 'Nikmati kemudahan layanan penjemputan dari hotel Anda menuju berbagai destinasi wisata di Lombok.',
                'included_things' => 'Driver berpengalaman, Kendaraan ber-AC, Bahan bakar',
                'Excludes_things' => 'Tiket masuk wisata, Makan, Belanja pribadi',
                'tour_plane_description' => 'Penjemputan di hotel -> Perjalanan ke destinasi -> Drop off sesuai permintaan',
                'per_adult_fee' => 150000,
                'per_child_fee' => 100000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 2,
                'package_name' => 'Transfer Bandara Lombok',
                'image_1' => 'empty-image.png',
                'image_2' => 'empty-image.png',
                'image_3' => 'empty-image.png', 
                'duration' => '1 Hari',
                'tour_type' => 'Business Trip Tour',
                'price_start_from' => 200000,
                'overview' => 'Layanan transfer yang nyaman dan aman dari/ke Bandara Internasional Lombok.',
                'included_things' => 'Driver profesional, Kendaraan ber-AC, Bahan bakar',
                'Excludes_things' => 'Tip driver, Belanja pribadi',
                'tour_plane_description' => 'Penjemputan di bandara -> Perjalanan langsung -> Drop off di hotel',
                'per_adult_fee' => 200000,
                'per_child_fee' => 150000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 3,
                'package_name' => 'Tour Pulau Komodo',
                'image_1' => 'empty-image.png',
                'image_2' => 'empty-image.png',
                'image_3' => 'empty-image.png',
                'duration' => '3 Hari 2 Malam',
                'tour_type' => 'Adventure Tour',
                'price_start_from' => 2500000,
                'overview' => 'Jelajahi keajaiban Taman Nasional Komodo dan bertemu langsung dengan komodo dragon.',
                'included_things' => 'Kapal wisata, Guide lokal, Snorkeling equipment, Makan 3x sehari',
                'Excludes_things' => 'Tiket pesawat, Asuransi perjalanan, Belanja pribadi',
                'tour_plane_description' => 'Hari 1: Labuan Bajo - Pulau Rinca | Hari 2: Pulau Komodo - Manta Point | Hari 3: Pulau Padar',
                'per_adult_fee' => 2500000,
                'per_child_fee' => 2000000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 4,
                'package_name' => 'Air Terjun Senaru Lombok',
                'image_1' => 'empty-image.png',
                'image_2' => 'empty-image.png',
                'image_3' => 'empty-image.png',
                'duration' => '2 Hari 1 Malam',
                'tour_type' => 'Adventure Tour',
                'price_start_from' => 750000,
                'overview' => 'Nikmati keindahan Air Terjun Senaru yang spektakuler dengan trekking yang menantang.',
                'included_things' => 'Transport, Guide trekking, Makan 3x, Homestay, Tiket masuk',
                'Excludes_things' => 'Asuransi perjalanan, Belanja pribadi, Tip guide',
                'tour_plane_description' => 'Hari 1: Mataram - Senaru - Trekking Air Terjun | Hari 2: Eksplorasi sekitar',
                'per_adult_fee' => 750000,
                'per_child_fee' => 600000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 5,
                'package_name' => 'Pantai Pink Lombok',
                'image_1' => 'empty-image.png',
                'image_2' => 'empty-image.png',
                'image_3' => 'empty-image.png',
                'duration' => '1 Hari',
                'tour_type' => 'Beach Holiday Tour',
                'price_start_from' => 450000,
                'overview' => 'Jelajahi keunikan Pantai Pink dengan pasir berwarna merah muda yang langka.',
                'included_things' => 'Transport, Guide, Makan siang, Snorkeling equipment, Tiket masuk',
                'Excludes_things' => 'Asuransi perjalanan, Belanja pribadi, Tip guide',
                'tour_plane_description' => 'Mataram - Pantai Pink - Snorkeling - Makan siang - Kembali ke Mataram',
                'per_adult_fee' => 450000,
                'per_child_fee' => 350000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 6,
                'package_name' => 'Gili Trawangan Paradise',
                'image_1' => 'kurakura.jpg',
                'image_2' => 'underwater-sculpture.jpg',
                'image_3' => 'gilitrawangansunset.jpg',
                'duration' => '2 Hari 1 Malam',
                'tour_type' => 'Beach Holiday Tour',
                'price_start_from' => 850000,
                'overview' => 'Rasakan pengalaman tak terlupakan di Gili Trawangan dengan pantai berpasir putih dan snorkeling dengan penyu.',
                'included_things' => 'Fast boat, Homestay, Snorkeling equipment, Sepeda, Makan 3x, Guide lokal',
                'Excludes_things' => 'Asuransi perjalanan, Belanja pribadi, Tip guide',
                'tour_plane_description' => 'Hari 1: Bangsal - Gili Trawangan - Snorkeling | Hari 2: Island hopping - Kembali ke Bangsal',
                'per_adult_fee' => 850000,
                'per_child_fee' => 650000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 7,
                'package_name' => 'Pantai Selong Belanak',
                'image_1' => 'empty-image.png',
                'image_2' => 'empty-image.png',
                'image_3' => 'empty-image.png',
                'duration' => '1 Hari',
                'tour_type' => 'Beach Holiday Tour',
                'price_start_from' => 400000,
                'overview' => 'Nikmati keindahan Pantai Selong Belanak dengan pasir putih yang lembut.',
                'included_things' => 'Transport, Guide, Makan siang, Surfboard (optional), Air mineral',
                'Excludes_things' => 'Asuransi perjalanan, Belanja pribadi, Pelajaran surfing',
                'tour_plane_description' => 'Mataram - Pantai Selong Belanak - Surfing/Swimming - Makan siang',
                'per_adult_fee' => 400000,
                'per_child_fee' => 300000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 8,
                'package_name' => 'Moyo Island Sumbawa 3D2N',
                'image_1' => 'empty-image.png',
                'image_2' => 'empty-image.png',
                'image_3' => 'empty-image.png',
                'duration' => '3 Hari 2 Malam',
                'tour_type' => 'Adventure Tour',
                'price_start_from' => 1800000,
                'overview' => 'Petualangan eksotis ke Pulau Moyo Sumbawa dengan air terjun yang menakjubkan.',
                'included_things' => 'Kapal, Homestay, Makan 3x sehari, Guide, Snorkeling equipment',
                'Excludes_things' => 'Transport ke Sumbawa, Asuransi perjalanan, Belanja pribadi',
                'tour_plane_description' => 'Hari 1: Sumbawa - Pulau Moyo | Hari 2: Snorkeling - Eksplorasi | Hari 3: Kembali',
                'per_adult_fee' => 1800000,
                'per_child_fee' => 1400000,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ];

        foreach ($packages as $package) {
            DB::table('travel_packages')->insert($package);
        }
        
        echo "Travel packages seeded successfully!\n";
    }
}