@extends('layouts.app')

@section('title', 'Edit Kriteria')

@section('content')
    <h1 class="h3">Edit Kriteria</h1>
    <p>Halaman untuk mengubah data kriteria</p>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('kriteria.update', $kriteria->id) }}" method="POST">
                @csrf
                @method('put')
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama" value="{{ $kriteria->nama }}"
                        placeholder="Nama" required>
                    <x-validation-error error="nama" />
                </div>

                <div class="mb-3">
                    <label for="bobot" class="form-label">Bobot</label>
                    <input type="text" class="form-control" id="bobot" name="bobot" value="{{ $kriteria->bobot }}"
                        placeholder="Bobot" required>
                    <x-validation-error error="bobot" />
                </div>

                <button type="submit" class="btn btn-primary">Ubah</button>
                <a href="{{ route('kriteria.index') }}" class="btn btn-light">Batal</a>
            </form>
        </div>
    </div>
@endsection
