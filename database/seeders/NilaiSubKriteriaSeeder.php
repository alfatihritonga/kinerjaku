<?php

namespace Database\Seeders;

use App\Models\NilaiSubKriteria;
use App\Models\SubKriteria;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NilaiSubKriteriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $sub = SubKriteria::first(); // ambil satu dulu buat testing

        // foreach ([4, 3, 2, 1] as $nilai) {
        //     NilaiSubKriteria::create([
        //         'sub_kriteria_id' => $sub->id,
        //         'nilai' => $nilai,
        //         'keterangan' => "Contoh keterangan untuk nilai {$nilai} pada subkriteria {$sub->nama}",
        //     ]);
        // }

        $data = [
            [
                'sub_kriteria_id' => 1,
                'nilai' => 4,
                'keterangan' => "Seluruh program kerja bulanan dilaksanakan 100% tepat waktu sesuai agenda tanpa ada keterlambatan.",
            ],
            [
                'sub_kriteria_id' => 1,
                'nilai' => 3,
                'keterangan' => "Sebagian besar program kerja (sekitar 80–99%) dilaksanakan tepat waktu, hanya terdapat sedikit keterlambatan yang tidak signifikan.",
            ],
            [
                'sub_kriteria_id' => 1,
                'nilai' => 2,
                'keterangan' => "Sekitar 60–79% program kerja dilaksanakan tepat waktu, terdapat beberapa keterlambatan yang cukup memengaruhi capaian agenda.",
            ],
            [
                'sub_kriteria_id' => 1,
                'nilai' => 1,
                'keterangan' => "Kurang dari 60% program kerja dilaksanakan tepat waktu, banyak keterlambatan yang berdampak besar pada capaian agenda.",
            ],
            [
                'sub_kriteria_id' => 2,
                'nilai' => 4,
                'keterangan' => "Tidak ada keluhan sama sekali yang masuk melalui form pengaduan layanan selama periode penilaian.",
            ],
            [
                'sub_kriteria_id' => 2,
                'nilai' => 3,
                'keterangan' => "Terdapat 1–2 keluhan ringan, namun segera ditindaklanjuti dan diselesaikan tanpa dampak besar.",
            ],
            [
                'sub_kriteria_id' => 2,
                'nilai' => 2,
                'keterangan' => "Terdapat 3–5 keluhan, beberapa di antaranya berulang atau memerlukan waktu penyelesaian yang lebih lama.",
            ],
            [
                'sub_kriteria_id' => 2,
                'nilai' => 1,
                'keterangan' => "Terdapat lebih dari 5 keluhan, belum seluruhnya tertangani dengan baik, atau ada keluhan serius yang berdampak pada layanan.",
            ],
            [
                'sub_kriteria_id' => 3,
                'nilai' => 4,
                'keterangan' => "Pelayanan diberikan dengan ramah, cepat, tepat, responsif, dan memenuhi/ melebihi harapan semua pihak; lalu mendapat umpan balik positif secara konsisten.",
            ],
            [
                'sub_kriteria_id' => 3,
                'nilai' => 3,
                'keterangan' => "Pelayanan umumnya baik dan memuaskan, dengan respons yang cukup cepat dan sikap profesional; ada beberapa saran perbaikan kecil dari pengguna layanan.",
            ],
            [
                'sub_kriteria_id' => 3,
                'nilai' => 2,
                'keterangan' => "Pelayanan diberikan secara standar, namun ada keterlambatan, kurang responsif, atau komunikasi kurang maksimal; umpan balik menunjukkan adanya ruang perbaikan.",
            ],
            [
                'sub_kriteria_id' => 3,
                'nilai' => 1,
                'keterangan' => "Pelayanan kurang memadai, sering terlambat, tidak ramah, atau tidak sesuai dengan kebutuhan pengguna layanan; banyak keluhan atau ketidakpuasan.",
            ],
            [
                'sub_kriteria_id' => 4,
                'nilai' => 4,
                'keterangan' => "Selalu menjalin komunikasi yang efektif, terbuka, sopan, dan konstruktif dengan seluruh anggota tim lalu aktif dalam koordinasi dan kolaborasi.",
            ],
            [
                'sub_kriteria_id' => 4,
                'nilai' => 3,
                'keterangan' => "Komunikasi umumnya lancar, terbuka, dan saling menghargai; aktif dalam diskusi tim namun sesekali perlu dorongan untuk berkoordinasi.",
            ],
            [
                'sub_kriteria_id' => 4,
                'nilai' => 2,
                'keterangan' => "Komunikasi berjalan namun kurang konsisten, kadang kurang terbuka atau kurang inisiatif dalam koordinasi; masih bisa ditingkatkan.",
            ],
            [
                'sub_kriteria_id' => 4,
                'nilai' => 1,
                'keterangan' => "Komunikasi tidak efektif, sering terjadi miskomunikasi, pasif dalam kerja tim, atau bahkan menimbulkan konflik antar rekan kerja.",
            ],
            [
                'sub_kriteria_id' => 5,
                'nilai' => 4,
                'keterangan' => "Secara konsisten menunjukkan sikap teladan, bertanggung jawab, tegas namun bijak, mampu memotivasi dan mengarahkan tim, serta dihormati oleh rekan kerja.",
            ],
            [
                'sub_kriteria_id' => 5,
                'nilai' => 3,
                'keterangan' => "Menunjukkan sikap kepemimpinan yang positif dan stabil, mampu mengambil keputusan dengan baik dan adil, serta menjadi panutan dalam banyak situasi.",
            ],
            [
                'sub_kriteria_id' => 5,
                'nilai' => 2,
                'keterangan' => "Kadang-kadang menunjukkan sikap kepemimpinan, namun belum konsisten; masih perlu penguatan dalam hal ketegasan, pengambilan keputusan, atau pengaruh terhadap tim.",
            ],
            [
                'sub_kriteria_id' => 5,
                'nilai' => 1,
                'keterangan' => "Kurang menunjukkan jiwa kepemimpinan, sering menghindari tanggung jawab, tidak menjadi teladan, dan kurang mampu membimbing atau mengarahkan orang lain.",
            ],
            [
                'sub_kriteria_id' => 6,
                'nilai' => 4,
                'keterangan' => "Secara aktif dan tepat dalam mendelegasikan tugas sesuai dengan kemampuan anggota tim; mampu memantau, memberi arahan, dan memastikan hasil sesuai target.",
            ],
            [
                'sub_kriteria_id' => 6,
                'nilai' => 3,
                'keterangan' => "Mendelegasikan tugas dengan cukup baik, sesuai porsi dan kebutuhan, meskipun terkadang masih perlu arahan lanjutan untuk optimalisasi hasil.",
            ],
            [
                'sub_kriteria_id' => 6,
                'nilai' => 2,
                'keterangan' => "Mendelegasikan tugas, namun belum merata atau belum tepat sasaran; hasil kerja tim belum optimal dan pengawasan masih minim.",
            ],
            [
                'sub_kriteria_id' => 6,
                'nilai' => 1,
                'keterangan' => "Tidak mampu atau enggan mendelegasikan tugas, cenderung mengerjakan sendiri atau salah sasaran dalam pembagian kerja; berdampak pada pencapaian fungsi divisi.",
            ],
            [
                'sub_kriteria_id' => 7,
                'nilai' => 4,
                'keterangan' => "Proaktif dan sigap dalam mengidentifikasi serta menyelesaikan masalah dengan berkoordinasi intensif dan efektif dengan atasan; solusi yang diambil tepat dan berdampak positif.",
            ],
            [
                'sub_kriteria_id' => 7,
                'nilai' => 3,
                'keterangan' => "Mampu mengatasi sebagian besar masalah divisi dengan baik dan berkoordinasi secara tepat waktu dengan atasan saat diperlukan.",
            ],
            [
                'sub_kriteria_id' => 7,
                'nilai' => 2,
                'keterangan' => "Kadang-kadang mengatasi masalah sendiri tanpa melibatkan atasan, atau terlambat dalam berkoordinasi, sehingga solusi kurang maksimal.",
            ],
            [
                'sub_kriteria_id' => 7,
                'nilai' => 1,
                'keterangan' => "Tidak mampu mengatasi masalah secara efektif, jarang atau enggan berkoordinasi dengan atasan, menyebabkan masalah berlarut-larut atau membesar.",
            ],
            [
                'sub_kriteria_id' => 8,
                'nilai' => 4,
                'keterangan' => "Selalu menunjukkan sikap taat, loyal, dan menghormati arahan atasan; menjalankan tugas sesuai fungsi jabatan tanpa penyimpangan.",
            ],
            [
                'sub_kriteria_id' => 8,
                'nilai' => 3,
                'keterangan' => "Umumnya patuh dan menjalankan instruksi atasan dengan baik, meskipun sesekali perlu klarifikasi lebih lanjut terhadap perintah yang diberikan.",
            ],
            [
                'sub_kriteria_id' => 8,
                'nilai' => 2,
                'keterangan' => "Terkadang kurang patuh atau lambat merespon arahan atasan; belum sepenuhnya menjalankan fungsi jabatan dengan konsisten.",
            ],
            [
                'sub_kriteria_id' => 8,
                'nilai' => 1,
                'keterangan' => "Sering mengabaikan instruksi atasan, tidak menjalankan tugas sesuai fungsi jabatan, dan menunjukkan sikap yang kurang kooperatif.",
            ],
            [
                'sub_kriteria_id' => 9,
                'nilai' => 4,
                'keterangan' => "Selalu patuh dan siap melaksanakan semua tugas tambahan dari atasan, termasuk kegiatan/event mendadak, dengan penuh tanggung jawab dan inisiatif.",
            ],
            [
                'sub_kriteria_id' => 9,
                'nilai' => 3,
                'keterangan' => "Umumnya menjalankan perintah atasan dengan baik, termasuk dalam kegiatan atau event, meskipun terkadang masih butuh pengarahan tambahan.",
            ],
            [
                'sub_kriteria_id' => 9,
                'nilai' => 2,
                'keterangan' => "Kurang konsisten dalam melaksanakan tugas tambahan; kadang terlambat atau kurang antusias dalam mendukung event/kegiatan jabatan.",
            ],
            [
                'sub_kriteria_id' => 9,
                'nilai' => 1,
                'keterangan' => "Sering menolak atau mengabaikan tugas tambahan dari atasan, termasuk event, dan menunjukkan kurangnya komitmen terhadap peran dan tanggung jawabnya.",
            ],
            [
                'sub_kriteria_id' => 10,
                'nilai' => 4,
                'keterangan' => "Selalu mematuhi seluruh peraturan dan tata tertib yang berlaku, tidak pernah melakukan pelanggaran, serta menjadi teladan bagi rekan kerja.",
            ],
            [
                'sub_kriteria_id' => 10,
                'nilai' => 3,
                'keterangan' => "Umumnya mematuhi aturan dan tata tertib, meskipun ada pelanggaran kecil yang tidak disengaja dan segera diperbaiki.",
            ],
            [
                'sub_kriteria_id' => 10,
                'nilai' => 2,
                'keterangan' => "Beberapa kali melanggar peraturan atau tata tertib, meskipun sudah diingatkan; menunjukkan kurangnya kedisiplinan.",
            ],
            [
                'sub_kriteria_id' => 10,
                'nilai' => 1,
                'keterangan' => "Sering melanggar aturan, tidak menunjukkan itikad memperbaiki diri, dan berpotensi mengganggu ketertiban kerja.",
            ],
            [
                'sub_kriteria_id' => 11,
                'nilai' => 4,
                'keterangan' => "Selalu mematuhi SOP yang berlaku dengan konsisten, tanpa ada penyimpangan, serta menjaga standar kerja yang telah ditetapkan.",
            ],
            [
                'sub_kriteria_id' => 11,
                'nilai' => 3,
                'keterangan' => "Mematuhi SOP dengan baik, meskipun ada sedikit penyimpangan yang tidak signifikan, namun segera diperbaiki dan tidak mengganggu kualitas kerja.",
            ],
            [
                'sub_kriteria_id' => 11,
                'nilai' => 2,
                'keterangan' => "Terkadang tidak mematuhi SOP dengan konsisten, kadang melakukan penyimpangan yang dapat mempengaruhi kualitas atau hasil kerja.",
            ],
            [
                'sub_kriteria_id' => 11,
                'nilai' => 1,
                'keterangan' => "Sering melanggar SOP, tidak mengikuti prosedur yang ada, atau bahkan mengabaikan pentingnya SOP dalam pekerjaan, yang berdampak pada kualitas atau efektivitas kerja.",
            ],
            [
                'sub_kriteria_id' => 12,
                'nilai' => 4,
                'keterangan' => "Selalu aktif mengikuti kegiatan keagamaan dan menjaga perilaku sesuai ajaran agama dalam setiap aktivitas kampus.",
            ],
            [
                'sub_kriteria_id' => 12,
                'nilai' => 3,
                'keterangan' => "Mengikuti sebagian besar kegiatan keagamaan dan berusaha menjaga norma agama dalam kehidupan kampus.",
            ],
            [
                'sub_kriteria_id' => 12,
                'nilai' => 2,
                'keterangan' => "Kadang mengikuti kegiatan keagamaan, namun belum konsisten menjaga norma agama di kampus.",
            ],
            [
                'sub_kriteria_id' => 12,
                'nilai' => 1,
                'keterangan' => "Jarang atau tidak pernah mengikuti kegiatan keagamaan dan sering mengabaikan norma-norma agama di kampus.",
            ],
            [
                'sub_kriteria_id' => 13,
                'nilai' => 4,
                'keterangan' => "Sangat baik dalam memberikan ide dan mengerjakan pekerjaan.",
            ],
            [
                'sub_kriteria_id' => 13,
                'nilai' => 3,
                'keterangan' => "Baik dalam memberikan pekerjaan tetapi tidak memberikan ide.",
            ],
            [
                'sub_kriteria_id' => 13,
                'nilai' => 2,
                'keterangan' => "Cukup dalam memberikan ide tetapi tidak mengerjakan pekerjaan.",
            ],
            [
                'sub_kriteria_id' => 13,
                'nilai' => 1,
                'keterangan' => "Tidak baik dalam memberikan ide dan tidak mengerjakan pekerjaan.",
            ],
            [
                'sub_kriteria_id' => 14,
                'nilai' => 4,
                'keterangan' => "Sangat baik untuk memberikan solusi.",
            ],
            [
                'sub_kriteria_id' => 14,
                'nilai' => 3,
                'keterangan' => "Baik dalam memberikan solusi.",
            ],
            [
                'sub_kriteria_id' => 14,
                'nilai' => 2,
                'keterangan' => "Cukup untuk memberikan solusi.",
            ],
            [
                'sub_kriteria_id' => 14,
                'nilai' => 1,
                'keterangan' => "Tidak Baik dalam memberikan solusi.",
            ],
            [
                'sub_kriteria_id' => 15,
                'nilai' => 4,
                'keterangan' => "Sangat baik dalam menyelesaikan pekerjaan dengan penuh tanggung jawab dan hasil terbaik.",
            ],
            [
                'sub_kriteria_id' => 15,
                'nilai' => 3,
                'keterangan' => "Baik dalam mengerjakan tugas.",
            ],
            [
                'sub_kriteria_id' => 15,
                'nilai' => 2,
                'keterangan' => "Cukup dalam mengerjakan tugas seadanya agar cepat selesai.",
            ],
            [
                'sub_kriteria_id' => 15,
                'nilai' => 1,
                'keterangan' => "Tidak baik dan menyerahkan semua pekerjaan kepada orang lain serta menunda pekerjaan.",
            ],
            [
                'sub_kriteria_id' => 16,
                'nilai' => 4,
                'keterangan' => "Melaksanakan pekerjaan dengan ikhlas tanpa mengeluh, serta menjaga suasana tetap kondusif tanpa memprovokasi orang lain.",
            ],
            [
                'sub_kriteria_id' => 16,
                'nilai' => 3,
                'keterangan' => "Kadang merasa lelah tetapi tetap menyelesaikan tugas dengan baik dan tidak menyulut konflik.",
            ],
            [
                'sub_kriteria_id' => 16,
                'nilai' => 2,
                'keterangan' => "Sering mengeluh saat bekerja dan kadang berbicara dengan nada yang dapat menimbulkan ketegangan.",
            ],
            [
                'sub_kriteria_id' => 16,
                'nilai' => 1,
                'keterangan' => "Sering mengeluh, menolak tugas, dan memprovokasi rekan kerja saat ada ketidaksepakatan.",
            ],
            [
                'sub_kriteria_id' => 17,
                'nilai' => 4,
                'keterangan' => "Selalu bersikap sopan, disiplin, dan menjadi contoh positif dalam menaati semua aturan yang berlaku di lingkungan kerja.",
            ],
            [
                'sub_kriteria_id' => 17,
                'nilai' => 3,
                'keterangan' => "Umumnya bersikap baik dan mematuhi tata tertib, meskipun sesekali perlu diingatkan.",
            ],
            [
                'sub_kriteria_id' => 17,
                'nilai' => 2,
                'keterangan' => "Terkadang menunjukkan sikap yang baik, namun sering lupa atau lalai dalam menaati aturan.",
            ],
            [
                'sub_kriteria_id' => 17,
                'nilai' => 1,
                'keterangan' => "Sering melanggar tata tertib dan bersikap tidak pantas, serta memberi pengaruh negatif kepada rekan kerja.",
            ],
        ];

        NilaiSubKriteria::insert($data);
    }
}
