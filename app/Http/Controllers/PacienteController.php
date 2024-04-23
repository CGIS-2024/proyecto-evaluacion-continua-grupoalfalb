<?php

namespace App\Http\Controllers;

use App\Http\Requests\Paciente\StorePacienteRequest;
use App\Http\Requests\Paciente\UpdatePacienteRequest;
use App\Models\Paciente;
use App\Models\Dietista;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class PacienteController extends Controller
{
    private function createUser(Request $request)
    {
        $user = new User($request->validated());
        $user->password = Hash::make($user->password);
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
        return view('pacientes/create', ['dietistas' => $dietistas]);

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

        return view('pacientes/edit', ['paciente' => $paciente, 'dietistas' => $dietistas]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePacienteRequest $request, Paciente $paciente)
    {
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
        if($paciente->delete())
            session()->flash('success', 'Paciente borrado correctamente.');
        else
            session()->flash('warning', 'El paciente no pudo borrarse.');
        return redirect()->route('pacientes.index');
    }

    public function attach_menu(Request $request, Paciente $paciente)
    {
        // Valido en el controlador directamente en vez de en una form request separada porque necesito validar añadiendo un nombre al bag de errores.
        // Necesito añadir un nombre al bag de attach porque la vista de edit tiene 2 formularios, cada uno pudiento tener errores de validación, así que asociamos un nombre a uno de ellos para poder diferenciar
        // En la vista accederemos a los errores de validación de este formulario a través del nombre del bag
        $this->validateWithBag('attach', $request, [
            'menu_id' => 'required',
            'fecha' => 'required|date',
        ]);
        $paciente->menus()->attach($request->menu_id, [
            'fecha' => $request->fecha
        ]);
        return redirect()->route('pacientes.edit', $paciente->id);
    }

    public function detach_menu(Paciente $paciente, Menu $menu)
    {
        $paciente->menu()->detach($menu->id);
        return redirect()->route('pacientes.edit', $paciente->id);
    }
}
