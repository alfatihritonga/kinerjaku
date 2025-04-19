<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::insert([
            [
                'name' => 'Administrator',
                'email' => 'admin@example.com',
                'password' => Hash::make('password'),
                'pegawai_id' => null,
                'role' => 'admin'
            ],
            [
                'name' => 'Puji',
                'email' => 'puji@trigunadharma.ac.id',
                'password' => Hash::make('password'),
                'pegawai_id' => 53,
                'role' => 'pegawai'
            ],
            [
                'name' => 'Gilang',
                'email' => 'gilang@trigunadharma.ac.id',
                'password' => Hash::make('password'),
                'pegawai_id' => 40,
                'role' => 'pegawai'
            ],
            [
                'name' => 'Astri',
                'email' => 'astri@trigunadharma.ac.id',
                'password' => Hash::make('password'),
                'pegawai_id' => 12,
                'role' => 'pegawai'
            ],
            [
                'name' => 'Usti',
                'email' => 'usti@trigunadharma.ac.id',
                'password' => Hash::make('password'),
                'pegawai_id' => 61,
                'role' => 'pegawai'
            ],
            [
                'name' => 'Nurcahyo',
                'email' => 'nurcahyo@trigunadharma.ac.id',
                'password' => Hash::make('password'),
                'pegawai_id' => 49,
                'role' => 'pegawai'
            ],
            [
                'name' => 'Zaimah',
                'email' => 'zaimah@trigunadharma.ac.id',
                'password' => Hash::make('password'),
                'pegawai_id' => 63,
                'role' => 'pegawai'
            ],
            [
                'name' => 'Ketua Yayasan',
                'email' => 'ketuayayasan@trigunadharma.ac.id',
                'password' => Hash::make('password'),
                'pegawai_id' => 65,
                'role' => 'pegawai'
            ],
            [
                'name' => 'Bendahara YBKS',
                'email' => 'bendahara@trigunadharma.ac.id',
                'password' => Hash::make('password'),
                'pegawai_id' => 66,
                'role' => 'pegawai'
            ],
        ]);
    }
}
