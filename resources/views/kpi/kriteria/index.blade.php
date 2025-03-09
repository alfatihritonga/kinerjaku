@extends('layouts.app')

@section('title', 'Kriteria')

@section('content')
    <h1 class="h3">Data Kriteria</h1>
    <p>Halaman untuk mengelola data kriteria</p>

    <x-alert />

    <div id="toolbar">
        <a href="{{ route('kriteria.create') }}" class="btn btn-primary btn-icon btn-sm">
            <i class="mdi mdi-plus"></i>
        </a>
    </div>

    <table data-toggle="table" data-pagination="true" data-search="true" data-toolbar="#toolbar">
        <thead>
            <tr>
                <th data-field="id" data-sortable="true">No</th>
                <th data-field="nama" data-sortable="true">Nama</th>
                <th data-field="bobot" data-sortable="true">Bobot</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($kriterias as $kriteria)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $kriteria->nama }}</td>
                    <td>{{ $kriteria->bobot }}</td>
                    <td>
                        <a href="{{ route('kriteria.edit', $kriteria->id) }}"
                            class="badge badge-warning text-decoration-none">
                            <i class="icon-note"></i>
                        </a>
                        <form action="{{ route('kriteria.destroy', $kriteria->id) }}" method="POST"
                            style="display: inline;">
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
