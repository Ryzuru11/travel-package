<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\travelPackage;

class TravelPackageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $packages = [
            [
                'package_name' => 'Penjemputan Hotel Lombok',
                'image_1' => 'penjemputan_hotel.JPG',
                'image_2' => 'empty-image.png', 
                'image_3' => 'empty-image.png',
                'duration' => '1 Hari',
                'tour_type' => 'Business Trip Tour',
                'service_type' => 'hotel_pickup',
                'destination_details' => 'Semua area hotel di Lombok - Destinasi wisata',
                'price_start_from' => 150000,
                'overview' => 'Nikmati kemudahan layanan penjemputan dari hotel Anda menuju berbagai destinasi wisata di Lombok. Driver berpengalaman dan kendaraan yang nyaman.',
                'included_things' => 'Driver berpengalaman, Kendaraan ber-AC, Bahan bakar, Asuransi perjalanan',
                'Excludes_things' => 'Tiket masuk wisata, Makan, Belanja pribadi',
                'tour_plane_description' => 'Penjemputan di hotel -> Perjalanan ke destinasi -> Drop off sesuai permintaan',
                'per_adult_fee' => 150000,
                'per_child_fee' => 100000,
            ],
            [
                'package_name' => 'Transfer Bandara Lombok',
                'image_1' => 'empty-image.png',
                'image_2' => 'empty-image.png',
                'image_3' => 'empty-image.png', 
                'duration' => '1 Hari',
                'tour_type' => 'Business Trip Tour',
                'service_type' => 'airport_transfer',
                'destination_details' => 'Bandara Lombok - Hotel/Destinasi, Vice versa',
                'price_start_from' => 200000,
                'overview' => 'Layanan transfer yang nyaman dan aman dari/ke Bandara Internasional Lombok. Tersedia 24 jam dengan driver profesional.',
                'included_things' => 'Driver profesional, Kendaraan ber-AC, Bahan bakar, Meet & greet service',
                'Excludes_things' => 'Tip driver, Belanja pribadi',
                'tour_plane_description' => 'Penjemputan di bandara -> Perjalanan langsung -> Drop off di hotel/destinasi',
                'per_adult_fee' => 200000,
                'per_child_fee' => 150000,
            ],
            [
                'package_name' => 'Tour Pulau Komodo 3D2N',
                'image_1' => 'empty-image.png',
                'image_2' => 'empty-image.png',
                'image_3' => 'empty-image.png',
                'duration' => '3 Hari 2 Malam',
                'tour_type' => 'Adventure Tour',
                'service_type' => 'komodo_tour',
                'destination_details' => 'Pulau Komodo, Pulau Rinca, Pink Beach, Padar Island',
                'price_start_from' => 2500000,
                'overview' => 'Jelajahi keajaiban Taman Nasional Komodo dan bertemu langsung dengan komodo dragon di habitat aslinya. Termasuk snorkeling di Pink Beach dan Manta Point.',
                'included_things' => 'Kapal wisata, Guide lokal, Snorkeling equipment, Makan 3x sehari, Akomodasi kapal, Tiket masuk taman nasional',
                'Excludes_things' => 'Tiket pesawat, Asuransi perjalanan, Belanja pribadi, Tip guide',
                'tour_plane_description' => 'Hari 1: Labuan Bajo - Pulau Rinca - Pink Beach | Hari 2: Pulau Komodo - Manta Point - Taka Makassar | Hari 3: Pulau Padar - Kembali ke Labuan Bajo',
                'per_adult_fee' => 2500000,
                'per_child_fee' => 2000000,
            ],
            [
                'package_name' => 'Air Terjun Senaru Lombok',
                'image_1' => 'Air-Terjun-Senaru1.JPG',
                'image_2' => 'empty-image.png',
                'image_3' => 'empty-image.png',
                'duration' => '2 Hari 1 Malam',
                'tour_type' => 'Adventure Tour',
                'service_type' => 'lombok_destination',
                'destination_details' => 'Taman Nasional Gunung Rinjani, Air Terjun Sendang Gile, Desa Senaru',
                'price_start_from' => 750000,
                'overview' => 'Nikmati keindahan Air Terjun Senaru yang spektakuler dengan trekking yang menantang. Rasakan kesegaran air terjun setinggi 600 meter.',
                'included_things' => 'Transport, Guide trekking, Makan 3x, Homestay, Tiket masuk, Peralatan trekking',
                'Excludes_things' => 'Asuransi perjalanan, Belanja pribadi, Tip guide, Keperluan pribadi',
                'tour_plane_description' => 'Hari 1: Mataram - Senaru - Trekking Air Terjun - Homestay | Hari 2: Eksplorasi sekitar - Kembali ke Mataram',
                'per_adult_fee' => 750000,
                'per_child_fee' => 600000,
            ],
            [
                'package_name' => 'Pantai Pink Lombok',
                'image_1' => 'pantai-pink-lombok1.JPG',
                'image_2' => 'empty-image.png',
                'image_3' => 'empty-image.png',
                'duration' => '1 Hari',
                'tour_type' => 'Beach Holiday Tour',
                'service_type' => 'lombok_destination',
                'destination_details' => 'Pantai Pink, Snorkeling spots, Pemandangan alam',
                'price_start_from' => 450000,
                'overview' => 'Jelajahi keunikan Pantai Pink dengan pasir berwarna merah muda yang langka. Nikmati snorkeling dan pemandangan bawah laut yang indah.',
                'included_things' => 'Transport, Guide, Makan siang, Snorkeling equipment, Tiket masuk, Air mineral',
                'Excludes_things' => 'Asuransi perjalanan, Belanja pribadi, Tip guide, Keperluan pribadi',
                'tour_plane_description' => 'Mataram - Pantai Pink - Snorkeling - Makan siang - Kembali ke Mataram',
                'per_adult_fee' => 450000,
                'per_child_fee' => 350000,
            ],
            [
                'package_name' => 'Gili Trawangan',
                'image_1' => 'empty-image.png',
                'image_2' => 'empty-image.png',
                'image_3' => 'empty-image.png',
                'duration' => '2 Hari 1 Malam',
                'tour_type' => 'Beach Holiday Tour',
                'service_type' => 'lombok_destination',
                'destination_details' => 'Gili Trawangan, Gili Meno, Gili Air, Snorkeling spots',
                'price_start_from' => 850000,
                'overview' => 'Rasakan pengalaman tak terlupakan di Gili Trawangan dengan pantai berpasir putih, snorkeling dengan penyu, dan suasana pulau yang eksotis.',
                'included_things' => 'Fast boat, Homestay, Snorkeling equipment, Sepeda, Makan 3x, Guide lokal',
                'Excludes_things' => 'Asuransi perjalanan, Belanja pribadi, Tip guide, Aktivitas berbayar lainnya',
                'tour_plane_description' => 'Hari 1: Bangsal - Gili Trawangan - Snorkeling - Sunset Point | Hari 2: Island hopping - Kembali ke Bangsal',
                'per_adult_fee' => 850000,
                'per_child_fee' => 650000,
            ],
            [
                'package_name' => 'Pantai Selong Belanak',
                'image_1' => 'empty-image.png',
                'image_2' => 'empty-image.png',
                'image_3' => 'empty-image.png',
                'duration' => '1 Hari',
                'tour_type' => 'Beach Holiday Tour',
                'service_type' => 'lombok_destination',
                'destination_details' => 'Pantai Selong Belanak, Surfing spots, Pemandangan pantai',
                'price_start_from' => 400000,
                'overview' => 'Nikmati keindahan Pantai Selong Belanak dengan pasir putih yang lembut dan ombak yang cocok untuk belajar surfing.',
                'included_things' => 'Transport, Guide, Makan siang, Surfboard (optional), Air mineral',
                'Excludes_things' => 'Asuransi perjalanan, Belanja pribadi, Tip guide, Pelajaran surfing',
                'tour_plane_description' => 'Mataram - Pantai Selong Belanak - Surfing/Swimming - Makan siang - Kembali ke Mataram',
                'per_adult_fee' => 400000,
                'per_child_fee' => 300000,
            ],
            [
                'package_name' => 'Moyo Island Sumbawa 3D2N',
                'image_1' => 'empty-image.png',
                'image_2' => 'empty-image.png',
                'image_3' => 'empty-image.png',
                'duration' => '3 Hari 2 Malam',
                'tour_type' => 'Adventure Tour',
                'service_type' => 'sumbawa_destination',
                'destination_details' => 'Moyo Island, Air Terjun Mata Jitu, Pantai Lakey, Desa Tradisional',
                'price_start_from' => 1800000,
                'overview' => 'Petualangan eksotis ke Pulau Moyo Sumbawa dengan air terjun yang menakjubkan, snorkeling, dan pengalaman alam yang tak terlupakan.',
                'included_things' => 'Kapal, Homestay, Makan 3x sehari, Guide, Snorkeling equipment, Tiket masuk',
                'Excludes_things' => 'Transport ke Sumbawa, Asuransi perjalanan, Belanja pribadi, Tip guide',
                'tour_plane_description' => 'Hari 1: Sumbawa - Pulau Moyo - Air Terjun | Hari 2: Snorkeling - Eksplorasi pulau | Hari 3: Kembali ke Sumbawa',
                'per_adult_fee' => 1800000,
                'per_child_fee' => 1400000,
            ]
        ];

        foreach ($packages as $package) {
            travelPackage::create($package);
        }
    }
}