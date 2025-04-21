@extends('layouts.app')

@section('title', 'My Profile')

@section('content')
    <div class="mb-3">
        <h1 class="h2">My Profile</h1>
        <p>Halaman untuk mengelola profile</p>
    </div>

    <x-alert />

    <div class="card mb-3">
        <div class="card-body">
            <form action="{{ route('user.update.profile') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Nama</label>
                    <input type="text" name="name" class="form-control" value="{{ Auth::user()->name }}">
                </div>
                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" value="{{ Auth::user()->email }}">
                </div>
                <button class="btn btn-primary">Ubah</button>
            </form>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <h4>Ubah Password</h4>
            <form action="{{ route('user.update.password') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Password Lama</label>
                    <input type="password" name="old_password" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Password Baru</label>
                    <input type="password" name="new_password" class="form-control">
                </div>
                <div class="mb-3">
                    <label class="form-label">Konfirmasi Password Baru</label>
                    <input type="password" name="confirm_new_password" class="form-control">
                    <div id="password-confirm" class="form-text"></div>
                </div>
                <button id="change-password" class="btn btn-primary">Simpan Perubahan</button>
            </form>
        </div>
    </div>
@endsection

@section('script')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const newPassword = document.querySelector('input[name="new_password"]');
            const confirmPassword = document.querySelector('input[name="confirm_new_password"]');
            const passwordConfirmMessage = document.getElementById("password-confirm");
            const btnChangePassword = document.getElementById("change-password");

            function validatePassword() {
                if (newPassword.value === confirmPassword.value && newPassword.value !== "") {
                    passwordConfirmMessage.textContent = "Password match";
                    passwordConfirmMessage.classList.remove("text-danger");
                    passwordConfirmMessage.classList.add("text-success");
                    btnChangePassword.disabled = false;
                } else {
                    passwordConfirmMessage.textContent = "Password not match";
                    passwordConfirmMessage.classList.remove("text-success");
                    passwordConfirmMessage.classList.add("text-danger");
                    btnChangePassword.disabled = true;
                }
            }

            // newPassword.addEventListener("input", validatePassword);
            confirmPassword.addEventListener("input", validatePassword);

            btnChangePassword.disabled = true;
        });
    </script>
@endsection
