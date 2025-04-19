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
            ['nama' => 'LPM', 'divisi_id' => '1'],
            ['nama' => 'Pembukuan YBKS', 'divisi_id' => '2'],
            ['nama' => 'Pusdatin', 'divisi_id' => '3'],
            ['nama' => 'PRPM', 'divisi_id' => '3'],
            ['nama' => 'Perpustakaan', 'divisi_id' => '3'],
            ['nama' => 'Umum & Marketing', 'divisi_id' => '3'],
            ['nama' => 'Humas & Pemasaran', 'divisi_id' => '3'],
            ['nama' => 'Waka I', 'divisi_id' => '4'],
            ['nama' => 'Prodi SI', 'divisi_id' => '4'],
            ['nama' => 'Prodi SK', 'divisi_id' => '4'],
            ['nama' => 'Prodi MI', 'divisi_id' => '4'],
            ['nama' => 'BAAK', 'divisi_id' => '4'],
            ['nama' => 'BPN', 'divisi_id' => '4'],
            ['nama' => 'Adm Akademik', 'divisi_id' => '4'],
            ['nama' => 'Puskom', 'divisi_id' => '4'],
            ['nama' => 'Lab', 'divisi_id' => '4'],
            ['nama' => 'Waka III', 'divisi_id' => '5'],
            ['nama' => 'Kemahasiswaan', 'divisi_id' => '5'],
            ['nama' => 'Bimbingan & Konseling', 'divisi_id' => '5'],
            ['nama' => 'Waka II', 'divisi_id' => '6'],
            ['nama' => 'SDM, Keuangan & Inventory', 'divisi_id' => '6'],
            ['nama' => 'Pemeliharaan', 'divisi_id' => '6'],
            ['nama' => 'Keamanan', 'divisi_id' => '6'],
            ['nama' => 'Kebersihan', 'divisi_id' => '6'],
            ['nama' => 'Ketua STMIK', 'divisi_id' => '3'],
        ]);
    }
}
