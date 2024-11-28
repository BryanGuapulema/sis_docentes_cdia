<?php

namespace App\Http\Controllers;

use App\Models\Opcion;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\OpcionRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class OpcionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $opciones = Opcion::paginate();

        return view('opcion.index', compact('opciones'))
            ->with('i', ($request->input('page', 1) - 1) * $opciones->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $opcion = new Opcion();

        return view('opcion.create', compact('opcion'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(OpcioneRequest $request): RedirectResponse
    {
        Opcion::create($request->validated());

        return Redirect::route('opciones.index')
            ->with('success', 'Opcion created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $opcione = Opcion::find($id);

        return view('opcion.show', compact('opcion'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $opcione = Opcion::find($id);

        return view('Opcion.edit', compact('Opcion'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(OpcionRequest $request, Opcion $Opcion): RedirectResponse
    {
        $Opcion->update($request->validated());

        return Redirect::route('opciones.index')
            ->with('success', 'Opcion updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        Opcion::find($id)->delete();

        return Redirect::route('opciones.index')
            ->with('success', 'Opcion deleted successfully');
    }
}
