<?php

namespace App\Entities;

use App\Contracts\EvaluationInterface;

class EvaluationTb implements EvaluationInterface
{
    public function makeEvaluation()
    {
        return 'Evaluasi Tambang Besar';
    }
}
