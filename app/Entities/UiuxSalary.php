<?php

namespace App\Entities;

use App\Contracts\BonusInterface;
use App\Contracts\SalaryInterface;

class UiuxSalary implements SalaryInterface, BonusInterface
{
    public function calculateSalary(int $days): float
    {
        return 5000 * $days;
    }

    public function calculateBonus(float $score): float
    {
        return 1000 * $score;
    }
}
