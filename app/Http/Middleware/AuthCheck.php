<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;


class AuthCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        if(!Session()->has('loginID'))
        {
            return redirect('login')->with('fail', 'You have to login first.');
        }
        return $next($request);
    }
}
