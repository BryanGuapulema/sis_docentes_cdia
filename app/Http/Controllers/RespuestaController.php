<?php

namespace App\Http\Controllers;

use App\Models\Respuesta;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\RespuestaRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class RespuestaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $respuestas = Respuesta::paginate();

        return view('respuesta.index', compact('respuestas'))
            ->with('i', ($request->input('page', 1) - 1) * $respuestas->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $respuesta = new Respuesta();

        return view('respuesta.create', compact('respuesta'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RespuestaRequest $request): RedirectResponse
    {
        Respuesta::create($request->validated());

        return Redirect::route('respuestas.index')
            ->with('success', 'Respuesta created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $respuesta = Respuesta::find($id);

        return view('respuesta.show', compact('respuesta'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $respuesta = Respuesta::find($id);

        return view('respuesta.edit', compact('respuesta'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RespuestaRequest $request, Respuesta $respuesta): RedirectResponse
    {
        $respuesta->update($request->validated());

        return Redirect::route('respuestas.index')
            ->with('success', 'Respuesta updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        Respuesta::find($id)->delete();

        return Redirect::route('respuestas.index')
            ->with('success', 'Respuesta deleted successfully');
    }
}
