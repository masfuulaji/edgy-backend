<?php

namespace App\Entities;

use App\Contracts\PaymentIntervace;

class useGopay implements PaymentIntervace
{
    public function makePayment()
    {
        return 'Dana Gopay';
    }
}
