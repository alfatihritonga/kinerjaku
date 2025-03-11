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
                'nama' => 'Ketua Yayasan',
                'nip' => '0',
                'email' => 'ketuayayasan@trigunadharma.ac.id',
                'password' => Hash::make('password'),
                'divisi_id' => 1,
                'unit_kerja_id' => null,
                'jabatan_id' => 1,
                'role' => 'pegawai'
            ],
            [
                'nama' => 'Puji Sari Ramadhan, S.Kom., M.Kom.',
                'nip' => '1',
                'email' => 'puji@trigunadharma.ac.id',
                'password' => Hash::make('password'),
                'divisi_id' => 2,
                'unit_kerja_id' => null,
                'jabatan_id' => 2,
                'role' => 'pegawai'
            ],
            [
                'nama' => 'Mhd. Gilang Suryanata, S.Kom. M.Kom',
                'nip' => '2',
                'email' => 'gilang@trigunadharma.ac.id',
                'password' => Hash::make('password'),
                'divisi_id' => 3,
                'unit_kerja_id' => null,
                'jabatan_id' => 3,
                'role' => 'pegawai'
            ],
            [
                'nama' => 'Astri Syahputri, S.Kom., M.Kom.',
                'nip' => '3',
                'email' => 'astri@trigunadharma.ac.id',
                'password' => Hash::make('password'),
                'divisi_id' => 5,
                'unit_kerja_id' => null,
                'jabatan_id' => 4,
                'role' => 'pegawai'
            ],
            [
                'nama' => 'Usti Fatimah Sari Sitorus Pane, S.Kom., M.Kom.',
                'nip' => '4',
                'email' => 'usti@trigunadharma.ac.id',
                'password' => Hash::make('password'),
                'divisi_id' => 4,
                'unit_kerja_id' => null,
                'jabatan_id' => 5,
                'role' => 'pegawai'
            ],
            [
                'nama' => 'Nurcahyo Budi Nugroho',
                'nip' => '5',
                'email' => 'nurcahyo@trigunadharma.ac.id',
                'password' => Hash::make('password'),
                'divisi_id' => 2,
                'unit_kerja_id' => 1,
                'jabatan_id' => 7,
                'role' => 'pegawai'
            ],
            [
                'nama' => 'Haryo Suro Kuncoro',
                'nip' => '6',
                'email' => 'haryo@trigunadharma.ac.id',
                'password' => Hash::make('password'),
                'divisi_id' => 2,
                'unit_kerja_id' => 1,
                'jabatan_id' => 8,
                'role' => 'pegawai'
            ],
            [
                'nama' => 'Muhammad Al-fatih Ritonga',
                'nip' => '7',
                'email' => 'alfatih@trigunadharma.ac.id',
                'password' => Hash::make('password'),
                'divisi_id' => 2,
                'unit_kerja_id' => 1,
                'jabatan_id' => 9,
                'role' => 'pegawai'
            ],
            [
                'nama' => 'M. Irpandi',
                'nip' => '8',
                'email' => 'irpandi@trigunadharma.ac.id',
                'password' => Hash::make('password'),
                'divisi_id' => 3,
                'unit_kerja_id' => 8,
                'jabatan_id' => 8,
                'role' => 'pegawai'
            ],
            [
                'nama' => 'Aditya Maulana',
                'nip' => '9',
                'email' => 'aditya@trigunadharma.ac.id',
                'password' => Hash::make('password'),
                'divisi_id' => 3,
                'unit_kerja_id' => 8,
                'jabatan_id' => 9,
                'role' => 'pegawai'
            ],
            [
                'nama' => 'Ichsan Firmansyah',
                'nip' => '10',
                'email' => 'ichsan@trigunadharma.ac.id',
                'password' => Hash::make('password'),
                'divisi_id' => 5,
                'unit_kerja_id' => 12,
                'jabatan_id' => 7,
                'role' => 'pegawai'
            ],
            [
                'nama' => 'Ocha Sugiarto',
                'nip' => '11',
                'email' => 'ocha@trigunadharma.ac.id',
                'password' => Hash::make('password'),
                'divisi_id' => 5,
                'unit_kerja_id' => 12,
                'jabatan_id' => 9,
                'role' => 'pegawai'
            ],
            [
                'nama' => 'Hafiizh Yaafi',
                'nip' => '12',
                'email' => 'hafiizh@trigunadharma.ac.id',
                'password' => Hash::make('password'),
                'divisi_id' => 2,
                'unit_kerja_id' => 4,
                'jabatan_id' => 9,
                'role' => 'pegawai'
            ],
        ]);
    }
}
