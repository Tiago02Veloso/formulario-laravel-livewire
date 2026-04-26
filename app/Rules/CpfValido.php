<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class CpfValido implements ValidationRule
{
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $cpf = preg_replace('/\D/', '', $value);

        // CPF deve ter 11 dígitos
        if (strlen($cpf) !== 11) {
            $fail('CPF inválido.');
            return;
        }

        // Elimina CPFs inválidos conhecidos (11111111111, etc)
        if (preg_match('/(\d)\1{10}/', $cpf)) {
            $fail('CPF inválido.');
            return;
        }

        // Validação do 1º dígito
        for ($t = 9; $t < 11; $t++) {
            $sum = 0;

            for ($i = 0; $i < $t; $i++) {
                $sum += $cpf[$i] * (($t + 1) - $i);
            }

            $digit = ((10 * $sum) % 11) % 10;

            if ($cpf[$t] != $digit) {
                $fail('CPF inválido.');
                return;
            }
        }
    }
}