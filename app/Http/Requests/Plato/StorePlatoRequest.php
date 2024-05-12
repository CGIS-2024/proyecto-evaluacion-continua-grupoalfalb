<?php

namespace App\Http\Requests\Plato;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Plato;
use Illuminate\Validation\Rule;
use App\Rules\MaxPlatosPorCategoria;


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
            'nombre' => 'required|string|max:255',
            'alergenos' => 'required|string|max:255',
            'grasas' => 'required|numeric|min:0',
            'carbohidratos' => 'required|numeric|min:0',
            'proteinas' => 'required|numeric|min:0',
            'fibra' => 'required|numeric|min:0',
            'calorias' => 'required|numeric|min:0',
            'azucares' => 'required|numeric|min:0',
            'peso' => 'required|numeric|min:0',
            'ingredientes' => 'required|string',
            'descripcion' => 'required|string',
            'categoriaplato_id' => 'required|exists:categoriaplatos,id',
            'primer_plato' => ['required', new MaxPlatosPorCategoria],
            'segundo_plato' => ['required', new MaxPlatosPorCategoria],
            'postre' => ['required', new MaxPlatosPorCategoria],


        ];
    }
}
