<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class ActiveUser
{
    
    public function handle($request, Closure $next)
    {
        if(Auth::check() && Auth::user()->status == '0'){

            Auth::logout();

            return redirect('/login')->with('inactive', 'inactive account');

            
        }

        return $next($request);
    }
}
