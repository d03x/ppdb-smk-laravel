<?php

namespace App\Http\Controllers\Peserta;

use App\Http\Controllers\Controller;
use App\Services\JalurPendaftaranService;

class DashboardController extends Controller
{
    public function index(JalurPendaftaranService $jalurPendaftaranService)
    {
       
        return view('welcome', [
            'jalur_pendaftaran' => $jalurPendaftaranService->get(),
            'pendaftaran_peserta' => auth()->user()->pendaftaran,
        ]);
    }

    public function pengumuman()
    {
    }

    public function pembayaran()
    {
    }
}
