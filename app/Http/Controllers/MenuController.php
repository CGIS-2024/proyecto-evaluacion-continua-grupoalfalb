<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Plato;
use App\Http\Requests\Menu\StoreMenuRequest;
use App\Http\Requests\Menu\UpdateMenuRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\Dietista;
use Carbon\Carbon;


class MenuController extends Controller
{
    public function index()
    {
        $this->authorize('viewAny', Menu::class);
        $menus = Menu::paginate(25); //AQUI SI PONEMOS  $menus = Menu::all(); no funciona, pero con paginate si, porqq????
        if(Auth::user()->es_dietista)
            $menus = Auth::user()->dietista->menus()->paginate(25);
        elseif(Auth::user()->es_paciente)
            $menus = Auth::user()->paciente->menus()->paginate(25);
        return view('/menus/index', ['menus' => $menus]);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('create', Menu::class);
        $dietistas = Dietista::all();

        return view('menus/create', ['dietistas' => $dietistas]);
    }


    public function store(StoreMenuRequest $request)
    {

        $dietista_id = Auth::user()->dietista->id;

        $menu = new Menu($request->validated());
        if(Auth::user()->es_dietista)
            $menu->dietista_id = $dietista_id;
            $menu->save();

        if (Auth::user()->es_administrador)
            // Verificar si la solicitud contiene un dietista_id
            $menu->dietista_id = $request->dietista_id;
            $menu->save();




        $menu->save();

        // Crear un mensaje de éxito en la sesión
        session()->flash('success', 'Menú creado correctamente.');

        // Redirigir a la lista de menús
        return redirect()->route('menus.index');
    }



    /**
     * Display the specified resource.
     */
    public function show(Menu $menu)
    {
        //$menusConPivote = Auth::user()->paciente->menus()->where('menu_paciente.fecha', Carbon::now())->first()->pivot->fecha->format('Y/m/d');

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
        $platos = Plato::all();


        if(Auth::user()->es_dietista){
            return view('menus/edit', ['menu' => $menu, 'platos' => $platos, 'dietista' => Auth::user()->dietista]);
        }
        return view('menus/edit', ['menu' => $menu, 'dietistas' => $dietistas, 'menus' => $menus, 'platos' => $platos]);
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
        // Validar la solicitud
        $this->validateWithBag('attach', $request, [
            'plato_id' => 'required',
        ]);

        // Obtener el plato seleccionado
        $plato = Plato::findOrFail($request->plato_id);

        // Verificar si el plato ya está asociado con el menú
        if ($menu->platos->contains($plato)) {
            return redirect()->route('menus.edit', $menu->id)
                ->withErrors(['plato_id' => 'El plato ya está asociado con este menú.']);
        }

        // Verificar si se está intentando agregar más de un plato de la misma categoría
        $platosEnMenu = $menu->platos->pluck('categoriaplato_id')->unique();
        if ($platosEnMenu->contains($plato->categoriaplato_id)) {
            return redirect()->route('menus.edit', $menu->id)
                ->withErrors(['plato_id' => 'Ya hay un plato de esta categoría en el menú.']);
        }

        // Asociar el plato al menú
        $menu->platos()->attach($plato);

        return redirect()->route('menus.edit', $menu->id);
    }


    public function detach_plato(Menu $menu, Plato $plato)
    {
        $menu->platos()->detach($plato->id);
        return redirect()->route('menus.edit', $menu->id);
    }
}
