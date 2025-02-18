@extends('layouts.app')

@section('title', 'Periode Penilaian')

@section('content')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('home')}}"><i class="mdi mdi-home"></i></a></li>
        <li class="breadcrumb-item"><a href="{{route('periode.index')}}" class="text-decoration-none">Periode Penilaian</a></li>
        <li class="breadcrumb-item active" aria-current="page">Add</li>
    </ol>
</nav>

@if ($errors->any())
    <div id="alert-message" class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


<h1 class="h2">Tambah Periode Penilaian</h1>
<p>Halaman untuk menambah periode penilaian</p>

<div class="card">
    <div class="card-body">
        <form action="{{route('periode.store')}}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama" required>
            </div>
            <div class="mb-3">
                <label for="tanggal-mulai" class="form-label">Tanggal Mulai</label>
                <input type="date" class="form-control" id="tanggal-mulai" name="tanggal_mulai" required>
            </div>
            <div class="mb-3">
                <label for="tanggal-selesai" class="form-label">Tanggal Selesai</label>
                <input type="date" class="form-control" id="tanggal-selesai" name="tanggal_selesai" required>
            </div>
            <button type="submit" class="btn btn-primary me-2">Simpan</button>
            <a href="{{route('periode.index')}}" class="btn btn-light">Batal</a>
        </form>
    </div>
</div>

@endsection

@section('script')
<script>
    setTimeout(function() {
        let alert = document.getElementById('alert-message');
        if (alert) {
            alert.style.transition = "opacity 0.5s";
            alert.style.opacity = "0";
            setTimeout(() => alert.remove(), 500);
        }
    }, 10000);
</script>
@endsection
