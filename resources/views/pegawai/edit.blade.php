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
                    <label for="email" class="col-sm-3 col-form-label">Email</label>
                    <div class="col-sm-9">
                        <input type="email" class="form-control" id="email" name="email"
                            value="{{ $pegawai->email }}" placeholder="Email" required>
                        <x-validation-error error="email" />
                    </div>
                </div>

                <div class="form-group row">
                    <label for="password" class="col-sm-3 col-form-label">Password</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="password" name="password" placeholder="Password">
                        <x-validation-error error="password" />
                        <button type="button" class="btn btn-sm btn-success mt-3 d-block"
                            onclick="generatePassword()">Generate</button>
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
                            @foreach ($unitKerja as $item)
                                <option value="{{ $item->id }}">{{ $item->nama }}</option>
                            @endforeach
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

                <button type="submit" class="btn btn-primary me-2">Simpan</button>
                <a href="{{ route('pegawai.index') }}" class="btn btn-light">Batal</a>
            </form>
        </div>
    </div>
@endsection

@section('script')
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
