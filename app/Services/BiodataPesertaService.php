<?php

namespace App\Services;

use App\Models\BiodataPeserta;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class BiodataPesertaService
{
    const FOTO_FOLDER = 'foto-siswa';
    public function cekById(string $id)
    {
        return BiodataPeserta::find($id);
    }

    public function store(array $data)
    {
        return BiodataPeserta::create($data);
    }

    public function upload_file(UploadedFile $file) : string
    {
       return Storage::disk('public')->putFile(self::FOTO_FOLDER,$file);
         
    }

    public function editBiodata(array $data, string $id = null)
    {
        if (null == $id) {
            $id = auth()->user()->pendaftaran->biodata->id;
        }
        $biodata = BiodataPeserta::find($id);
        if (isset($data['foto_peserta'])) {
            $original_file = $biodata->foto_peserta;

            $data['foto_peserta'] = $this->upload_file($data['foto_peserta']);
            if($original_file && Storage::disk('public')->exists($original_file)){
                Storage::disk('public')->delete($original_file);
            }
            
        }
        return $biodata->update($data);
    }
}
