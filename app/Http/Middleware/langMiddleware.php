<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class langMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {


        if(session()->get('lang') ){
            app()->setLocale(session()->get('lang'));
        }else{
            app()->setLocale('en');
        }
        return $next($request);
    }
}
