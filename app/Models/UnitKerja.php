<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UnitKerja extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'divisi_id'
    ];

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function divisi()
    {
        return $this->belongsTo(Divisi::class);
    }
}
