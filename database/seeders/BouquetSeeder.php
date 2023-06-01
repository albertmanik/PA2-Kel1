<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class BouquetSeeder extends Seeder
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
                'name' => 'Round Bouquet',
                'harga' => '555.000',
                'deskripsi' => 'Lumban Dolok Haume Bange, Kec. Balige, Toba, Sumatera Utara',
                'kota' => 'BLG',
                'no_hp' =>'0812345678990',
                'gambar' => 'buket8.jpg',
                'category_id' => '2',
            ],
            [
                'user_id' => '1',
                'name' => 'Bouquet Ulang Tahun',
                'harga' => '700.000',
                'deskripsi' => 'Laguboti, Kec. Balige, Toba, Sumatera Utara',
                'kota' => 'LGB',
                'no_hp' =>'0812345678990',
                'gambar' => 'buket5.jpg',
                'category_id' => '2',
            ],
            [
                'user_id' => '1',
                'name' => 'Bouquet Graduation',
                'harga' => '100.000',
                'deskripsi' => 'Jl Lintas Sumatera Porsea Kab Toba Samosir, Sumatera Utara',
                'kota' => 'PRS',
                'no_hp' =>'0812345678990',
                'gambar' => 'buket4.jpg',
                'category_id' => '2',
            ],
            [
                'user_id' => '1',
                'name' => 'Bouquet Uang',
                'harga' => '200.000',
                'deskripsi' => 'Lumban Dolok Haume Bange, Kec. Balige, Toba, Sumatera Utara',
                'kota' => 'BLG',
                'no_hp' =>'0812345678990',
                'gambar' => 'buket2.jpg',
                'category_id' => '2',
            ],
            [
                'user_id' => '1',
                'name' => 'Bouquet Pernikahan',
                'harga' => '220.000',
                'deskripsi' => 'Jl Lintas Sumatera Porsea Kab Toba Samosir, Sumatera Utara',
                'kota' => 'PRS',
                'no_hp' =>'0812345678990',
                'gambar' => 'buket3.jpeg',
                'category_id' => '2',
            ],
            [
                'user_id' => '1',
                'name' => 'Bouquet Wisuda',
                'harga' => '800.000',
                'deskripsi' => 'Laguboti, Kec. Balige, Toba, Sumatera Utara',
                'kota' => 'LGB',
                'no_hp' =>'0812345678990',
                'gambar' => 'buket6.jpg',
                'category_id' => '2',
            ],
            [
                'user_id' => '1',
                'name' => 'Cascade Bouquet',
                'harga' => '300.000',
                'deskripsi' => 'Lumban Dolok Haume Bange, Kec. Balige, Toba, Sumatera Utara',
                'kota' => 'BLG',
                'no_hp' =>'0812345678990',
                'gambar' => 'buket7.jpg',
                'category_id' => '2',
            ],
            [
                'user_id' => '1',
                'name' => 'Anemone Bouquet',
                'harga' => '500.000',
                'deskripsi' => 'Lumban Dolok Haume Bange, Kec. Balige, Toba, Sumatera Utara',
                'kota' => 'BLG',
                'no_hp' =>'0812345678990',
                'gambar' => 'buket9.jpg',
                'category_id' => '2',
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
