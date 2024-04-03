<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataOrangTua extends Model
{
    use HasFactory,HasUuids;
    protected $fillable = [
        'pendaftaran_id',
        'type',
        'peserta_didik_id',
        'nama_ayah',
        'nama_ibu',
        'nik_ayah',
        'nik_ibu',
        'pekerjaan_ayah',
        'pekerjaan_ibu',
        'pendidikan_terakhir_ayah',
        'pendidikan_terakhir_ibu',
        'alamat',
        'no_telepon',
    ];
    public function pendaftaran(){
        return $this->belongsTo(Pendaftaran::class);
    }
}
