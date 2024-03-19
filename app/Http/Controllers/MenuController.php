<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Http\Requests\Menu\StoreMenuRequest;
use App\Http\Requests\Menu\UpdateMenuRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\Dietista;


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
        $this->authorize('create', Menu::class);
        $dietistas = Dietista::all();
        if(Auth::user()->es_dietista)
            return view('menus/create', ['dietista' => Auth::user()->dietista]);
        return view('menus/create', ['dietista' => $dietistas]);
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
        if(Auth::user()->es_dietista){
            return view('menus/edit', ['menu' => $menu, 'dietista' => Auth::user()->dietista]);
        }
        return view('menus/edit', ['menu' => $menu, 'dietista' => $dietistas]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCitaRequest $request, Cita $cita)
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
}
