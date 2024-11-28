<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Opcion;
use App\Models\Pregunta;


class PreguntasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         // Opciones predefinidas
        $opcionesRango = [
            '1', '2', '3', '4', '5'
        ];

        $opcionesLikert = [            
            'Deficiente',
            'Insuficiente',
            'Aceptable',
            'Bueno',
            'Muy bueno',
        ];

        $valoresLikert = [1, 2, 3, 4, 5];

        $opcionesSiNo = [
            'Sí', 'No'
        ];        

        // Crear las opciones en la tabla opciones para las escalas
        foreach ($opcionesRango as $valor) {
            Opcion::create(['opcion' => $valor, 'valor' => $valor]);
        }

        foreach ($opcionesLikert as $index => $valor) {
        Opcion::create([
            'opcion' => $valor, 
            'valor' => $valoresLikert[$index]
        ]);
}

        foreach ($opcionesSiNo as $valor) {
            Opcion::create(['opcion' => $valor, 'valor' => $valor === 'Sí' ? 5 : 1]);
        }

        // Crear preguntas
        $preguntas = [
            [
                'enunciado' => 'Del 1 al 10, ¿cómo califica el desempeño del profesor en la clase virtual?',
                'tipo' => 'seleccion_simple', 
                'escala' => 'rango', // Pregunta de calificación
            ],
            [
                'enunciado' => '¿El docente prendió la cámara?',
                'tipo' => 'seleccion_simple',
                'escala' => 'si_no',
            ],
            [
                'enunciado' => '¿El docente respondió todas las preguntas de los estudiantes durante la clase?',
                'tipo' => 'seleccion_simple', 
                'escala' => 'si_no',
            ],
            [
                'enunciado' => '¿La explicación del docente fue clara y comprensible?',
                'tipo' => 'seleccion_simple',
                'escala' => 'si_no',
            ],
            [
                'enunciado' => '¿El docente explicó los conceptos de manera visual y con ejemplos prácticos?',
                'tipo' => 'seleccion_simple', 
                'escala' => 'si_no',
            ],
            [
                'enunciado' => '¿Qué mejoras sugerirías para las clases virtuales del docente?',
                'tipo' => 'texto_libre',
                'escala' => null, // Escala nula para texto libre
            ],
            [
                'enunciado' => '¿Consideras que el docente utilizó correctamente las herramientas tecnológicas durante la clase?',
                'tipo' => 'seleccion_simple',
                'escala' => 'si_no',
            ],
            [
                'enunciado' => '¿El docente ofreció suficiente tiempo para la participación de los estudiantes?',
                'tipo' => 'seleccion_simple',
                'escala' => 'si_no',
            ],
            [
                'enunciado' => '¿Qué opinas sobre la interacción y el dinamismo de la clase?',
                'tipo' => 'texto_libre',
                'escala' => null, // Escala nula para texto libre
            ],
        ];

        // Crear las preguntas en la tabla preguntas
        foreach ($preguntas as $pregunta) {
            $createdPregunta = Pregunta::create([
                'enunciado' => $pregunta['enunciado'],
                'tipo_pregunta' => $pregunta['tipo'],
                'escala' => $pregunta['escala'],
            ]);

            // Asociar opciones dependiendo del tipo de pregunta
            if ($pregunta['tipo'] == 'seleccion_simple') {
                // Solo una opción (rango)
                $createdPregunta->opciones()->attach(Opcion::whereIn('opcion', $opcionesRango)->pluck('id'));
            } elseif ($pregunta['tipo'] == 'si_no') {
                // Solo opciones Si/No
                $createdPregunta->opciones()->attach(Opcion::whereIn('opcion', $opcionesSiNo)->pluck('id'));
            }
        }
    }
}

