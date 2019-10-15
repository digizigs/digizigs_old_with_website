<?php

namespace App\Facade\Social;
use Illuminate\Support\Facades\Facade;

class FacebookFacade extends Facade{

	protected static function getFacadeAccessor() { return 'FacebookAPI'; }

}