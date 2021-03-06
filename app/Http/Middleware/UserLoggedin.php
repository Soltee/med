<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class UserLoggedin
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
        if(!Auth::guard('user')->check()){
            return redirect()->name('login')->with('error', 'You need to log in!');
        }

        return $next($request);
    }
}
