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
            ['nama' => 'Ketua', 'level' => 1],
            ['nama' => 'Wakil Ketua', 'level' => 2],
            ['nama' => 'Kepala Bidang', 'level' => 3],
            ['nama' => 'Kepala Sub Bidang', 'level' => 4],
            ['nama' => 'Sekretaris', 'level' => 5],
            ['nama' => 'Staff', 'level' => 6],
        ]);
    }
}
