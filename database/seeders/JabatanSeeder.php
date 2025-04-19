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
            ['nama' => 'Ketua Yayasan', 'level' => 1],
            ['nama' => 'Ketua STMIK', 'level' => 2],
            ['nama' => 'Wakil Ketua 1', 'level' => 3],
            ['nama' => 'Wakil Ketua 2', 'level' => 3],
            ['nama' => 'Wakil Ketua 3', 'level' => 3],
            ['nama' => 'Kepala', 'level' => 4],
            ['nama' => 'Kepala Bidang', 'level' => 5],
            ['nama' => 'Kepala Sub Bidang', 'level' => 5],
            ['nama' => 'Staff', 'level' => 6],
            ['nama' => 'Bendahara YBKS', 'level' => 1],
        ]);
    }
}
