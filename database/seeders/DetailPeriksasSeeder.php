<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class DetailPeriksasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('obats')->insert([
            ['nama_obat' => 'Paracetamol', 'kemasan' => 'Tablet 500mg', 'harga' => 10000],
            ['nama_obat' => 'Amoxicillin', 'kemasan' => 'Kapsul 250mg', 'harga' => 15000],
            ['nama_obat' => 'Ibuprofen', 'kemasan' => 'Tablet 200mg', 'harga' => 12000],
        ]);
    }
}
