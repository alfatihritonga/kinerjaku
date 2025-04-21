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
                'name' => 'Bintang',
                'email' => 'bintang@trigunadharma.ac.id',
                'password' => Hash::make('password'),
                'pegawai_id' => 1,
                'role' => 'pegawai'
            ],
            [
                'name' => 'Aji Rangkuti',
                'email' => 'aji@trigunadharma.ac.id',
                'password' => Hash::make('password'),
                'pegawai_id' => 4,
                'role' => 'pegawai'
            ],
            [
                'name' => 'Arie',
                'email' => 'arie@trigunadharma.ac.id',
                'password' => Hash::make('password'),
                'pegawai_id' => 10,
                'role' => 'pegawai'
            ],
            [
                'name' => 'Arnedy',
                'email' => 'arnedy@trigunadharma.ac.id',
                'password' => Hash::make('password'),
                'pegawai_id' => 11,
                'role' => 'pegawai'
            ],
            [
                'name' => 'Ayuni',
                'email' => 'ayuni@trigunadharma.ac.id',
                'password' => Hash::make('password'),
                'pegawai_id' => 13,
                'role' => 'pegawai'
            ],
            [
                'name' => 'Bagas',
                'email' => 'bagas@trigunadharma.ac.id',
                'password' => Hash::make('password'),
                'pegawai_id' => 14,
                'role' => 'pegawai'
            ],
            [
                'name' => 'Bendahara YBKS',
                'email' => 'bendahara@trigunadharma.ac.id',
                'password' => Hash::make('password'),
                'pegawai_id' => 66,
                'role' => 'pegawai'
            ],
            [
                'name' => 'Dia Pertiwi',
                'email' => 'dia@trigunadharma.ac.id',
                'password' => Hash::make('password'),
                'pegawai_id' => 15,
                'role' => 'pegawai'
            ],
            [
                'name' => 'Edi Susanto',
                'email' => 'edi@trigunadharma.ac.id',
                'password' => Hash::make('password'),
                'pegawai_id' => 16,
                'role' => 'pegawai'
            ],
            [
                'name' => 'Hendri Setiawan',
                'email' => 'hendri@trigunadharma.ac.id',
                'password' => Hash::make('password'),
                'pegawai_id' => 29,
                'role' => 'pegawai'
            ],
            [
                'name' => 'Ichsan Firmansyah',
                'email' => 'ichsan@trigunadharma.ac.id',
                'password' => Hash::make('password'),
                'pegawai_id' => 30,
                'role' => 'pegawai'
            ],
            [
                'name' => 'Kaprodi SI',
                'email' => 'kaprodi@trigunadharma.ac.id',
                'password' => Hash::make('password'),
                'pegawai_id' => 67,
                'role' => 'pegawai'
            ],
            [
                'name' => 'Kasubid Digital Marketing',
                'email' => 'marketing@trigunadharma.ac.id',
                'password' => Hash::make('password'),
                'pegawai_id' => 68,
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
                'name' => 'M. Irpandi',
                'email' => 'irpandi@trigunadharma.ac.id',
                'password' => Hash::make('password'),
                'pegawai_id' => 36,
                'role' => 'pegawai'
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
        ]);
    }
}
