<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JalurPendaftaran extends Model
{
    use HasFactory;
    use HasUuids;

    protected $guarded = [];
    protected $fillable = [
        'nama',
        'biaya_pendaftaran',
        'tanggal_dibuka',
        'tanggal_ditutup',
        'dibuka',
        'catatan',
        'quota',
    ];

    public function pendaftaran(){
        return $this->hasOne(Pendaftaran::class);
    }
}
