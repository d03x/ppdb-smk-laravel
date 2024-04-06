<?php

namespace App\Http\Controllers\Peserta;

use App\Http\Controllers\Controller;
use App\Models\DataNilaiRapot;
use App\Models\Matpel;
use App\Models\Semester;
use App\Services\DataNilaiRapotService;
use Illuminate\Http\Request;

class DataNilaiRapotController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index(DataNilaiRapotService $dataNilaiRapotService, Request $request)
    {
        return view('peserta.nilai-rapot.index')
            ->with('data', $dataNilaiRapotService->semuaSemester($request->user()))
            ->with('jumlah_semester', Semester::all())
            ->with('matpel', Matpel::all());
    }

    public function simpan_nilai(Request $request, string $rapot_id)
    {
        DataNilaiRapot::find($rapot_id)->update([
            'nilai' => $request->nilai,
        ]);
        toast('Nilai rapot berhasil di update', 'success');

        return redirect()->route('peserta.pendaftaran.form.data-nilai-rapot.index');
    }

    public function ubah_nilai(Request $request, DataNilaiRapotService $dataNilaiRapotService, string $semester_id = null, string $matpel_id = null, string $rapot_id = null)
    {
        if ($rapot_id) {
            $rapot = $dataNilaiRapotService->findById($rapot_id);
            if ($rapot->pendaftaran_id === $this->current_user()->pendaftaran->id) {
                return view('peserta.nilai-rapot.ubah')->with('data', $rapot);
            }
        }
        $semester = Semester::query()->where('nama', $semester_id)->first();
        abort_if(!$semester, 404);
        $semester_id = $semester->id;

        $nilaiRapot = DataNilaiRapot::where([
            'matpel_id' => $matpel_id,
            'semester_id' => $semester_id,
            'pendaftaran_id' => $this->current_user()->pendaftaran->id,
        ])->first();

        if ($nilaiRapot) {
            return redirect()->route('peserta.pendaftaran.form.data-nilai-rapot.nilai.ubah', [
                'rapot_id' => $nilaiRapot->id,
                'semester_id' => $semester->nama,
                'matpel_id' => $nilaiRapot->matpel_id,
            ]);
        } else {
            $nilaiRapot = DataNilaiRapot::create([
                'matpel_id' => $matpel_id,
                'nilai' => 0,
                'semester_id' => $semester_id,
                'pendaftaran_id' => $this->current_user()->pendaftaran->id,
            ]);

            return redirect()->route('peserta.pendaftaran.form.data-nilai-rapot.nilai.ubah', [
                'rapot_id' => $nilaiRapot->id,
                'semester_id' => $semester->nama,
                'matpel_id' => $nilaiRapot->matpel_id,
            ]);
        }
    }
}
