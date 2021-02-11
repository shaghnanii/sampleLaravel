<?php

namespace App\Http\Controllers\Payment;

use App\Billing\CreditPaymentGateway;
use App\Billing\PaymentGatewayInterface;
use App\Http\Controllers\Controller;
use App\Orders\OrderDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Stripe\PaymentIntent;
use Stripe\Stripe;

class PaymentController extends Controller
{
    public function showPayment(){
       return view('pay');
    }
    public function procesPayment(Request $request,OrderDetails $orderDetails, PaymentGatewayInterface $creditPaymentGateway){
        $order = $orderDetails->getAllDetails();
//        return $request->input('stripeToken');
        $creditPaymentGateway->chargePayment(300, $request->input('stripeToken'));
    }

}
