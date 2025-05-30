<?php

namespace App\Http\Controllers;

use App\Models\PeriodePenilaian;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $periode_aktif = PeriodePenilaian::where('status', 'open')->latest()->get();

        // if ($periode_aktif->isEmpty()) {
        //     return 'gada datanya';
        // }

        // return response()->json($periode_aktif);
        return view('dashboard', compact('periode_aktif'));
    }
}
