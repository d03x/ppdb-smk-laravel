<?php

namespace Database\Seeders;

use App\Models\Matpel;
use Illuminate\Database\Seeder;

class MatpelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Matpel::create([
            'nama' => 'MATEMATIKA',
        ]);
        Matpel::create([
            'nama' => 'Bahasa Inggris',
        ]);
        Matpel::create([
            'nama' => 'Bahasa Indonesia',
        ]);
        Matpel::create([
            'nama' => 'TIK',
        ]);
    }
}
