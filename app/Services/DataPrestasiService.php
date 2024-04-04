<?php

namespace App\Services;

use App\Models\DataPrestasi;

class DataPrestasiService
{
    /**
     * Create a new class instance.
     */
    public function all(){
        return DataPrestasi::all();
    }
    public function findById(?string $id)
    {
        return DataPrestasi::query()->find($id);
    }
    public function findByPendaftaranID(?string $id)
    {
        return DataPrestasi::query()
            ->where('pendaftaran_id', $id)
            ->limit(3)->latest()->get();
    }
    public function create(array $data){
        return DataPrestasi::query()->create($data);
    }
    public function simpan(?array $data,$id){
        return DataPrestasi::query()->find($id)->update($data);
    }
}
