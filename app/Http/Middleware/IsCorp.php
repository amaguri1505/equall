<?php

namespace App\Http\Middleware;

use Closure;

class IsCorp
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
        if(auth()->user()->is_corp == 1) {
            return $next($request);
        }

        return redirect('/');
    }
}
