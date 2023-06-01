<?php

namespace Database\Seeders;

use App\Models\Subdistrict;
use Illuminate\Database\Seeder;

class KecamatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $kecamatan = array(
            [
                'kecamatan_id' => '1',
                'kecamatan_name' => 'Ajibata'
            ],
            [
                'kecamatan_id' => '2',
                'kecamatan_name' => 'Balige'
            ],
            [
                'kecamatan_id' => '3',
                'kecamatan_name' => 'Bonatua Lunasi'
            ],
            [
                'kecamatan_id' => '4',
                'kecamatan_name' => 'Borbor'
            ],
            [
                'kecamatan_id' => '5',
                'kecamatan_name' => 'Habinsaran'
            ],
            [
                'kecamatan_id' => '6',
                'kecamatan_name' => 'Laguboti'
            ],
            [
                'kecamatan_id' => '7',
                'kecamatan_name' => 'Lumban Julu'
            ],
            [
                'kecamatan_id' => '8',
                'kecamatan_name' => 'Nasau'
            ],
            [
                'kecamatan_id' => '9',
                'kecamatan_name' => 'Parmaksian'
            ],
            [
                'kecamatan_id' => '10',
                'kecamatan_name' => 'Pintu Pohan Meranti'
            ],
            [
                'kecamatan_id' => '11',
                'kecamatan_name' => 'Porsea'
            ],
            [
                'kecamatan_id' => '12',
                'kecamatan_name' => 'Siantar Narumonda'
            ],
            [
                'kecamatan_id' => '13',
                'kecamatan_name' => 'Sigumpar'
            ],
            [
                'kecamatan_id' => '14',
                'kecamatan_name' => 'Silaen'
            ],
            [
                'kecamatan_id' => '15',
                'kecamatan_name' => 'Tampahan'
            ],
        );
        foreach ($kecamatan as $kecamatan) {
            Subdistrict::create([
                'id' => $kecamatan['kecamatan_id'],
                'name' => $kecamatan['kecamatan_name']
            ]);
        }
    }
}
