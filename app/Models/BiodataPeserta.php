<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BiodataPeserta extends Model
{
    use HasUuids, HasFactory;
    protected $fillable = [
        'pendaftaran_id',
        'foto_peserta',
        'NISN',
        'nama_lengkap',
        'nama_panggilan',
        'jenis_kelamin',
        'tempat_lahir',
        'tanggal_lahir',
        'agama',
        'alamat',
        'provinsi',
        'kota',
        'telepon',
        'email',
    ];

    protected $casts = [
        'tanggal_lahir' => "date:m-d-Y"
    ];
    public function pendaftaran(){
        return $this->belongsTo(Pendaftaran::class);
    }
}
