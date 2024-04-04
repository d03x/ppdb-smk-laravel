<?php

namespace App\Http\Controllers\Peserta;

use App\Http\Controllers\Controller;
use App\Services\BiodataPesertaService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BiodataController extends Controller
{
    public function __construct(
        public BiodataPesertaService $biodataPesertaService
    ){
        $this->biodataPesertaService = new BiodataPesertaService();
    }
    public function index(?string $id = null)
    {
        $user = $this->current_user();
        /**
         * jika sudah ada
         */
        if(!$user->pendaftaran){
            return redirect()->route('peserta.index');
        }
        if ( $id && ($bp = $this->biodataPesertaService->cekById($id)) ){
           return view('peserta.formulir.biodata', [
            'data' => $bp
           ]);
        }  else{
            /**
             * jika biodata sudah ada jatunya jadi edit data
             */
          if($biodata = $user->pendaftaran->biodata){
            return redirect()->route('peserta.pendaftaran.form.biodata',[
                'id' => $biodata->id,
                
            ]);
          }else{
            //jika tidak buat
            $biodata =  $this->biodataPesertaService->store([
                'pendaftaran_id' => $user->pendaftaran->id,
                'nama_lengkap' => $user->name,
                'email' => $user->email
            ]);
            return redirect()->route('peserta.pendaftaran.form.biodata',[
                'id' => $biodata->id,
            ]);
          }
        }
      
    }
    public function simpan(Request $request,BiodataPesertaService $biodataPesertaService){
        $validatedData = $request->validate([
            'foto_peserta' => 'nullable|image|mimes:jpeg,png,jpg,bmp|max:2048',
            'NISN' => 'required|numeric|digits:10',
            'nama_lengkap' => 'required|string|max:255',
            'nama_panggilan' => 'nullable|string|max:255',
            'jenis_kelamin' => 'required|in:L,P',
            'tempat_lahir' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'agama' => 'required|string|max:255',
            'alamat' => 'required|string',
            'provinsi' => 'required|string|max:255',
            'kota' => 'required|string|max:255',
            'telepon' => 'required|string|max:255',
            'email' => 'required|email',
        ]);
      
        $biodataPesertaService->editBiodata($validatedData);
        toast('Biodata perserta berhasil diperbaharui','success');
        return redirect()->route('peserta.pendaftaran.form');

    }
}
