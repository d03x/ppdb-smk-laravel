<?php

namespace App\Services;

use App\Models\DataNilaiRapot;
use App\Models\Matpel;
use App\Models\Semester;
use App\Models\User;

class DataNilaiRapotService
{
    public function findById(string $id){
        return DataNilaiRapot::query()->find($id);
    }
    public function semuaSemester(User $user)
    {
        $pendaftaran = $user->pendaftaran;
        $semesters = Semester::query()->get();
        $semesterIDS = $semesters->pluck('id')->toArray();

        // mengambil nilai rapot siswa yang telah di input
        $rapots = DataNilaiRapot::query()
            ->where('pendaftaran_id', $pendaftaran->id)
            ->whereIn('semester_id', $semesterIDS)
            ->with([
                'semester',
                'matpel',
            ])
            ->get();
        // filter mengunakan map, ambil yang penting penting doang
        $repotFiltered = $rapots->map(function ($query) {
            return [
                'id' => $query->id,
                'matpel_id' => $query->matpel->id,
                'semester' => $query->semester->nama,
                'semester_id' => $query->semester->id,
                'matpel' => $query->matpel->nama,
                'nilai' => $query->nilai,
            ];
        });

        $semesters = Semester::all();

        // yang sudah di filter group berdasarkan mata pelajaran
        if ($repotFiltered) {
            $finalData = [];
            $grouped = $repotFiltered->groupBy('semester')->toArray();
            $matpels = Semester::all();
            foreach ($matpels as $matpel) {
                $ms = $matpel->nama;
                $finalData[$ms] = $grouped[$ms] ?? [];
            }

            $outputData = [];

            $matpel = Matpel::pluck('nama')->toArray();
            foreach ($finalData as $semester => $final) {
                $outputData[$semester] = array_combine($matpel, array_values(array_fill(1, count($matpel), '-')));
                foreach ($final as $finalItem) {
                    $outputData[$semester][$finalItem['matpel']] = $finalItem ?? 0;
                }
            }

            return $outputData;
        }
    }
}
