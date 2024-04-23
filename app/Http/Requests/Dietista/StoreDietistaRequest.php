<?php

namespace App\Http\Requests;
use App\Models\Menu;
use Illuminate\Validation\Rule;



use Illuminate\Foundation\Http\FormRequest;

class StoreDietistaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return $this->user()->can('create', Dietista::class);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'apellidos' => 'required|string|max:255',
            'fecha_nacimiento' => 'required|date',
            'dni' => 'required|string|max:255',
            'direccion' => 'required|string|max:255',
            'email' => 'required|string|max:255',
            'password' => 'required|string|confirmed|min:8',
            'genero' => 'required|string|max:255',
            'nuhsa' => 'required|string|max:12',
            'fecha_contratacion' => 'required|date',

        ];
    }
}
