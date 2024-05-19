<?php

namespace App\Enums;

enum BloodType: string
{
    case AP = 'A+';
    case BP = 'B+';
    case ABP = 'AB+';
    case OP = '0+';
    case AN = 'A-';
    case BN = 'B-';
    case ABN = 'AB-';
    case ON = '0-';
}
