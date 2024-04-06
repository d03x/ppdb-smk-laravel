<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataNilaiRapot extends Model
{
    use HasFactory;
    use HasUuids;
    protected $fillable = [
        'matpel_id',
        'semester_id',
        'pendaftaran_id',
        'nilai',
        'nama'
    ];
    public function pendaftaran()
    {
        return $this->belongsTo(Pendaftaran::class);
    }
    public function semester(){
        return $this->belongsTo(Semester::class);
    }
    public function matpel(){
        return $this->belongsTo(Matpel::class);
    }
}
