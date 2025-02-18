<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KpiDetailPenilaian extends Model
{
    use HasFactory;

    protected $fillable = [
        'penilaian_id',
        'sub_kriteria_id',
        'nilai'
    ];

    public function penilaian()
    {
        return $this->belongsTo(KpiPenilaian::class);
    }

    public function subKriteria()
    {
        return $this->belongsTo(SubKriteria::class);
    }
}
