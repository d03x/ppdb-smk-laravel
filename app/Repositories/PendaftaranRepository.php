<?php

namespace App\Repositories;

use App\Models\Pendaftaran;

class PendaftaranRepository
{
    public function simpan(array $data){
        return Pendaftaran::create($data);
    }
}
