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
            ['nama' => 'Pusdatin', 'divisi_id' => '2'],
            ['nama' => 'PRPM', 'divisi_id' => '2'],
            ['nama' => 'Perpustakaan', 'divisi_id' => '2'],
            ['nama' => 'Marketing', 'divisi_id' => '2'],
            ['nama' => 'Prodi Sistem Informasi', 'divisi_id' => '3'],
            ['nama' => 'Prodi Sistem Komputer', 'divisi_id' => '3'],
            ['nama' => 'Prodi Teknik Komputer', 'divisi_id' => '3'],
            ['nama' => 'BAAK', 'divisi_id' => '3'],
            ['nama' => 'Front Office', 'divisi_id' => '3'],
            ['nama' => 'Kemahasiswaan', 'divisi_id' => '4'],
            ['nama' => 'Konseling', 'divisi_id' => '4'],
            ['nama' => 'Keuangan', 'divisi_id' => '5'],
            ['nama' => 'Kepegawaian', 'divisi_id' => '5'],
            ['nama' => 'Inventory', 'divisi_id' => '5'],
            ['nama' => 'Pemeliharaan', 'divisi_id' => '5'],
            ['nama' => 'Security', 'divisi_id' => '5'],
        ]);
    }
}
