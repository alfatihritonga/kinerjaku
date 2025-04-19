<?php

namespace App\Http\Controllers;

use App\Models\KpiHasil;
use App\Models\PeriodePenilaian;
use Illuminate\Http\Request;

class NilaiKedisiplinanController extends Controller
{
    public function index()
    {
        $periode = PeriodePenilaian::all();
        
        return view('penilaian.kedisiplinan.index', compact('periode'));
    }

    public function showImport($periodeId)
    {
        $periode = PeriodePenilaian::where('id', $periodeId)->first();

        return view('imports.nilai-kedisiplinan', compact('periode'));
    }

    // public function hasil($periodeId, $level)
    // {
    //     $hasilKpi = KpiHasil::where('periode_id', $periodeId)
    //     ->whereHas('pegawai', function ($query) use ($level) { // Gunakan `use ($level)`
    //         $query->whereHas('jabatan', function ($q) use ($level) { // Gunakan `use ($level)`
    //             $q->where('level', $level);
    //         });
    //     })
    //     ->orderByRaw('(nilai_oleh_satu + nilai_oleh_dua) DESC')
    //     ->get();
        
    //     return view('penilaian.hasil-kasubid.index', compact('hasilKpi'));
    // }
}
