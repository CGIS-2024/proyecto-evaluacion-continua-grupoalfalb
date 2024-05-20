<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class Dni implements ValidationRule
{
    private function isDniFormatValid(string $dni): bool
    {
        // Comprobar que el DNI tiene 9 caracteres
        if (strlen($dni) !== 9) {
            return false;
        }

        // Extraer la parte numérica y la letra
        $number = substr($dni, 0, -1);
        $letter = substr($dni, -1);

        // Comprobar que la parte numérica son 8 dígitos y la letra es una mayúscula
        return ctype_digit($number) && ctype_alpha($letter) && ctype_upper($letter);
    }

    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (!$this->isDniFormatValid($value)) {
            $fail("");
        }
    }
}
