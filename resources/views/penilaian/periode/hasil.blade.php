@extends('layouts.app')

@section('title', 'Hasil Penilaian Pegawai')

@section('content')
    <h1 class="h3">Hasil Penilaian Pegawai</h1>
    <p>Halaman untuk melihat hasil kpi pegawai</p>

    <x-alert />

    <table data-toggle="table" data-pagination="true" data-search="true">
        <thead>
            <tr>
                <th data-field="no" data-sortable="true">No</th>
                <th data-field="bulan" data-sortable="true">Bulan</th>
                <th data-field="tahun">Tahun</th>
                <th data-field="action">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($periode as $item)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $item->bulan }}</td>
                    <td>{{ $item->tahun }}</td>
                    <td>
                        <a href="{{ route('penilaian.hasil', $item->id) }}" class="badge badge-primary text-decoration-none">
                            Lihat Hasil
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{ route('home') }}" class="btn btn-light">Kembali</a>
@endsection
