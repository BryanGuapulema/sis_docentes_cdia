<?php

namespace App\Http\Controllers;

use App\Models\Opcione;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\OpcioneRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class OpcioneController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $opciones = Opcione::paginate();

        return view('opcione.index', compact('opciones'))
            ->with('i', ($request->input('page', 1) - 1) * $opciones->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $opcione = new Opcione();

        return view('opcione.create', compact('opcione'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(OpcioneRequest $request): RedirectResponse
    {
        Opcione::create($request->validated());

        return Redirect::route('opciones.index')
            ->with('success', 'Opcione created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $opcione = Opcione::find($id);

        return view('opcione.show', compact('opcione'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $opcione = Opcione::find($id);

        return view('opcione.edit', compact('opcione'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(OpcioneRequest $request, Opcione $opcione): RedirectResponse
    {
        $opcione->update($request->validated());

        return Redirect::route('opciones.index')
            ->with('success', 'Opcione updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        Opcione::find($id)->delete();

        return Redirect::route('opciones.index')
            ->with('success', 'Opcione deleted successfully');
    }
}
