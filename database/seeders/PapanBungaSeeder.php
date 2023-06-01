<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class PapanBungaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = array(
            [
                'user_id' => '1',
                'name' => 'Papan Bunga Pernikahan',
                'harga' => '250.000',
                'deskripsi' => 'Lumban Dolok Haume Bange, Kec. Balige, Toba, Sumatera Utara',
                'kota' => 'BLG',
                'no_hp' => '081234567890',
                'gambar' => 'papanbunga1.jpg',
                'category_id' => '1',
            ],
            [
                'user_id' => '1',
                'name' => 'Papan Bunga Duka Cita',
                'harga' => '200.000',
                'deskripsi' => 'Lumban Dolok Haume Bange, Kec. Balige, Toba, Sumatera Utara',
                'kota' => 'BLG',
                'no_hp' => '081234567890',
                'gambar' => 'papanbunga3.jpg',
                'category_id' => '1',
            ],
            [
                'user_id' => '1',
                'name' => 'Papan Bunga Graduation',
                'harga' => '125.000',
                'deskripsi' => 'Laguboti, Kec. Balige, Toba, Sumatera Utara',
                'kota' => 'LGB',
                'no_hp' => '081234567890',
                'gambar' => 'papanbunga10.jpg',
                'category_id' => '1',
            ],
            [
                'user_id' => '1',
                'name' => 'Papan Bunga Grand Opening',
                'harga' => '500.000',
                'deskripsi' => 'Laguboti, Kec. Balige, Toba, Sumatera Utara',
                'kota' => 'LGB',
                'no_hp' => '081234567890',
                'gambar' => 'papanbunga4.jpeg',
                'category_id' => '1',
            ],
            [
                'user_id' => '1',
                'name' => 'Papan Bunga Selamat Ulang Tahun',
                'harga' => '100.000',
                'deskripsi' => 'Jl Lintas Sumatera Porsea Kab Toba Samosir, Sumatera Utara',
                'kota' => 'PRS',
                'no_hp' => '081234567890',
                'gambar' => 'papanbunga6.jpg',
                'category_id' => '1',
            ],
        );

        foreach ($data as $d) {
            Product::create([
                'user_id' => $d['user_id'],
                'name' => $d['name'],
                'harga' => $d['harga'],
                'deskripsi' => $d['deskripsi'],
                'kota' => $d['kota'],
                'no_hp' => $d['no_hp'],
                'gambar' => $d['gambar'],
                'category_id' => $d['category_id'],
            ]);
        }
    }
}
