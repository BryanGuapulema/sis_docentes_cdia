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
        Schema::create('preguntas', function (Blueprint $table) {            
            $table->id();
            $table->string('enunciado');
            $table->enum('tipo_pregunta', ['texto_libre', 'seleccion_simple', 'seleccion_multiple'])->default('seleccion_simple');
            $table->enum('escala', ['rango', 'likert', 'si_no'])->nullable();; 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('preguntas');
    }
};
