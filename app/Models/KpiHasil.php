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

    public function penilaiSatu()
    {
        return $this->belongsTo(Pegawai::class, 'penilai_satu_id');
    }

    public function penilaiDua()
    {
        return $this->belongsTo(Pegawai::class, 'penilai_dua_id');
    }

    public function periode()
    {
        return $this->belongsTo(PeriodePenilaian::class);
    }

    public function penilaian()
    {
        return $this->belongsTo(KpiPenilaian::class, 'periode_id', 'periode_id')
                ->whereColumn('dinilai_id', 'dinilai_id');
    }

    public function penilai()
    {
        return $this->belongsTo(Pegawai::class, 'penilai_id');
    }

    public function dinilai()
    {
        return $this->belongsTo(Pegawai::class, 'dinilai_id');
    }
    
    public function getCatatanPenilaiSatuAttribute()
    {
        return KpiPenilaian::where('dinilai_id', $this->dinilai_id)
                ->where('penilai_id', $this->penilai_satu_id)
                ->where('periode_id', $this->periode_id)
                ->value('catatan');
    }
    
    public function getCatatanPenilaiDuaAttribute()
    {
        return KpiPenilaian::where('dinilai_id', $this->dinilai_id)
                ->where('penilai_id', $this->penilai_dua_id)
                ->where('periode_id', $this->periode_id)
                ->value('catatan');
    }
}
