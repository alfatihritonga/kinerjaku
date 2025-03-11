<?php

namespace App\Http\Controllers;

use App\Models\KpiDetailPenilaian;
use App\Models\KpiHasil;
use App\Models\KpiHasilKasubid;
use App\Models\KpiHasilStaff;
use App\Models\KpiPenilaian;
use App\Models\Kriteria;
use App\Models\PeriodePenilaian;
use App\Models\SubKriteria;
use App\Models\User;
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
            return redirect()->route('home')->with('error', 'Penilaian belum dapat diakses.');
        } elseif (now()->format('Y-m-d') > $periode->tanggal_selesai) {
            return redirect()->route('home')->with('warning', 'Penilaian sudah selesai.');
        }
        
        // Pegawai yang bisa dinilai (hanya bawahan langsung)
        if (Auth::user()->jabatan->level >= 3) {
            $pegawai_dinilai = User::where('id', '!=', Auth::id())
            ->where('unit_kerja_id', Auth::user()->unitKerja->id)
            ->whereHas('jabatan', function ($query) {
                $query->where('level', '>', Auth::user()->jabatan->level);
            })
            ->get();
        } elseif (Auth::user()->jabatan->level == 1) {
            $pegawai_dinilai = User::where('id', '!=', Auth::id())
            ->where('divisi_id', Auth::user()->divisi->id)
            ->get();
        }
        else {
            $pegawai_dinilai = User::where('id', '!=', Auth::id())
            ->whereHas('jabatan', function ($query) {
                $query->whereNotIn('level', [1, 2, 3]) // Mengecualikan level 1, 2 & 3
              ->where('level', 4);
            })
            ->orWhere(function ($query) {
                $query->where('divisi_id', Auth::user()->divisi->id)
                      ->whereHas('jabatan', function ($subQuery) {
                          $subQuery->whereNotIn('level', [1, 2, 3]); // Pastikan tetap mengecualikan
                      });
            })
            ->get();
        }
        
        // return response()->json($pegawai_dinilai);
        return view('penilaian.pegawai.index', compact('pegawai_dinilai', 'periode'));
    }
    
    /**
    * Show the form for creating a new resource.
    */
    public function create($periodeId, User $pegawai)
    {
        if (Auth::user()->id == $pegawai->id) {
            return redirect()->route('penilaian.index', $periodeId)->with('warning', 'Anda tidak bisa menilai diri sendiri.');
        }

        $hasRecord = \App\Models\KpiPenilaian::where('dinilai_id', $pegawai->id)
                    ->where('penilai_id', Auth::user()->id)
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
    public function store(Request $request, $periodeId, User $pegawai)
    {
        $request->validate([
            'nilai' => 'required|array',
            'nilai.*' => 'integer|min:1|max:4',
            'catatan' => 'nullable|string'
        ]);
        
        $kpiPenilaian = KpiPenilaian::create([
            'penilai_id' => Auth::id(),
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
        $kpiHasil = KpiHasil::where('periode_id', $periodeId)
        ->where('dinilai_id', $pegawai->id)
        ->first();

        if ($kpiHasil) {
            // Jika sudah ada data, update nilai
            if (Auth::user()->jabatan->level > 2) {
                if ($kpiHasil->penilai_satu_id) {
                    $kpiHasil->update([
                        'penilai_dua_id' => Auth::user()->id,
                        'nilai_oleh_dua' => $totalAkhirKPI,
                    ]);
                } else {
                    $kpiHasil->update([
                        'penilai_satu_id' => Auth::user()->id,
                        'nilai_oleh_satu' => $totalAkhirKPI,
                    ]);
                }
            } else {
                if ($kpiHasil->penilai_satu_id) {
                    $kpiHasil->update([
                        'penilai_dua_id' => $kpiHasil->penilai_satu_id,
                        'nilai_oleh_dua' => $kpiHasil->nilai_oleh_satu,
                        'penilai_satu_id' => Auth::user()->id,
                        'nilai_oleh_satu' => $totalAkhirKPI,
                    ]);
                } else {
                    $kpiHasil->update([
                        'penilai_satu_id' => Auth::user()->id,
                        'nilai_oleh_satu' => $totalAkhirKPI,
                    ]);
                }
            }
        } else {
            // Jika belum ada data, buat baru
            $data = [
                'dinilai_id' => $pegawai->id,
                'periode_id' => $periodeId,
                'penilai_satu_id' => Auth::user()->id,
                'nilai_oleh_satu' => $totalAkhirKPI,
            ];
            KpiHasil::create($data);
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
