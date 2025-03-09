<?php

namespace App\Http\Controllers;

use App\Models\Divisi;
use App\Models\User;
use Illuminate\Http\Request;

class DivisiController extends Controller
{
    /**
    * Display a listing of the resource.
    */
    public function index()
    {
        $divisis = Divisi::select('id', 'nama')->get();
        
        return view('divisi.index', compact('divisis'));
    }
    
    /**
    * Show the form for creating a new resource.
    */
    public function create()
    {
        return view('divisi.create');
    }
    
    /**
    * Store a newly created resource in storage.
    */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255|unique:divisis,nama',
        ]);
        
        Divisi::create([
            'nama' => $request->nama
        ]);
        
        return redirect()->route('divisi.index')->with('success', 'Divisi berhasil ditambahkan.');
    }
    
    /**
    * Display the specified resource.
    */
    public function show(Divisi $divisi)
    {
        return response()->json([
            'message' => 'Detail Divisi',
            'data' => $divisi
        ]);
    }
    
    /**
    * Show the form for editing the specified resource.
    */
    public function edit(Divisi $divisi)
    {
        return view('divisi.edit', compact('divisi'));
    }
    
    /**
    * Update the specified resource in storage.
    */
    public function update(Request $request, Divisi $divisi)
    {
        $request->validate(['nama' => 'required|unique:divisis,nama,' . $divisi->id]);
        
        $divisi->update(['nama' => $request->nama]);
        
        return redirect()->route('divisi.index')->with('success', 'Divisi berhasil diperbarui.');
    }
    
    /**
    * Remove the specified resource from storage.
    */
    public function destroy(Divisi $divisi)
    {
        $divisi->delete();
        return redirect()->route('divisi.index')->with('success', 'Divisi berhasil dihapus.');
    }
}
