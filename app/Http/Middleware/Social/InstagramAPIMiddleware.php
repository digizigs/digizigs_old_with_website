<?php

namespace App\Http\Middleware\Social;

use Closure;

class InstagramAPIMiddleware
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
        if(Auth::user()->instagram){
            Instagram::setAccessToken(Auth::user()->instagram->access_token);
        }
        return $next($request);
    }
}
