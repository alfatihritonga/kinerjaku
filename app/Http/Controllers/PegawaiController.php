<?php

namespace App\Http\Controllers;

use App\Models\Divisi;
use App\Models\Jabatan;
use App\Models\Pegawai;
use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    /**
    * Display a listing of the resource.
    */
    public function index()
    {
        $pegawais = Pegawai::orderBy('aktif', 'desc')->get();
        
        return view('pegawai.index', compact('pegawais'));
    }
    
    /**
    * Show the form for creating a new resource.
    */
    public function create()
    {
        $divisis = Divisi::select('id', 'nama')->get();
        $jabatans = Jabatan::select('id', 'nama')->get();
        
        return view('pegawai.create', compact('divisis', 'jabatans'));
    }
    
    /**
    * Store a newly created resource in storage.
    */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string',
            'nip' => 'required|numeric|unique:pegawais,nip',
            'divisi_id' => 'required',
            'unit_kerja_id' => 'required',
            'jabatan_id' => 'required',
        ]);
        
        Pegawai::create([
            'nama' => $request->nama,
            'nip' => $request->nip,
            'divisi_id' => $request->divisi_id,
            'unit_kerja_id' => $request->unit_kerja_id,
            'jabatan_id' => $request->jabatan_id,
            'aktif' => true,
        ]);
        
        return redirect()->route('pegawai.index')->with('success', 'Pegawai berhasil ditambahkan.');
    }
    
    /**
    * Display the specified resource.
    */
    public function show(string $id)
    {
        $pegawai = Pegawai::findOrFail($id);
        
        return response()->json([
            'message' => 'Detail Pegawai',
            'data' => $pegawai
        ]);
    }
    
    /**
    * Show the form for editing the specified resource.
    */
    public function edit(string $id)
    {
        $pegawai = Pegawai::findOrFail($id);
        $divisis = Divisi::select('id', 'nama')->get();
        $jabatans = Jabatan::select('id', 'nama')->get();
        
        return view('pegawai.edit', compact('pegawai', 'divisis', 'jabatans'));
    }
    
    /**
    * Update the specified resource in storage.
    */
    public function update(Request $request, string $id)
    {
        $pegawai = Pegawai::findOrFail($id);
        
        $request->validate([
            'nama' => 'required|string',
            'nip' => 'required|numeric|unique:pegawais,nip,' . $pegawai->id,
            'divisi_id' => 'required',
            'unit_kerja_id' => 'required',
            'jabatan_id' => 'required',
            'aktif' => 'boolean',
        ]);
        
        $pegawai->update($request->only(['nama', 'nip', 'divisi_id', 'unit_kerja_id', 'jabatan_id', 'aktif']));
        
        return redirect()->route('pegawai.index')->with('success', 'Pegawai berhasil diperbarui');
    }
    
    /**
    * Remove the specified resource from storage.
    */
    public function destroy(string $id)
    {
        Pegawai::findOrFail($id)->delete();
        
        return redirect()->route('pegawai.index')->with('success', 'Pegawai berhasil dihapus');
    }
}
