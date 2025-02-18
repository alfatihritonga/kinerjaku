@extends('layouts.app')

@section('title', 'Sub Kriteria')

@section('content')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('home')}}"><i class="mdi mdi-home"></i></a></li>
        <li class="breadcrumb-item active" aria-current="page">Sub Kriteria</li>
    </ol>
</nav>

<h1 class="h3">Data Sub Kriteria</h1>
<p>Halaman untuk mengelola data sub kriteria</p>

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
    <a href="{{route('subkriteria.create')}}" class="btn btn-primary btn-icon btn-sm">
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
        <th data-field="kriteria" data-sortable="true">Kriteria</th>
        <th>Action</th>
    </tr>
</thead>
<tbody>
    @foreach ($subKriterias as $subKriteria)    
    <tr>
        <th scope="row">{{$loop->iteration}}</th>
        <td>{{$subKriteria->nama}}</td>
        <td>{{$subKriteria->kriteria->nama}}</td>
        <td>
            <a href="{{route('subkriteria.show', $subKriteria->id)}}" class="badge badge-primary text-decoration-none">
                <i class="icon-eye"></i>
            </a>
            <a href="{{route('subkriteria.edit', $subKriteria->id)}}" class="badge badge-warning text-decoration-none">
                <i class="icon-note"></i>
            </a>
            <form action="{{ route('subkriteria.destroy', $subKriteria->id) }}" method="POST" style="display: inline;">
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
