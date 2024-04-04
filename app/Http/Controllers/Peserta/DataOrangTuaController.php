<?php

namespace App\Http\Controllers\Peserta;

use App\Http\Controllers\Controller;
use App\Services\DataOrangTuaService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class DataOrangTuaController extends Controller
{
    public function listDataOrangTua(DataOrangTuaService $dataOrangTuaService)
    {
        $pendaftaranID = auth()->user()->pendaftaran->id;

        return view('peserta.formulir.data-orang-tua', [
            'orang_tuas' => $dataOrangTuaService->findByPendaftaranid($pendaftaranID),
        ]);
    }

    public function index(Request $request, DataOrangTuaService $dataOrangTuaService, string $id = null)
    {
        if ($type = $request->get('type')) {
            $allowed = ['ayah', 'ibu', 'wali'];
            if (in_array($type, $allowed)) {
                $data = $dataOrangTuaService->storeAndValidate([
                     'pendaftaran_id' => auth()->user()->pendaftaran->id,
                     'type' => $type,
                 ]);

                return redirect()->route('peserta.pendaftaran.form.data-orang-tua', [
                    'id' => $data->id,
                ]);
            }
        }
        if (!$id && !$request->get('type')) {
            return $this->listDataOrangTua($dataOrangTuaService);
        } else {
            return view('peserta.formulir.data-orang-tua-isi', [
                'data' => $dataOrangTuaService->getById($id),
            ]);
        }
    }

    public function simpan(Request $request, DataOrangTuaService $dataOrangTuaService, $id)
    {
        $ortu_ids = $request->user()->pendaftaran->orangtua->pluck('id')->toArray();
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'nik' => 'required|string|size:16', // Sesuaikan panjang NIK sesuai aturan
            'pekerjaan' => 'required|string|max:255',
            'penghasilan' => 'required|nullable|numeric', // Bisa diubah menjadi required jika penghasilan wajib diisi
            'pendidikan_terakhir' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'no_telepon' => 'required|string|max:255',
        ]);
        try {
            /*
             * cek apakah id nya dimiliki sama peserta
             */
            if (in_array($id, $ortu_ids)) {
                // jika ya ambil data dari service lalu update
                $orangTua = $dataOrangTuaService->getById($id);
                $orangTua->update($validated);
                // redirect ke halaman orang tua
                toast('Data orang tua berhasil di perbaharui', 'success');

                return redirect()->route('peserta.pendaftaran.form.data-orang-tua')->withErrors([
                    'toast' => 'Data berhasil di update',
                ]);
            }
            echo 324;
        } catch (\Throwable $th) {
            Log::alert($th->getMessage());
        }
    }
}
