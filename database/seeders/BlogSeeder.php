<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Blog;
use Carbon\Carbon;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $blogs = [
            [
                'title' => 'Panduan Lengkap Wisata Pulau Komodo: Bertemu Naga Purba',
                'image' => 'pulau-komodo.jpg',
                'discription' => '<h2>Panduan Lengkap Wisata Pulau Komodo</h2>
                <p>Pulau Komodo adalah salah satu destinasi wisata paling menakjubkan di Indonesia. Terletak di Nusa Tenggara Timur, pulau ini merupakan rumah bagi komodo dragon, reptil terbesar di dunia yang hanya bisa ditemukan di Indonesia.</p>
                
                <h3>Mengapa Harus Berkunjung ke Pulau Komodo?</h3>
                <ul>
                    <li><strong>Komodo Dragon:</strong> Saksikan langsung reptil purba yang telah hidup selama jutaan tahun</li>
                    <li><strong>Pantai Pink:</strong> Nikmati keindahan pantai dengan pasir berwarna merah muda yang langka</li>
                    <li><strong>Snorkeling & Diving:</strong> Jelajahi kehidupan bawah laut yang spektakuler</li>
                    <li><strong>Trekking:</strong> Hiking dengan pemandangan savana yang menakjubkan</li>
                </ul>
                
                <h3>Paket Tour Komodo dari Ryzuru Tour Travel</h3>
                <p>Ryzuru Tour Travel menawarkan paket wisata Komodo 3D2N yang mencakup:</p>
                <ul>
                    <li>Transportasi kapal dari Labuan Bajo</li>
                    <li>Guide berpengalaman dan berlisensi</li>
                    <li>Snorkeling equipment</li>
                    <li>Makan 3x sehari</li>
                    <li>Akomodasi di kapal atau homestay</li>
                </ul>
                
                <h3>Tips Berkunjung ke Pulau Komodo</h3>
                <p><strong>Waktu Terbaik:</strong> April - Desember (musim kering)<br>
                <strong>Yang Harus Dibawa:</strong> Sunscreen, topi, sepatu trekking, kamera underwater<br>
                <strong>Keamanan:</strong> Selalu ikuti instruksi guide dan jangan mendekati komodo tanpa pengawasan</p>
                
                <p>Hubungi Ryzuru Tour Travel sekarang untuk merasakan petualangan tak terlupakan di Pulau Komodo!</p>',
                'created_at' => Carbon::now()->subDays(10),
                'updated_at' => Carbon::now()->subDays(10),
            ],
            [
                'title' => '5 Pantai Terbaik di Lombok yang Wajib Dikunjungi',
                'image' => '5-pantai-terbaik-di-lombok.jpg',
                'discription' => '<h2>5 Pantai Terbaik di Lombok yang Wajib Dikunjungi</h2>
                <p>Lombok, pulau yang dijuluki "Pulau Seribu Masjid" ini menyimpan keindahan pantai-pantai eksotis yang tidak kalah menawan dengan Bali. Berikut adalah 5 pantai terbaik di Lombok yang wajib masuk dalam itinerary perjalanan Anda.</p>
                
                <h3>1. Pantai Kuta Lombok</h3>
                <p>Berbeda dengan Kuta Bali, Pantai Kuta Lombok menawarkan suasana yang lebih tenang dan alami. Pantai ini terkenal dengan pasir putihnya yang halus dan ombak yang cocok untuk berselancar.</p>
                
                <h3>2. Gili Trawangan</h3>
                <p>Pulau kecil yang terkenal dengan kehidupan malam dan aktivitas snorkeling yang menakjubkan. Gili Trawangan adalah surga bagi para backpacker dan pecinta diving.</p>
                
                <h3>3. Pantai Pink (Tangsi)</h3>
                <p>Salah satu dari tujuh pantai pink di dunia! Warna pink pada pasirnya berasal dari serpihan karang merah yang bercampur dengan pasir putih.</p>
                
                <h3>4. Pantai Senggigi</h3>
                <p>Pantai yang paling terkenal di Lombok dengan fasilitas lengkap. Cocok untuk menikmati sunset yang spektakuler.</p>
                
                <h3>5. Pantai Mawun</h3>
                <p>Pantai tersembunyi dengan bentuk teluk yang sempurna, dikelilingi bukit-bukit hijau. Airnya jernih dan tenang, cocok untuk berenang.</p>
                
                <h3>Paket Tour Pantai Lombok</h3>
                <p>Ryzuru Tour Travel menawarkan paket island hopping untuk mengunjungi pantai-pantai terbaik di Lombok. Termasuk transportasi, guide, dan peralatan snorkeling.</p>
                
                <p>Jangan lewatkan kesempatan untuk menjelajahi keindahan pantai-pantai Lombok bersama Ryzuru Tour Travel!</p>',
                'created_at' => Carbon::now()->subDays(8),
                'updated_at' => Carbon::now()->subDays(8),
            ],
            [
                'title' => 'Air Terjun Senaru: Permata Tersembunyi di Kaki Gunung Rinjani',
                'image' => 'air-terjun-senaru.jpeg',
                'discription' => '<h2>Air Terjun Senaru: Permata Tersembunyi di Kaki Gunung Rinjani</h2>
                <p>Air Terjun Senaru adalah salah satu air terjun terindah di Lombok yang terletak di kaki Gunung Rinjani. Dengan ketinggian sekitar 600 meter, air terjun ini menawarkan pemandangan yang spektakuler dan udara yang sejuk.</p>
                
                <h3>Keindahan Air Terjun Senaru</h3>
                <p>Air Terjun Senaru terdiri dari dua tingkat:</p>
                <ul>
                    <li><strong>Tingkat Pertama:</strong> Mudah diakses dengan trekking ringan sekitar 20 menit</li>
                    <li><strong>Tingkat Kedua:</strong> Memerlukan trekking lebih menantang sekitar 1 jam</li>
                </ul>
                
                <h3>Aktivitas yang Bisa Dilakukan</h3>
                <ul>
                    <li><strong>Trekking:</strong> Menikmati perjalanan melalui hutan tropis</li>
                    <li><strong>Photography:</strong> Spot foto yang instagramable</li>
                    <li><strong>Berenang:</strong> Kolam alami di bawah air terjun</li>
                    <li><strong>Meditasi:</strong> Suasana tenang dan damai</li>
                </ul>
                
                <h3>Tips Berkunjung</h3>
                <p><strong>Waktu Terbaik:</strong> Pagi hari (07:00-10:00) untuk menghindari keramaian<br>
                <strong>Yang Harus Dibawa:</strong> Sepatu trekking, baju ganti, kamera waterproof<br>
                <strong>Biaya Masuk:</strong> Rp 10.000 per orang</p>
                
                <h3>Paket Tour Air Terjun Senaru</h3>
                <p>Ryzuru Tour Travel menawarkan paket wisata Air Terjun Senaru yang mencakup:</p>
                <ul>
                    <li>Transportasi dari hotel</li>
                    <li>Guide lokal berpengalaman</li>
                    <li>Makan siang tradisional Sasak</li>
                    <li>Tiket masuk</li>
                </ul>
                
                <p>Rasakan kesegaran dan keindahan Air Terjun Senaru bersama Ryzuru Tour Travel!</p>',
                'created_at' => Carbon::now()->subDays(6),
                'updated_at' => Carbon::now()->subDays(6),
            ],
            [
                'title' => 'Gili Trawangan: Surga Snorkeling dan Kehidupan Malam di Lombok',
                'image' => 'Gili-trawangan.jpg',
                'discription' => '<h2>Gili Trawangan: Surga Snorkeling dan Kehidupan Malam di Lombok</h2>
                <p>Gili Trawangan adalah yang terbesar dari tiga pulau Gili (Gili Trawangan, Gili Meno, dan Gili Air). Pulau ini terkenal sebagai destinasi favorit backpacker dan pecinta diving dari seluruh dunia.</p>
                
                <h3>Mengapa Gili Trawangan Istimewa?</h3>
                <ul>
                    <li><strong>Bebas Kendaraan Bermotor:</strong> Hanya cidomo (kereta kuda) dan sepeda</li>
                    <li><strong>Kehidupan Bawah Laut:</strong> Terumbu karang yang masih pristine</li>
                    <li><strong>Sunset Point:</strong> Pemandangan matahari terbenam yang menakjubkan</li>
                    <li><strong>Nightlife:</strong> Bar dan restoran dengan suasana santai</li>
                </ul>
                
                <h3>Aktivitas di Gili Trawangan</h3>
                <h4>Aktivitas Air:</h4>
                <ul>
                    <li>Snorkeling dengan penyu hijau</li>
                    <li>Diving di spot-spot terbaik</li>
                    <li>Island hopping ke Gili Meno dan Gili Air</li>
                    <li>Stand-up paddleboard (SUP)</li>
                </ul>
                
                <h4>Aktivitas Darat:</h4>
                <ul>
                    <li>Bersepeda mengelilingi pulau</li>
                    <li>Yoga di pantai saat sunrise</li>
                    <li>Cooking class masakan lokal</li>
                    <li>Pijat tradisional di pantai</li>
                </ul>
                
                <h3>Kuliner Wajib Coba</h3>
                <ul>
                    <li><strong>Ikan Bakar:</strong> Ikan segar bakar dengan sambal plecing</li>
                    <li><strong>Ayam Taliwang:</strong> Ayam bakar khas Lombok</li>
                    <li><strong>Plecing Kangkung:</strong> Kangkung dengan sambal pedas</li>
                    <li><strong>Sate Pusut:</strong> Sate ikan khas Lombok</li>
                </ul>
                
                <h3>Paket Tour Gili Trawangan</h3>
                <p>Ryzuru Tour Travel menawarkan paket lengkap:</p>
                <ul>
                    <li>Fast boat dari Bangsal Harbor</li>
                    <li>Akomodasi homestay atau hotel</li>
                    <li>Snorkeling tour dengan peralatan</li>
                    <li>Makan 3x (breakfast, lunch, dinner)</li>
                    <li>Sepeda untuk berkeliling pulau</li>
                </ul>
                
                <p>Nikmati keindahan Gili Trawangan dengan paket tour terbaik dari Ryzuru Tour Travel!</p>',
                'created_at' => Carbon::now()->subDays(4),
                'updated_at' => Carbon::now()->subDays(4),
            ],
            [
                'title' => 'Budget Backpacker ke Lombok: Hemat Tapi Seru!',
                'image' => 'Budgethemat_lombok.jpeg',
                'discription' => '<h2>Budget Backpacker ke Lombok: Hemat Tapi Seru!</h2>
                <p>Lombok bisa dinikmati dengan budget terbatas! Berikut panduan lengkap untuk backpacker yang ingin menjelajahi keindahan Lombok tanpa menguras kantong.</p>
                
                <h3>Estimasi Budget Harian</h3>
                <table border="1" style="width:100%; border-collapse: collapse;">
                    <tr>
                        <th>Kategori</th>
                        <th>Budget (Rp)</th>
                        <th>Keterangan</th>
                    </tr>
                    <tr>
                        <td>Akomodasi</td>
                        <td>50.000 - 100.000</td>
                        <td>Hostel/Homestay</td>
                    </tr>
                    <tr>
                        <td>Makan</td>
                        <td>75.000 - 150.000</td>
                        <td>Warung lokal</td>
                    </tr>
                    <tr>
                        <td>Transportasi</td>
                        <td>50.000 - 100.000</td>
                        <td>Ojek/Angkot</td>
                    </tr>
                    <tr>
                        <td>Aktivitas</td>
                        <td>25.000 - 75.000</td>
                        <td>Tiket masuk</td>
                    </tr>
                    <tr>
                        <td><strong>Total</strong></td>
                        <td><strong>200.000 - 425.000</strong></td>
                        <td><strong>Per hari</strong></td>
                    </tr>
                </table>
                
                <h3>Tips Hemat di Lombok</h3>
                <h4>Akomodasi:</h4>
                <ul>
                    <li>Pilih homestay atau guesthouse lokal</li>
                    <li>Cari yang include breakfast</li>
                    <li>Booking langsung di tempat untuk nego harga</li>
                </ul>
                
                <h4>Makanan:</h4>
                <ul>
                    <li>Makan di warung lokal, bukan restoran turis</li>
                    <li>Coba nasi campur Lombok (Rp 15.000)</li>
                    <li>Beli buah di pasar tradisional</li>
                </ul>
                
                <h4>Transportasi:</h4>
                <ul>
                    <li>Gunakan angkot untuk jarak jauh</li>
                    <li>Sewa motor harian (Rp 60.000)</li>
                    <li>Jalan kaki untuk eksplorasi area</li>
                </ul>
                
                <h3>Itinerary 5 Hari Budget</h3>
                <p><strong>Hari 1:</strong> Arrival - Pantai Senggigi<br>
                <strong>Hari 2:</strong> Gili Trawangan day trip<br>
                <strong>Hari 3:</strong> Air Terjun Senaru<br>
                <strong>Hari 4:</strong> Pantai Kuta Lombok - Pantai Mawun<br>
                <strong>Hari 5:</strong> Shopping oleh-oleh - Departure</p>
                
                <h3>Paket Budget dari Ryzuru Tour Travel</h3>
                <p>Ryzuru Tour Travel juga melayani backpacker dengan paket hemat:</p>
                <ul>
                    <li>Paket 3D2N mulai Rp 750.000</li>
                    <li>Include transport, guide, dan tiket masuk</li>
                    <li>Flexible itinerary sesuai budget</li>
                    <li>Group tour untuk sharing cost</li>
                </ul>
                
                <p>Jangan biarkan budget terbatas menghalangi petualangan Anda di Lombok!</p>',
                'created_at' => Carbon::now()->subDays(2),
                'updated_at' => Carbon::now()->subDays(2),
            ],
            [
                'title' => 'Kuliner Khas Lombok yang Wajib Dicoba Saat Berkunjung',
                'image' => 'makanankhas-lombok.jpeg',
                'discription' => '<h2>Kuliner Khas Lombok yang Wajib Dicoba Saat Berkunjung</h2>
                <p>Lombok tidak hanya menawarkan keindahan alam, tetapi juga kekayaan kuliner yang menggugah selera. Cita rasa pedas dan rempah-rempah khas Sasak akan memanjakan lidah Anda.</p>
                
                <h3>Makanan Khas Lombok yang Wajib Dicoba</h3>
                
                <h4>1. Ayam Taliwang</h4>
                <p>Ayam bakar khas Lombok dengan bumbu pedas yang kaya rempah. Biasanya disajikan dengan plecing kangkung dan sambal terasi.</p>
                
                <h4>2. Plecing Kangkung</h4>
                <p>Kangkung rebus yang disajikan dengan sambal tomat pedas. Segar dan cocok untuk cuaca panas Lombok.</p>
                
                <h4>3. Sate Pusut</h4>
                <p>Sate ikan yang dicampur dengan kelapa parut dan rempah-rempah. Teksturnya unik dan rasanya gurih pedas.</p>
                
                <h4>4. Beberuk Terong</h4>
                <p>Terong yang dibakar kemudian dicampur dengan sambal dan ikan teri. Cocok untuk vegetarian yang suka pedas.</p>
                
                <h4>5. Nasi Balap Puyung</h4>
                <p>Nasi campur khas Lombok dengan lauk beragam seperti ayam suwir, telur, dan sayuran dengan sambal pedas.</p>
                
                <h3>Minuman Khas Lombok</h3>
                <ul>
                    <li><strong>Es Kelapa Muda:</strong> Segar dan alami</li>
                    <li><strong>Jus Jeruk Lombok:</strong> Manis dan segar</li>
                    <li><strong>Teh Tarik:</strong> Teh manis dengan susu</li>
                    <li><strong>Air Kelapa Hijau:</strong> Elektrolit alami</li>
                </ul>
                
                <h3>Oleh-oleh Khas Lombok</h3>
                <ul>
                    <li><strong>Dodol Rumput Laut:</strong> Dodol dengan campuran rumput laut</li>
                    <li><strong>Keripik Terong:</strong> Camilan renyah dan gurih</li>
                    <li><strong>Sambal Roa:</strong> Sambal ikan roa yang pedas</li>
                    <li><strong>Kopi Lombok:</strong> Kopi robusta berkualitas tinggi</li>
                </ul>
                
                <h3>Rekomendasi Tempat Makan</h3>
                <h4>Warung Lokal:</h4>
                <ul>
                    <li>Warung Menega (Gili Trawangan)</li>
                    <li>Warung Bule (Senggigi)</li>
                    <li>Warung Bintang (Mataram)</li>
                </ul>
                
                <h4>Restoran:</h4>
                <ul>
                    <li>Ashtari Restaurant (Kuta Lombok)</li>
                    <li>Pearl Beach Lounge (Gili Trawangan)</li>
                    <li>Bumbu Cafe (Senggigi)</li>
                </ul>
                
                <h3>Culinary Tour dengan Ryzuru Tour Travel</h3>
                <p>Ryzuru Tour Travel menawarkan paket culinary tour yang mencakup:</p>
                <ul>
                    <li>Kunjungan ke warung-warung legendaris</li>
                    <li>Cooking class masakan Sasak</li>
                    <li>Market tour untuk beli bahan masakan</li>
                    <li>Tasting session makanan khas</li>
                </ul>
                
                <p>Jelajahi cita rasa Lombok bersama Ryzuru Tour Travel dan rasakan kelezatan kuliner khas Sasak!</p>',
                'created_at' => Carbon::now()->subDays(1),
                'updated_at' => Carbon::now()->subDays(1),
            ],
        ];

        foreach ($blogs as $blog) {
            Blog::create($blog);
        }
    }
}