<?php

namespace App\Exports;

use App\Models\KpiHasil;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\BeforeSheet;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class KpiHasilExport implements FromCollection, WithHeadings, WithMapping, WithStyles, WithEvents, WithCustomStartCell
{
    protected $periodeId;
    protected $level;
    protected $rowNumber = 1;

    public function __construct($periodeId, $level)
    {
        $this->periodeId = $periodeId;
        $this->level = $level;
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $level = $this->level;

        return KpiHasil::with(['pegawai.jabatan', 'periode', 'penilaiSatu', 'penilaiDua'])
            ->where('periode_id', $this->periodeId)
            ->whereHas('pegawai.jabatan', function ($q) use ($level) {
                $q->where('level', $level);
            })
            ->orderByRaw('(((COALESCE(nilai_oleh_satu, 0) + COALESCE(nilai_oleh_dua, 0)) / 2) + COALESCE(nilai_kedisiplinan, 0)) / 2 desc')
            ->get();
    }


    public function map($kpiHasil): array
    {
        return [
            $this->rowNumber++,
            $kpiHasil->pegawai->nama ?? '-',
            $kpiHasil->penilaiSatu->nama ?? '-',
            $kpiHasil->nilai_oleh_satu ?? '-',
            $kpiHasil->catatan_penilai_satu ?? '-',
            $kpiHasil->penilaiDua->nama ?? '-',
            $kpiHasil->nilai_oleh_dua ?? '-',
            $kpiHasil->catatan_penilai_dua ?? '-',
            $kpiHasil->nilai_kedisiplinan ?? '-',
        ];
    }

    public function headings(): array
    {
        return [
            'No',
            'Nama',
            'Penilai 1',
            'Nilai Penilai 1',
            'Catatan Penilai 1',
            'Penilai 2',
            'Nilai Penilai 2',
            'Catatan Penilai 2',
            'Nilai Kedisiplinan',
        ];
    }

    // Tambahkan styles
    public function styles(Worksheet $sheet)
    {
        return [
            4 => ['font' => ['bold' => true]], // Baris 4 = header
        ];
    }

    public function registerEvents(): array
    {
        return [
            BeforeSheet::class => function (BeforeSheet $event) {
                $sheet = $event->getSheet()->getDelegate();

                // Baris 2 (merge A2:J2 dan isi judul)
                $sheet->mergeCells('A2:J2');
                $sheet->setCellValue('A2', 'Laporan Hasil KPI Periode ' . optional($this->getPeriode())->bulan . ' ' . optional($this->getPeriode())->tahun);

                // Style: bold + center
                $sheet->getStyle('A2')->getFont()->setBold(true);
                $sheet->getStyle('A2')->getAlignment()->setHorizontal('center');

                // ⬇️ Set lebar kolom berdasarkan panjang konten header
                $headings = $this->headings();
                $colIndex = 'A';

                foreach ($headings as $heading) {
                    $sheet->getColumnDimension($colIndex)->setWidth(strlen($heading) + 5); // +5 biar lega
                    $colIndex++;
                }
            },
        ];
    }

    public function startCell(): string
    {
        return 'A4'; // Data akan mulai dari sini
    }

    protected function getPeriode()
    {
        return \App\Models\PeriodePenilaian::find($this->periodeId);
    }
}
