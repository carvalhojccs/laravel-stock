<?php

namespace App\Enums;

enum IdentificationType: string
{
    case CPF = 'cpf';
    case CNPJ = 'cnpj';
    case PASSPORT = 'passport';
    case OTHER = 'other';

}
