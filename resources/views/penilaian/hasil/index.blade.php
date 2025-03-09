@extends('layouts.app')

@section('title', 'Hasil Penilaian')

@section('content')
    <h1 class="h3">Hasil Penilaian</h1>
    <p>Halaman untuk mengelola hasil penilaian</p>

    <table data-toggle="table" data-pagination="true" data-search="true">
        <thead>
            <tr>
                <th data-field="id" data-sortable="true">No</th>
                <th data-field="bulan" data-sortable="true">Bulan</th>
                <th data-field="tahun" data-sortable="true">Tahun</th>
                <th>Hasil Akhir</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($periode as $item)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $item->bulan }}</td>
                    <td>{{ $item->tahun }}</td>
                    <td>
                        <a href="{{ route('hasil.kpi', [$item->id, 4]) }}" class="badge badge-primary text-decoration-none">
                            Kasubid
                        </a>
                        <a href="{{ route('hasil.kpi', [$item->id, 5]) }}" class="badge badge-primary text-decoration-none">
                            Staff
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
