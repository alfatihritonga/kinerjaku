<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KpiPenilaian extends Model
{
    use HasFactory;

    protected $fillable = [
        'penilai_id',
        'dinilai_id',
        'periode_id',
        'catatan'
    ];

    public function penilai()
    {
        return $this->belongsTo(Pegawai::class, 'penilai_id');
    }

    public function dinilai()
    {
        return $this->belongsTo(Pegawai::class, 'dinilai_id');
    }

    public function periode()
    {
        return $this->belongsTo(PeriodePenilaian::class);
    }

    public function detailPenilaian()
    {
        return $this->hasMany(KpiDetailPenilaian::class, 'penilaian_id');
    }

    public function hasilPenilaian()
    {
        return $this->hasOne(KpiHasil::class, 'periode_id', 'periode_id')
                ->whereColumn('dinilai_id', 'dinilai_id');
    }
}
