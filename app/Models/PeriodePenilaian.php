<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PeriodePenilaian extends Model
{
    use HasFactory;

    protected $fillable = [
        'keterangan',
        'bulan',
        'tahun',
        'tanggal_mulai',
        'tanggal_selesai',
        'status'
    ];

    public function penilaians()
    {
        return $this->hasMany(KpiPenilaian::class);
    }
}
