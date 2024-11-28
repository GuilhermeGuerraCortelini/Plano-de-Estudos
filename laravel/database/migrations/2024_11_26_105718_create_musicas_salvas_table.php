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
        Schema::create('musicas_salvas', function (Blueprint $table) {
            $table->id();
            $table->string('nome');  // Nome do arquivo MP3
            $table->string('caminho');  // Caminho do arquivo MP3
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('musicas_salvas');
    }
};
