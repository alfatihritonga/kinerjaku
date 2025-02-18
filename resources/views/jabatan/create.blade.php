@extends('layouts.app')

@section('title', 'Tambah Data Jabatan')

@section('content')
<h1 class="h2">Tambah Data Jabatan</h1>
<p>Halaman untuk menambah data jabatan</p>

<form action="{{route('jabatan.store')}}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="nama" class="form-label">Nama :</label>
        <input type="text" class="form-control" id="nama" name="nama" required>
    </div>
    <button type="submit" class="btn btn-primary">Simpan</button>
    <a href="{{route('jabatan.index')}}" class="btn btn-light">Batal</a>
</form>
@endsection