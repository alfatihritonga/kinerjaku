@extends('layouts.app')

@section('title', 'Edit Periode Penilaian')

@section('content')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('home')}}"><i class="mdi mdi-home"></i></a></li>
        <li class="breadcrumb-item"><a href="{{route('periode.index')}}" class="text-decoration-none">Periode Penilaian</a></li>
        <li class="breadcrumb-item active" aria-current="page">Edit</li>
    </ol>
</nav>

<h1 class="h3">Edit Periode Penilaian</h1>
<p>Halaman untuk mengubah periode penilaian</p>

<form action="{{route('periode.update', $periode->id)}}" method="POST">
    @csrf
    @method('put')
    <div class="mb-3">
        <label for="nama" class="form-label">Nama :</label>
        <input type="text" class="form-control" id="nama" name="nama" value="{{$periode->nama}}" required>
    </div>
    <div class="mb-3">
        <label for="tanggal-mulai" class="form-label">Tanggal Mulai</label>
        <input type="date" class="form-control" id="tanggal-mulai" name="tanggal_mulai" value="{{$periode->tanggal_mulai}}" required>
    </div>
    <div class="mb-3">
        <label for="tanggal-selesai" class="form-label">Tanggal Selesai</label>
        <input type="date" class="form-control" id="tanggal-selesai" name="tanggal_selesai" value="{{$periode->tanggal_selesai}}" required>
    </div>
    <div class="mb-3">
        <label for="status" class="form-label">Status</label>
        <select name="status" id="status" class="form-control">
            <option value="{{$periode->status}}">{{ucfirst($periode->status)}} (active)</option>
            <option value="open">Open</option>
            <option value="closed">Closed</option>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Ubah</button>
    <a href="{{route('periode.index')}}" class="btn btn-light">Batal</a>
</form>
@endsection