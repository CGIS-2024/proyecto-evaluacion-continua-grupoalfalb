<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Plato;
use Illuminate\Validation\Rule;

class StorePlatoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */

    public function authorize(): bool
    {
        return $this->user()->can('create', Plato::class);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'tipo' => 'required|string|max:255',
            'nombre' => 'required|string|max:255',
            'alergenos' => 'required|string|max:255',
            'grasas' => 'required|numeric',
            'carbohidratos' => 'required|numeric',
            'proteínas' => 'required|numeric',
            'sodio' => 'required|numeric',
            'contenido_energetico' => 'required|string|max:255',
        ];
    }
}
