<?php

namespace App\Entities;

use App\Contracts\SalaryInterface;

class BackendSalary implements SalaryInterface
{
    public function calculateSalary(int $days, int $level = null): float
    {
        return (5000 * $days) + (1000 * $level);
    }
}
