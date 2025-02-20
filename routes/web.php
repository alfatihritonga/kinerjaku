<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DivisiController;
use App\Http\Controllers\JabatanController;
use App\Http\Controllers\KpiHasilController;
use App\Http\Controllers\KpiPenilaianController;
use App\Http\Controllers\KriteriaController;
use App\Http\Controllers\PeriodePenilaianController;
use App\Http\Controllers\SubKriteriaController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserProfileController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('home');
})->middleware('auth');

Route::get('home', [DashboardController::class, 'index'])->middleware('auth')->name('home');

Route::get('login', [AuthController::class, 'showLogin'])->name('login');
Route::post('login', [AuthController::class, 'login']);
Route::post('logout', [AuthController::class, 'logout'])->name('logout');

Route::resource('divisi', DivisiController::class)->middleware('auth');

Route::resource('jabatan', JabatanController::class)->middleware('auth');

Route::resource('pegawai', UserController::class)->middleware('auth');

Route::resource('kriteria', KriteriaController::class)->middleware('auth');

Route::resource('subkriteria', SubKriteriaController::class)->middleware('auth');

Route::resource('periode', PeriodePenilaianController::class)->middleware('auth');
Route::put('periode/closed/{periode}', [PeriodePenilaianController::class, 'closed'])
    ->name('periode.closed')
    ->middleware('auth');

Route::resource('hasil', KpiHasilController::class)->middleware('auth');

Route::get('penilaian/{tanggal}', [KpiPenilaianController::class, 'index'])
->middleware('auth')
->name('penilaian.index');

Route::get('penilaian/{pegawai}/{tanggal}', [KpiPenilaianController::class, 'create'])
->middleware('auth')
->name('penilaian.create');

Route::post('penilaian/{pegawai}/{tanggal}', [KpiPenilaianController::class, 'store'])
->middleware('auth')
->name('penilaian.store');

Route::get('hasil-penilaian', [KpiHasilController::class, 'hasil'])
->middleware('auth')
->name('penilaian.hasil');

Route::get('profile', [UserProfileController::class, 'index'])
    ->middleware('auth')
    ->name('user.profile');

Route::post('profile/update-profile', [UserProfileController::class, 'updateProfile'])
    ->middleware('auth')
    ->name('user.update.profile');

Route::post('profile/update-password', [UserProfileController::class, 'updatePassword'])
    ->middleware('auth')
    ->name('user.update.password');
