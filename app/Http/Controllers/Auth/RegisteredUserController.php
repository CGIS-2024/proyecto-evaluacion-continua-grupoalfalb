<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Especialidad;
use App\Models\Medico;
use App\Models\Paciente;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use App\Rules\Nuhsa;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    public function create_dietista()
    {
        return view('auth.register-medico');
    }

    private function getReglasValidacionRegistroDietista(){
        return [
            'fecha_contratacion' => 'required|date',
            'nuhsa' => ['required', 'string', 'max:12', 'min:12', new Nuhsa]
        ];
    }

    private function getReglasValidacionRegistroPaciente(){
        return ['nuhsa' => ['required', 'string', 'max:12', 'min:12', new Nuhsa],
            'alergias_alimentarias' => 'required|string|max:255',
            'preferencias_alimentarias' => 'required|string|max:255',
            'motivo_hospitalizacion' => 'required|string|max:255',
            'dietista_id' => 'required|String|max:12',
    ];


    }

    private function getReglasValidacionRegistro(Request $request){
        $reglasValidacionRegistro = [
            'name' => 'required|string|max:255',
            'apellidos' => 'required|string|max:255',
            'fecha_nacimiento' => 'required|date',
            'dni' => 'required|string|max:255',
            'direccion' => 'required|string|max:255',
            'email' => 'required|string|max:255',
            'password' => 'required|string|confirmed|min:8',
            'genero' => 'required|string|max:255',
            'tipo_usuario_id' => 'required|numeric'
        ];
        if(intval($request->tipo_usuario_id) == 1)
            //Médico
            return array_merge($reglasValidacionRegistro, $this->getReglasValidacionRegistroDietista());
        if(intval($request->tipo_usuario_id) == 2)
            //Paciente
            return array_merge($reglasValidacionRegistro, $this->getReglasValidacionRegistroPaciente());
    }

    private function crearUsuarioBase(Request $request): User
    {
        return User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'apellidos' => $request->apellidos,
            'fecha_nacimiento' => $request->fecha_nacimiento,
            'dni' => $request->dni,
            'direccion' => $request->direccion,
            'genero' => $request->genero,
        ]);
    }

    private function crearDietista(Request $request, User $user){
        $dietista = new Dietista($request->all());
        $dietista->user_id = $user->id;
        $dietista->save();
    }

    private function crearPaciente(Request $request, User $user){
        $paciente = new Paciente($request->all());
        $paciente->user_id = $user->id;
        $paciente->save();
    }

    private function crearSubclaseUserSegunTipoUsuario(Request $request, User $user){
        if(intval($request->tipo_usuario_id) == 1)
            $this->crearDietista($request, $user);
        elseif(intval($request->tipo_usuario_id) == 2){
            $this->crearPaciente($request, $user);
        }

    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate($this->getReglasValidacionRegistro($request));
        $user = $this->crearUsuarioBase($request);
        $this->crearSubclaseUserSegunTipoUsuario($request, $user);
        $user->fresh();
        event(new Registered($user));
        Auth::login($user);
        return redirect(RouteServiceProvider::HOME);
    }
}
