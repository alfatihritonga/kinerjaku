<?php

namespace Database\Seeders;

use App\Models\PeriodePenilaian;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PeriodePenilaianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PeriodePenilaian::insert([
            [
                'keterangan' => 'Penilaian Maret 2025',
                'bulan' => 'Maret',
                'tahun' => '2025',
                'tanggal_mulai' => '2025-04-21',
                'tanggal_selesai' => '2025-04-26',
                'status' => 'open',
            ]
        ]);
    }
}
