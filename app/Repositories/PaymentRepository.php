<?php

namespace App\Repositories;

use App\Contracts\PaymentIntervace;

class PaymentRepository
{
    public function Payment(PaymentIntervace $method)
    {
        return $method->makePayment();
    }
}
