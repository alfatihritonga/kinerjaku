<?php

namespace App\Http\Controllers;

use App\Exports\KpiHasilExport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ExportController extends Controller
{
    public function hasilKPI(Request $request)
    {
        $periodeId = $request->query('periode_id');
        $level = $request->query('level');
        
        Excel::download(new KpiHasilExport($periodeId, $level), 'kpi_hasil.xlsx');
        
        return back()->with('success', 'Nilai Kedisiplinan berhasil diimport!');
    }
}
