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
                'keterangan' => 'Penilaian April 2025',
                'bulan' => 'April',
                'tahun' => '2025',
                'tanggal_mulai' => '2025-04-18',
                'tanggal_selesai' => '2025-04-20',
                'status' => 'open',
            ]
        ]);
    }
}
