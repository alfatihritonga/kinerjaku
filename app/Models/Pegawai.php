<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    use HasFactory;

    protected $fillable = [
        'nip',
        'nama',
        'divisi_id',
        'unit_kerja_id',
        'jabatan_id',
        'aktif',
    ];

    public function user()
    {
        return $this->hasOne(User::class);
    }

    public function divisi()
    {
        return $this->belongsTo(Divisi::class);
    }

    public function unitKerja()
    {
        return $this->belongsTo(UnitKerja::class, 'unit_kerja_id');
    }
    
    public function jabatan()
    {
        return $this->belongsTo(Jabatan::class);
    }
    
    public function hasilNilai()
    {
        return $this->hasMany(KpiHasil::class);
    }
}
