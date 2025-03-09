@extends('layouts.app')

@section('title', 'Periode Penilaian')

@section('content')
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
            <form action="{{ route('periode.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="keterangan" class="form-label">Keterangan</label>
                    <input type="text" class="form-control" id="keterangan" name="keterangan"
                        placeholder="Penilaian Januari 2025" required>
                    @error('keterangan')
                        <small class="text-danger">
                            {{ $message }}
                        </small>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="bulan" class="form-label">Bulan</label>
                    <select name="bulan" id="bulan" class="form-control" required>
                        <option selected disabled>--- pilih bulan ---</option>
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
                        <option selected disabled>--- pilih tahun ---</option>
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
                    <input type="date" class="form-control" id="tanggal-mulai" name="tanggal_mulai" required>
                </div>

                <div class="mb-3">
                    <label for="tanggal-selesai" class="form-label">Tanggal Selesai</label>
                    <input type="date" class="form-control" id="tanggal-selesai" name="tanggal_selesai" required>
                </div>

                <button type="submit" class="btn btn-primary me-2">Simpan</button>
                <a href="{{ route('periode.index') }}" class="btn btn-light">Batal</a>
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
