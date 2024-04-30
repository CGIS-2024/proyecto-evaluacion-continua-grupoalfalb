<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Plato;
use App\Http\Requests\Menu\StoreMenuRequest;
use App\Http\Requests\Menu\UpdateMenuRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\Dietista;


class MenuController extends Controller
{
    public function index()
    {
        $menus = Menu::paginate(25);
        return view('/menus/index', ['menus' => $menus]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('create', Menu::class);
        return view('menus/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMenuRequest $request)
    {
        $menu = new Menu($request->validated());
        $menu->save();
        session()->flash('success', 'Menu creado correctamente.');
        return redirect()->route('menus.index');
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
        $dietistas = Dietista::all();
        $menus = Menu::all();

        if(Auth::user()->es_dietista){
            return view('menus/edit', ['menu' => $menu, 'dietista' => Auth::user()->dietista]);
        }
        return view('menus/edit', ['menu' => $menu, 'dietistas' => $dietistas, 'menus' => $menus]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMenuRequest $request, Menu $menu)
    {
        $menu->fill($request->validated());
        $menu->save();
        session()->flash('success', 'Menu modificado correctamente.');
        return redirect()->route('menus.index');
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


    public function attach_plato(Request $request, Menu $menu)
    {
        // Valido en el controlador directamente en vez de en una form request separada porque necesito validar añadiendo un nombre al bag de errores.
        // Necesito añadir un nombre al bag de attach porque la vista de edit tiene 2 formularios, cada uno pudiento tener errores de validación, así que asociamos un nombre a uno de ellos para poder diferenciar
        // En la vista accederemos a los errores de validación de este formulario a través del nombre del bag
        $this->validateWithBag('attach', $request, [
            'plato_id' => 'required',
            'comida' => 'string'

        ]);
        $menu->platos()->attach($request->plato_id, [
            'comida' => $request->comida
        ]);
        return redirect()->route('menus.edit', $menu->id);
    }

    public function detach_plato(Menu $menu, Plato $plato)
    {
        $menu->platos()->detach($plato->id);
        return redirect()->route('menus.edit', $menu->id);
    }
}
