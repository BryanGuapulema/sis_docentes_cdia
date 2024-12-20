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
            $table->foreignId('id_pregunta')->constrained('preguntas')->onDelete('cascade');  // Relaciona con la tabla 'preguntas'
            $table->foreignId('opcion_id')->constrained('opciones')->onDelete('cascade');  // Relaciona con la tabla 'opciones'
            $table->foreignId('id_usuario')->nullable()->constrained('users')->onDelete('set null');
            $table->timestamp('fecha_respuesta')->useCurrent();
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
