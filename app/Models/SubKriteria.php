<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubKriteria extends Model
{
    use HasFactory;

    protected $fillable = [
        'kriteria_id',
        'nama',
        'level_minimal',
        'level_maksimal'
    ];

    public function kriteria()
    {
        return $this->belongsTo(Kriteria::class);
    }

    public function jabatan()
    {
        return $this->belongsTo(Jabatan::class);
    }

    public function nilaiKeterangan()
    {
        return $this->hasMany(NilaiSubKriteria::class);
    }

    public function kpiDetailPenilaian()
    {
        return $this->hasMany(KpiDetailPenilaian::class);
    }
}
