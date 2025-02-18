@extends('layouts.app')

@section('title', 'Data Divisi')

@section('content')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('home')}}"><i class="mdi mdi-home"></i></a></li>
        <li class="breadcrumb-item"><a href="{{route('divisi.index')}}" class="text-decoration-none">Divisi</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{$divisi->nama}}</li>
    </ol>
</nav>

<h1 class="h3">Divisi {{$divisi->nama}}</h1>

<table class="table">
    <thead>
        <tr>
            <th scope="col">No</th>
            <th scope="col">Pegawai</th>
            <th scope="col">Jabatan</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($pegawais as $pegawai)    
        <tr>
            <th scope="row">{{$loop->iteration}}</th>
            <td>{{$pegawai->nama}}</td>
            <td>{{$pegawai->jabatan->nama ?? '-'}}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection