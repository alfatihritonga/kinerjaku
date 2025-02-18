<?php

namespace App\Http\Controllers;

use App\Models\KpiHasil;
use App\Models\KpiPenilaian;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KpiHasilController extends Controller
{
    /**
    * Display a listing of the resource.
    */
    public function index()
    {
        //
    }
    
    /**
    * Show the form for creating a new resource.
    */
    public function create()
    {
        //
    }
    
    /**
    * Store a newly created resource in storage.
    */
    public function store(Request $request)
    {
        //
    }
    
    /**
    * Display the specified resource.
    */
    public function show(KpiHasil $kpiHasil)
    {
        //
    }
    
    /**
    * Show the form for editing the specified resource.
    */
    public function edit(KpiHasil $kpiHasil)
    {
        //
    }
    
    /**
    * Update the specified resource in storage.
    */
    public function update(Request $request, KpiHasil $kpiHasil)
    {
        //
    }
    
    /**
    * Remove the specified resource from storage.
    */
    public function destroy(KpiHasil $kpiHasil)
    {
        //
    }
    
    public function hasil()
    {
        $user = Auth::user();
        
        // Cari ID bawahan yang berada di divisi yang sama
        $bawahans = User::where('atasan_id', $user->id)
        ->where('divisi_id', $user->divisi_id)
        ->pluck('id');
        
        // Cari bawahan yang sudah dinilai oleh user yang login
        $bawahanYangSudahDinilai = KpiPenilaian::where('penilai_id', $user->id)
        ->whereIn('dinilai_id', $bawahans)
        ->pluck('dinilai_id');
        
        // Ambil hasil KPI dari bawahan yang sudah dinilai
        $hasilKpiBawahan = KpiHasil::whereIn('dinilai_id', $bawahanYangSudahDinilai)->get();
        
        return [$hasilKpiBawahan, $bawahanYangSudahDinilai];
    }
}
