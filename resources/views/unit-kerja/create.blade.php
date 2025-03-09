@extends('layouts.app')

@section('title', 'Divisi')

@section('content')
    <h1 class="h2">Tambah Divisi</h1>
    <p>Halaman untuk menambah divisi</p>

    <form action="{{ route('divisi.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama" placeholder="Keuangan, Marketing, dll"
                required>
            <x-validation-error error="nama" />
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('divisi.index') }}" class="btn btn-light">Batal</a>
    </form>
@endsection
