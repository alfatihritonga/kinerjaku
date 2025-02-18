@extends('layouts.app')

@section('title', 'Data Pegawai')

@section('content')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('home')}}"><i class="mdi mdi-home"></i></a></li>
        <li class="breadcrumb-item active" aria-current="page">Pegawai</li>
    </ol>
</nav>

<h1 class="h3">Data Pegawai</h1>
<p>Halaman untuk mengelola data pegawai</p>

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

<div id="toolbar">
    <a href="{{route('pegawai.create')}}" class="btn btn-primary btn-icon btn-sm">
        <i class="mdi mdi-plus"></i>
    </a>
</div>

<table
data-toggle="table"
data-pagination="true"
data-search="true"
data-toolbar="#toolbar"
>
<thead>
    <tr>
        <th data-field="id" data-sortable="true">No</th>
        <th data-field="nama" data-sortable="true">Nama</th>
        <th data-field="divisi" data-sortable="true">Divisi</th>
        <th data-field="jabatan" data-sortable="true">Jabatan</th>
        <th>Action</th>
    </tr>
</thead>
<tbody>
    @foreach ($pegawais as $pegawai)    
    <tr>
        <th scope="row">{{$loop->iteration}}</th>
        <td>{{$pegawai->nama}}</td>
        <td>{{ $pegawai->divisi ? $pegawai->divisi->nama : '-' }}</td>
        <td>{{ $pegawai->jabatan ? $pegawai->jabatan->nama : '-' }}</td>
        <td>
            <a href="{{route('pegawai.show', $pegawai->id)}}" class="badge badge-primary text-decoration-none">
                <i class="icon-eye"></i>
            </a>
            <a href="{{route('pegawai.edit', $pegawai->id)}}" class="badge badge-warning text-decoration-none">
                <i class="icon-note"></i>
            </a>
            <form action="{{ route('pegawai.destroy', $pegawai->id) }}" method="POST" style="display: inline;">
                @csrf
                @method('delete')
                <button type="submit" class="badge badge-danger text-decoration-none"><i class="icon-trash"></i></button>
            </form>
        </td>
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
