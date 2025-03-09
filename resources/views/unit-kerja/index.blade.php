@extends('layouts.app')

@section('title', 'Unit Kerja')

@section('content')
    <h1 class="h3">Unit Kerja</h1>
    <p>List unit kerja</p>

    <x-alert />

    <div id="toolbar">
        <a href="{{ route('divisi.create') }}" class="btn btn-primary btn-icon btn-sm">
            <i class="mdi mdi-plus"></i>
        </a>
    </div>

    <table data-toggle="table" data-pagination="true" data-search="true" data-toolbar="#toolbar">
        <thead>
            <tr>
                <th data-field="id" data-sortable="true">No</th>
                <th data-field="nama" data-sortable="true">Nama</th>
                <th data-field="divisi_id" data-sortable="true">Divisi</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($unitKerja as $item)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $item->nama }}</td>
                    <td>{{ $item->divisi->nama }}</td>
                    <td>
                        <a href="{{ route('divisi.edit', $item->id) }}" class="badge badge-warning text-decoration-none">
                            <i class="icon-note"></i>
                        </a>
                        <form action="{{ route('divisi.destroy', $item->id) }}" method="POST" style="display: inline;">
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
