<?php

namespace App\Domain\Enum;

enum Profile: int
{
    case ADMIN = 1;
    case EMPLOYEE = 2;
}
