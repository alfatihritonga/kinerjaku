@extends('layouts.app')

@section('title', 'Tambah Jabatan')

@section('content')
    <h1 class="h2">Tambah Jabatan</h1>
    <p>Halaman untuk menambah jabatan</p>

    <form action="{{ route('jabatan.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama" placeholder="Ketua, Kabid, Kasubid, Staff"
                required>
            <x-validation-error error="nama" />
        </div>
        <div class="mb-3">
            <label for="level" class="form-label">Level</label>
            <input type="number" class="form-control" id="level" name="level" placeholder="1" min="1"
                required>
            <x-validation-error error="level" />
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('jabatan.index') }}" class="btn btn-light">Batal</a>
    </form>
@endsection
