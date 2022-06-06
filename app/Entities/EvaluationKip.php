<?php

namespace App\Entities;

use App\Contracts\EvaluationInterface;

class EvaluationKip implements EvaluationInterface
{
    public function makeEvaluation()
    {
        return 'Evaluasi KIP';
    }
}
