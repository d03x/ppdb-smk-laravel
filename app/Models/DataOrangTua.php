<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataOrangTua extends Model
{
    use HasFactory;
    use HasUuids;
    protected $fillable = [
        'pendaftaran_id',
        'type',
        'nama',
        'nik',
        'pekerjaan',
        'penghasilan',
        'pendidikan_terakhir',
        'alamat',
        'no_telepon',
    ];

    public function scopeGetAyah($query)
    {
        return $query->where('type', 'ayah');
    }

    public function pendaftaran()
    {
        return $this->belongsTo(Pendaftaran::class);
    }
}
