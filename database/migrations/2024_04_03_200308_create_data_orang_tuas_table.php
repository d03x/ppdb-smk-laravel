<?php

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
        Schema::create('data_orang_tuas', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('pendaftaran_id')->constrained('pendaftarans', 'id')->cascadeOnUpdate()->restrictOnDelete();
            $table->enum('type', [
                'ayah',
                'ibu',
                'wali'
            ]);
            $table->string('nama_ayah', 255)->nullable();
            $table->string('nama_ibu', 255)->nullable();
            $table->string('nik_ayah', 16)->unique()->nullable();
            $table->string('nik_ibu', 16)->unique()->nullable();
            $table->string('pekerjaan_ayah', 255)->nullable();
            $table->string('pekerjaan_ibu', 255)->nullable();
            $table->string('pendidikan_terakhir_ayah', 255)->nullable();
            $table->string('pendidikan_terakhir_ibu', 255)->nullable();
            $table->text('alamat')->nullable();
            $table->string('no_telepon', 255)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_orang_tuas');
    }
};
