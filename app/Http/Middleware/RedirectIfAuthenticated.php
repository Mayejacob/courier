<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check() && Auth::user()->role_id ==1) {
            return redirect()->route('admin.dashboard');
        }else if(Auth::guard($guard)->check() &&  Auth::user()->role_id == 2)
        {
            return redirect()->route('staff.dashboard');
        }else {
            return $next($request);
        }


    }
}
