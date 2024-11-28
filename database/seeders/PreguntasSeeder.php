<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class PreguntasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('preguntas')->insert([
            [
                'enunciado' => 'Del 1 al 10, ¿cómo califica el desempeño del profesor en la clase virtual?',
                'tipo' => 'seleccion_simple', 
            ],
            [
                'enunciado' => '¿El docente prendió la cámara?',
                'tipo' => 'si_no',
            ],
            [
                'enunciado' => '¿El docente respondió todas las preguntas de los estudiantes durante la clase?',
                'tipo' => 'si_no', 
            ],
            [
                'enunciado' => '¿La explicación del docente fue clara y comprensible?',
                'tipo' => 'si_no',
            ],
            [
                'enunciado' => '¿El docente explicó los conceptos de manera visual y con ejemplos prácticos?',
                'tipo' => 'si_no', 
            ],
            [
                'enunciado' => '¿Qué mejoras sugerirías para las clases virtuales del docente?',
                'tipo' => 'texto_libre',
            ],
            [
                'enunciado' => '¿Consideras que el docente utilizó correctamente las herramientas tecnológicas durante la clase?',
                'tipo' => 'si_no',
            ],
            [
                'enunciado' => '¿El docente ofreció suficiente tiempo para la participación de los estudiantes?',
                'tipo' => 'si_no',
            ],
            [
                'enunciado' => '¿Qué opinas sobre la interacción y el dinamismo de la clase?',
                'tipo' => 'texto_libre',
            ],
        ]);   
    }
}
