@extends('layouts.app')

@section('title', 'Hasil Akhir Penilaian')

@section('content')
    <h1 class="h3">Hasil Akhir Penilaian</h1>
    <p>Periode {{ $hasilKpi->first()->periode->bulan . ' ' . $hasilKpi->first()->periode->tahun }}</p>

    <div id="toolbar">
        <a href="{{ route('hasil.kpi.cetak', [$hasilKpi->first()->periode_id, $level]) }}"
            class="btn btn-primary btn-icon-text">
            <i class="mdi mdi-printer btn-icon-prepend"></i> Cetak
        </a>
        <a href="{{ route('export.hasil.kpi', ['periode_id' => $hasilKpi->first()->periode_id, 'level' => $level]) }}"
            class="btn btn-success btn-icon-text">
            <i class="mdi mdi-microsoft-excel btn-icon-prepend"></i> Ekspor
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
                <th rowspan="2" data-field="total_nilai" data-sortable="true">Total Nilai</th>
                <th rowspan="2" data-field="nilai_kedisiplinan" data-sortable="true">NilaiKedisiplinan</th>
                <th rowspan="2" data-field="grand_total" data-sortable="true">Grand Total</th>
                <th rowspan="2" data-field="catatan_satu" data-sortable="true">
                    {{ $level == 5 ? 'Catatan Ketua' : 'Catatan Ketua YBKS/Ketua Stmik/Bendahara YBKS/Waka/KA. Pusdatin' }}</th>
                </th>
                <th rowspan="2" data-field="catatan_dua" data-sortable="true">
                    {{ $level == 5 ? 'Catatan Waka' : 'Catatan Kaprodi/Kabid/Kasubid' }}
                </th>
            </tr>
            <tr>
                <th data-field="nilai_oleh_satu" data-sortable="true">
                    {{ $level == 5 ? 'Ketua' : 'Ketua YBKS/Ketua Stmik/Bendahara YBKS/Waka/KA. Pusdatin' }}</th>
                <th data-field="nilai_oleh_dua" data-sortable="true">
                    {{ $level == 5 ? 'Waka' : 'Kaprodi/Kabid/Kasubid' }}
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($hasilKpi as $item)
                @php
                    $nilai_1 = ($item->nilai_oleh_satu == 0 || is_null($item->nilai_oleh_satu)) ? 0 : $item->nilai_oleh_satu;
                    $nilai_2 = ($item->nilai_oleh_dua == 0 || is_null($item->nilai_oleh_dua)) ? 0 : $item->nilai_oleh_dua;
                    $rata_nilai = ($nilai_1 > 0 && $nilai_2 > 0) ? ($nilai_1 + $nilai_2) / 2 : ($nilai_1 ?: $nilai_2); // pakai nilai yang ada
                    $nilai_kedisiplinan = $item->nilai_kedisiplinan ?? 0;
                    $grand_total = ($rata_nilai + $nilai_kedisiplinan) / 2;
                @endphp
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $item->pegawai->nama ?? '-' }}</td>
                    <td>{{ $item->pegawai->divisi->nama ?? '-' }}</td>
                    <td>{{ $item->pegawai->unitKerja->nama ?? '-' }}</td>
                    <td>{{ $nilai_1 > 0 ? number_format($nilai_1, 2) : '-' }}</td>
                    <td>{{ $nilai_2 > 0 ? number_format($nilai_2, 2) : '-' }}</td>
                    <td>{{ $rata_nilai > 0 ? number_format($rata_nilai, 2) : '-' }}</td>
                    <td>{{ $nilai_kedisiplinan > 0 ? number_format($nilai_kedisiplinan, 2) : '-' }}</td>
                    <td>{{ $grand_total > 0 ? number_format($grand_total, 2) : '-' }}</td>
                    <td>{{ $item->catatan_penilai_satu ?? '-' }}</td>
                    <td>{{ $item->catatan_penilai_dua ?? '-' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{ route('hasil.index') }}" class="btn btn-light">Kembali</a>
@endsection
