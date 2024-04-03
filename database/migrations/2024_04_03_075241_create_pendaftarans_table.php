<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pendaftarans', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->string('no_pendaftaran')->unique();
            $table->foreignUuid('jalur_pendaftaran_id')->nullable()->constrained('jalur_pendaftarans','id')->cascadeOnUpdate()->restrictOnDelete();
            $table->foreignUuid('jurusan_id')->nullable()->constrained('jurusans','id')->cascadeOnUpdate()->restrictOnDelete();
            $table->foreignIdFor(User::class)->constrained('users','id')->cascadeOnUpdate()->restrictOnDelete();
            $table->boolean('diterima')->default(false);
            $table->dateTime('waktu_daftar');
            $table->enum('status_verifikasi_formulir',[
                "Diterima",
                "Ditolak",
                "Perlu Perbaikan",
                "Dalam Proses Verifikasi",
                "Tertunda",
                "Gagal",
                "Disetujui",
                "Dalam Antrian",
                "Dibatalkan"
            ]);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pendaftarans');
    }
};
