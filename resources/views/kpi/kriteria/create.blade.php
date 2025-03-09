@extends('layouts.app')

@section('title', 'Kriteria')

@section('content')
    <h1 class="h2">Tambah Kriteria</h1>
    <p>Halaman untuk menambah kriteria</p>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('kriteria.store') }}" method="POST">
                @csrf
                <div class="form-group row">
                    <label for="nama" class="col-sm-3 col-form-label">Nama</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama" required>
                        <x-validation-error error="nama" />
                    </div>
                </div>

                <div class="form-group row">
                    <label for="bobot" class="col-sm-3 col-form-label">Bobot</label>
                    <div class="col-sm-9">
                        <input type="number" class="form-control" id="bobot" name="bobot" placeholder="Bobot"
                            max="1" min="0" step="0.01" required>
                        <x-validation-error error="bobot" />
                    </div>
                </div>

                <button type="submit" class="btn btn-primary me-2">Simpan</button>
                <a href="{{ route('kriteria.index') }}" class="btn btn-light">Batal</a>
            </form>
        </div>
    </div>
@endsection
