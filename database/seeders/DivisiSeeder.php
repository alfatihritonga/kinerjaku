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
            ['nama' => 'Yayasan'], // 1
            ['nama' => 'Manajemen'], // 2
            ['nama' => 'Akademik'], // 3
            ['nama' => 'Kemahasiswaan'], // 4
            ['nama' => 'Keuangan, Kepegawaian dan Umum'], // 5
        ]);
    }
}
