@extends('layouts.app')

@section('title', 'Data Jabatan')

@section('content')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('home')}}"><i class="mdi mdi-home"></i></a></li>
        <li class="breadcrumb-item active" aria-current="page">Jabatan</li>
    </ol>
</nav>

<h1 class="h2">Data Jabatan</h1>
<p>Halaman untuk mengelola data jabatan</p>

@if (session()->has('success'))
<div class="alert alert-success" role="alert">
    {{ session('success') }}
</div>
@endif

@if (session()->has('error'))
<div class="alert alert-warning" role="alert">
    {{ session('error') }}
</div>
@endif

<div id="toolbar">
    <a href="{{route('jabatan.create')}}" class="btn btn-primary btn-icon btn-sm">
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
        <th data-field="level" data-sortable="true">Level</th>
        <th>Action</th>
    </tr>
</thead>
<tbody>
    @foreach ($jabatans as $jabatan)    
    <tr>
        <th scope="row">{{$loop->iteration}}</th>
        <td>{{$jabatan->nama}}</td>
        <td>{{$jabatan->level}}</td>
        <td>
            <a href="{{route('jabatan.show', $jabatan->id)}}" class="badge badge-primary text-decoration-none">
                <i class="icon-eye"></i>
            </a>
            <a href="{{route('jabatan.edit', $jabatan->id)}}" class="badge badge-warning text-decoration-none">
                <i class="icon-note"></i>
            </a>
            <form action="{{ route('jabatan.destroy', $jabatan->id) }}" method="POST" style="display: inline;">
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