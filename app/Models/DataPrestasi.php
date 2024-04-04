<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataPrestasi extends Model
{
    use HasFactory,HasUuids;
    protected $fillable = [
        'nama_kegiatan',
        'pendaftaran_id',
        'pencapaian',
        'jenis',
        'tahun',
        'tingkat'
    ];
    public function pendaftaran()
    {
        return $this->belongsTo(Pendaftaran::class);
    }
}
