@extends('layouts.app')

@section('title', 'Pengguna')

@section('content')
    <h1 class="h2">Tambah Pengguna</h1>
    <p>Halaman untuk menambah pengguna</p>

    <x-alert />

    <div class="card">
        <div class="card-body">
            <form action="{{ route('pengguna.store') }}" method="POST">
                @csrf
                <div class="form-group row">
                    <label for="pegawai-id" class="col-sm-3 col-form-label">Pegawai</label>
                    <div class="col-sm-9">
                        <select name="pegawai_id" id="pegawai-id" class="form-control select2">
                            <option disabled selected>-- pilih pegawai --</option>
                            @foreach ($pegawais as $pegawai)
                                <option value="{{ $pegawai->id }}">{{ $pegawai->nama }}</option>
                            @endforeach
                        </select>                        
                        <x-validation-error error="pegawai_id" />
                    </div>
                </div>

                <div class="form-group row">
                    <label for="name" class="col-sm-3 col-form-label">Nama</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="name" name="name" placeholder="Nama"
                            required>
                        <x-validation-error error="name" />
                    </div>
                </div>
                
                <div class="form-group row">
                    <label for="email" class="col-sm-3 col-form-label">Email</label>
                    <div class="col-sm-9">
                        <input type="email" class="form-control" id="email" name="email" placeholder="Email"
                            required>
                        <x-validation-error error="email" />
                    </div>
                </div>

                <div class="form-group row">
                    <label for="password" class="col-sm-3 col-form-label">Password</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="password" name="password" placeholder="Password"
                            required>
                        <x-validation-error error="password" />
                        <button type="button" class="btn btn-sm btn-success mt-3"
                            onclick="generatePassword()">Generate</button>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary me-2">Simpan</button>
                <a href="{{ route('pengguna.index') }}" class="btn btn-light">Batal</a>
            </form>
        </div>
    </div>

@endsection

@section('script')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Select2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#pegawai-id').select2({
                // placeholder: "-- pilih pegawai --",
                // allowClear: true
            });
        });
        
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
