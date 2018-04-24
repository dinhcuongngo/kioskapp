<?php

namespace App\Http\Middleware;

use Closure;
//use Illuminate\Auth\Middleware\Auth;
use Illuminate\Support\Facades\Auth;

class CheckAdmin
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
        //dd(Auth::user()->admin);
        if(Auth::user()->admin == 'false')
        {
            return redirect('/');
        }
        return $next($request);
    }
}
