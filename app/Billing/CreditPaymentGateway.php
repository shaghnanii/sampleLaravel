<?php


namespace App\Billing;

use Carbon\Carbon;
use Illuminate\Support\Str;
use Stripe\Charge;
use Stripe\Stripe;
use Illuminate\Http\Request;

class CreditPaymentGateway implements PaymentGatewayInterface
{
    private $currency;
    private $discount;

    public function __construct($currency)
    {
        $this->currency = $currency;
        $this->discount = 0;
    }

    public function chargePayment($amount, $token) {
        $amount = $amount - $this->discount;
        $fees = $amount * 0.03;
        $amount = $amount * 100;

        $mtime = Carbon::now();
        Stripe::setApiKey ( 'sk_test_51HfYKJGWMMonzw7QuCHGAKBhpk0ea60x1eysGsNG90KFgEpQYENGsMV7A2i5BOvfhsGFxgPxgP8W4QBH42fNgbas004pqbmvYm' );

        try {
            $charge = Charge::create(array(
                "amount" => $amount ,
                "currency" => $this->currency,
                "source" => $token,
                "description" => "Payment By: Shakeel on " . $mtime->toDateTimeString()
            ));
        }catch(\Exception $e){
            dd("Failed to execute payment charge method " . $e);
        }
        $other_details = [
            'fees' => $fees,
            'discount' => $this->discount
        ];
        dd("Success Payment. " . $charge, $other_details);
    }

    public function setDiscount($discountAmount)
    {
        $this->discount = $discountAmount;
    }
}
