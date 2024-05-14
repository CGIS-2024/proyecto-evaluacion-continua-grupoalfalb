<?php

namespace App\Http\Requests\Paciente;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Paciente;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;


class UpdatePacienteRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        $paciente = Paciente::find($this->route('paciente'))->first();
        return $paciente && $this->user()->can('update', $paciente);
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
                'fecha_nacimiento' => 'required|date_format:d/m/Y',
                'dni' => 'required|string|max:255',
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