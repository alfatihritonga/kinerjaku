<?php

namespace Database\Seeders;

use App\Models\Jabatan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JabatanSeeder extends Seeder
{
    /**
    * Run the database seeds.
    */
    public function run(): void
    {
        Jabatan::insert([
            ['nama' => 'Ketua Yayasan', 'level' => 1], // 1
            ['nama' => 'Ketua STMIK', 'level' => 2], // 2
            ['nama' => 'Wakil Ketua 1', 'level' => 2], // 3
            ['nama' => 'Wakil Ketua 2', 'level' => 2], // 4
            ['nama' => 'Wakil Ketua 3', 'level' => 2], // 5
            ['nama' => 'Kepala', 'level' => 3], // 6
            ['nama' => 'Kepala Bidang', 'level' => 3], // 7
            ['nama' => 'Kepala Sub Bidang', 'level' => 4], // 8
            ['nama' => 'Sekretaris', 'level' => 5], // 9
            ['nama' => 'Staff', 'level' => 5], // 10
            ['nama' => 'Bendahara', 'level' => 3], // 11
        ]);
    }
}
