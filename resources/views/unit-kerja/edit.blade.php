@extends('layouts.app')

@section('title', 'Edit Unit Kerja')

@section('content')
    <h1 class="h3">Edit Unit Kerja</h1>
    <p>Halaman untuk mengubah unit kerja</p>

    <form action="{{ route('unit-kerja.update', $unitKerja->id) }}" method="POST">
        @csrf
        @method('put')
        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama" value="{{ $unitKerja->nama }}"
                placeholder="Keuangan, Marketing, dll" required>
            <x-validation-error error="nama" />
        </div>

        @php
            $divisi = \App\Models\Divisi::select('id', 'nama')->get();
        @endphp

        <div class="mb-3">
            <label for="divisi" class="form-label">Divisi</label>
            <select name="divisi_id" id="divisi" class="form-control" required>
                <option selected value="{{ $unitKerja->divisi_id }}">{{ $unitKerja->divisi->nama }} (active)</option>
                @foreach ($divisi as $item)
                    <option value="{{ $item->id }}">{{ $item->nama }}</option>
                @endforeach
            </select>
            <x-validation-error error="divisi_id" />
        </div>

        <button type="submit" class="btn btn-primary">Ubah</button>
        <a href="{{ route('unit-kerja.index') }}" class="btn btn-light">Batal</a>
    </form>
@endsection
