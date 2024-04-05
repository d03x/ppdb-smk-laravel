<?php

namespace App\Http\Controllers\Peserta;

use App\Http\Controllers\Controller;
use App\Services\DataPrestasiService;
use GuzzleHttp\Psr7\Request;
use Illuminate\Http\Request as HttpRequest;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;

class DataPrestasiController extends Controller
{
    public function simpan(HttpRequest $request,string $id, DataPrestasiService $dataPrestasiService)
    {
        $validated = $request->validate([
            'nama_kegiatan' => 'required|string',
            'jenis' => ['required', Rule::in(['individual', 'kelompok'])],
            'tingkat' => 'required|string',
            'tahun' => 'nullable|numeric',
            'pencapaian' => 'nullable|string',
        ]);
       try {
     

        $dataPrestasiService->simpan($validated,$id);
        toast("Prestasi berhasil di simpan",'success');
        return redirect()->route('peserta.pendaftaran.form.data-prestasi.lists');
       } catch (\Throwable $th) {
         Log::alert($th->getMessage());
       }
        
    }
   public function lists(DataPrestasiService $dataPrestasiService){
    confirmDelete('Apakah anda yakin?','Data akan di hapus dan tidak bisa di kembalikan lagi?');

    return view('peserta.formulir.data-prestasi-list')->with('data',$dataPrestasiService->findByPendaftaranID(
        $this->current_user()->pendaftaran->id,
    ));
   }
    public function index(HttpRequest $request, DataPrestasiService $dataPrestasiService, ?string $id = null)
    {
        $user = $this->current_user();
        $prestasis = $dataPrestasiService->findByPendaftaranID($user->pendaftaran->id);
        if (!$id) {
            $data = $dataPrestasiService->create([
                'pendaftaran_id' => $user->pendaftaran->id,
            ]);
            return redirect()->route('peserta.pendaftaran.form.data-prestasi', [
                'id' => $data->id,
            ]);
        } else {
            $ids = $prestasis->pluck('id')->toArray();
            if (in_array($id, $ids)) {
                return view('peserta.formulir.data-prestasi-isi')
                    ->with('data', $dataPrestasiService->findById($id));
            }
            abort(404);
        }
    }
    public function delete(?string $id, DataPrestasiService $dataPrestasiService){
        $prestasis = $dataPrestasiService->findByPendaftaranID($this->current_user()->pendaftaran->id);
        if(in_array($id, $prestasis->pluck('id')->toArray())){
            $dataPrestasiService->delete($id);
            toast('Prestasi berhasil di hapus!','success');
            return redirect()->route('peserta.pendaftaran.form.data-prestasi.lists');
        }
        abort(404);
    }
}
