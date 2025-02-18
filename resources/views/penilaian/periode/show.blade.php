@extends('layouts.app')

@section('title', 'Periode Penilaian')

@section('content')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('home')}}"><i class="mdi mdi-home"></i></a></li>
        <li class="breadcrumb-item"><a href="{{route('periode.index')}}" class="text-decoration-none">Periode</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{\Carbon\Carbon::parse($periode->tangga_mulai)->translatedFormat('F Y')}}</li>
    </ol>
</nav>

<h1 class="h3">Penilaian {{\Carbon\Carbon::parse($periode->tangga_mulai)->translatedFormat('F Y')}}</h1>

<table
data-toggle="table"
data-pagination="true"
data-search="true">
    <thead>
        <tr>
            <th data-field="id" data-sortable="true">No</th>
            <th data-field="dinilai_id" data-sortable="true">Pegawai Dinilai</th>
            <th data-field="penilai_id" data-sortable="true">Dinilai Oleh</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($penilaians as $penilaian)    
        <tr>
            <th scope="row">{{$loop->iteration}}</th>
            <td>{{$penilaian->penilai->nama ?? '-'}}</td>
            <td>{{$penilaian->dinilai->nama ?? '-'}}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection