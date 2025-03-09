@extends('layouts.app')

@section('title', 'Divisi')

@section('content')
    <h1 class="h3">Divisi {{ $divisi->nama }}</h1>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Pegawai</th>
                <th scope="col">Jabatan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pegawais as $pegawai)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $pegawai->nama }}</td>
                    <td>{{ $pegawai->jabatan->nama ?? '-' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
