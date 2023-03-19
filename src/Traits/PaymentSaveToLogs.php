<?php

namespace Khaleds\Payment\Traits;


use Khaleds\Payment\Models\KhaledsPaymentLog;

trait PaymentSaveToLogs
{

    /**
     * @param mixed $payload
     * @param mixed $response
     * @return void
     */
    public function saveToLogs(): void
    {
        $this->response->status = false;

        KhaledsPaymentLog::create(
            [
                "status" => false,
                "payload" => json_encode($this->response->request),
                "response" => json_encode($this->response->message),
            ]
        );
    }

}
