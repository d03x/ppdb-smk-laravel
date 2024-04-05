<?php

namespace App\Http\Controllers\Peserta;

use App\Http\Controllers\Controller;
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
        ->with('data',$dataNilaiRapotService->semuaSemester($request->user()))
        ->with('jumlah_semester', Semester::all());
    }
}
