<?php

namespace App\Billing;

use Illuminate\Http\Request;

interface PaymentGatewayInterface
{
    public function chargePayment($amount, $token);

    public function setDiscount($discountAmount);
}
