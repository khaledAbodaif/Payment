<?php

namespace Khaleds\Payment\Models;

use Illuminate\Database\Eloquent\Model;

class KhaledsPayment extends Model
{
    /**
     * The "type" of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $guarded = ['id'];


}
