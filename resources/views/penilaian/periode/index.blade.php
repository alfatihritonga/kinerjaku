@extends('layouts.app')

@section('title', 'Periode Penilaian')

@section('content')
    <h1 class="h3">Data Periode Penilaian</h1>
    <p>Halaman untuk mengelola data periode penilaian</p>

    <x-alert />

    <div id="toolbar">
        <a href="{{ route('periode.create') }}" class="btn btn-primary btn-icon btn-sm">
            <i class="mdi mdi-plus"></i>
        </a>
    </div>

    <table data-toggle="table" data-pagination="true" data-search="true" data-toolbar="#toolbar">
        <thead>
            <tr>
                <th data-field="id" data-sortable="true">No</th>
                <th data-field="keterangan" data-sortable="true">Keterangan</th>
                <th data-field="tanggal_mulai" data-sortable="true">Tanggal Mulai</th>
                <th data-field="tanggal_selesai" data-sortable="true">Tanggal Selesai</th>
                <th data-field="status" data-sortable="true">Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($periodes as $periode)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $periode->keterangan }}</td>
                    <td>{{ $periode->tanggal_mulai }}</td>
                    <td>{{ $periode->tanggal_selesai }}</td>
                    <td>{{ ucfirst($periode->status) }}</td>
                    <td>
                        <a href="{{ route('periode.edit', $periode->id) }}"
                            class="badge badge-warning text-decoration-none">
                            <i class="icon-note"></i>
                        </a>
                        <form
                            action="{{ route('periode.' . ($periode->status == 'open' ? 'closed' : 'open'), $periode->id) }}"
                            method="POST" style="display: inline;">
                            @csrf
                            @method('put')
                            <button type="submit"
                                class="badge badge-{{ $periode->status == 'open' ? 'danger' : 'success' }} text-decoration-none"><i
                                    class="icon-{{ $periode->status == 'open' ? 'close' : 'control-play' }}"></i></button>
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
