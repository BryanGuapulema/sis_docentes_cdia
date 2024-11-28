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
        Schema::create('encuesta_pregunta', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_encuesta')->constrained('encuestas')->onDelete('cascade'); // Relación con encuestas
            $table->foreignId('id_pregunta')->constrained('preguntas')->onDelete('cascade'); // Relación con preguntas
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('encuesta_pregunta');
    }
};
