<?php

namespace App\Repositories;

use App\Contracts\SalaryInterface;
use App\Entities\BackendSalary;

class SalaryRepository
{
    private $salaryInterface;
    public function __construct(SalaryInterface $salaryMethod)
    {
        $this->salaryInterface = $salaryMethod;
    }
    public function Salary($request)
    {
        // $backendSalary = new BackendSalary();
        return $this->salaryInterface->calculateSalary($request->days, $request->level);
    }
}
