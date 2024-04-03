<?php

namespace App\Http\Controllers\Peserta;

use App\Http\Controllers\Controller;
use App\Services\DataOrangTuaService;
use App\Services\PendaftaranService;
use Illuminate\Http\Request;

class PendaftaranController extends Controller
{
    public function pilih_jalur(Request $request, PendaftaranService $pendaftaranService)
    {
        $pendaftaranService->pilihJalurPendaftaran($request->id);

        return redirect()->back();
    }

    public function isi_formulir(DataOrangTuaService $dataOrangTuaService)
    {
        return view('peserta.isi-formulir', [
            'status_data_orang_tua' => $dataOrangTuaService->cekKelengkapan(),
        ]);
    }
}
