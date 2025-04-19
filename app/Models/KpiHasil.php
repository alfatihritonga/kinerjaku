<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KpiHasil extends Model
{
    use HasFactory;

    protected $fillable = [
        'dinilai_id',
        'periode_id',
        'penilai_satu_id',
        'nilai_oleh_satu',
        'penilai_dua_id',
        'nilai_oleh_dua',
        'nilai_kedisiplinan',
    ];

    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class, 'dinilai_id');
    }

    public function periode()
    {
        return $this->belongsTo(PeriodePenilaian::class);
    }

    public function penilaian()
    {
        return $this->belongsTo(KpiPenilaian::class, 'dinilai_id');
    }
}
