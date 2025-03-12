@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <div class="mb-3">
        <h1 class="h2">{{ config('app.name') }}</h1>
        <p>Sistem untuk pengolahan kpi pegawai</p>
    </div>

    <x-alert />

    @if (Auth::user()->role == 'pegawai')
        @if (session()->has('success'))
            <div id="alert-message" class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif

        @if ($periode_aktif)
            @foreach ($periode_aktif as $item)
                <div class="alert alert-info">
                    <div class="mb-2">
                        📢 <strong>Periode Penilaian Aktif!</strong>
                    </div>
                    <div class="mb-2">
                        <strong>{{ $item->keterangan }}</strong>
                    </div>
                    <div class="mb-2">
                        <i class="mdi mdi-calendar-month"></i> : <p class="d-inline-block">
                            {{ \Carbon\Carbon::parse($item->tanggal_mulai)->format('d M Y') }}
                            - {{ \Carbon\Carbon::parse($item->tanggal_selesai)->format('d M Y') }}</p>
                    </div>
                    <a href="{{ route('penilaian.index', $item->id) }}" class="btn btn-success btn-icon-text mt-2">
                        <i class="icon-pencil btn-icon-prepend"></i> Mulai Menilai
                    </a>
                </div>
            @endforeach
        @else
            <div class="alert alert-warning">
                ⏳ Saat ini tidak ada periode penilaian yang aktif.
            </div>
        @endif
    @else
    @endif
@endsection
