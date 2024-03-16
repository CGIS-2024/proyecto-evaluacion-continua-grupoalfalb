<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreDietistaRequest;
use App\Http\Requests\UpdateDietistaRequest;
use App\Models\Dietista;

class DietistaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('viewAny', Dietista::class);
        $dietistas = Dietista::paginate(5);
        return view('/dietistas/index', ['dietistas' => $dietistas]);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDietistaRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Dietista $dietista)
    {
        $this->authorize('view', $dietista);
        return view('dietistas/show', ['dietista' => $dietista]);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Dietista $dietista)
    {
        $this->authorize('update', $dietista);
        return view('dietistas/edit', ['dietista' => $dietista]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDietistaRequest $request, Dietista $dietista)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Dietista $dietista)
    {
        $this->authorize('delete', $dietista);
        if($dietista->delete())
            session()->flash('success', 'Dietista borrado correctamente.');
        else
            session()->flash('warning', 'El dietista no pudo borrarse.');
        return redirect()->route('dietistas.index');

    }
}
