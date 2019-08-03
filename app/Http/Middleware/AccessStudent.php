<?php

namespace App\Http\Middleware;

use Closure;

class AccessStudent
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
         if(Auth::user()->hasAnyRole("student")) {
            return $next($request);
        }
        return redirect('home');
    }
}


