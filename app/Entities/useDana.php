<?php

namespace App\Entities;

use App\Contracts\PaymentIntervace;

class useDana implements PaymentIntervace
{
    public function makePayment()
    {
        return 'Dana Payment';
    }
}
