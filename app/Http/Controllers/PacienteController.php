<?php

namespace App\Http\Controllers;

use App\Http\Requests\Paciente\StorePacienteRequest;
use App\Http\Requests\Paciente\UpdatePacienteRequest;
use App\Models\Paciente;
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
        return view('pacientes/create');
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
        return view('pacientes/show', ['paciente' => $paciente]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Paciente $paciente)
    {
        $this->authorize('update', $paciente);
        
        
        return view('pacientes/edit', ['paciente' => $paciente]);
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
}
