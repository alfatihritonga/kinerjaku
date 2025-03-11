@extends('layouts.app')

@section('title', 'Penilaian Pegawai')

@section('content')
    <h3>Form Penilaian KPI</h3>
    <small class="fw-semibold">{{ $pegawai->nama }}</small>
    <p class="text-muted">{{ $pegawai->jabatan->nama ?? '' }} {{ $pegawai->unitKerja->nama ?? '' }}</p>

    <x-alert />

    <form action="{{ route('penilaian.store', [$periode->id, $pegawai->id]) }}" method="POST">
        @csrf

        <div class="card">
            <div class="card-body">
                @foreach ($kriterias as $kriteria)
                    <div class="mb-3">
                        <ol start="{{ $loop->iteration }}" type="A">
                            <li class="fw-bold">
                                {{ $kriteria->nama }}
                                <ol style="margin-left: -16px;">
                                    @foreach ($subKriterias->where('kriteria_id', $kriteria->id) as $subKriteria)
                                        <li class="mb-3 fw-normal">
                                            <label style="vertical-align: top" for="kriteria_{{ $subKriteria->id }}"
                                                class="form-label">
                                                {{ $subKriteria->nama }}
                                            </label>
                                            <br>
                                            <div class="form-check">
                                                <label for="{{ $subKriteria->id }}4" class="form-check-label">
                                                    <input type="radio" class="form-check-input"
                                                        name="nilai[{{ $subKriteria->id }}]" id="{{ $subKriteria->id }}4"
                                                        value="4" required>
                                                    Sangat Baik
                                                    <i class="input-helper"></i>
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <label for="{{ $subKriteria->id }}3" class="form-check-label">
                                                    <input type="radio" class="form-check-input "
                                                        name="nilai[{{ $subKriteria->id }}]" id="{{ $subKriteria->id }}3"
                                                        value="3" required>
                                                    Baik
                                                    <i class="input-helper"></i>
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <label for="{{ $subKriteria->id }}2" class="form-check-label">
                                                    <input type="radio" class="form-check-input"
                                                        name="nilai[{{ $subKriteria->id }}]" id="{{ $subKriteria->id }}2"
                                                        value="2" required>
                                                    Cukup
                                                    <i class="input-helper"></i>
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <label for="{{ $subKriteria->id }}1" class="form-check-label">
                                                    <input type="radio" class="form-check-input"
                                                        name="nilai[{{ $subKriteria->id }}]" id="{{ $subKriteria->id }}1"
                                                        value="1" required>
                                                    Tidak Baik
                                                    <i class="input-helper"></i>
                                                </label>
                                            </div>

                                        </li>
                                    @endforeach
                                </ol>
                            </li>
                        </ol>
                    </div>
                @endforeach
                <div class="mb-3">
                    <label for="catatan" class="form-label fw-semibold">Kontribusi/Penilaian/Komentar</label>
                    <input type="text" name="catatan" id="catatan" class="form-control">
                </div>

                <button type="submit" class="btn btn-success">Simpan</button>
            </div>
        </div>
    </form>

@endsection
