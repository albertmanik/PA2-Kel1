<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class ProductsSeeder extends Seeder
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
                'name' => 'Papan Bunga',
                'harga' => '1212022307930001',
                'deskripsi' => 'staff1@gmail.com',
                'gambar' => 'gambar1.jpg',
                'category_id' => '1',
            ],
            [
                'user_id' => '1',
                'name' => 'Bouquet',
                'harga' => '1212022307930001',
                'deskripsi' => 'staff1@gmail.com',
                'gambar' => 'gambar1.jpg',
                'category_id' => '2',
            ],
        );
        foreach ($data as $d) {
            Product::create([
                'user_id' => $d['user_id'],
                'name' => $d['name'],
                'harga' => $d['harga'],
                'deskripsi' => $d['deskripsi'],
                'gambar' => $d['gambar'],
                'category_id' => $d['category_id'],
            ]);
        }
    }
}
