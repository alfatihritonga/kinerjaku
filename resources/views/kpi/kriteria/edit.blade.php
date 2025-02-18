@extends('layouts.app')

@section('title', 'Edit Kriteria')

@section('content')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('home')}}"><i class="mdi mdi-home"></i></a></li>
        <li class="breadcrumb-item"><a href="{{route('kriteria.index')}}" class="text-decoration-none">Kriteria</a></li>
        <li class="breadcrumb-item active" aria-current="page">Edit</li>
    </ol>
</nav>

<h1 class="h3">Edit Kriteria</h1>
<p>Halaman untuk mengubah data kriteria</p>

<div class="card">
    <div class="card-body">
        <form action="{{route('kriteria.update', $kriteria->id)}}" method="POST">
            @csrf
            @method('put')
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" value="{{$kriteria->nama}}" placeholder="Nama" required>
            </div>
            <div class="mb-3">
                <label for="bobot" class="form-label">Bobot</label>
                <input type="text" class="form-control" id="bobot" name="bobot" value="{{$kriteria->bobot}}" placeholder="Bobot" required>
            </div>
            <button type="submit" class="btn btn-primary">Ubah</button>
            <a href="{{route('kriteria.index')}}" class="btn btn-light">Batal</a>
        </form>
    </div>
</div>
@endsection