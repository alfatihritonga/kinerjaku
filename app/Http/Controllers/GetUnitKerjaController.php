<?php

namespace App\Http\Controllers;

use App\Models\UnitKerja;
use Illuminate\Http\Request;

class GetUnitKerjaController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke($divisiId)
    {
        $unitKerja = UnitKerja::where('divisi_id', $divisiId)->select('id', 'nama')->get();
        
        return response()->json($unitKerja);
    }
}
