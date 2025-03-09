@extends('layouts.app')

@section('title', 'Penilaian Pegawai')

@section('content')
    <h1 class="h3">Penilaian Pegawai</h1>
    <p>Halaman untuk menilai kpi pegawai</p>

    @if (session()->has('warning'))
        <div id="alert-message" class="alert alert-warning" role="alert">
            {{ session('warning') }}
        </div>
    @endif

    @if (session()->has('success'))
        <div id="alert-message" class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif

    @if (session()->has('error'))
        <div id="alert-message" class="alert alert-warning" role="alert">
            {{ session('error') }}
        </div>
    @endif

    <p>
        <i class="mdi mdi-calendar-month"></i> :
        <strong>{{ $periode->nama }}</strong>
        {{ \Carbon\Carbon::parse($periode->tanggal_mulai)->format('d M Y') }}
        - {{ \Carbon\Carbon::parse($periode->tanggal_selesai)->format('d M Y') }}
    </p>

    @if ($pegawai_dinilai->isEmpty())
        <div class="alert alert-warning">Anda tidak memiliki bawahan yang bisa dinilai.</div>
    @else
        <table data-toggle="table" data-pagination="true" data-search="true">
            <thead>
                <tr>
                    <th>Nama Pegawai</th>
                    <th>Divisi</th>
                    <th>Unit Kerja</th>
                    <th>Jabatan</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pegawai_dinilai as $pegawai)
                    <tr>
                        <td>{{ $pegawai->nama ?? '-' }}</td>
                        <td>{{ $pegawai->divisi->nama ?? '-' }}</td>
                        <td>{{ $pegawai->unitKerja->nama ?? '-' }}</td>
                        <td>{{ $pegawai->jabatan->nama ?? '-' }}</td>
                        <td>
                            @php
                                // Mengecek apakah pegawai->id sudah ada di kolom dinilai_id pada KpiPenilaian
                                $hasRecord = \App\Models\KpiPenilaian::where('dinilai_id', $pegawai->id)
                                    ->where('penilai_id', Auth::user()->id)
                                    ->where('periode_id', $periode->id)
                                    ->exists();
                            @endphp

                            @if ($hasRecord)
                                <!-- Jika sudah ada record -->
                                <span class="badge badge-success">Sudah Dinilai</span>
                            @else
                                <!-- Jika belum ada record -->
                                <a href="{{ route('penilaian.create', [$periode->id, $pegawai->id]) }}"
                                    class="badge badge-primary text-decoration-none">Nilai Sekarang</a>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif

@endsection

@section('script')
    <script>
        setTimeout(function() {
            let alert = document.getElementById('alert-message');
            if (alert) {
                alert.style.transition = "opacity 0.5s";
                alert.style.opacity = "0";
                setTimeout(() => alert.remove(), 500);
            }
        }, 5000);
    </script>
@endsection
