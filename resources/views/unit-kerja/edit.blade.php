@extends('layouts.app')

@section('title', 'Edit Divisi')

@section('content')
    <h1 class="h3">Edit Divisi</h1>
    <p>Halaman untuk mengubah divisi</p>

    <form action="{{ route('divisi.update', $divisi->id) }}" method="POST">
        @csrf
        @method('put')
        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama" value="{{ $divisi->nama }}"
                placeholder="Keuangan, Marketing, dll" required>
            <x-validation-error error="nama" />
        </div>
        <button type="submit" class="btn btn-primary">Ubah</button>
        <a href="{{ route('divisi.index') }}" class="btn btn-light">Batal</a>
    </form>
@endsection
