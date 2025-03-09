@extends('layouts.app')

@section('title', 'Hasil Akhir Penilaian')

@section('content')
    <h1 class="h3">Hasil Akhir Penilaian</h1>
    <p>Periode {{ $hasilKpi->first()->periode->bulan . ' ' . $hasilKpi->first()->periode->tahun }}</p>

    <div id="toolbar">
        <a href="{{ route('hasil.kpi.cetak', [$hasilKpi->first()->periode_id, 5]) }}" class="btn btn-primary btn-icon-text">
            <i class="mdi mdi-printer btn-icon-prepend"></i> Cetak Laporan
        </a>
    </div>

    <table data-toggle="table" data-pagination="true" data-search="true" data-toolbar="#toolbar">
        <thead>
            <tr>
                <th rowspan="2" data-field="id" data-sortable="true">No</th>
                <th rowspan="2" data-field="nama" data-sortable="true">Nama</th>
                <th rowspan="2" data-field="divisi" data-sortable="true">Divisi</th>
                <th rowspan="2" data-field="unit_kerja" data-sortable="true">Unit Kerja</th>
                <th colspan="2">Nilai Berdasarkan Pimpinan</th>
                <th rowspan="2" data-field="total_nilai" data-sortable="true">Total Nilai
                </th>
                <th rowspan="2" data-field="nilai_kedisiplinan" data-sortable="true">Nilai
                    Kedisiplinan</th>
                <th rowspan="2" data-field="grand_total" data-sortable="true">Grand Total
                </th>
            </tr>
            <tr>
                <th data-field="nilai_oleh_satu" data-sortable="true">Ketua YBKS/Ketua Stmik/Bendahara YBKS/Waka/KA.
                    Pusdatin</th>
                <th data-field="nilai_oleh_dua" data-sortable="true">Kaprodi/Kabid/Kasubid</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($hasilKpi as $item)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $item->pegawai->nama ?? '-' }}</td>
                    <td>{{ $item->pegawai->divisi->nama ?? '-' }}</td>
                    <td>{{ $item->pegawai->unitKerja->nama ?? '-' }}</td>
                    <td>{{ $item->nilai_oleh_satu ?? '-' }}</td>
                    <td>{{ $item->nilai_oleh_dua ?? '-' }}</td>
                    @php
                        $total_nilai = 0;
                        if ($item->nilai_oleh_satu && $item->nilai_oleh_dua) {
                            $total_nilai = ($item->nilai_oleh_satu + $item->nilai_oleh_dua) / 2;
                        } else {
                            if ($item->nilai_oleh_satu) {
                                $total_nilai = $item->nilai_oleh_satu;
                            } else {
                                $total_nilai = $item->nilai_oleh_dua;
                            }
                        }
                        $grand_total = ($item->nilai_kedisiplinan + $total_nilai) / 2;
                    @endphp
                    <td>{{ $total_nilai }}</td>
                    <td>{{ $item->nilai_kedisiplinan ?? '-' }}</td>
                    <td>{{ $grand_total }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
