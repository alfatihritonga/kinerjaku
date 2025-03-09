@extends('layouts.app')

@section('title', 'Edit Sub Kriteria')

@section('content')
    <h1 class="h3">Edit Sub Kriteria</h1>
    <p>Halaman untuk mengubah sub kriteria</p>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('subkriteria.update', $subKriteria->id) }}" method="POST">
                @csrf
                @method('put')
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama" value="{{ $subKriteria->nama }}"
                        placeholder="Nama" required>
                    <x-validation-error error="nama" />
                </div>

                <div class="mb-3">
                    <label for="kriteria" class="form-label">Kriteria</label>
                    <select name="kriteria_id" id="kriteria" class="form-control">
                        <option value="{{ $subKriteria->kriteria_id }}" selected>{{ $subKriteria->kriteria->nama }} (active)
                        </option>
                        @foreach ($kriteria as $item)
                            <option value="{{ $item->id }}">{{ $item->nama }}</option>
                        @endforeach
                    </select>
                    <x-validation-error error="kriteria_id" />
                </div>

                <div class="mb-3">
                    <fieldset>
                        <legend>Level Penilaian</legend>
                        <div class="mb-2">
                            <label for="minimal" class="form-label">Minimal</label>
                            <select name="level_minimal" id="minimal" class="form-control">
                                <option value="{{ $subKriteria->level_minimal }}" selected>
                                    {{ $subKriteria->level_minimal ?? 'Semua Jabatan' }} (active)
                                </option>
                                @foreach ($jabatan as $level => $items)
                                    <option value="{{ $level }}">({{ $level }})
                                        @foreach ($items as $item)
                                            , {{ $item->nama }}
                                        @endforeach
                                    </option>
                                @endforeach
                            </select>
                            <x-validation-error error="level_minimal" />
                        </div>
                        <div class="mb-2">
                            <label for="maksimal" class="form-label">Maksimal <span
                                    class="fs-6 text-muted">(Opsional)</span></label>
                            <select name="level_maksimal" id="maksimal" class="form-control">
                                <option value="{{ $subKriteria->level_maksimal }}" selected>
                                    {{ $subKriteria->level_maksimal ?? 'Semua Jabatan' }} (active)
                                </option>
                                @foreach ($jabatan as $level => $items)
                                    <option value="{{ $level }}">({{ $level }})
                                        @foreach ($items as $item)
                                            ({{ $item->nama }})
                                        @endforeach
                                    </option>
                                @endforeach
                                <option value="">Semua Jabatan</option>
                            </select>
                            <x-validation-error error="level_maksimal" />
                        </div>
                    </fieldset>
                </div>

                <button type="submit" class="btn btn-primary me-2">Simpan</button>
                <a href="{{ route('subkriteria.index') }}" class="btn btn-light">Batal</a>
            </form>
        </div>
    </div>
@endsection
