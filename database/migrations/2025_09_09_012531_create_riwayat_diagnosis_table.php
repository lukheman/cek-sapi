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
        Schema::create('riwayat_diagnosis', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pasien');
            $table->foreignId('id_penyakit')->constrained('penyakit')->onDelete('cascade');
            $table->float('probabilitas');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('riwayat_diagnosis');
    }
};
