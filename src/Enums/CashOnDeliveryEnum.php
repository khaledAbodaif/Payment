<?php

namespace Khaleds\Payment\Enums;

class CashOnDeliveryEnum
{

    const PAY_VALIDATION =
        [
            "amount" => 'required|numeric',
            "notes" => 'nullable|max:500',
            "transaction_code" => 'required|max:100|unique:khaleds_payments,transaction_code',

            // morphed columns to allow any table for payment (orders,services ,etc...)
            "order_id" => 'required|numeric',
            "order_table" => 'required|string',
        ];

    const VERIFY_VALIDATION =
        [
            "amount" => 'required|numeric',
            "transaction_code" => 'required|exists:khaleds_payments,transaction_code',
            "status" =>'required|string'

        ];

}
