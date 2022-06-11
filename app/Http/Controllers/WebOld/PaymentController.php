<?php

namespace App\Http\Controllers\WebOld;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function useDana()
    {
        return 'Dana Payment';
    }

    public function useGopay()
    {
        return 'GopayPayment';
    }

    public function pay(Request $request)
    {
        if($request->type=='DANA'){
            $this->useDana();
        }else if($request->type=='GOPAY'){
            $this->GopayPayment();
        }
    }
}
