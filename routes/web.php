<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DivisiController;
use App\Http\Controllers\GetUnitKerjaController;
use App\Http\Controllers\ImportController;
use App\Http\Controllers\JabatanController;
use App\Http\Controllers\KpiHasilController;
use App\Http\Controllers\KpiPenilaianController;
use App\Http\Controllers\KriteriaController;
use App\Http\Controllers\NilaiKedisiplinanController;
use App\Http\Controllers\PeriodePenilaianController;
use App\Http\Controllers\SubKriteriaController;
use App\Http\Controllers\UnitKerjaController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserProfileController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('login', [AuthController::class, 'showLogin'])->name('login')->middleware('guest');
Route::post('login', [AuthController::class, 'login']);
Route::post('logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

Route::middleware('auth')->group(function () {
    Route::get('/', function () {
        return redirect()->route('home');
    });
    
    Route::get('home', [DashboardController::class, 'index'])->name('home');
    
    /**
    * CRUD menggunakan resource.
    */
    // divisi
    Route::resource('divisi', DivisiController::class);
    
    Route::resource('unit-kerja', UnitKerjaController::class);
    
    Route::resource('jabatan', JabatanController::class);
    
    Route::resource('pegawai', UserController::class);
    Route::get('unit-kerja/by/{divisiId}', GetUnitKerjaController::class);
    
    Route::resource('kriteria', KriteriaController::class);
    
    Route::resource('subkriteria', SubKriteriaController::class);
    
    Route::resource('periode', PeriodePenilaianController::class);
    Route::prefix('periode')->group(function () {
        Route::put('closed/{periode}', [PeriodePenilaianController::class, 'closed'])
        ->name('periode.closed');
        
        Route::put('open/{periode}', [PeriodePenilaianController::class, 'open'])
        ->name('periode.open');
    });
    
    Route::get('penilaian/periode/{periodeId}', [KpiPenilaianController::class, 'index'])
        ->name('penilaian.index');
    
    Route::get('penilaian/periode/{periodeId}/pegawai/{pegawai}', [KpiPenilaianController::class, 'create'])
        ->name('penilaian.create');
    
    Route::post('penilaian/periode/{periodeId}/pegawai/{pegawai}', [KpiPenilaianController::class, 'store'])
        ->name('penilaian.store');
    
    Route::get('nilai-kedisiplinan', [NilaiKedisiplinanController::class, 'index'])
        ->name('nilai.kedisiplinan.index');
    
    Route::get('nilai-kedisiplinan/import/periode/{periodeId}', [NilaiKedisiplinanController::class, 'showImport'])
        ->name('nilai.kedisiplinan.import');

    Route::post('nilai-kedisiplinan/import/periode/{periodeId}', [ImportController::class, 'nilaiKedisiplinan'])
        ->name('nilai.kedisiplinan.import.data');

    Route::resource('hasil', KpiHasilController::class);
    Route::get('hasil-penilaian', [KpiHasilController::class, 'hasil'])
        ->name('penilaian.hasil');

    Route::get('hasil/periode/{periodeId}/kategori/{level}', [KpiHasilController::class, 'hasilAkhir'])
        ->name('hasil.kpi');

    Route::get('hasil/periode/{periodeId}/kategori/{level}/cetak', [KpiHasilController::class, 'cetakLaporan'])
        ->name('hasil.kpi.cetak');
    
    Route::get('profile', [UserProfileController::class, 'index'])
        ->name('user.profile');
    
    Route::post('profile/update-profile', [UserProfileController::class, 'updateProfile'])
        ->name('user.update.profile');
    
    Route::post('profile/update-password', [UserProfileController::class, 'updatePassword'])
        ->name('user.update.password');
});