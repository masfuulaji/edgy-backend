<?php

namespace App\Entities;

use App\Contracts\SalaryInterface;

class UiuxSalary implements SalaryInterface
{
    public function calculateSalary(int $days): float
    {
        return 5000 * $days;
    }
}
