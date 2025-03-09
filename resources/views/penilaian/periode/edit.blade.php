@extends('layouts.app')

@section('title', 'Edit Periode Penilaian')

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="mdi mdi-home"></i></a></li>
            <li class="breadcrumb-item"><a href="{{ route('periode.index') }}" class="text-decoration-none">Periode
                    Penilaian</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit</li>
        </ol>
    </nav>

    <h1 class="h3">Edit Periode Penilaian</h1>
    <p>Halaman untuk mengubah periode penilaian</p>

    <form action="{{ route('periode.update', $periode->id) }}" method="POST">
        @csrf
        @method('put')
        <div class="mb-3">
            <label for="keterangan" class="form-label">Keterangan</label>
            <input type="text" class="form-control" id="keterangan" name="keterangan" value="{{ $periode->keterangan }}"
                required>
            @error('keterangan')
                <small class="text-danger">
                    {{ $message }}
                </small>
            @enderror
        </div>

        <div class="mb-3">
            <label for="bulan" class="form-label">Bulan</label>
            <select name="bulan" id="bulan" class="form-control" required>
                <option value="{{ $periode->bulan }}">{{ $periode->bulan }} (active)</option>
                <option value="Januari">Januari</option>
                <option value="Februari">Februari</option>
                <option value="Maret">Maret</option>
                <option value="April">April</option>
                <option value="Mei">Mei</option>
                <option value="Juni">Juni</option>
                <option value="Juli">Juli</option>
                <option value="Agustus">Agustus</option>
                <option value="September">September</option>
                <option value="Oktober">Oktober</option>
                <option value="November">November</option>
                <option value="Desember">Desember</option>
            </select>
            @error('bulan')
                <small class="text-danger">
                    {{ $message }}
                </small>
            @enderror
        </div>

        <div class="mb-3">
            <label for="tahun" class="form-label">Tahun</label>
            <select name="tahun" id="tahun" class="form-control" required>
                <option value="{{ $periode->tahun }}">{{ $periode->tahun }} (active)</option>
                @for ($y = date('Y'); $y >= date('Y') - 4; $y--)
                    <option value="{{ $y }}">{{ $y }}</option>
                @endfor
            </select>
            @error('tahun')
                <small class="text-danger">
                    {{ $message }}
                </small>
            @enderror
        </div>

        <div class="mb-3">
            <label for="tanggal-mulai" class="form-label">Tanggal Mulai</label>
            <input type="date" class="form-control" id="tanggal-mulai" name="tanggal_mulai"
                value="{{ $periode->tanggal_mulai }}" required>
        </div>
        <div class="mb-3">
            <label for="tanggal-selesai" class="form-label">Tanggal Selesai</label>
            <input type="date" class="form-control" id="tanggal-selesai" name="tanggal_selesai"
                value="{{ $periode->tanggal_selesai }}" required>
        </div>
        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select name="status" id="status" class="form-control">
                <option value="{{ $periode->status }}">{{ ucfirst($periode->status) }} (active)</option>
                <option value="open">Open</option>
                <option value="closed">Closed</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Ubah</button>
        <a href="{{ route('periode.index') }}" class="btn btn-light">Batal</a>
    </form>
@endsection
