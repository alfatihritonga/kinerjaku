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
        $penilaians = KpiPenilaian::where('penilai_id', Auth::user()->id)->get();
        
        return view('penilaian.pegawai.hasil', compact('penilaians'));
    }
}
