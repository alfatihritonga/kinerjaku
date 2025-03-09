<?php

namespace App\Http\Controllers;

use App\Imports\NilaiDisiplinImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ImportController extends Controller
{
    public function nilaiKedisiplinan(Request $request, $periodeId)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,csv',
        ]);

        session(['periode_id' => $periodeId]);
        
        Excel::import(new NilaiDisiplinImport, $request->file('file'));
        
        return back()->with('success', 'Nilai Kedisiplinan berhasil diimport!');
    }
}
