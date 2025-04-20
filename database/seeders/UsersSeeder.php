<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'nama' => 'Budi Pasien',
                'alamat' => 'Semarang',
                'no_hp' => '081234567890',
                'email' => 'budi@example.com',
                'role' => 'pasien',
                'password' => Hash::make('password'),
            ],
            [
                'nama' => 'Dr. Andi',
                'alamat' => 'Semarang',
                'no_hp' => '081298765432',
                'email' => 'andi@example.com',
                'role' => 'dokter',
                'password' => Hash::make('password'),
            ],
        ]);
    }
}
