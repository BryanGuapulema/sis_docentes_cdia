<?php

namespace App\Http\Controllers;

use App\Models\Respuesta;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\Encuesta;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;

class RespuestaController extends Controller
{    
    public function index(Request $request): View
    {
        $respuestas = Respuesta::paginate();

        return view('respuesta.index', compact('respuestas'))
            ->with('i', ($request->input('page', 1) - 1) * $respuestas->perPage());
    }    

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $uuid): View
    {
        // Buscar la encuesta por UUID
        $encuesta = Encuesta::where('uuid', $uuid)->firstOrFail();

        // Validar las respuestas
        $validated = $request->validate([
            'preguntas' => 'required|array',
            'preguntas.*' => 'required|exists:opciones,id',
        ]);

        // Recorrer y guardar cada respuesta
        foreach ($validated['preguntas'] as $id_pregunta => $opcion_id) {
            Respuesta::create([
                'id_encuesta' => $encuesta->id,
                'id_pregunta' => $id_pregunta,
                'opcion_id' => $opcion_id,
                'id_usuario' => Auth::id(),
            ]);
        }

        return view('respuesta.thankyou');
    }

    public function show($id)
    {
        // Obtener la encuesta con sus preguntas y respuestas asociadas
        $encuesta = Encuesta::with(['preguntas.respuestas' => function($query) use ($id) {
            $query->where('id_encuesta', $id); // Filtrar respuestas asociadas a la encuesta
        }, 'preguntas.respuestas.opcion'])
        ->findOrFail($id); // Obtener encuesta o abortar si no existe

        return view('respuesta.show', compact('encuesta'));
    }
    /** 
     * Display the specified resource.
     */
    public function visualshow($id)
    {
        // Obtener la encuesta con las preguntas, respuestas asociadas y sus opciones
        $encuesta = Encuesta::with(['preguntas.respuestas' => function($query) use ($id) {
            $query->where('id_encuesta', $id); // Filtrar las respuestas asociadas a la encuesta
        }, 'preguntas.respuestas.opcion'])
        ->findOrFail($id); // Obtener encuesta o abortar si no existe

        // Definir los colores para los gráficos
        $chartColors = ['#FF5733', '#33FF57', '#3357FF', '#FF33F6']; // Define los colores

        // Preparar los datos para el gráfico
        $chartData = [];

        // Recorremos cada pregunta de la encuesta
        foreach ($encuesta->preguntas as $pregunta) {
            $answers = [];

            // Agrupamos las respuestas por opción y contamos cuántas veces se seleccionó cada una
            $respuestaCount = $pregunta->respuestas->groupBy(function($respuesta) {
                return $respuesta->opcion->opcion; // Agrupar por la opción
            });

            // Contamos las respuestas por cada opción
            foreach ($respuestaCount as $opcion => $respuestas) {
                $answers[$opcion] = $respuestas->count(); // Contamos cuántas veces se seleccionó cada opción
            }

            // Almacenamos la pregunta y sus respuestas con el conteo en el array
            $chartData[] = [
                'question' => $pregunta->enunciado,
                'answers' => $answers,
            ];
        }

        // Pasamos los datos a la vista
        return view('respuesta.visualshow', compact('encuesta', 'chartData', 'chartColors'));
    }


    public function downloadPDF($id)
    {
        // Obtener la encuesta con las preguntas, respuestas asociadas y sus opciones
        $encuesta = Encuesta::with([
            'preguntas.respuestas' => function($query) use ($id) {
                
                $query->where('id_encuesta', $id);
            },
            'preguntas.respuestas.opcion' // Cargar las opciones de respuesta
        ])
        ->findOrFail($id); // Obtener encuesta o abortar si no existe

        // Colores para los gráficos
        $chartColors = ['#FF5733', '#33FF57', '#3357FF', '#FF33F6'];

        // Preparar datos para los gráficos
        $chartData = [];

        // Recorrer las preguntas y sus respuestas filtradas
        foreach ($encuesta->preguntas as $pregunta) {
            $answers = [];

            // Filtrar las respuestas de la pregunta actual
            $respuestaCount = $pregunta->respuestas->groupBy(function ($respuesta) {
                return $respuesta->opcion->opcion;
            });

            // Contabilizar las respuestas por opción
            foreach ($respuestaCount as $opcion => $respuestas) {
                $answers[$opcion] = $respuestas->count();
            }

            // Agregar los datos de cada pregunta a los datos de gráficos
            $chartData[] = [
                'question' => $pregunta->enunciado,
                'answers' => $answers,
            ];
        }

        // Renderizar la vista con los datos para el PDF
        $pdf = Pdf::loadView('respuesta.pdf', compact('encuesta', 'chartData', 'chartColors'));

        // Descargar el PDF con los resultados de la encuesta
        return $pdf->download('Resultados_' . $encuesta->nombre_encuesta . '.pdf');
    }

    /**
     * Remove the specified resource from storage.
     */

    /*
    public function destroy($id): RedirectResponse
    {
        // Buscar la respuesta por su ID y la elimina
        $respuesta = Respuesta::findOrFail($id);
        $respuesta->delete();

        // Redireccionar con un mensaje de éxito
        return Redirect::route('respuestas.index')->with('success', 'Respuesta eliminada correctamente.');
    }
    */
}
