<?php

namespace Khaleds\Payment\Facades;

use Illuminate\Support\Facades\Facade;

class NafezlyPaymentsFacade extends Facade
{
    /**
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return 'nafezly_payments';
    }
}