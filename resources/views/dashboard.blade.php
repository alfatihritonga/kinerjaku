@extends('layouts.app')

@section('title', 'Home')

@section('content')
<div class="mb-3">
    <h1 class="h2">Kinerjaku</h1>
    <p>Sistem untuk pengolahan kpi pegawai</p>
</div>

@if (session()->has('warning'))
<div id="alert-message" class="alert alert-warning" role="alert">
    {{ session('warning') }}
</div>
@endif

@if (Auth::user()->role == 'pegawai')
    @if (session()->has('success'))
    <div id="alert-message" class="alert alert-success" role="alert">
        {{ session('success') }}
    </div>
    @endif

    @if ($periode_aktif)
    <div class="alert alert-info">
        <div class="mb-2">
            📢 <strong>Periode Penilaian Aktif!</strong>
        </div>
        <div class="mb-2">
            <strong>{{ $periode_aktif->nama }}</strong>
        </div>
        <div class="mb-2">
            <i class="mdi mdi-calendar-month"></i> : <p class="d-inline-block">{{ $periode_aktif->tanggal_mulai }} s/d {{ $periode_aktif->tanggal_selesai }}</p>
        </div>
        <a href="{{route('penilaian.index', $periode_aktif->tanggal_mulai)}}" class="btn btn-success btn-icon-text mt-2">
            <i class="icon-pencil btn-icon-prepend"></i> Mulai Menilai
        </a>
    </div>
    @else
    <div class="alert alert-warning">
        ⏳ Saat ini tidak ada periode penilaian yang aktif.
    </div>
    @endif
@else

@endif
@endsection