<?php

namespace App\Repositories;

use App\Models\JalurPendaftaran;

class JalurPendaftaranRepository extends Repositories
{
    /**
     * Undocumented function.
     *
     * @return void
     */
    public function getAll(): ?iterable
    {
        $data = JalurPendaftaran::all();

        return $data->map(function ($query) {
            $status = null;
            $now = now()->unix();
            $tanggal_dibuka = now()->parse($query->tanggal_dibuka)->unix();
            $tanggal_ditutup = now()->parse($query->tanggal_ditutup)->unix();

            if ($now <= $tanggal_dibuka) {
                $status = 'Belum dibuka';
            } elseif ($tanggal_ditutup <= $now) {
                $status = 'Sudah ditutup';
            }

            return [
                'id' => $query->id,
                'nama' => $query->nama,
                'biaya_pendaftaran' => number_format($query->biaya_pendaftaran, 2, ',', '.'),
                'tanggal_dibuka' => now()->parse($query->tanggal_dibuka)->format('d-M-Y'),
                'tanggal_ditutup' => now()->parse($query->tanggal_ditutup)->format('d-M-Y'),
                'catatan' => $query->catatan,
                'quota' => $query->quota,
                'status' => $status,
            ];
        });
    }
}
