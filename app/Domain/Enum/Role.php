<?php

namespace App\Domain\Enum;

enum Role: int
{
    case MANAGER = 1;
    case EMPLOYEE = 2;
}
