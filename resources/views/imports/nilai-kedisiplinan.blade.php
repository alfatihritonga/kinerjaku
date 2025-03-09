@extends('layouts.app')

@section('title', 'Import Nilai Kedisiplinan')

@section('content')
    <h1 class="h3">Import Nilai Kedisiplinan</h1>
    <p>Periode {{ $periode->bulan . ' ' . $periode->tahun }}</p>

    <x-alert />

    <a href="{{ asset('assets/excel/template_data_nilai_kedisiplinan.xlsx') }}" class="btn btn-success btn-icon-text my-3"
        download>
        <i class="btn-icon-prepend mdi mdi-microsoft-excel"></i>Template
    </a>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('nilai.kedisiplinan.import.data', $periode->id) }}" method="POST"
                enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label for="file" class="form-label">Data Nilai Kedisiplinan</label>
                    <input type="file" id="file" name="file" class="form-control" required>
                </div>

                <button class="btn btn-primary btn-icon-text">
                    <i class="mdi mdi-import btn-icon-prepend"></i> Import
                </button>
            </form>
        </div>
    </div>
@endsection
