<?php

namespace App\Http\Controllers\Web;

use App\Entities\EvaluationKip;
use App\Http\Controllers\Controller;
use App\Repositories\EvaluationRepository;
use Illuminate\Http\Request;

class EvaluationController extends Controller
{
    public function getEvaluation(){
        return (new EvaluationRepository)->Evaluation(new EvaluationKip);
    }
}
