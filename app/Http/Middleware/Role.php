<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
class Role
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
        if(!Auth::check()){
            return abort(404);
        }
        elseif(Auth::user()->role == 1 || Auth::user()->role == 2 || Auth::user()->role == 3)
        return $next($request);
        else
        return back();
    }
}
