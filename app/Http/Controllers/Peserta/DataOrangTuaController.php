<?php

namespace App\Http\Controllers\Peserta;

use App\Http\Controllers\Controller;
use App\Services\DataOrangTuaService;
use Illuminate\Http\Request;

class DataOrangTuaController extends Controller
{
    public function listDataOrangTua(DataOrangTuaService $dataOrangTuaService)
    {
        $pendaftaranID = auth()->user()->pendaftaran->id;
        return view('peserta.formulir.data-orang-tua', [
            'orang_tuas' => $dataOrangTuaService->findByPendaftaranid($pendaftaranID)
        ]);

    }
    public function index(Request $request, DataOrangTuaService $dataOrangTuaService, ?string $id = null)
    {
        if ($type = $request->get('type')) {
            $allowed = ['ayah', 'ibu', 'wali'];
            if (in_array($type, $allowed)) {
               $data =  $dataOrangTuaService->storeAndValidate([
                    'pendaftaran_id' => auth()->user()->pendaftaran->id,
                    'type' => $type,
                ]);
                return redirect()->route('peserta.pendaftaran.form.data-orang-tua',[
                    'id' => $data->id,
                ]);
            }
        }
        if (!$id && !$request->get('type')) {
            return $this->listDataOrangTua($dataOrangTuaService);
        }else{
            return view('peserta.formulir.data-orang-tua-isi');
        }

    }
}
