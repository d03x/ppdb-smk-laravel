<?php

namespace App\Services;

use App\Models\JalurPendaftaran;
use App\Models\Pendaftaran;
use App\Repositories\PendaftaranRepository;
use Illuminate\Support\Facades\Auth;

class PendaftaranService
{
    public PendaftaranRepository $pendaftaranRepository;
    public function __construct(){
        $this->pendaftaranRepository = new PendaftaranRepository();
    }

    public function pilihJalurPendaftaran(string $id){

        $jalurPendaftaran = JalurPendaftaran::findOrFail($id);
        $data['no_pendaftaran'] = strtoupper(sprintf('PPDB-%s%s%s',$jalurPendaftaran->kode,date('Y'),uniqid()));
        $data['jalur_pendaftaran_id'] = $id;
        $data['user_id'] = auth()->id();
        $data['waktu_daftar'] = now();
        $data['status_verifikasi_formulir'] = 'Tertunda';

        if ( !Auth::user()->pendaftaran ) {
         return   $this->pendaftaranRepository->simpan($data);
        }
        Auth::user()->pendaftaran->update([
            'jalur_pendaftaran_id' => $id,
        ]);
    }
}
