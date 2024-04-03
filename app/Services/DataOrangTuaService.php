<?php

namespace App\Services;

use App\Models\DataOrangTua;

class DataOrangTuaService
{
    public function cekById(?string $id)
    {
        return DataOrangTua::find($id);
    }

    public function findByPendaftaranid($id)
    {
        return DataOrangTua::where('pendaftaran_id', $id)->get();
    }

    public function storeAndValidate($data)
    {
        $dat = DataOrangTua::where($data)->first();
        if ($dat) {
            return $dat;
        }

        return DataOrangTua::create($data);
    }

    public function cekKelengkapan(): bool
    {
        $orangTua = auth()->user()->pendaftaran->orangtua;
        if ($orangTua->count() > 0) {
            return true;
        }

        return false;
    }

    public function getById(?string $id)
    {
       return $this->cekById($id);
    }
}
