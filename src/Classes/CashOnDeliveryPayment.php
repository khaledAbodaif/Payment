<?php

namespace Khaleds\Payment\Classes;

use Illuminate\Database\Eloquent\Model;
use Khaleds\Payment\Enums\CashOnDeliveryEnum;
use Khaleds\Payment\Enums\PaymentStatusEnum;
use Khaleds\Payment\Interfaces\IPaymentInterface;
use Khaleds\Payment\Interfaces\PaymentAbstract;
use Khaleds\Payment\Models\Payment;
use Khaleds\Payment\Services\PaymentResponse;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Khaleds\Payment\Traits\PaymentSave;
use Khaleds\Payment\Traits\PaymentSaveToLogs;
use Khaleds\Payment\Traits\PaymentValidation;

class CashOnDeliveryPayment extends PaymentAbstract implements IPaymentInterface
{

    public const PAYMENT_METHOD = "CashOnDelivery";


    public function pay(): self
    {

        $this->validations = CashOnDeliveryEnum::PAY_VALIDATION;

        try {

            $this->validate();

            $this->saveToPayment();

            $this->response->message = __("Paid Successfully");


        } catch (\Exception $e) {

            $this->response->message = $e->getMessage();
            $this->saveToLogs();

        }

        return $this;

    }


    public function verify(): self
    {

        try {

            $this->validations = CashOnDeliveryEnum::VERIFY_VALIDATION;

            $this->validate();

            $this->updateToPayment(PaymentStatusEnum::PAID);

        } catch (\Exception $e) {

            $this->response->message = $e->getMessage();
            $this->saveToLogs();
        }
        return $this;

    }



}
