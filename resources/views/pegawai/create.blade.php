@extends('layouts.app')

@section('title', 'Pegawai')

@section('content')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('home')}}"><i class="mdi mdi-home"></i></a></li>
        <li class="breadcrumb-item"><a href="{{route('pegawai.index')}}" class="text-decoration-none">Pegawai</a></li>
        <li class="breadcrumb-item active" aria-current="page">Add</li>
    </ol>
</nav>

<h1 class="h2">Tambah Pegawai</h1>
<p>Halaman untuk menambah pegawai</p>

<div class="card">
    <div class="card-body">
        <form action="{{route('pegawai.store')}}" method="POST">
            @csrf
            <div class="form-group row">
                <label for="nama" class="col-sm-3 col-form-label">Nama</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="email" class="col-sm-3 col-form-label">Email</label>
                <div class="col-sm-9">
                    <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="password" class="col-sm-3 col-form-label">Password</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="password" name="password" placeholder="Password" required>
                    <button type="button" class="btn btn-sm btn-success mt-3" onclick="generatePassword()">Generate</button>
                </div>
            </div>
            <div class="form-group row">
                <label for="divisi" class="col-sm-3 col-form-label">Divisi</label>
                <div class="col-sm-9">
                    <select name="divisi_id" id="divisi" class="form-control">
                        <option disabled selected>-- pilih divisi --</option>
                        @foreach ($divisis as $divisi)
                            <option value="{{$divisi->id}}">{{$divisi->nama}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="jabatan" class="col-sm-3 col-form-label">Jabatan</label>
                <div class="col-sm-9">
                    <select name="jabatan_id" id="jabatan" class="form-control">
                        <option disabled selected>-- pilih jabatan --</option>
                        @foreach ($jabatans as $jabatan)
                            <option value="{{$jabatan->id}}">{{$jabatan->nama}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="atasan" class="col-sm-3 col-form-label">Atasan</label>
                <div class="col-sm-9">
                    <select name="atasan_id" id="atasan" class="form-control">
                        <option disabled selected>-- pilih atasan --</option>
                        @foreach ($atasans as $atasan)
                            <option value="{{$atasan->id}}">{{$atasan->nama}} ({{$atasan->divisi->nama ?? '-'}})</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <button type="submit" class="btn btn-primary me-2">Simpan</button>
            <a href="{{route('pegawai.index')}}" class="btn btn-light">Batal</a>
        </form>
    </div>
</div>

@endsection

@section('script')
<script>
    function generatePassword(length = 10) {
        let charset = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        let password = "";
        for (let i = 0; i < length; i++) {
            let randomIndex = Math.floor(Math.random() * charset.length);
            password += charset[randomIndex];
        }
        document.getElementById("password").value = password;
    }
</script>
@endsection
