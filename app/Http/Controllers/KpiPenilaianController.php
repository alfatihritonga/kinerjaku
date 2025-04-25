<?php

namespace App\Http\Controllers;

use App\Models\KpiDetailPenilaian;
use App\Models\KpiHasil;
use App\Models\KpiPenilaian;
use App\Models\Kriteria;
use App\Models\Pegawai;
use App\Models\PeriodePenilaian;
use App\Models\SubKriteria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KpiPenilaianController extends Controller
{
    /**
    * Display a listing of the resource.
    */
    public function index($periodeId)
    {
        $periode = PeriodePenilaian::where('id', $periodeId)->first();
        
        if (!$periode) {
            return redirect()->route('home')->with('error', 'Periode penilaian tidak ada.');
        }

        if ($periode->status == 'closed') {
            return redirect()->route('home')->with('warning', 'Penilaian sudah ditutup.');
        }
        
        // Cek apakah sudah masuk tanggal mulai akses
        if (now()->format('Y-m-d') < $periode->tanggal_mulai) {
            return redirect()->route('home')->with('error', 'Periode Penilaian belum dapat diakses.');
        } elseif (now()->format('Y-m-d') > $periode->tanggal_selesai) {
            return redirect()->route('home')->with('error', 'Periode Penilaian tidak dapat diakses.');
        }

        $idPenilai = Auth::user()->pegawai->id;
        $unitKerjaPenilai = Auth::user()->pegawai->unitKerja->id;
        $divisiPenilai = Auth::user()->pegawai->divisi->id;
        $levelPenilai = Auth::user()->pegawai->jabatan->level;

        if ($levelPenilai == 2) {
            $pegawai_dinilai = Pegawai::where('id', '!=', $idPenilai)
            ->where('aktif', true)
                ->where(function ($query) use ($divisiPenilai) {
                    $query->whereHas('jabatan', function ($q) {
                        $q->where('level', 5);
                    })
                    ->orWhere(function ($subQuery) use ($divisiPenilai) {
                        $subQuery->where('divisi_id', $divisiPenilai)
                        ->whereHas('jabatan', function ($q) {
                            $q->whereNotIn('level', [1, 2, 3, 4]);
                        });
                    });
                })
                ->get();
        }
        
        if ($levelPenilai == 3) {
            $pegawai_dinilai = Pegawai::where('id', '!=', $idPenilai)
            ->where('aktif', true)
            ->where('divisi_id', $divisiPenilai)
            ->whereHas('jabatan', function ($query) {
                $query->where('level', '>', 4);
            })
            ->get();
        }

        if ($levelPenilai == 1) {
            $pegawai_dinilai = Pegawai::where('id', '!=', $idPenilai)
            ->where('aktif', true)
            ->where('divisi_id', $divisiPenilai)
            ->get();
        }

        if ($levelPenilai == 4) {
            $pegawai_dinilai = Pegawai::where('id', '!=', $idPenilai)
            ->where('aktif', true)
            ->where('unit_kerja_id', $unitKerjaPenilai)
            ->whereHas('jabatan', function ($query) {
                $query->where('level', '>', 4);
            })
            ->get();
        }

        if ($levelPenilai == 5) {
            $pegawai_dinilai = Pegawai::where('id', '!=', $idPenilai)
            ->where('aktif', true)
            ->where('unit_kerja_id', $unitKerjaPenilai)
            ->whereHas('jabatan', function ($query) use ($levelPenilai) {
                $query->where('level', '>', $levelPenilai);
            })
            ->get();
        }

        // return response()->json($pegawai_dinilai);
        return view('penilaian.pegawai.index', compact('pegawai_dinilai', 'periode'));
    }
    
    /**
    * Show the form for creating a new resource.
    */
    public function create($periodeId, Pegawai $pegawai)
    {
        // dd($pegawai);
        $idPenilai = Auth::user()->pegawai->id;
        $unitKerjaPenilai = Auth::user()->pegawai->unitKerja->id ?? 1;
        $divisiPenilai = Auth::user()->pegawai->divisi->id;
        $levelPenilai = Auth::user()->pegawai->jabatan->level;

        if ($idPenilai == $pegawai->id) {
            return redirect()->route('penilaian.index', $periodeId)->with('warning', 'Anda tidak bisa menilai diri sendiri.');
        }
        
        if ($levelPenilai > $pegawai->jabatan->level) {
            return response()->json([
                'status' => 'unauthorized',
                'message' => 'Anda tidak berhak menilai atasan',
                'link' => [
                    'home' => route('home'),
                    '_back' => route('penilaian.index', $periodeId)
                ]
            ]);
        } elseif ($levelPenilai == $pegawai->jabatan->level) {
            return response()->json([
                'status' => 'unauthorized',
                'message' => 'Anda tidak berhak menilai pegawai dengan jabatan yang setara',
                'link' => [
                    'home' => route('home'),
                    '_back' => route('penilaian.index', $periodeId)
                ]
            ]);
        }

        if ($levelPenilai == 4 && $unitKerjaPenilai != $pegawai->unit_kerja_id) {
            return response()->json([
                'status' => 'unauthorized',
                'message' => 'Anda tidak berhak menilai pegawai di unit kerja lain',
                'data' => [
                    'level_penilai' => Auth::user()->pegawai->jabatan->nama,
                    'unit_kerja_penilai' => Auth::user()->pegawai->unitKerja->nama,
                    'unit_kerja_dinilai' => $pegawai->unitKerja->nama,
                ]
            ]);
        }

        $hasRecord = KpiPenilaian::where('dinilai_id', $pegawai->id)
                    ->where('penilai_id', $idPenilai)
                    ->where('periode_id', $periodeId)
                    ->exists();
        if ($hasRecord) {
            return back()->with('warning', 'Penilaian sudah dilakukan.');
        }                
        
        $periode = PeriodePenilaian::findOrfail($periodeId);

        if ($periode->status == 'closed') {
            return redirect()->route('home')->with('warning', 'Penilaian sudah ditutup.');
        }
        
        // Cek apakah sudah masuk tanggal mulai akses
        if (now()->format('Y-m-d') < $periode->tanggal_mulai) {
            return redirect()->route('home')->with('error', 'Penilaian belum dapat diakses.');
        } elseif (now()->format('Y-m-d') > $periode->tanggal_selesai) {
            return redirect()->route('home')->with('warning', 'Penilaian sudah selesai.');
        }
        
        $kriterias = Kriteria::all();
        // Ambil sub-kriteria yang sesuai dengan level jabatan pegawai yang dinilai
        $subKriterias = SubKriteria::where(function ($query) use ($pegawai) {
            $query->whereNull('level_maksimal')  // Ambil yang level_maksimal NULL
            ->orWhere('level_maksimal', '>=', $pegawai->jabatan->level); // Atau yang masih bisa dijangkau
        })->get();
        
        return view('penilaian.pegawai.create', compact('pegawai', 'kriterias', 'subKriterias', 'periode'));
    }
    
    /**
    * Store a newly created resource in storage.
    */
    public function store(Request $request, $periodeId, Pegawai $pegawai)
    {
        $request->validate([
            'nilai' => 'required|array',
            'nilai.*' => 'integer|min:1|max:4',
            'catatan' => 'nullable|string'
        ]);
        
        $kpiPenilaian = KpiPenilaian::create([
            'penilai_id' => Auth::user()->pegawai->id,
            'dinilai_id' => $pegawai->id,
            'periode_id' => $periodeId,
            'catatan' => $request->catatan
        ]);
        
        foreach ($request->nilai as $sub_kriteria_id => $nilai) {
            KpiDetailPenilaian::create([
                'penilaian_id' => $kpiPenilaian->id,
                'sub_kriteria_id' => $sub_kriteria_id,
                'nilai' => $nilai
            ]);
        }
        
        $kpiDetailPenilaian = KpiDetailPenilaian::where('penilaian_id', $kpiPenilaian->id)->get();
        $kriterias = Kriteria::with('subKriterias')->get();
        
        $totalSkorAkhir = 0;
        
        foreach ($kriterias as $k) {
            $nilaiSubKriteria = $kpiDetailPenilaian->whereIn('sub_kriteria_id', $k->subKriterias->pluck('id'));
            
            if ($nilaiSubKriteria->isEmpty()) continue;
            
            $totalSkorAspek = $nilaiSubKriteria->sum(fn($item) => $item->nilai * 10);
            $rataRataSkorAspek = $totalSkorAspek / $nilaiSubKriteria->count();
            $skorAkhirAspek = $rataRataSkorAspek * $k->bobot;
            
            $totalSkorAkhir += $skorAkhirAspek;
        }
        
        $totalAkhirKPI = ($totalSkorAkhir / $kriterias->count()) * 10;

        $hasilKPI = $this->simpanKpiHasil($pegawai, $periodeId, $totalAkhirKPI);

        return redirect()->route('penilaian.index', $periodeId)->with('success', 'Penilaian pegawai berhasil disimpan.');
    }
    
    function simpanKpiHasil($pegawai, $periodeId, $totalAkhirKPI) {
        $penilai = Auth::user()->pegawai;

        $kpiHasil = KpiHasil::where('periode_id', $periodeId)
        ->where('dinilai_id', $pegawai->id)
        ->first();

        // jika pegawai dinilai kabid/kasubid
        if ($pegawai->jabatan->level == 5) {
            // jika data hasil sudah ada
            if ($kpiHasil) {            
                // jika yg menilai bukan ketua stmik
                if ($penilai->jabatan->level > 2) {
                    $kpiHasil->update([
                        'penilai_dua_id' => $penilai->id,
                        'nilai_oleh_dua' => $totalAkhirKPI,
                    ]);
                } else {
                    $kpiHasil->update([
                        'penilai_satu_id' => $penilai->id,
                        'nilai_oleh_satu' => $totalAkhirKPI,
                    ]);
                }
            } else {
                // jika yg menilai bukan ketua stmik
                if ($penilai->jabatan->level > 2) {
                    KpiHasil::create([
                        'dinilai_id' => $pegawai->id,
                        'periode_id' => $periodeId,
                        'penilai_dua_id' => $penilai->id,
                        'nilai_oleh_dua' => $totalAkhirKPI,
                    ]);
                } else {
                    KpiHasil::create([
                        'dinilai_id' => $pegawai->id,
                        'periode_id' => $periodeId,
                        'penilai_satu_id' => $penilai->id,
                        'nilai_oleh_satu' => $totalAkhirKPI,
                    ]);
                }
            }
        } 
        
        // jika pegawai dinilai staff
        if ($pegawai->jabatan->level == 6) {
            // jika data hasil sudah ada
            if ($kpiHasil) {
                if ($kpiHasil->penilai_satu_id) {
                    // Cek level jabatan penilai
                    if ($penilai->jabatan->level <= 2) {
                        $kpiHasil->update([
                            'penilai_dua_id' => $kpiHasil->penilai_satu_id,
                            'nilai_oleh_dua' => $kpiHasil->nilai_oleh_satu,
                            'penilai_satu_id' => $penilai->id,
                            'nilai_oleh_satu' => $totalAkhirKPI,
                        ]);
                    } else {
                        $kpiHasil->update([
                            'penilai_dua_id' => $penilai->id,
                            'nilai_oleh_dua' => $totalAkhirKPI,
                        ]);
                    }
                } else {
                    if ($penilai->jabatan->level < 5) {
                        $kpiHasil->update([
                            'penilai_satu_id' => $penilai->id,
                            'nilai_oleh_satu' => $totalAkhirKPI,
                        ]);
                    } else {
                        $kpiHasil->update([
                            'penilai_dua_id' => $penilai->id,
                            'nilai_oleh_dua' => $totalAkhirKPI,
                        ]);
                    }
                }
            } else {
                // jika yg menilai bukan ketua stmik
                if ($penilai->jabatan->level > 4) {
                    KpiHasil::create([
                        'dinilai_id' => $pegawai->id,
                        'periode_id' => $periodeId,
                        'penilai_dua_id' => $penilai->id,
                        'nilai_oleh_dua' => $totalAkhirKPI,
                    ]);
                } else {
                    KpiHasil::create([
                        'dinilai_id' => $pegawai->id,
                        'periode_id' => $periodeId,
                        'penilai_satu_id' => $penilai->id,
                        'nilai_oleh_satu' => $totalAkhirKPI,
                    ]);
                }
            }
        }
    }
    
    /**
    * Display the specified resource.
    */
    public function show(KpiPenilaian $kpiPenilaian)
    {
        //
    }
    
    /**
    * Show the form for editing the specified resource.
    */
    public function edit(KpiPenilaian $kpiPenilaian)
    {
        //
    }
    
    /**
    * Update the specified resource in storage.
    */
    public function update(Request $request, KpiPenilaian $kpiPenilaian)
    {
        //
    }
    
    /**
    * Remove the specified resource from storage.
    */
    public function destroy(KpiPenilaian $kpiPenilaian)
    {
        //
    }
}
