<?php

namespace App\Http\Controllers;

use App\Models\Encuesta;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\EncuestaRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Str;


class EncuestaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $encuestas = Encuesta::paginate();

        return view('encuesta.index', compact('encuestas'))
            ->with('i', ($request->input('page', 1) - 1) * $encuestas->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        // Obtener preguntas con sus opciones y asignaturas
        $preguntas = \App\Models\Pregunta::with('opciones')->get();
        $asignaturas = \App\Models\Asignatura::all();

        // Crear un objeto vacío de Encuesta para el formulario
        $encuesta = new Encuesta();        

        return view('encuesta.create', compact('encuesta', 'preguntas', 'asignaturas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EncuestaRequest $request): RedirectResponse
    {        
        // Validar las preguntas seleccionadas
        $validated = $request->validate([
            'nombre_encuesta' => 'required|string|max:255',
            'id_asignatura' => 'required|exists:asignaturas,id',
            'creado_por' => 'required|exists:docentes,id',
            'preguntas' => 'required|array|min:1',
            'preguntas.*' => 'exists:preguntas,id',
        ]);

        // Generar un UUID único
        $uuid = Str::uuid();

        // Crear la encuesta
        $encuesta = Encuesta::create([
            'id_asignatura' => $validated['id_asignatura'],
            'nombre_encuesta' => $validated['nombre_encuesta'],
            'creado_por' => $validated['creado_por'],
            'uuid' => $uuid,
            'enlace_encuesta' => url('/encuestas/' . $uuid),
        ]);
        
        // Asociar las preguntas con la encuesta en la tabla intermedia
        $encuesta->preguntas()->sync($validated['preguntas']);                

        return redirect()->route('encuestas.generated', $encuesta->id)
                         ->with('success', 'Encuesta creada exitosamente.');
        
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $encuesta = Encuesta::find($id);

        return view('encuesta.show', compact('encuesta'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $encuesta = Encuesta::find($id);

        return view('encuesta.edit', compact('encuesta'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EncuestaRequest $request, Encuesta $encuesta): RedirectResponse
    {
        $encuesta->update($request->validated());

        return Redirect::route('encuestas.index')
            ->with('success', 'Encuesta updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        Encuesta::find($id)->delete();

        return Redirect::route('encuestas.index')
            ->with('success', 'Encuesta deleted successfully');
    }

    public function generated($id)
    {
        $encuesta = Encuesta::find($id);

        return view('encuesta.generated', compact('encuesta'));
    }

    // Muestra la encuesta como formulario para que se respondan
    public function responder($uuid)
    {
        $encuesta = Encuesta::where('uuid', $uuid)->with('preguntas.opciones')->firstOrFail();

        return view('encuesta.answer', compact('encuesta'));
    }
}
