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
        Schema::create('laporan_labs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('lab_id')->constrained()->onDelete('cascade');  // Relasi ke tabel labs
            $table->foreignId('guru_id')->constrained()->onDelete('cascade');  // Relasi ke tabel labs
            $table->foreignId('mapel_id')->constrained()->onDelete('cascade');  // Relasi ke tabel labs
            $table->foreignId('user_id')->constrained()->onDelete('cascade');  // Relasi ke tabel labs
            $table->time('jam_mulai');  // Jam mulai penggunaan lab
            $table->time('jam_selesai');  // Jam selesai penggunaan lab
            $table->boolean('network')->default(true);
            $table->boolean('exp')->default(false);  // Jam selesai penggunaan lab
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laporan_labs');
    }
};
