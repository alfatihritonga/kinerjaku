@extends('layouts.app')

@section('title', 'Sub Kriteria')

@section('content')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('home')}}"><i class="mdi mdi-home"></i></a></li>
        <li class="breadcrumb-item"><a href="{{route('subkriteria.index')}}" class="text-decoration-none">Sub Kriteria</a></li>
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


<h1 class="h2">Tambah Sub Kriteria</h1>
<p>Halaman untuk menambah sub kriteria</p>

<div class="card">
    <div class="card-body">
        <form action="{{route('subkriteria.store')}}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama" required>
            </div>
            <div class="mb-3">
                <label for="kriteria" class="form-label">Kriteria</label>
                <select name="kriteria_id" id="kriteria" class="form-control">
                    <option selected disabled>-- pilih kriteria --</option>
                    @foreach ($kriterias as $kriteria)
                    <option value="{{$kriteria->id}}">{{$kriteria->nama}}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <fieldset>
                    <legend>Level Penilaian</legend>
                    <div class="mb-2">
                        <label for="minimal" class="form-label">Minimal</label>
                        <select name="level_minimal" id="minimal" class="form-control" required>
                            <option selected disabled>-- pilih level --</option>
                            @foreach ($jabatans as $jabatan)
                            <option value="{{$jabatan->level}}">({{$jabatan->level}}) {{$jabatan->nama}}</option>
                            @endforeach
                        </select>
                    </div>
                    <label for="maksimal" class="form-label">Maksimal <span class="fs-6 text-muted">(Opsional)</span></label>
                    <select name="level_maksimal" id="maksimal" class="form-control" required>
                        <option selected disabled>-- pilih level --</option>
                        @foreach ($jabatans as $jabatan)
                        <option value="{{$jabatan->level}}">({{$jabatan->level}}) {{$jabatan->nama}}</option>
                        @endforeach
                        <option value="">Semua Jabatan</option>
                    </select>
                </fieldset>
            </div>
            <button type="submit" class="btn btn-primary me-2">Simpan</button>
            <a href="{{route('subkriteria.index')}}" class="btn btn-light">Batal</a>
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
