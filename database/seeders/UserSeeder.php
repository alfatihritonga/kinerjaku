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
                'nip' => null,
                'email' => 'admin@example.com',
                'password' => Hash::make('password'),
                'divisi_id' => null,
                'unit_kerja_id' => null,
                'jabatan_id' => null,
                'role' => 'admin'
            ],
            [
                'nama' => 'Puji Sari Ramadhan',
                'nip' => '2020020001',
                'email' => 'puji@trigunadharma.ac.id',
                'password' => Hash::make('password'),
                'divisi_id' => 2,
                'unit_kerja_id' => null,
                'jabatan_id' => 2,
                'role' => 'pegawai'
            ],
            [
                'nama' => 'Nurcahyo Budi Nugroho',
                'nip' => '2020020002',
                'email' => 'nurcahyo@trigunadharma.ac.id',
                'password' => Hash::make('password'),
                'divisi_id' => 2,
                'unit_kerja_id' => 1,
                'jabatan_id' => 7,
                'role' => 'pegawai'
            ],
            [
                'nama' => 'Haryo Suro Kuncoro',
                'nip' => '2020020003',
                'email' => 'haryo@trigunadharma.ac.id',
                'password' => Hash::make('password'),
                'divisi_id' => 2,
                'unit_kerja_id' => 1,
                'jabatan_id' => 8,
                'role' => 'pegawai'
            ],
            [
                'nama' => 'Muhammad Al-fatih Ritonga',
                'nip' => '2020020004',
                'email' => 'alfatih@trigunadharma.ac.id',
                'password' => Hash::make('password'),
                'divisi_id' => 2,
                'unit_kerja_id' => 1,
                'jabatan_id' => 10,
                'role' => 'pegawai'
            ],
            [
                'nama' => 'M. Irpandi',
                'nip' => '2020020005',
                'email' => 'irpandi@trigunadharma.ac.id',
                'password' => Hash::make('password'),
                'divisi_id' => 3,
                'unit_kerja_id' => 7,
                'jabatan_id' => 8,
                'role' => 'pegawai'
            ],
            [
                'nama' => 'Aditya Maulana',
                'nip' => '2020020006',
                'email' => 'aditya@trigunadharma.ac.id',
                'password' => Hash::make('password'),
                'divisi_id' => 3,
                'unit_kerja_id' => 7,
                'jabatan_id' => 10,
                'role' => 'pegawai'
            ],
            [
                'nama' => 'Ichsan Firmansyah',
                'nip' => '2020020007',
                'email' => 'ichsan@trigunadharma.ac.id',
                'password' => Hash::make('password'),
                'divisi_id' => 5,
                'unit_kerja_id' => 10,
                'jabatan_id' => 8,
                'role' => 'pegawai'
            ],
            [
                'nama' => 'Ocha Sugiarto',
                'nip' => '2020020008',
                'email' => 'ocha@trigunadharma.ac.id',
                'password' => Hash::make('password'),
                'divisi_id' => 5,
                'unit_kerja_id' => 10,
                'jabatan_id' => 9,
                'role' => 'pegawai'
            ],
        ]);
    }
}
