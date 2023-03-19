<?php

namespace Khaleds\Payment\Classes;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Khaleds\Payment\Traits\SetVariables;
use Khaleds\Payment\Traits\SetRequiredFields;

class BaseController 
{
	use SetVariables,SetRequiredFields;
}