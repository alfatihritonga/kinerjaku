<?php

namespace App\Http\Controllers;

use App\Models\Divisi;
use App\Models\UnitKerja;
use Illuminate\Http\Request;

class UnitKerjaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $unitKerja = UnitKerja::with('divisi')->get();

        return view('unit-kerja.index', compact('unitKerja'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $divisi = Divisi::select('id', 'nama')->get();
        
        return view('unit-kerja.create', compact('divisi'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255|unique:divisis,nama',
            'divisi_id' => 'required|exists:divisis,id',
        ]);
        
        UnitKerja::create([
            'nama' => $request->nama,
            'divisi_id' => $request->divisi_id,
        ]);
        
        return redirect()->route('unit-kerja.index')->with('success', 'Unit Kerja berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(UnitKerja $unitKerja)
    {
        return response()->json([
            'message' => 'Detail Unit Kerja',
            'data' => $unitKerja
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(UnitKerja $unitKerja)
    {
        return view('unit-kerja.edit', compact('unitKerja'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, UnitKerja $unitKerja)
    {
        $request->validate([
            'nama' => 'required|string|max:255|unique:divisis,nama',
            'divisi_id' => 'required|exists:divisis,id',
        ]);
        
        $unitKerja->update($request->all());
        
        return redirect()->route('unit-kerja.index')->with('success', 'Unit Kerja berhasil diperbarui.');
    }
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UnitKerja $unitKerja)
    {
        $unitKerja->delete();
        
        return redirect()->route('unit-kerja.index')->with('success', 'Unit Kerja berhasil dihapus.');
    }
}
