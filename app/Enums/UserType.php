<?php

namespace App\Enums;

enum UserType: int
{
    case LOGISTIC_OPERATOR = 1;
    case DOCTOR = 2;
    case NURSE = 3;
    case PATIENT = 4;
    case PHARMACEUTICAL = 5;
}
