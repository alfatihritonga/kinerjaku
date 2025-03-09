@extends('layouts.app')

@section('title', 'Pegawai')

@section('content')
    <h1 class="h3">Pegawai</h1>
    <p>Halaman untuk mengelola data pegawai</p>

    <x-alert />

    <div id="toolbar">
        <a href="{{ route('pegawai.create') }}" class="btn btn-primary btn-icon btn-sm">
            <i class="mdi mdi-plus"></i>
        </a>
    </div>

    <table data-toggle="table" data-pagination="true" data-search="true" data-toolbar="#toolbar">
        <thead>
            <tr>
                <th data-field="id" data-sortable="true">No</th>
                <th data-field="nama" data-sortable="true">Nama</th>
                <th data-field="divisi" data-sortable="true">Divisi</th>
                <th data-field="jabatan" data-sortable="true">Jabatan</th>
                <th data-field="unit_kerja" data-sortable="true">Unit Kerja</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pegawais as $pegawai)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $pegawai->nama }}</td>
                    <td>{{ $pegawai->divisi->nama ?? '-' }}</td>
                    <td>{{ $pegawai->jabatan->nama ?? '-' }}</td>
                    <td>{{ $pegawai->unitKerja->nama ?? '-' }}</td>
                    <td>
                        <a href="{{ route('pegawai.edit', $pegawai->id) }}"
                            class="badge badge-warning text-decoration-none">
                            <i class="icon-note"></i>
                        </a>
                        <form action="{{ route('pegawai.destroy', $pegawai->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('delete')
                            <button type="submit" class="badge badge-danger text-decoration-none"><i
                                    class="icon-trash"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
