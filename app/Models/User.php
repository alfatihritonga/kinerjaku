<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'nama',
        'email',
        'password',
        'jabatan_id',
        'divisi_id',
        'atasan_id',
        'role'
    ];

    public function jabatan()
    {
        return $this->belongsTo(Jabatan::class);
    }

    public function divisi()
    {
        return $this->belongsTo(Divisi::class);
    }

    public function atasan()
    {
        return $this->belongsTo(User::class, 'atasan_id');
    }

    public function bawahans()
    {
        return $this->hasMany(User::class, 'atasan_id');
    }

    public function penilaianSebagaiPenilai()
    {
        return $this->hasMany(KpiPenilaian::class, 'penilai_id');
    }

    public function penilaianSebagaiDinilai()
    {
        return $this->hasMany(KpiPenilaian::class, 'dinilai_id');
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
