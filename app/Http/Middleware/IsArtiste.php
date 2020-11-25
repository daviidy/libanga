<?php

namespace App\Http\Middleware;

use Closure;

class IsArtiste
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
        if(auth()->user()->isArtiste()) {
            return $next($request);
        }
        return redirect('home');
    }
}
