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
        Schema::create('pcs', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            // Peralatan tambahan dengan tipe boolean
            $table->boolean('has_monitor')->default(true);  // Ada monitor untuk PC?
            $table->boolean('has_keyboard')->default(true);  // Ada keyboard untuk PC?
            $table->boolean('has_mouse')->default(true);  // Ada mouse untuk PC?
            $table->boolean('has_pc')->default(true);  // Ada keyboard untuk PC?
            // Relasi ke tabel `labs`
            $table->foreignId('lab_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pcs');
    }
};
