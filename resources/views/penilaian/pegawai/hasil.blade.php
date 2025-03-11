@extends('layouts.app')

@section('title', 'Hasil Penilaian Pegawai')

@section('content')
    <h1 class="h3">Hasil Penilaian Pegawai</h1>
    <p>Halaman untuk melihat hasil kpi pegawai</p>
    <p>{{ $penilaians->first()->periode->keterangan }}</p>

    <x-alert />

    <table data-toggle="table" data-pagination="true" data-search="true">
        <thead>
            <tr>
                <th data-field="nama" data-sortable="true">Nama Pegawai</th>
                <th data-field="skor" data-sortable="true">Skor</th>
                <th data-field="catatan">Catatan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($penilaians as $penilaian)
                <tr>
                    <td>{{ $penilaian->dinilai->nama }}</td>
                    <td>
                        @if ($penilaian->hasilPenilaian->penilai_satu_id == Auth::user()->id)
                            {{ $penilaian->hasilPenilaian->nilai_oleh_satu }}
                        @endif
                        @if ($penilaian->hasilPenilaian->penilai_dua_id == Auth::user()->id)
                            {{ $penilaian->hasilPenilaian->nilai_oleh_dua }}
                        @endif
                    </td>
                    <td>{{ $penilaian->catatan }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{ route('penilaian.index', $penilaians->first()->periode_id) }}" class="btn btn-light">Kembali</a>
@endsection
