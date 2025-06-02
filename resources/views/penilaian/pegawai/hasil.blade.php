@extends('layouts.app')

@section('title', 'Hasil Penilaian Pegawai')

@section('content')
    <h1 class="h3">Hasil Penilaian Pegawai</h1>
    <p>Halaman untuk melihat hasil kpi pegawai</p>
    <p>{{ $hasils->first()->periode->keterangan }}</p>

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
            @foreach ($hasils as $hasil)
                <tr>
                    <td>{{ $hasil->dinilai->nama }}</td>
                    <td>
                        @if ($hasil->penilai_satu_id == Auth::user()->pegawai->id)
                            {{ $hasil->nilai_oleh_satu }}
                        @endif

                        @if ($hasil->penilai_dua_id == Auth::user()->pegawai->id)
                            {{ $hasil->nilai_oleh_dua }}
                        @endif
                    </td>
                    <td>
                        {{ $hasil->catatanSaya->catatan ?? '-' }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{ route('penilaian.index', $hasils->first()->periode_id) }}" class="btn btn-light">Kembali</a>
@endsection
