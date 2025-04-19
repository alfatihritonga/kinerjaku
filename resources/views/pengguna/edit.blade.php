@extends('layouts.app')

@section('title', 'Edit Pengguna')

@section('content')
    <h1 class="h3">Edit Pengguna</h1>
    <p>Halaman untuk mengubah pengguna</p>

    <x-alert />

    <div class="card">
        <div class="card-body">
            <form action="{{ route('pengguna.update', $pengguna->id) }}" method="POST">
                @csrf
                @method('put')
                <div class="form-group row">
                    <label for="pegawai-id" class="col-sm-3 col-form-label">Pegawai</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="pegawai-id" name="pegawai_id" value="{{ $pengguna->pegawai->nama }}"
                            readonly required>
                        {{-- <x-validation-error error="nip" /> --}}
                    </div>
                </div>

                <div class="form-group row">
                    <label for="name" class="col-sm-3 col-form-label">Nama</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="name" name="name"
                            value="{{ $pengguna->name }}" placeholder="Nama" required>
                        <x-validation-error error="name" />
                    </div>
                </div>

                <div class="form-group row">
                    <label for="email" class="col-sm-3 col-form-label">Email</label>
                    <div class="col-sm-9">
                        <input type="email" class="form-control" id="email" name="email"
                            value="{{ $pengguna->email }}" placeholder="Nama" required>
                        <x-validation-error error="email" />
                    </div>
                </div>

                <div class="form-group row">
                    <label for="password" class="col-sm-3 col-form-label">Password</label>
                    <div class="col-sm-9">
                        <input type="password" class="form-control" id="password" name="password"
                            placeholder="Password">
                        <x-validation-error error="password" />
                    </div>
                </div>

                <button type="submit" class="btn btn-primary me-2">Ubah</button>
                <a href="{{ route('pengguna.index') }}" class="btn btn-light">Batal</a>
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
