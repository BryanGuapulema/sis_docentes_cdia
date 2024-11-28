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
        Schema::create('encuestas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_asignatura')->constrained('asignaturas')->onDelete('cascade'); // Relación con asignaturas
            $table->string('nombre_encuesta');
            $table->date('fecha_creacion')->default(now());
            $table->foreignId('creado_por')->constrained('docentes')->onDelete('cascade');
            $table->uuid('uuid')->unique();
            $table->string('enlace_encuesta');
            $table->timestamps(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('encuestas');
    }
};
