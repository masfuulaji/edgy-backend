<?php

namespace App\Http\Controllers\Web;

use App\Entities\useGopay;
use App\Http\Controllers\Controller;
use App\Repositories\PaymentRepository;

class PaymentController extends Controller
{
    public function pay(){
        return (new PaymentRepository)->Payment(new useGopay);
    }

}
