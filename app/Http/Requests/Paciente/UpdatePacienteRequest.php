<?php

namespace App\Http\Requests\Paciente;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Paciente;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use App\Rules\Dni;



class UpdatePacienteRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return $this ->route('paciente') && $this ->user()->can('update', $this ->route('paciente'));
    }
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        if(Auth::user()->es_administrador){
            return [
                'name' => 'required|string|max:255',
                'apellidos' => 'required|string|max:255',
                'fecha_nacimiento' => 'required',
                'dni' => ['required', 'string', 'max:9', 'min:9', new Dni],
                'direccion' => 'required|string|max:255',
                'email' => 'required|string|max:255',
                'genero' => 'required|string|max:255',
                'alergias_alimentarias' => 'required|string|max:255',
                'preferencias_alimentarias' => 'required|string|max:255',
                'motivo_hospitalizacion' => 'required|string|max:255',
                'nuhsa' => 'required|String|max:12',
                'dietista_id' => 'required|String|max:12',
            ];
        }else{
            return [
                'alergias_alimentarias' => 'required|string|max:255',
                'preferencias_alimentarias' => 'required|string|max:255',
                'dietista_id' => 'required|String|max:12',
            ];
        }
    }
}
