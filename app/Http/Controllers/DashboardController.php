<?php

namespace App\Http\Controllers;

use App\Models\PeriodePenilaian;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $periode_aktif = PeriodePenilaian::where('status', 'open')->first();  

        return view('dashboard', compact('periode_aktif'));
    }
}
