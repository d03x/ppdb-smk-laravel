<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendaftaran extends Model
{
    use HasFactory;
    use HasUuids;
    protected $with = [
        'biodata',
    ];
    protected $guarded = [];
    protected $fillable = [
        'no_pendaftaran',
        'jalur_pendaftaran_id',
        'jurusan_id',
        'user_id',
        'diterima',
        'waktu_daftar',
        'status_verifikasi_formulir',
    ];

    public function scopeCekKelenkapanForm(Builder $query)
    {
        return true;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function jalur_pendaftaran()
    {
        return $this->belongsTo(JalurPendaftaran::class);
    }

    public function biodata()
    {
        return $this->hasOne(BiodataPeserta::class);
    }

    public function orangtua()
    {
        return $this->hasMany(DataOrangTua::class);
    }

    public function prestasi()
    {
        return $this->hasOne(DataPrestasi::class);
    }

    public function nilairapot()
    {
        return $this->hasOne(DataNilaiRapot::class);
    }
}
