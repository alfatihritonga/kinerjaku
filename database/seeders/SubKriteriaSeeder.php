<?php

namespace Database\Seeders;

use App\Models\SubKriteria;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubKriteriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $subKriteria = [
            // Hasil Kerja (ID Kriteria: 1)
            [
                'nama' => 'Tercapainya Pelaksanaan Program Kerja Bulanan Tepat Waktu (berdasarkan agenda kerja)',
                'kriteria_id' => 1,
                'level_minimal' => 4,
                'level_maksimal' => null
            ],
            [
                'nama' => 'Tidak Adanya Keluhan Dari mahasiswa, dosen dan/atau pimpinan unit kerja (melalui form pengaduan layanan)',
                'kriteria_id' => 1,
                'level_minimal' => 4,
                'level_maksimal' => null
            ],
            [
                'nama' => 'Memberikan pelayanan terbaik kepada mahasiswa, dosen dan/atau pimpinan unit kerja',
                'kriteria_id' => 1,
                'level_minimal' => 4,
                'level_maksimal' => null
            ],
            [
                'nama' => 'Komunikasi dengan sesama rekan kerja (Tim Work)',
                'kriteria_id' => 1,
                'level_minimal' => 4,
                'level_maksimal' => null
            ],
            
            // Kepatuhan (ID Kriteria: 2)
            [
                'nama' => 'Mampu memberikan contoh jiwa kepemimpinan yang baik',
                'kriteria_id' => 2,
                'level_minimal' => 4,
                'level_maksimal' => 5
            ],
            [
                'nama' => 'Mampu mendelegasikan tugas kepada tim untuk mencapai tujuan dan fungsi divisi',
                'kriteria_id' => 2,
                'level_minimal' => 4,
                'level_maksimal' => 5
            ],
            [
                'nama' => 'Mampu mengatasi permasalahan yang terjadi di divisi masing-masing dengan berkordinasi dengan Atasan',
                'kriteria_id' => 2,
                'level_minimal' => 4,
                'level_maksimal' => 5
            ],
            [
                'nama' => 'Patuh Terhadap Atasan sesuai dengan fungsi Jabatan',
                'kriteria_id' => 2,
                'level_minimal' => 4,
                'level_maksimal' => null
            ],
            [
                'nama' => 'Patuh Terhadap Pelaksanaan Tugas Tugas dan Lain yang Diperintahkan Atasan untuk Mendukung Tujuan Jabatan (Event)',
                'kriteria_id' => 2,
                'level_minimal' => 4,
                'level_maksimal' => null
            ],
            [
                'nama' => 'Patuh Pada Peraturan dan Tata Tertib',
                'kriteria_id' => 2,
                'level_minimal' => 4,
                'level_maksimal' => null
            ],
            [
                'nama' => 'Patuh Terhadap SOP yang Berlaku',
                'kriteria_id' => 2,
                'level_minimal' => 4,
                'level_maksimal' => null
            ],
            [
                'nama' => 'Melaksanakan kegiatan keagamaan dan menjaga norma-norma agama dilingkungan kampus',
                'kriteria_id' => 2,
                'level_minimal' => 4,
                'level_maksimal' => null
            ],
            
            // Inisiatif (ID Kriteria: 3)
            [
                'nama' => 'Memberikan Ide/gagasan Terbaik Dalam melaksanakan Pekerjaan dengan Terlebih Dahulu Berkoordinasi Kepada Atasan',
                'kriteria_id' => 3,
                'level_minimal' => 4,
                'level_maksimal' => null
            ],
            [
                'nama' => 'Selalu Berusaha Mencari Solusi Dari Setiap Masalah Dengan Terlebih Dahulu Berkoordinasi Dengan Atasan',
                'kriteria_id' => 3,
                'level_minimal' => 4,
                'level_maksimal' => null
            ],
            
            // Loyalitas (ID Kriteria: 4)
            [
                'nama' => 'Bekerja Sepenuh Hati Yang dapat Terukur Dengan Mengerjakan Pekerjaan Sebaik Baiknya',
                'kriteria_id' => 4,
                'level_minimal' => 4,
                'level_maksimal' => null
            ],
            [
                'nama' => 'Tidak Suka Mengeluh Dalam Melaksanakan Pekerjaan dan Tidak Provokatif',
                'kriteria_id' => 4,
                'level_minimal' => 4,
                'level_maksimal' => null
            ],
            [
                'nama' => 'Memberikan Contoh Yang Baik Kepada Pegawai Lain Baik Dalam Bersikap Maupun dalam Kepatuhan Tata Tertib',
                'kriteria_id' => 4,
                'level_minimal' => 4,
                'level_maksimal' => null
            ],
        ];

        SubKriteria::insert($subKriteria);
    }
}
