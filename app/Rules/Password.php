<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class Password implements ValidationRule
{

    private function isPasswordValid(string $password): bool
    {
        if (strlen($password) < 8) {
            return false;
        }
        if (!preg_match('/[A-Z]/', $password)) {
            return false;

        }
        if (!preg_match('/\d/', $password)) {
            return false;
        }
        return true;

    }
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (!$this->isPasswordValid($value)) {
            $fail("La contraseña debe tener al menos 8 caracteres, una letra mayúscula y un número. ");
        }
    }

}
