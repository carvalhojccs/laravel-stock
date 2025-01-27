<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class CNPJValidator implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string, ?string=): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        // Remova caracteres não numéricos
        $cnpj = preg_replace('/\D/', '', $value);

        // Verifica se o CNPJ tem 14 dígitos e não é uma sequência repetida
        if (strlen($cnpj) != 14 || preg_match('/(\d)\1{13}/', $cnpj)) {
            $fail('O campo :attribute não contém um CNPJ válido.');
            return;
        }

        // Validação dos 2 últimos dígitos verificadores
        $soma1 = 0;
        $soma2 = 0;
        $peso1 = [5, 4, 3, 2, 9, 8, 7, 6, 5, 4, 3, 2];
        $peso2 = [6, 5, 4, 3, 2, 9, 8, 7, 6, 5, 4, 3, 2];

        // Cálculo do primeiro dígito verificador
        for ($i = 0; $i < 12; $i++) {
            $soma1 += $cnpj[$i] * $peso1[$i];
        }
        $resto1 = $soma1 % 11;
        $d1 = $resto1 < 2 ? 0 : 11 - $resto1;
        
        // Cálculo do segundo dígito verificador
        for ($i = 0; $i < 13; $i++) {
            $soma2 += $cnpj[$i] * $peso2[$i];
        }
        $resto2 = $soma2 % 11;
        $d2 = $resto2 < 2 ? 0 : 11 - $resto2;

        // Verifica se os dígitos calculados coincidem com os do CNPJ
        if ($cnpj[12] != $d1 || $cnpj[13] != $d2) {
            $fail('O campo :attribute não contém um CNPJ válido.');
            return;
        }
        
    }
}
