@extends('layouts.app')

@section('title', 'Pengguna')

@section('content')
    <h1 class="h3">Pengguna</h1>
    <p>Halaman untuk mengelola data pengguna</p>

    <x-alert />

    <div id="toolbar">
        <a href="{{ route('pengguna.create') }}" class="btn btn-primary btn-icon btn-sm">
            <i class="mdi mdi-plus"></i>
        </a>
    </div>

    <table data-toggle="table" data-pagination="true" data-search="true" data-toolbar="#toolbar">
        <thead>
            <tr>
                <th data-field="id" data-sortable="true">No</th>
                <th data-field="name" data-sortable="true">Nama</th>
                <th data-field="email" data-sortable="true">Email</th>
                <th data-field="pegawai" data-sortable="true">Pegawai</th>
                <th data-field="role" data-sortable="true">Role</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->pegawai->nama ?? '-' }}</td>
                    <td class="text-capitalize">{{ $user->role }}</td>
                    <td>
                        <a href="{{ route('pengguna.edit', $user->id) }}"
                            class="badge badge-warning text-decoration-none">
                            <i class="icon-note"></i>
                        </a>
                        <form action="{{ route('pengguna.destroy', $user->id) }}" method="POST" style="display: inline;">
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
