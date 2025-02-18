<?php

namespace Database\Seeders;

use App\Models\Kriteria;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KriteriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $kriteria = [
            ['nama' => 'Hasil Kerja', 'bobot' => 0.35],
            ['nama' => 'Kepatuhan', 'bobot' => 0.25],
            ['nama' => 'Inisiatif', 'bobot' => 0.20],
            ['nama' => 'Loyalitas', 'bobot' => 0.20],
        ];

        Kriteria::insert($kriteria);
    }
}
