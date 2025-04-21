<?php

namespace Database\Seeders;

use App\Models\Divisi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DivisiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Divisi::insert([
            ['nama' => 'Yayasan'],
            ['nama' => 'Bendahara YBKS'],
            ['nama' => 'Manajemen'],
            ['nama' => 'Akademik'],
            ['nama' => 'Kemahasiswaan'],
            ['nama' => 'Keuangan, Kepegawaian dan Operasional'],
            ['nama' => 'Pusat Riset & Pengabdian Masyarakat'],
        ]);
    }
}
