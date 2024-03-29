<?php

namespace App\Http\Requests\Paciente;

use Illuminate\Foundation\Http\FormRequest;

class StorePacienteRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return $this->user()->can('create', paciente::class);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        
        return [
            'alergias_alimentarias' => 'required|string|max:255',
            'preferencias_alimentarias' => 'required|string|max:255',
            'motivo_hospitalizacion' => 'required|string|max:255',
            'nuhsa' => 'required|String|max:12',
            
        ];
    }
}
