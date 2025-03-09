@extends('layouts.app')

@section('title', 'Nilai Kedisiplinan')

@section('content')
    <h1 class="h3">Nilai Kedisiplinan</h1>
    <p>Halaman untuk mengelola nilai kedisiplinan</p>

    <x-alert />

    <table data-toggle="table" data-pagination="true" data-search="true" data-toolbar="#toolbar">
        <thead>
            <tr>
                <th data-field="id" data-sortable="true">No</th>
                <th data-field="keterangan" data-sortable="true">keterangan</th>
                <th data-field="bulan" data-sortable="true">Bulan</th>
                <th data-field="tahun" data-sortable="true">Tahun</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($periode as $item)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $item->keterangan }}</td>
                    <td>{{ $item->bulan }}</td>
                    <td>{{ $item->tahun }}</td>
                    <td>
                        <a href="" class="badge badge-primary text-decoration-none">
                            <i class="icon-eye"></i>
                        </a>
                        <a href="{{ route('nilai.kedisiplinan.import', $item->id) }}"
                            class="badge badge-success text-decoration-none">
                            <i class="icon-cloud-upload me-1"></i> Import
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
