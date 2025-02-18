@extends('layouts.app')

@section('title', 'Edit Data Divisi')

@section('content')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('home')}}"><i class="mdi mdi-home"></i></a></li>
        <li class="breadcrumb-item"><a href="{{route('divisi.index')}}" class="text-decoration-none">Divisi</a></li>
        <li class="breadcrumb-item active" aria-current="page">Edit</li>
    </ol>
</nav>

<h1 class="h3">Edit Data Divisi</h1>
<p>Halaman untuk mengubah data divisi</p>

<form action="{{route('divisi.update', $divisi->id)}}" method="POST">
    @csrf
    @method('put')
    <div class="mb-3">
        <label for="nama" class="form-label">Nama :</label>
        <input type="text" class="form-control" id="nama" name="nama" value="{{$divisi->nama}}" required>
        <div class="form-text">Masukkan nama divisi perusahaan.</div>
    </div>
    <button type="submit" class="btn btn-primary">Ubah</button>
    <a href="{{route('divisi.index')}}" class="btn btn-light">Batal</a>
</form>
@endsection