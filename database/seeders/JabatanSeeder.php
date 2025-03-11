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
            ['nama' => 'Kepala', 'level' => 3],
            ['nama' => 'Kepala Bidang', 'level' => 3],
            ['nama' => 'Kepala Sub Bidang', 'level' => 4],
            ['nama' => 'Staff', 'level' => 5],
        ]);
    }
}
