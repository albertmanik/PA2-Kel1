<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'name' => 'admin',
            'guard_name' => 'web'
        ]);

        Role::create([
            'name' => 'customer',
            'guard_name' => 'web'
        ]);
        // Role::create([
        //     'name' => 'agen',
        //     'guard_name' => 'web'
        // ]);

        Role::create([
            'name' => 'penjual',
            'guard_name' => 'web'
        ]);
    }
}
