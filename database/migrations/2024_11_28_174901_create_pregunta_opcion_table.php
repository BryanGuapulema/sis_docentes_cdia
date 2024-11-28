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
        Schema::create('pregunta_opcion', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pregunta_id')
                  ->constrained('preguntas')
                  ->onDelete('cascade'); // Relaciona con la tabla preguntas
            $table->foreignId('opcion_id')
                  ->constrained('opciones')
                  ->onDelete('cascade'); // Relaciona con la tabla opciones
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pregunta_opcion');
    }
};
