<?php

namespace Database\Seeders;

use App\Models\Pegawai;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PegawaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['nip' => 2408085110599, 'nama' => 'Ach Bintang Purnama Hamam, S.Kom', 'divisi_id' => 4, 'unit_kerja_id' => 13, 'jabatan_id' => 8, 'aktif' => true],
            ['nip' => 2011061160579, 'nama' => 'Achmad Abdiansyah', 'divisi_id' => 6, 'unit_kerja_id' => 23, 'jabatan_id' => 9, 'aktif' => true],
            ['nip' => 97, 'nama' => 'Aditya Maulana, S.Kom', 'divisi_id' => 4, 'unit_kerja_id' => 12, 'jabatan_id' => 9, 'aktif' => true],
            ['nip' => 2405081190695, 'nama' => 'Aji Rangkuti,S.Si', 'divisi_id' => 3, 'unit_kerja_id' => 5, 'jabatan_id' => 8, 'aktif' => true],
            ['nip' => 1106014180688, 'nama' => 'Alberto Akbar, S.Kom.', 'divisi_id' => 4, 'unit_kerja_id' => 16, 'jabatan_id' => 9, 'aktif' => true],
            ['nip' => 2101066040100, 'nama' => 'Alifia Putri Rizky Jauhari, S.Kom', 'divisi_id' => 2, 'unit_kerja_id' => 2, 'jabatan_id' => 9, 'aktif' => true],
            // ['nip' => 112, 'nama' => 'Anjelius Karnol Panjaitan', 'divisi_id' => 6, 'unit_kerja_id' => 24, 'jabatan_id' => 9, 'aktif' => true],
            ['nip' => 125, 'nama' => 'Annisa Ardina, S.Kom', 'divisi_id' => 3, 'unit_kerja_id' => 6, 'jabatan_id' => 9, 'aktif' => true],
            ['nip' => 117, 'nama' => 'Annisa Ramadhani, S.Kom', 'divisi_id' => 4, 'unit_kerja_id' => 14, 'jabatan_id' => 9, 'aktif' => true],
            ['nip' => 2301075150995, 'nama' => 'Ardi Candra Lubis, S.Kom', 'divisi_id' => 6, 'unit_kerja_id' => 21, 'jabatan_id' => 9, 'aktif' => true],
            // ['nip' => 110, 'nama' => 'Ari Fachri', 'divisi_id' => 6, 'unit_kerja_id' => 24, 'jabatan_id' => 9, 'aktif' => true],
            ['nip' => 10060110690, 'nama' => 'Arie Shandy, S.Kom.', 'divisi_id' => 4, 'unit_kerja_id' => 16, 'jabatan_id' => 8, 'aktif' => true],
            ['nip' => 903007010468, 'nama' => 'Arnedy Harahap', 'divisi_id' => 3, 'unit_kerja_id' => 7, 'jabatan_id' => 7, 'aktif' => true],
            ['nip' => 1512032250693, 'nama' => 'Astri Syahputri, S.Kom., M.Kom.', 'divisi_id' => 6, 'unit_kerja_id' => 20, 'jabatan_id' => 4, 'aktif' => true],
            ['nip' => 1510000020697, 'nama' => 'Ayuni Sentia, S.Kom', 'divisi_id' => 4, 'unit_kerja_id' => 14, 'jabatan_id' => 8, 'aktif' => true],
            ['nip' => 2208074280501, 'nama' => 'Bagas Aulia Saputra Saragih, S.Kom', 'divisi_id' => 6, 'unit_kerja_id' => 22, 'jabatan_id' => 7, 'aktif' => true],
            ['nip' => 2404080240597, 'nama' => 'Dia Pertiwi, S.Kom', 'divisi_id' => 7, 'unit_kerja_id' => 4, 'jabatan_id' => 8, 'aktif' => true],
            // ['nip' => 104, 'nama' => 'Dodi Febriansyah', 'divisi_id' => 6, 'unit_kerja_id' => 24, 'jabatan_id' => 9, 'aktif' => true],
            ['nip' => 410001230782, 'nama' => 'Edi Susanto, S.Kom.', 'divisi_id' => 4, 'unit_kerja_id' => 15, 'jabatan_id' => 8, 'aktif' => true],
            ['nip' => 116, 'nama' => 'Ega Fatdillah, S.Kom', 'divisi_id' => 4, 'unit_kerja_id' => 14, 'jabatan_id' => 9, 'aktif' => true],
            ['nip' => 1608044310596, 'nama' => 'Eko Wahyudi, S.Kom.', 'divisi_id' => 1, 'unit_kerja_id' => 1, 'jabatan_id' => 9, 'aktif' => true],
            ['nip' => 123, 'nama' => 'Fajar Pratama, S.Kom', 'divisi_id' => 6, 'unit_kerja_id' => 23, 'jabatan_id' => 9, 'aktif' => true],
            ['nip' => 2412086291097, 'nama' => 'Fathiyah Ghina Fauzi, S.Si', 'divisi_id' => 3, 'unit_kerja_id' => 5, 'jabatan_id' => 9, 'aktif' => true],
            ['nip' => 116029202, 'nama' => 'Feri Setiawan, S.Kom., M.Kom', 'divisi_id' => 4, 'unit_kerja_id' => 10, 'jabatan_id' => 6, 'aktif' => true],
            ['nip' => 130, 'nama' => 'Fikramsyah, S.Kom', 'divisi_id' => 5, 'unit_kerja_id' => 18, 'jabatan_id' => 9, 'aktif' => true],
            ['nip' => 114, 'nama' => 'Filza Amimah Toar, S.Kom', 'divisi_id' => 4, 'unit_kerja_id' => 9, 'jabatan_id' => 9, 'aktif' => true],
            ['nip' => 127, 'nama' => 'Fitria Afriani, S.Kom', 'divisi_id' => 4, 'unit_kerja_id' => 13, 'jabatan_id' => 9, 'aktif' => true],
            ['nip' => 126, 'nama' => 'Hafiizh Yaafi Rangkuti', 'divisi_id' => 3, 'unit_kerja_id' => 6, 'jabatan_id' => 9, 'aktif' => true],
            ['nip' => 1510031120596, 'nama' => 'Hamjah Arahman, S.Kom., M.Kom.', 'divisi_id' => 6, 'unit_kerja_id' => 22, 'jabatan_id' => 9, 'aktif' => true],
            ['nip' => 1512035200695, 'nama' => 'Haryo Suro Kuncoro, S.Kom.', 'divisi_id' => 3, 'unit_kerja_id' => 3, 'jabatan_id' => 8, 'aktif' => true],
            ['nip' => 29071995, 'nama' => 'Hendri Padli Manik', 'divisi_id' => 6, 'unit_kerja_id' => 23, 'jabatan_id' => 9, 'aktif' => true],
            ['nip' => 1705000190970, 'nama' => 'Hendri Setiawan, S.T.', 'divisi_id' => 6, 'unit_kerja_id' => 23, 'jabatan_id' => 7, 'aktif' => true],
            ['nip' => 1702000120989, 'nama' => 'Ichsan Firmansyah, S.E.', 'divisi_id' => 6, 'unit_kerja_id' => 21, 'jabatan_id' => 7, 'aktif' => true],
            // ['nip' => 106, 'nama' => 'Irvan Surya', 'divisi_id' => 6, 'unit_kerja_id' => 24, 'jabatan_id' => 9, 'aktif' => true],
            ['nip' => 120900006052000, 'nama' => 'Iskandar Zulkarnain, S.Kom', 'divisi_id' => 6, 'unit_kerja_id' => 21, 'jabatan_id' => 9, 'aktif' => true],
            // ['nip' => 102, 'nama' => 'Jaya Arika', 'divisi_id' => 6, 'unit_kerja_id' => 24, 'jabatan_id' => 8, 'aktif' => true],
            // ['nip' => 108, 'nama' => 'Juna Nurainun', 'divisi_id' => 6, 'unit_kerja_id' => 24, 'jabatan_id' => 9, 'aktif' => true],
            ['nip' => 1212023030191, 'nama' => 'Karina Andriani, S.E.', 'divisi_id' => 2, 'unit_kerja_id' => 2, 'jabatan_id' => 9, 'aktif' => true],
            ['nip' => 124068702, 'nama' => 'Khairi Ibnutama, S.Kom., M.Kom', 'divisi_id' => 4, 'unit_kerja_id' => 9, 'jabatan_id' => 6, 'aktif' => true],
            ['nip' => 2408082170301, 'nama' => 'Liyana Aini Br Sembiring, S.Kom', 'divisi_id' => 3, 'unit_kerja_id' => 7, 'jabatan_id' => 9, 'aktif' => true],
            ['nip' => 2112070230100, 'nama' => 'M. Harun Al-Rasyid, S.Kom', 'divisi_id' => 4, 'unit_kerja_id' => 9, 'jabatan_id' => 9, 'aktif' => true],
            ['nip' => 1510030070194, 'nama' => 'M. Irpandi, S.Kom.', 'divisi_id' => 4, 'unit_kerja_id' => 12, 'jabatan_id' => 8, 'aktif' => true],
            ['nip' => 2408083250904, 'nama' => 'M. Rafly Zahran', 'divisi_id' => 4, 'unit_kerja_id' => 12, 'jabatan_id' => 9, 'aktif' => true],
            ['nip' => 2012064130499, 'nama' => 'M. Yazid, S.Kom', 'divisi_id' => 7, 'unit_kerja_id' => 4, 'jabatan_id' => 9, 'aktif' => true],
            ['nip' => 2308079200597, 'nama' => 'Maulana Azhari Kusuma, S.Kom', 'divisi_id' => 4, 'unit_kerja_id' => 16, 'jabatan_id' => 9, 'aktif' => true],
            ['nip' => 129049301, 'nama' => 'Mhd. Gilang Suryanata, S.Kom., M.Kom', 'divisi_id' => 4, 'unit_kerja_id' => 8, 'jabatan_id' => 3, 'aktif' => true],
            ['nip' => 2011062140172, 'nama' => 'Mohammad Rifai', 'divisi_id' => 6, 'unit_kerja_id' => 23, 'jabatan_id' => 9, 'aktif' => true],
            ['nip' => 118, 'nama' => 'Muhammad  Gymnastiar Habibie', 'divisi_id' => 6, 'unit_kerja_id' => 22, 'jabatan_id' => 9, 'aktif' => true],
            ['nip' => 124, 'nama' => 'Muhammad Al-Fatih Ritonga, S.Kom', 'divisi_id' => 3, 'unit_kerja_id' => 3, 'jabatan_id' => 9, 'aktif' => true],
            ['nip' => 120, 'nama' => 'Muhammad Fachriza', 'divisi_id' => 3, 'unit_kerja_id' => 6, 'jabatan_id' => 9, 'aktif' => true],
            ['nip' => 2412087240100, 'nama' => 'Muhammad Joefitra Zaqy', 'divisi_id' => 4, 'unit_kerja_id' => 16, 'jabatan_id' => 9, 'aktif' => true],
            // ['nip' => 111, 'nama' => 'Muhammad Rafly', 'divisi_id' => 6, 'unit_kerja_id' => 24, 'jabatan_id' => 9, 'aktif' => true],
            ['nip' => 99, 'nama' => 'Muhammad Roihan Nazli Nasution', 'divisi_id' => 3, 'unit_kerja_id' => 6, 'jabatan_id' => 9, 'aktif' => true],
            // ['nip' => 129, 'nama' => 'Muhammad Zuhanda Lubis', 'divisi_id' => 6, 'unit_kerja_id' => 24, 'jabatan_id' => 9, 'aktif' => true],
            ['nip' => 808005220886, 'nama' => 'Nur Paujiah Sari Panggabean, S.Kom.', 'divisi_id' => 6, 'unit_kerja_id' => 21, 'jabatan_id' => 9, 'aktif' => true],
            ['nip' => 120069102, 'nama' => 'Nur Yanti Lumban Gaol, S.Kom., M.Kom', 'divisi_id' => 4, 'unit_kerja_id' => 11, 'jabatan_id' => 6, 'aktif' => true],
            ['nip' => 130038201, 'nama' => 'Nurcahyo Budi Nugroho,S.Kom.,M.Kom', 'divisi_id' => 3, 'unit_kerja_id' => 3, 'jabatan_id' => 6, 'aktif' => true],
            ['nip' => 1105013191180, 'nama' => 'Nurlia, S.Pd', 'divisi_id' => 4, 'unit_kerja_id' => 12, 'jabatan_id' => 9, 'aktif' => true],
            ['nip' => 903008100269, 'nama' => 'Nurwahid', 'divisi_id' => 6, 'unit_kerja_id' => 23, 'jabatan_id' => 9, 'aktif' => true],
            // ['nip' => 109, 'nama' => 'Nurya Depina', 'divisi_id' => 6, 'unit_kerja_id' => 24, 'jabatan_id' => 9, 'aktif' => true],
            ['nip' => 2105067020298, 'nama' => 'Ocha Sugiarto, S.Kom.', 'divisi_id' => 6, 'unit_kerja_id' => 21, 'jabatan_id' => 9, 'aktif' => true],
            ['nip' => 126039201, 'nama' => 'Puji Sari Ramadhan, S.Kom., M.Kom.', 'divisi_id' => 3, 'unit_kerja_id' => 25, 'jabatan_id' => 2, 'aktif' => true],
            ['nip' => 131, 'nama' => 'Rizqi Fathi Zahran', 'divisi_id' => 5, 'unit_kerja_id' => 18, 'jabatan_id' => 9, 'aktif' => true],
            ['nip' => 1711000031117, 'nama' => 'Roki Gunawan Harahap', 'divisi_id' => 6, 'unit_kerja_id' => 23, 'jabatan_id' => 9, 'aktif' => true],
            ['nip' => 2112071310300, 'nama' => 'Saif Ikbari Anwar', 'divisi_id' => 4, 'unit_kerja_id' => 15, 'jabatan_id' => 9, 'aktif' => true],
            ['nip' => 1705048190571, 'nama' => 'Satriyawan', 'divisi_id' => 6, 'unit_kerja_id' => 23, 'jabatan_id' => 9, 'aktif' => true],
            // ['nip' => 107, 'nama' => 'Sri Wahyuni Lubis', 'divisi_id' => 6, 'unit_kerja_id' => 24, 'jabatan_id' => 9, 'aktif' => true],
            ['nip' => 1707000100371, 'nama' => 'Sudarmaji', 'divisi_id' => 6, 'unit_kerja_id' => 23, 'jabatan_id' => 9, 'aktif' => true],
            ['nip' => 128, 'nama' => 'Tria Khairunisa, S.Kom', 'divisi_id' => 5, 'unit_kerja_id' => 19, 'jabatan_id' => 9, 'aktif' => true],
            ['nip' => 2408084240589, 'nama' => 'Umar Rasyid Muin', 'divisi_id' => 6, 'unit_kerja_id' => 23, 'jabatan_id' => 9, 'aktif' => true],
            ['nip' => 120089101, 'nama' => 'Usti Fatimah Sari Sitorus Pane, S.Kom., M.Kom', 'divisi_id' => 5, 'unit_kerja_id' => 17, 'jabatan_id' => 5, 'aktif' => true],
            ['nip' => 115, 'nama' => 'Vicky Euro Maulana, S.Kom', 'divisi_id' => 4, 'unit_kerja_id' => 13, 'jabatan_id' => 9, 'aktif' => true],
            // ['nip' => 103, 'nama' => 'Weni Fionika', 'divisi_id' => 6, 'unit_kerja_id' => 24, 'jabatan_id' => 9, 'aktif' => true],
            ['nip' => 120098903, 'nama' => 'Zaimah Panjaitan, S.Kom., M.Kom', 'divisi_id' => 7, 'unit_kerja_id' => 4, 'jabatan_id' => 6, 'aktif' => true],
            ['nip' => 13101980, 'nama' => 'Zainul Arifin Dalimunthe', 'divisi_id' => 6, 'unit_kerja_id' => 23, 'jabatan_id' => 9, 'aktif' => true],
            ['nip' => 10101010101, 'nama' => 'Ketua Yayasan', 'divisi_id' => 1, 'unit_kerja_id' => 26, 'jabatan_id' => 1, 'aktif' => true],
            ['nip' => 20202020202, 'nama' => 'Bendahara YBKS', 'divisi_id' => 2, 'unit_kerja_id' => 27, 'jabatan_id' => 10, 'aktif' => true],
            ['nip' => 30303030303, 'nama' => 'Kaprodi SI', 'divisi_id' => 4, 'unit_kerja_id' => 9, 'jabatan_id' => 6, 'aktif' => true],
            ['nip' => 40404040404, 'nama' => 'Kasubid Digital Marketing', 'divisi_id' => 3, 'unit_kerja_id' => 8, 'jabatan_id' => 10, 'aktif' => true],
            ['nip' => 132, 'nama' => 'Inayyah Fitri', 'divisi_id' => 4, 'unit_kerja_id' => 14, 'jabatan_id' => 9, 'aktif' => true],
        ];

        Pegawai::insert($data);
    }
}
