<?php

namespace App\Http\Controllers;

use App\Http\Requests\Plato\StorePlatoRequest;
use App\Http\Requests\Plato\UpdatePlatoRequest;
use App\Models\Plato;
use App\Models\CategoriaPlato;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



class PlatoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('viewAny', Plato::class);
        $platos = Plato::paginate(5);
        return view('/platos/index', ['platos' => $platos]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('create', Plato::class);
        $categoriaplatos = CategoriaPlato::all();

        return view('platos/create', ['categoriaplatos' => $categoriaplatos]);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePlatoRequest $request)
    {
        $plato = new Plato($request->validated());
        $plato->save();
        session()->flash('success', 'Plato creado correctamente.');
        return redirect()->route('platos.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Plato $plato)
    {
        $this->authorize('view', $plato);
        $categoriaplatos = CategoriaPlato::all();

        return view('platos/show', ['plato' => $plato, 'categoriaplatos' => $categoriaplatos]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Plato $plato)
    {
        $this->authorize('update', $plato);
        $platos = Plato::all();
        $categoriaplatos = Categoriaplato::all();

        return view('platos/edit', ['plato' => $plato, 'platos' => $platos, 'categoriaplatos' => $categoriaplatos]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePlatoRequest $request, Plato $plato)
    {
        $plato->fill($request->validated());
        $plato->save();
        session()->flash('success', 'Plato modificado correctamente.');
        return redirect()->route('platos.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Plato $plato)
    {
        $this->authorize('delete', $plato);
        if($plato->delete())
            session()->flash('success', 'Plato borrado correctamente.');
        else
            session()->flash('warning', 'No pudo borrarse el Plato.');
        return redirect()->route('platos.index');
    }
}
