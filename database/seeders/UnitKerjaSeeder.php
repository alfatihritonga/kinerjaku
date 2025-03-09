<?php

namespace Database\Seeders;

use App\Models\UnitKerja;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UnitKerjaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        UnitKerja::insert([
            ['nama' => 'Pusdatin', 'divisi_id' => '2'], // 1
            ['nama' => 'PRPM', 'divisi_id' => '2'], // 2
            ['nama' => 'Perpustakaan', 'divisi_id' => '2'], // 3
            ['nama' => 'Marketing', 'divisi_id' => '2'], // 4
            ['nama' => 'Prodi Sistem Informasi', 'divisi_id' => '3'], // 4
            ['nama' => 'Prodi Sistem Komputer', 'divisi_id' => '3'], // 5
            ['nama' => 'Prodi Teknik Komputer', 'divisi_id' => '3'], // 6
            ['nama' => 'BAAK', 'divisi_id' => '3'], // 7
            ['nama' => 'Front Office', 'divisi_id' => '3'], // 8
            ['nama' => 'Keuangan', 'divisi_id' => '5'], // 9
            ['nama' => 'Kepegawaian', 'divisi_id' => '5'], // 10
            ['nama' => 'Inventory', 'divisi_id' => '5'], // 11
            ['nama' => 'Pemeliharaan', 'divisi_id' => '5'], // 12
            ['nama' => 'Security', 'divisi_id' => '5'], // 13
            ['nama' => 'Kemahasiswaan', 'divisi_id' => '4'], // 14
            ['nama' => 'Konseling', 'divisi_id' => '4'], // 15
        ]);
    }
}
