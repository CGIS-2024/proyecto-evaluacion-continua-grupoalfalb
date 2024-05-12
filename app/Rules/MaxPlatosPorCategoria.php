<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use App\Models\Menu;

class MaxPlatosPorCategoria implements ValidationRule
{
    private function platosCount(): array
    {
        return [
            'primer_plato' => Menu::where('categoria', 'primer plato')->count(),
            'segundo_plato' => Menu::where('categoria', 'segundo plato')->count(),
            'postre' => Menu::where('categoria', 'postre')->count(),
        ];
    }

    private function validatePlatosCount(array $platosCount): bool
    {
        return $platosCount['primer_plato'] == 1 && $platosCount['segundo_plato'] == 1 && $platosCount['postre'] == 1;
    }

    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (!$this->validatePlatosCount($value)) {
            $fail("Menu no valido");
        }
    }

}
