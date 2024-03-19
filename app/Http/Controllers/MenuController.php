<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Http\Requests\Menu\StoreMenuRequest;
use App\Http\Requests\Menu\UpdateMenuRequest;
use Illuminate\Support\Facades\Auth;


class MenuController extends Controller
{

    public function index()
    {
        $menus = Menu::orderBy('fecha', 'desc')->paginate(25);
        return view('/menus/index', ['menus' => $menus]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('create', Menu::menu);
        $medicos = Medico::all();
        $pacientes = Paciente::all();
        if(Auth::user()->es_medico)
            return view('citas/create', ['medico' => Auth::user()->medico, 'pacientes' => $pacientes]);
        elseif(Auth::user()->es_paciente)
            return view('citas/create', ['paciente' => Auth::user()->paciente, 'medicos' => $medicos]);
        return view('citas/create', ['pacientes' => $pacientes, 'medicos' => $medicos]);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCitaRequest $request)
    {

    }

    /**
     * Display the specified resource.
     */
    public function show(Menu $menu)
    {
        $this->authorize('view', $menu);
        return view('menus/show', ['menu' => $menu]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Menu $menu)
    {
        $this->authorize('update', $menu);
        return view('menus/edit', ['menu' => $menu]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCitaRequest $request, Cita $cita)
    {

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Menu $menu)
    {
        $this->authorize('delete', $menu);
        if($menu->delete())
            session()->flash('success', 'Menu borrado correctamente.');
        else
            session()->flash('warning', 'El menu no pudo borrarse.');
        return redirect()->route('menus.index');
    }
}
