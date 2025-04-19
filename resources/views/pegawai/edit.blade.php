@extends('layouts.app')

@section('title', 'Edit Pegawai')

@section('content')
    <h1 class="h3">Edit Pegawai</h1>
    <p>Halaman untuk mengubah pegawai</p>

    <x-alert />

    <div class="card">
        <div class="card-body">
            <form action="{{ route('pegawai.update', $pegawai->id) }}" method="POST">
                @csrf
                @method('put')
                <div class="form-group row">
                    <label for="nip" class="col-sm-3 col-form-label">NIP</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="nip" name="nip" value="{{ $pegawai->nip }}"
                            placeholder="NIP" required>
                        <x-validation-error error="nip" />
                    </div>
                </div>

                <div class="form-group row">
                    <label for="nama" class="col-sm-3 col-form-label">Nama</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="nama" name="nama"
                            value="{{ $pegawai->nama }}" placeholder="Nama" required>
                        <x-validation-error error="nama" />
                    </div>
                </div>

                <div class="form-group row">
                    <label for="divisi" class="col-sm-3 col-form-label">Divisi</label>
                    <div class="col-sm-9">
                        <select name="divisi_id" id="divisi" class="form-control">
                            <option value="{{ $pegawai->divisi_id }}">{{ $pegawai->divisi->nama ?? '-' }} (active)</option>
                            @foreach ($divisis as $divisi)
                                <option value="{{ $divisi->id }}">{{ $divisi->nama }}</option>
                            @endforeach
                        </select>
                        <x-validation-error error="divisi_id" />
                    </div>
                </div>

                <div class="form-group row">
                    <label for="unit-kerja" class="col-sm-3 col-form-label">Unit Kerja</label>
                    <div class="col-sm-9">
                        <select name="unit_kerja_id" id="unit-kerja" class="form-control">
                            <option value="{{ $pegawai->unit_kerja_id }}">{{ $pegawai->unitKerja->nama ?? '-' }} (active)
                            </option>
                        </select>
                        <x-validation-error error="unit_kerja_id" />
                    </div>
                </div>

                <div class="form-group row">
                    <label for="jabatan" class="col-sm-3 col-form-label">Jabatan</label>
                    <div class="col-sm-9">
                        <select name="jabatan_id" id="jabatan" class="form-control">
                            <option value="{{ $pegawai->jabatan_id }}">{{ $pegawai->jabatan->nama ?? '-' }} (active)
                            </option>
                            @foreach ($jabatans as $jabatan)
                                <option value="{{ $jabatan->id }}">{{ $jabatan->nama }}</option>
                            @endforeach
                        </select>
                        <x-validation-error error="jabatan_id" />
                    </div>
                </div>

                <div class="form-group row">
                    <label for="status" class="col-sm-3 col-form-label">Status</label>
                    <div class="col-sm-9">
                        <select name="aktif" id="status" class="form-control">
                            <option value="1" {{ $pegawai->aktif == 1 ? 'selected' : '' }}>Aktif</option>
                            <option value="0" {{ $pegawai->aktif == 0 ? 'selected' : '' }}>Tidak Aktif</option>
                        </select>
                        <x-validation-error error="aktif" />
                    </div>
                </div>

                <button type="submit" class="btn btn-primary me-2">Simpan</button>
                <a href="{{ route('pegawai.index') }}" class="btn btn-light">Batal</a>
            </form>
        </div>
    </div>
@endsection

@section('script')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#divisi').change(function() {
                var divisiID = $(this).val();
                if (divisiID) {
                    $.ajax({
                        url: '/unit-kerja/by/' + divisiID,
                        type: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            $('#unit-kerja').empty();
                            $('#unit-kerja').append(
                                '<option disabled selected>-- pilih unit kerja --</option>');
                            $.each(data, function(key, value) {
                                $('#unit-kerja').append('<option value="' + value.id +
                                    '">' + value.nama + '</option>');
                            });
                        }
                    });
                } else {
                    $('#unit-kerja').empty();
                    $('#unit-kerja').append('<option disabled selected>-- pilih unit kerja --</option>');
                }
            });
        });
    </script>
    <script>
        function generatePassword(length = 10) {
            let charset = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
            let password = "";
            for (let i = 0; i < length; i++) {
                let randomIndex = Math.floor(Math.random() * charset.length);
                password += charset[randomIndex];
            }
            document.getElementById("password").value = password;
        }
    </script>
@endsection
