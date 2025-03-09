<?php

namespace App\Http\Controllers;

use App\Models\Jabatan;
use Illuminate\Http\Request;

class JabatanController extends Controller
{
    /**
    * Display a listing of the resource.
    */
    public function index()
    {
        $jabatans = Jabatan::select('id', 'nama', 'level')->get();
        
        return view('jabatan.index', compact('jabatans'));
    }
    
    /**
    * Show the form for creating a new resource.
    */
    public function create()
    {
        return view('jabatan.create');
    }
    
    /**
    * Store a newly created resource in storage.
    */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255|unique:jabatans,nama',
            'level' => 'required|integer|min:1',
        ]);
        
        Jabatan::create([
            'nama' => $request->nama,
            'level' => $request->level
        ]);
        
        return redirect()->route('jabatan.index')->with('success', 'Jabatan berhasil ditambahkan.');
    }
    
    /**
    * Display the specified resource.
    */
    public function show(Jabatan $jabatan)
    {
        return response()->json([
            'message' => 'Detail Jabatan',
            'data' => $jabatan
        ]);
    }
    
    /**
    * Show the form for editing the specified resource.
    */
    public function edit(Jabatan $jabatan)
    {
        return view('jabatan.edit', compact('jabatan'));
    }
    
    /**
    * Update the specified resource in storage.
    */
    public function update(Request $request, Jabatan $jabatan)
    {
        $request->validate([
            'nama' => 'required|unique:jabatans,nama,' . $jabatan->id,
            'level' => 'required|integer|min:1',
        ]);
        
        $jabatan->update($request->all());
        
        return redirect()->route('jabatan.index')->with('success', 'Jabatan berhasil diperbarui.');
    }
    
    /**
    * Remove the specified resource from storage.
    */
    public function destroy(Jabatan $jabatan)
    {
        $jabatan->delete();
        return redirect()->route('jabatan.index')->with('success', 'Jabatan berhasil dihapus.');
    }
}
