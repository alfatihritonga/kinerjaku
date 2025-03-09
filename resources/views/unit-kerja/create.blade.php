@extends('layouts.app')

@section('title', 'Tambah Unit Kerja')

@section('content')
    <h1 class="h2">Tambah Unit Kerja</h1>
    <p>Halaman untuk menambah unit kerja</p>

    <form action="{{ route('unit-kerja.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama" placeholder="Keuangan, Marketing, dll"
                required>
            <x-validation-error error="nama" />
        </div>

        <div class="mb-3">
            <label for="divisi" class="form-label">Divisi</label>
            <select name="divisi_id" id="divisi" class="form-control" required>
                <option selected disabled>--- pilih divisi ---</option>
                @foreach ($divisi as $item)
                    <option value="{{ $item->id }}">{{ $item->nama }}</option>
                @endforeach
            </select>
            <x-validation-error error="divisi_id" />
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('unit-kerja.index') }}" class="btn btn-light">Batal</a>
    </form>
@endsection
