<?php

namespace App\Services;

use App\Models\DataNilaiRapot;
use App\Models\Matpel;
use App\Models\Semester;
use App\Models\User;

class DataNilaiRapotService
{
    public function semuaSemester(User $user)
    {
        $pendaftaran = $user->pendaftaran;
        $semesters = Semester::query()->get();
        $semesterIDS = $semesters->pluck('id')->toArray();

        //mengambil nilai rapot siswa yang telah di input
        $rapots = DataNilaiRapot::query()
            ->where('pendaftaran_id', $pendaftaran->id)
            ->whereIn('semester_id', $semesterIDS)
            ->with([
                'semester',
                'matpel'
            ])
            ->get();
        //filter mengunakan map, ambil yang penting penting doang
        $repotFiltered = $rapots->map(function ($query) {
            return [
                'id' => $query->id,
                'semester' => $query->semester->nama,
                'matpel' => $query->matpel->nama,
                'nilai' => $query->nilai,
            ];
        });


        $semesters = Semester::all();
        

        //yang sudah di filter group berdasarkan mata pelajaran
        if ($repotFiltered) {
            $finalData = [];
            $grouped = $repotFiltered->groupBy('matpel')->toArray();
            $matpels = Matpel::all();
            foreach($matpels as $matpel){
                $ms = $matpel->nama;
                $finalData[$ms] = $grouped[$ms] ?? [];
            }
            
         
            $outputData = [];

            foreach ($finalData as $matpelName => $nilas){
                $outputData[$matpelName] = array_fill(1, $semesters->count(),"");
                foreach($nilas as $nilai){
                    $outputData[$matpelName][$nilai['semester']] = $nilai;
                }
            }

            

            return $outputData;
        }
    }
}

