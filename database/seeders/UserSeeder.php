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
                'nama' => 'Administrator',
                'email' => 'admin@example.com',
                'password' => Hash::make('password'),
                'jabatan_id' => null,
                'divisi_id' => null,
                'atasan_id' => null,
                'role' => 'admin'
            ],
            [
                'nama' => 'Puji Sari Ramadhan',
                'email' => 'puji@trigunadharma.ac.id',
                'password' => Hash::make('password'),
                'jabatan_id' => 1,
                'divisi_id' => null,
                'atasan_id' => null,
                'role' => 'pegawai'
            ],
            [
                'nama' => 'Nurcahyo Budi Nugroho',
                'email' => 'nurcahyo@trigunadharma.ac.id',
                'password' => Hash::make('password'),
                'jabatan_id' => 3,
                'divisi_id' => 1,
                'atasan_id' => 2,
                'role' => 'pegawai'
            ],
            [
                'nama' => 'Haryo Suro Kuncoro',
                'email' => 'haryo@trigunadharma.ac.id',
                'password' => Hash::make('password'),
                'jabatan_id' => 4,
                'divisi_id' => 1,
                'atasan_id' => 3,
                'role' => 'pegawai'
            ],
            [
                'nama' => 'Muhammad Al-fatih Ritonga',
                'email' => 'alfatihritonga@trigunadharma.ac.id',
                'password' => Hash::make('password'),
                'jabatan_id' => 6,
                'divisi_id' => 1,
                'atasan_id' => 3,
                'role' => 'pegawai'
            ]
        ]);
    }
}
