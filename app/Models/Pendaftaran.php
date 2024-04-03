<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendaftaran extends Model
{
    use HasFactory,HasUuids;
    protected $with = [
        'biodata'
    ];
    protected $guarded = [];
    protected $fillable = [
        'no_pendaftaran',
        'jalur_pendaftaran_id',
        'jurusan_id',
        'user_id',
        'diterima',
        'waktu_daftar',
        'status_verifikasi_formulir'
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function jalur_pendaftaran(){
        return $this->belongsTo(JalurPendaftaran::class);
    }
    public function biodata(){
        return $this->hasOne(BiodataPeserta::class);
    }
}
