<?php

namespace App\Http\Controllers;

use App\Models\Divisi;
use App\Models\Jabatan;
use App\Models\UnitKerja;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
    * Display a listing of the resource.
    */
    public function index()
    {
        $pegawais = User::where('role', 'pegawai')->get();
        
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
            'nip' => 'required|numeric|unique:users,nip',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
            'divisi_id' => 'required',
            'unit_kerja_id' => 'required',
            'jabatan_id' => 'required',
        ]);
        
        User::create([
            'nama' => $request->nama,
            'nip' => $request->nip,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'divisi_id' => $request->divisi_id,
            'unit_kerja_id' => $request->unit_kerja_id,
            'jabatan_id' => $request->jabatan_id,
            'role' => 'pegawai'
        ]);
        
        return redirect()->route('pegawai.index')->with('success', 'Pegawai berhasil ditambahkan.');
    }
    
    /**
    * Display the specified resource.
    */
    public function show(string $id)
    {
        $pegawai = User::findOrFail($id);
        
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
        $pegawai = User::findOrFail($id);
        $divisis = Divisi::select('id', 'nama')->get();
        $jabatans = Jabatan::select('id', 'nama')->get();
        
        return view('pegawai.edit', compact('pegawai', 'divisis', 'jabatans'));
    }
    
    /**
    * Update the specified resource in storage.
    */
    public function update(Request $request, string $id)
    {
        $pegawai = User::findOrFail($id);
        
        $request->validate([
            'nama' => 'required|string',
            'nip' => 'required|numeric|unique:users,nip,' . $pegawai->id,
            'email' => 'required|email|unique:users,email,' . $pegawai->id,
            'divisi_id' => 'required',
            'unit_kerja_id' => 'required',
            'jabatan_id' => 'required',
            'password' => $request->filled('password') ? 'nullable|min:8' : '',
        ]);
        
        $data = $request->except('password');
        
        if ($request->filled('password')) {
            $data['password'] = bcrypt($request->password);
        }
        
        $pegawai->update($data);
        
        return redirect()->route('pegawai.index')->with('success', 'Pegawai berhasil diperbarui');
    }
    
    /**
    * Remove the specified resource from storage.
    */
    public function destroy(string $id)
    {
        User::findOrFail($id)->delete();
        
        return redirect()->route('pegawai.index')->with('success', 'Pegawai berhasil dihapus');
    }
}
