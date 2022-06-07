<?php

namespace App\Contracts;

interface SalaryInterface
{
    public function calculateSalary(int $days): float;
}
