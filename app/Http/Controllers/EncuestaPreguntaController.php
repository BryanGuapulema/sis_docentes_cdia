<?php

namespace App\Http\Controllers;

use App\Models\EncuestaPregunta;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\EncuestaPreguntaRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class EncuestaPreguntaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $encuestaPregunta = EncuestaPregunta::paginate();

        return view('encuesta-pregunta.index', compact('encuestaPregunta'))
            ->with('i', ($request->input('page', 1) - 1) * $encuestaPregunta->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $encuestaPregunta = new EncuestaPregunta();

        return view('encuesta-pregunta.create', compact('encuestaPregunta'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EncuestaPreguntaRequest $request): RedirectResponse
    {
        EncuestaPregunta::create($request->validated());

        return Redirect::route('encuesta-pregunta.index')
            ->with('success', 'EncuestaPregunta created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $encuestaPregunta = EncuestaPregunta::find($id);

        return view('encuesta-pregunta.show', compact('encuestaPregunta'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $encuestaPregunta = EncuestaPregunta::find($id);

        return view('encuesta-pregunta.edit', compact('encuestaPregunta'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EncuestaPreguntaRequest $request, EncuestaPregunta $encuestaPregunta): RedirectResponse
    {
        $encuestaPregunta->update($request->validated());

        return Redirect::route('encuesta-pregunta.index')
            ->with('success', 'EncuestaPregunta updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        EncuestaPregunta::find($id)->delete();

        return Redirect::route('encuesta-pregunta.index')
            ->with('success', 'EncuestaPregunta deleted successfully');
    }
}
