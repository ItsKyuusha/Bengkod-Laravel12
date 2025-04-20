<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PeriksasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('periksa')->insert([
            [
                'id_pasien' => 1,
                'id_dokter' => 2,
                'tgl_periksa' => Carbon::now(),
                'catatan' => 'Demam dan sakit kepala',
                'biaya_periksa' => 150000,
            ],
        ]);
    }
}
