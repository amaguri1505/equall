<?php

namespace App\Http\Middleware;

use Closure;

class IsCorpGuest
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
        if(auth()->guard('sanctum_corp')->check()) {
            return redirect('/corp');
        }

        return $next($request);
    }
}
