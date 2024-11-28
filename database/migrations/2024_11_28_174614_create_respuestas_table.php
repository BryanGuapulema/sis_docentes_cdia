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
        Schema::create('respuestas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_encuesta')->constrained('encuestas')->onDelete('cascade');
            $table->foreignId('id_pregunta')->constrained('preguntas')->onDelete('cascade');
            $table->text('respuesta');
            $table->foreignId('id_usuario')->nullable()->constrained('users')->onDelete('set null');
            $table->timestamp('fecha_respuesta')->useCurrent(); // Esto automáticamente usa el timestamp actual
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('respuestas');
    }
};
