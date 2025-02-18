<?php

namespace App\Http\Controllers;

use App\Models\Jabatan;
use App\Models\Kriteria;
use App\Models\SubKriteria;
use Illuminate\Http\Request;

class SubKriteriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subKriterias = SubKriteria::select('id', 'nama', 'kriteria_id')
            ->with('kriteria')
            ->get();
        
        return view('kpi.subkriteria.index', compact('subKriterias'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kriterias = Kriteria::select('id', 'nama')->get();
        $jabatans = Jabatan::select('nama', 'level')->get();

        return view('kpi.subkriteria.create', compact('kriterias', 'jabatans'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'kriteria_id' => 'required|exists:kriterias,id',
            'level_minimal' => 'required|integer|min:1',
            'level_maksimal' => 'nullable|integer|min:1',
        ]);

        SubKriteria::create($request->all());

        return redirect()->route('subkriteria.index')->with('success', 'Sub Kriteria berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(SubKriteria $subKriteria)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $subKriteria = SubKriteria::findOrFail($id);
        $kriteria = Kriteria::all();
        return view('subkriteria.edit', compact('subKriteria', 'kriteria'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'kriteria_id' => 'required|exists:kriterias,id',
            'level_minimal' => 'required|integer|min:1',
            'level_maksimal' => 'nullable|integer|min:1',
        ]);

        $subKriteria = SubKriteria::findOrFail($id);
        $subKriteria->update($request->all());

        return redirect()->route('subkriteria.index')->with('success', 'Sub Kriteria berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        SubKriteria::findOrFail($id)->delete();

        return redirect()->route('subkriteria.index')->with('success', 'Sub Kriteria berhasil dihapus');
    }
}
