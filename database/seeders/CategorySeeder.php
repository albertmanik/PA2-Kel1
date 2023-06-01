<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
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
                'name' => 'Papan Bunga',
            ],
            [
                'name' => 'Bouquet',
            ],
        );
        foreach ($data as $d) {
            Category::create([
                'name' => $d['name'],
            ]);
        }
    }
}
