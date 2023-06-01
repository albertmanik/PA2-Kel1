<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $admin = User::create([
                'username' => 'Admin',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('admin123'),
                'no_telp' => '081234567890',
            ]);
        $admin->assignRole('admin');

        $admin = User::create([
                'username' => 'Penjual',
                'email' => 'penjual@gmail.com',
                'password' => Hash::make('penjual'),
                'no_telp' => '081234567890',
            ]);
        $admin->assignRole('penjual');

        $admin = User::create([
                'username' => 'Customer',
                'email' => 'customer@gmail.com',
                'password' => Hash::make('customer'),
                'no_telp' => '081234567890',
            ]);
        $admin->assignRole('customer');
    }
}
