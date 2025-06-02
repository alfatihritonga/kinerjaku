<?php

namespace App\Http\Controllers;

use App\Models\KpiHasil;
use App\Models\KpiPenilaian;
use App\Models\PeriodePenilaian;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KpiHasilController extends Controller
{
    /**
    * Display a listing of the resource.
    */
    public function index()
    {
        $periode = PeriodePenilaian::all();
        
        // return response()->json([
        //     'periode' => $periode
        // ]);
        
        return view('penilaian.hasil.index', compact('periode'));
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
    public function show($id)
    {
        $hasilKpi = KpiHasil::where('periode_id', $id)
        ->orderByRaw('(nilai_oleh_satu + nilai_oleh_dua) DESC')
        ->get();
        
        return view('penilaian.hasil.show', compact('hasilKpi'));
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
    
    public function periode()
    {
        $periode = PeriodePenilaian::all();
        
        return view('penilaian.periode.hasil', compact('periode'));
    }
    
    public function hasil($periodeId)
    {   
        $hasils = KpiHasil::where(function ($query) {
            $query->where('penilai_satu_id', Auth::user()->pegawai->id)
            ->orWhere('penilai_dua_id', Auth::user()->pegawai->id);
        })
        ->where('periode_id', $periodeId)
        ->with([
            'catatanSaya' => function ($query) use ($periodeId) {
                $query->where('penilai_id', auth()->user()->pegawai->id)
                    ->where('periode_id', $periodeId);
            },
            'dinilai'
        ])
        ->get();
        
        if ($hasils->isEmpty()) {
            return back()->with('warning', 'Hasil Penilaian belum ada.');
        }
        
        return view('penilaian.pegawai.hasil', compact('hasils'));
    }
    
    public function hasilAkhir($periodeId, $level)
    {
        $hasilKpi = KpiHasil::with(['pegawai.jabatan'])
        ->selectRaw('
            kpi_hasils.*,
            CASE
                WHEN nilai_oleh_satu > 0 AND nilai_oleh_dua > 0 THEN 
                    ((nilai_oleh_satu + nilai_oleh_dua) / 2 + nilai_kedisiplinan) / 2
                WHEN nilai_oleh_satu > 0 AND (nilai_oleh_dua IS NULL OR nilai_oleh_dua = 0) THEN
                    (nilai_oleh_satu + nilai_kedisiplinan) / 2
                WHEN (nilai_oleh_satu IS NULL OR nilai_oleh_satu = 0) AND nilai_oleh_dua > 0 THEN
                    (nilai_oleh_dua + nilai_kedisiplinan) / 2
                ELSE
                    nilai_kedisiplinan
            END AS grand_total
        ')
        ->where('periode_id', $periodeId)
        ->whereHas('pegawai.jabatan', function ($q) use ($level) {
            $q->where('level', $level);
        })
        ->orderByDesc('grand_total')
        ->get();

        // dd($hasilKpi);
        
        if ($hasilKpi->isEmpty()) {
            return back()->with('warning', 'Hasil Penilaian belum ada.');
        }
        
        return view('penilaian.hasil.show', compact('hasilKpi', 'level'));
    }
    
    public function cetakLaporan($periodeId, $level)
    {
        $hasilKpi = KpiHasil::with(['pegawai.jabatan'])
        ->selectRaw('
            kpi_hasils.*,
            CASE
                WHEN nilai_oleh_satu > 0 AND nilai_oleh_dua > 0 THEN 
                    ((nilai_oleh_satu + nilai_oleh_dua) / 2 + nilai_kedisiplinan) / 2
                WHEN nilai_oleh_satu > 0 AND (nilai_oleh_dua IS NULL OR nilai_oleh_dua = 0) THEN
                    (nilai_oleh_satu + nilai_kedisiplinan) / 2
                WHEN (nilai_oleh_satu IS NULL OR nilai_oleh_satu = 0) AND nilai_oleh_dua > 0 THEN
                    (nilai_oleh_dua + nilai_kedisiplinan) / 2
                ELSE
                    nilai_kedisiplinan
            END AS grand_total
        ')
        ->where('periode_id', $periodeId)
        ->whereHas('pegawai.jabatan', function ($q) use ($level) {
            $q->where('level', $level);
        })
        ->orderByDesc('grand_total')
        ->get();
        
        if ($hasilKpi->isEmpty()) {
            return back()->with('warning', 'Hasil Penilaian belum ada.');
        }
        
        $pdf = Pdf::loadView('reports.hasil-akhir-penilaian', compact('hasilKpi', 'level'))
        ->setPaper('a4', 'landscape');
        
        
        return $pdf->stream(
            'Hasil Akhir Penilaian ' 
            . ($level == 5 ? 'Kasubid' : 'Staff') 
            . ' - Periode '
            . (optional($hasilKpi->first()->periode)->bulan . ' ' . optional($hasilKpi->first()->periode)->tahun)
            . '.pdf'
        );
    }
}
