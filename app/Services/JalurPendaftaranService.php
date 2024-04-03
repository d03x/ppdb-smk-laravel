<?php

namespace App\Services;

use App\Repositories\JalurPendaftaranRepository;
use Illuminate\Support\Facades\Cache;

class JalurPendaftaranService
{
    public JalurPendaftaranRepository $jalurPendaftaranRepository;

    public function __construct()
    {
        $this->jalurPendaftaranRepository = new JalurPendaftaranRepository();
    }

    public function get()
    {
        if (!Cache::get('dat_jalur_pendaftaran')) {
            Cache::set('dat_jalur_pendaftaran', $this->jalurPendaftaranRepository->getAll(), now()->addSeconds(30));
        }

        return Cache::get('dat_jalur_pendaftaran');
    }
}
