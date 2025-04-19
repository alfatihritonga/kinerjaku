<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NilaiSubKriteria extends Model
{
    protected $fillable = ['sub_kriteria_id', 'nilai', 'keterangan'];

    public function subKriteria()
    {
        return $this->belongsTo(SubKriteria::class);
    }
}
