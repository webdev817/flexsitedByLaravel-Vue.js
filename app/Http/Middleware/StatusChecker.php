<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class StatusChecker
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
        if (Auth::user() != null && Auth::user()->status == 0) {
            Auth::logout();
            return redirect()->route('login')->with('status','Your account is inactive');
        }
        if (Auth::user() != null && Auth::user()->status == 2) {
           
            Auth::logout();
            return redirect()->route('login')->with('status','Your account is closed');
        }
        return $next($request);
    }
}
