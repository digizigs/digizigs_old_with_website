<?php

namespace App\Facade\Social;
use Illuminate\Support\Facades\Facade;

class InstagramFacade extends Facade{

	protected static function getFacadeAccessor() { return 'InstagramAPI'; }

}