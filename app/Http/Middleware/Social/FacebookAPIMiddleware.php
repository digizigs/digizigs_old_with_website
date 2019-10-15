<?php

namespace App\Http\Middleware\Social;

use Closure;
use Illuminate\Support\Facades\Auth;


class FacebookAPIMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        if(Auth::user()->facebook){
            //return 'No facebook found';
            //Instagram::setAccessToken(Auth::user()->instagram->access_token);
        }
        return $next($request);
    }
}
