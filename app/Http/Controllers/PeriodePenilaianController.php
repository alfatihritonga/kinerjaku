<?php

namespace App\Http\Controllers;

use App\Models\KpiPenilaian;
use App\Models\PeriodePenilaian;
use Illuminate\Http\Request;

class PeriodePenilaianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $periodes = PeriodePenilaian::orderBy('tanggal_mulai', 'desc')->get();

        return view('penilaian.periode.index', compact('periodes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('penilaian.periode.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'keterangan' => 'required|string|max:255',
            'bulan' => 'required|string|max:255',
            'tahun' => 'required|string|max:255',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai',
        ]);

        PeriodePenilaian::create([
            'keterangan' => $request->keterangan,
            'bulan' => $request->bulan,
            'tahun' => $request->tahun,
            'tanggal_mulai' => $request->tanggal_mulai,
            'tanggal_selesai' => $request->tanggal_selesai,
            'status' => 'open'
        ]);

        return redirect()->route('periode.index')->with('success', 'Periode berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $periode = PeriodePenilaian::findOrFail($id);
        $penilaian = KpiPenilaian::where('periode_id', $periode)->get();

        return response()->json([
            'periode' => $periode,
            'penilaian' => $penilaian
        ]);
        // return view('penilaian.periode.show', compact('periode', 'penilaians'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $periode = PeriodePenilaian::findOrFail($id);

        return view('penilaian.periode.edit', compact('periode'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'keterangan' => 'required|string|max:255',
            'bulan' => 'required|string|max:255',
            'tahun' => 'required|string|max:255',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai',
            'status' => 'required|in:open,closed'
        ]);

        $periode = PeriodePenilaian::findOrFail($id);
        $periode->update($request->all());

        return redirect()->route('periode.index')->with('success', 'Periode berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        PeriodePenilaian::findOrFail($id)->delete();

        return redirect()->route('periode.index')->with('success', 'Periode berhasil dihapus');
    }

    public function closed($id)
    {
        $periode = PeriodePenilaian::findOrFail($id);
        $periode->status = 'closed';
        $periode->save();
        
        return redirect()->route('periode.index')->with('success', 'Status Periode berhasil ditutup');
    }

    public function open($id)
    {
        $periode = PeriodePenilaian::findOrFail($id);
        $periode->status = 'open';
        $periode->save();
        
        return redirect()->route('periode.index')->with('success', 'Status Periode berhasil dibuka');
    }
}
