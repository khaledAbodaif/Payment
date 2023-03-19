<?php

namespace Khaleds\Payment\Factories;

use Khaleds\Payment\Interfaces\IPaymentInterface;
use Khaleds\Payment\Interfaces\PaymentInterface;
use Khaleds\Payment\Classes;


class PaymentFactory
{


    /**
     *
     * get the payment class that the user want
     * if not exist return ex
     * @param string $name
     * @return PaymentInterface|Exception|IPaymentInterface
     * @throws Exception
     */

    public function get(string $name): PaymentInterface|IPaymentInterface|Exception
    {

        $className = 'Khaleds\Payment\Classes\\' . $name . 'Payment';

        if (class_exists($className))
            return new $className();

        throw new \Exception("Invalid gateway");
    }


}
