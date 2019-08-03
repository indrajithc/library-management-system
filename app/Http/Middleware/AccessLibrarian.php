<?php

namespace App\Http\Middleware;


use Closure;
use Auth;

class AccessLibrarian
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
        if(Auth::user()->hasAnyRole("librarian")) {
            return $next($request);
        }
        return redirect('home');
    }
}
