<?php

namespace App\Http\Controllers;

use App\Http\Requests\Paciente\StorePacienteRequest;
use App\Http\Requests\Paciente\UpdatePacienteRequest;
use App\Models\Paciente;
use App\Models\Dietista;
use App\Models\Menu;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class PacienteController extends Controller
{
    private function createUser(Request $request)
    {
        $user = new User($request->validated());

        $user->save();
        return $user;
    }

    /**
     * Display a listing of the resource.
     */



    public function index()
    {
        $pacientes = Paciente::paginate(25);
        return view('/pacientes/index', ['pacientes' => $pacientes]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('create', Paciente::class);
        $dietistas = Dietista::all();
        $menus = Menu::all();

        return view('pacientes/create', ['dietistas' => $dietistas, 'menus' => $menus]);

    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePacienteRequest $request)
    {
        $user = $this->createUser($request);
        $paciente = new Paciente($request->validated());
        $paciente->user_id = $user->id;
        $paciente->save();
        session()->flash('success', 'Paciente creado correctamente.');
        return redirect()->route('pacientes.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Paciente $paciente)
    {
        $this->authorize('view', $paciente);
        $dietistas = Dietista::all();
        return view('pacientes/show', ['paciente' => $paciente, 'dietistas' => $dietistas]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Paciente $paciente)
    {
        $this->authorize('update', $paciente);
        $dietistas = Dietista::all();
        $menus = Menu::all();
        return view('pacientes/edit', ['paciente' => $paciente, 'dietistas' => $dietistas, 'menus' => $menus]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePacienteRequest $request, Paciente $paciente)
    {
        $user = $paciente->user;
        $user->fill($request->validated());
        $user->save();
        $paciente->fill($request->validated());
        $paciente->save();
        session()->flash('success', 'Paciente modificado correctamente.');
        return redirect()->route('pacientes.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Paciente $paciente)
    {
        $this->authorize('delete', $paciente);
        if($paciente->delete() && $paciente->user->delete())
            session()->flash('success', 'Paciente borrado correctamente.');
        else
            session()->flash('warning', 'El paciente no pudo borrarse.');
        return redirect()->route('pacientes.index');
    }

    public function attach_menu(Request $request, Paciente $paciente)
    {
        // Valida los datos del formulario
        $this->validateWithBag('attach', $request, [
            'menu_id' => 'required',
            'fecha' => 'required|date',
            'tipo' => 'required|string',
        ]);

        // Obtén el menú que se está intentando añadir
        $menu = Menu::find($request->menu_id);

        // Verifica si el menú contiene al menos un primer plato, un segundo plato y un postre
        $primer_plato = $menu->platos()->where('categoriaplato_id', 1)->exists();
        $segundo_plato = $menu->platos()->where('categoriaplato_id', 2)->exists();
        $postre = $menu->platos()->where('categoriaplato_id', 3)->exists();

        // Si el menú no contiene los tres tipos de platos, muestra un mensaje de error
        if (!$primer_plato || !$segundo_plato || !$postre) {
            return redirect()->back()->withErrors(['menu_id' => 'El menú debe contener al menos un primer plato, un segundo plato y un postre.'])->withInput();
        }

        $existingMenu = $paciente->menus()
        ->where('menu_id', $menu->id)
        ->exists();

        if ($existingMenu) {
            return redirect()->back()->withErrors(['menu_id' => 'Este menú ya está asociado al paciente, eliminalo antes de añadir el mismo.'])->withInput();
        }

        // Asocia el menú al paciente
        $paciente->menus()->attach($menu->id, [
            'fecha' => $request->fecha,
            'tipo' => $request->tipo,
        ]);

        // Redirige a la vista de edición del paciente con los menús
        return redirect()->route('pacientes.edit', $paciente->id);
    }






    public function detach_menu(Paciente $paciente, Menu $menu)
    {
        $paciente->menus()->detach($menu->id);
        return redirect()->route('pacientes.edit', $paciente->id);
    }
}
