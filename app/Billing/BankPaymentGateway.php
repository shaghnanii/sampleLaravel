<?php


namespace App\Billing;


use Illuminate\Http\Request;
use Illuminate\Support\Str;

// this is [service container] class for billing/payment
// we can bind this in any class to use this class functionality.
// we have also registered this class in our provides/PaymentGatewayProvider.php

class BankPaymentGateway implements PaymentGatewayInterface
{
    private $currency;
    private $discount;

    public function __construct($currency)
    {
        $this->currency = $currency;
        $this->discount = 0;
    }

    public function chargePayment($amount, $token) {
        return [
            'amount' => $amount - $this->discount,
            'confirmation_code' => Str::random(),
            'currency' => $this->currency,
            'discount' => $this->discount
        ];
    }

    public function setDiscount($discountAmount)
    {
        $this->discount = $discountAmount;
    }
}
