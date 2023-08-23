<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;


class AlreadyLoggedIn
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        if(Session()->has('loginID') && (url('login')==$request->url() || url('registration')==$request->url()))
        {
            return back();
        }
        return $next($request);
    }
}
