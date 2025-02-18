@extends('layouts.app')

@section('title', 'Hasil Penilaian Pegawai')

@section('content')
<h1 class="h3">Hasil Penilaian Pegawai</h1>
<p>Halaman untuk melihat hasil kpi pegawai</p>

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

<table
data-toggle="table">
<thead>
    <tr>
        <th>Nama Pegawai</th>
        <th>Skor</th>
        <th>Keterangan</th>
    </tr>
</thead>
<tbody>
    @foreach ($penilaians as $penilaian)
    <tr>
        <td>{{ $penilaian->dinilai->nama }}</td>
        <td>{{ $penilaian->hasilPenilaian->skor_total }}</td>
        <td>{{ $penilaian->hasilPenilaian->keterangan }}</td>
    </tr>
    @endforeach
</tbody>
</table>
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
