<?php

namespace App\Http\Controllers\Peserta;

use App\Http\Controllers\Controller;
use App\Services\PendaftaranService;
use Illuminate\Http\Request;

class PendaftaranController extends Controller
{
    public function pilih_jalur(Request $request, PendaftaranService $pendaftaranService)
    {
        $pendaftaranService->pilihJalurPendaftaran($request->id);

        return redirect()->back();
    }

    public function isi_formulir()
    {
        return view('peserta.isi-formulir');
    }
}
