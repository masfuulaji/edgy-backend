<?php

namespace App\Repositories;

use App\Contracts\EvaluationInterface;

class EvaluationRepository
{
    public function Evaluation(EvaluationInterface $method)
    {
        return $method->makeEvaluation();
    }
}
