@extends('layouts.app')

@section('title', 'Detail Hasil Penilaian')

@section('content')
    <h1 class="h3">Detail Hasil Penilaian</h1>
    <p>Halaman untuk menampilkan detail hasil penilaian</p>

    <table data-toggle="table" data-pagination="true" data-search="true">
        <thead>
            <tr>
                <th data-field="id" data-sortable="true">No</th>
                <th data-field="nama" data-sortable="true">Nama</th>
                <th data-field="divisi" data-sortable="true">Divisi</th>
                <th data-field="nilai_oleh_satu" data-sortable="true">Nilai 1</th>
                <th data-field="nilai_oleh_dua" data-sortable="true">Nilai 2</th>
                <th data-field="total_nilai" data-sortable="true">Total Nilai</th>
                {{-- <th>Action</th> --}}
            </tr>
        </thead>
        <tbody>
            @foreach ($hasilKpi as $item)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $item->pegawai->nama }}</td>
                    <td>{{ $item->pegawai->divisi->nama }}</td>
                    <td>{{ $item->nilai_oleh_satu ?? '-' }}</td>
                    <td>{{ $item->nilai_oleh_dua ?? '-' }}</td>
                    <td>{{ $item->total_nilai }}</td>
                    {{-- <td>
                        <a href="{{ route('hasil.show', $item->id) }}" class="badge badge-primary text-decoration-none">
                            <i class="icon-eye"></i>
                        </a>
                        <a href="{{ route('hasil.edit', $item->id) }}" class="badge badge-warning text-decoration-none">
                            <i class="icon-note"></i>
                        </a>
                    </td> --}}
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
