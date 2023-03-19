<?php

namespace Khaleds\Payment\Services;

use Illuminate\View\View;
use Khaleds\Payment\Models\KhaledsPayment;
use Khaleds\Payment\Models\Payment;

class PaymentResponse
{

    public bool $status = true;
    public string $message = '';
    public array $data=[];
    public array $request=[];
    public KhaledsPayment $payment;
    public string $payment_id = '';
    public mixed $html = null;
    public string $redirect_url = '';
    public array $errors = [];
}
