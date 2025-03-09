@extends('layouts.app')

@section('title', 'Sub Kriteria')

@section('content')
    <h1 class="h3">Data Sub Kriteria</h1>
    <p>Halaman untuk mengelola data sub kriteria</p>

    <x-alert />

    <div id="toolbar">
        <a href="{{ route('subkriteria.create') }}" class="btn btn-primary btn-icon btn-sm">
            <i class="mdi mdi-plus"></i>
        </a>
    </div>

    <table data-toggle="table" data-pagination="true" data-search="true" data-toolbar="#toolbar">
        <thead>
            <tr>
                <th data-field="id" data-sortable="true">No</th>
                <th data-field="nama" data-sortable="true">Nama</th>
                <th data-field="kriteria" data-sortable="true">Kriteria</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($subKriterias as $subKriteria)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>
                        {{ $subKriteria->nama }}
                    </td>
                    <td>{{ $subKriteria->kriteria->nama }}</td>
                    <td>
                        <a href="{{ route('subkriteria.edit', $subKriteria->id) }}"
                            class="badge badge-warning text-decoration-none">
                            <i class="icon-note"></i>
                        </a>
                        <form action="{{ route('subkriteria.destroy', $subKriteria->id) }}" method="POST"
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
