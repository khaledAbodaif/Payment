<?php

namespace Khaleds\Payment\Interfaces;

use Illuminate\Database\Eloquent\Model;
use Khaleds\Payment\Services\PaymentResponse;
use Khaleds\Payment\Traits\PaymentSave;
use Khaleds\Payment\Traits\PaymentSaveToLogs;
use Khaleds\Payment\Traits\PaymentValidation;

abstract class PaymentAbstract
{

    use PaymentSave, PaymentSaveToLogs,PaymentValidation;
    protected array $data;
    protected array $attributes;
    protected array $validations;
    protected Model $buyer;
    public PaymentResponse $response;



    public function __construct()
    {
        $this->response = new PaymentResponse();
    }

    public function setRequest($attributes):IPaymentInterface
    {

        $this->response->request = $attributes;
        return $this;
    }

    public function setBuyerModel(Model $buyer):IPaymentInterface
    {

        $this->buyer = $buyer;
        return $this;

    }
}
