<?php

namespace App\Http\Controllers\WebOld;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EvaluationController extends Controller
{
    public function evaluationKip()
    {
        return 'Evaluasi Kapal Isap Produksi';
    }

    public function evaluationTb()
    {
        return 'Evaluasi Tambang Besar';
    }

    public function getEvaluation(Request $request)
    {
        if($request->type=='KIP'){
            $this->evaluationKip();
        }else if($request->type=='TB'){
            $this->evaluationTb();
        }
    }
}
