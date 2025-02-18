<?php

namespace App\Http\Controllers;

use App\Models\KpiDetailPenilaian;
use App\Models\KpiHasil;
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
    public function index($tanggal)
    {
        // Cek apakah ada periode yang cocok dengan tanggal ini
        $periode = PeriodePenilaian::whereDate('tanggal_mulai', '<=', $tanggal)
        ->whereDate('tanggal_selesai', '>=', $tanggal)
        ->where('status', 'open')
        ->first();
        
        if (!$periode) {
            return redirect()->route('home')->with('warning', 'Tidak ada periode penilaian aktif pada tanggal ini.');
        }
        
        // Cek apakah sudah masuk tanggal mulai akses
        if (now()->format('Y-m-d') < $periode->tanggal_mulai) {
            return redirect()->route('home')->with('warning', 'Penilaian belum dapat diakses.');
        }
        
        // Pegawai yang bisa dinilai (hanya bawahan langsung)
        if (Auth::user()->jabatan->level == 4) {
            $pegawai_dinilai = User::where('divisi_id', Auth::user()->divisi_id)
            ->where('jabatan_id', '>', Auth::user()->jabatan->level)
            ->get();
        } else {
            $pegawai_dinilai = User::where('atasan_id', Auth::user()->id)->get();
        }
        
        return view('penilaian.pegawai.index', compact('pegawai_dinilai', 'periode', 'tanggal'));
    }
    
    /**
    * Show the form for creating a new resource.
    */
    public function create(User $pegawai, $tanggal)
    {
        if (Auth::user()->id == $pegawai->id) {
            return redirect()->route('penilaian.index', $tanggal)->with('warning', 'Anda tidak bisa menilai diri sendiri.');
        }

        $kriterias = Kriteria::all();
        // Ambil sub-kriteria yang sesuai dengan level jabatan pegawai yang dinilai
        $subKriterias = SubKriteria::where(function ($query) use ($pegawai) {
            $query->whereNull('level_maksimal')  // Ambil yang level_maksimal NULL
            ->orWhere('level_maksimal', '>=', $pegawai->jabatan->level); // Atau yang masih bisa dijangkau
        })->get();
        
        return view('penilaian.pegawai.create', compact('pegawai', 'kriterias', 'subKriterias', 'tanggal'));
    }
    
    /**
    * Store a newly created resource in storage.
    */
    public function store(Request $request, User $pegawai, $tanggal)
    {
        $request->validate([
            'nilai' => 'required|array',
            'nilai.*' => 'integer|min:1|max:4',
            'catatan' => 'nullable|string'
        ]);
        
        $periode = PeriodePenilaian::select('id')
        ->whereDate('tanggal_mulai', $tanggal)
        ->where('status', 'open')
        ->firstOrFail();
        
        $kpiPenilaian = KpiPenilaian::create([
            'penilai_id' => Auth::id(),
            'dinilai_id' => $pegawai->id,
            'periode_id' => $periode->id,
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
            // $subKriteriaIds = $k->subKriterias->pluck('id');
            $nilaiSubKriteria = $kpiDetailPenilaian->whereIn('sub_kriteria_id', $sub_kriteria_id);
            
            if ($nilaiSubKriteria->isEmpty()) continue;
            
            $totalSkorAspek = $nilaiSubKriteria->sum(fn($item) => $item->nilai * 10);
            $rataRataSkorAspek = $totalSkorAspek / $nilaiSubKriteria->count();
            $skorAkhirAspek = $rataRataSkorAspek * $k->bobot;
            
            $totalSkorAkhir += $skorAkhirAspek;
        }
        
        $totalAkhirKPI = ($totalSkorAkhir / $kriterias->count()) * 10;
        dd($totalAkhirKPI);
        
        KpiHasil::create([
            'dinilai_id' => $pegawai->id,
            'periode_id' => $periode->id,
            'skor_total' => $totalAkhirKPI,
            'keterangan' => $this->getKeteranganKpi($totalAkhirKPI)
        ]);
        
        return redirect()->route('penilaian.index', $tanggal)->with('success', 'Penilaian pegawai berhasil disimpan.');
    }
    
    /**
    * Menentukan keterangan berdasarkan total skor KPI
    */
    private function getKeteranganKpi($totalSkorAkhir)
    {
        if ($totalSkorAkhir > 75) {
            return 'Unggul';
        } elseif ($totalSkorAkhir >= 50) {
            return 'Baik Sekali';
        } else {
            return 'Baik';
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
