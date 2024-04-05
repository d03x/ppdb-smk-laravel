<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matpel extends Model
{
    use HasFactory;
    use HasUuids;

    protected $fillable = [
        'nama'
    ];
    public function dataNilaiRapot()
    {
        return $this->hasOne(DataNilaiRapot::class);
    }
}
