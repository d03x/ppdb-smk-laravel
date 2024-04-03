<?php

namespace Database\Seeders;

use App\Models\JalurPendaftaran;
use Illuminate\Database\Seeder;

class JalurPendaftaranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        JalurPendaftaran::create([
            'nama' => 'UMUM G1',
            'biaya_pendaftaran' => 50000,
            'kode' => "UG1",
            'tanggal_dibuka' => now(),
            'tanggal_ditutup' => now()->addDays(30),
            'quota' => '120',
            'dibuka' => true,
            'catatan' => fake()->paragraph(),
        ]);
        JalurPendaftaran::create([
            'nama' => 'PRESTASI NON AKADEMIK',
            'tanggal_dibuka' => now(),
            'biaya_pendaftaran' => 0,
            'kode' => "PNA",
            'tanggal_ditutup' => now()->addDays(30),
            'quota' => '120',
            'dibuka' => true,
            'catatan' => fake()->paragraph(),
        ]);
        JalurPendaftaran::create([
            'nama' => 'PRESTASI AKADEMIK',
            'tanggal_dibuka' => now(),
            'kode' => "PA",
            'biaya_pendaftaran' => 0,
            'tanggal_ditutup' => now()->addDays(30),
            'quota' => '120',
            'dibuka' => true,
            'catatan' => fake()->paragraph(),
        ]);
    }
}
