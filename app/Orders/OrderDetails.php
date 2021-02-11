<?php


namespace App\Orders;

use App\Billing\PaymentGatewayInterface;

class OrderDetails
{
    private $paymentGateway;

    public function __construct(PaymentGatewayInterface $paymentGateway)
    {
        $this->paymentGateway = $paymentGateway;
    }

    public function getAllDetails(){
        $this->paymentGateway->setDiscount(20);

        return [
            'name' => 'Shakeel Ahmed',
            'address' => 'ABC 123 Street'
        ];
    }
}
