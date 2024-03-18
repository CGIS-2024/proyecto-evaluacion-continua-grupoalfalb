<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Http\Requests\Menu\StoreMenuRequest;
use App\Http\Requests\Menu\UpdateMenuRequest;


class MenuController extends Controller
{

    public function index()
    {
        $this->authorize('viewAny', Menu::class);
        $menus = Menu::orderBy('fecha', 'desc')->paginate(25);
        if(Auth::user()->es_dietista)
            $menus = Auth::user()->dietista->menus()->orderBy('fecha', 'desc')->paginate(25);
        elseif(Auth::user()->es_paciente)
            $citas = Auth::user()->paciente->menus()->orderBy('fecha', 'desc')->paginate(25);
        return view('/menus/index', ['menus' => $menus]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

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
