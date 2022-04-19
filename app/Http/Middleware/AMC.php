<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Auth;
use Closure;
class AMC 
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    public function handle($request, Closure $next)
    {
        if (Auth::user()) {
            if (Auth::user()->user_type == 3 ) {
                return $next($request);
            }
            else
            {
                return redirect('/');
            }
            
        }
        else
        {
            return redirect('/');
        }
    }
}
