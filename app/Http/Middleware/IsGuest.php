<?php

namespace App\Http\Middleware;

use Closure;

class IsGuest
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
        if(auth()->guard('sanctum')->check()) {
            return redirect('/mypage');
        }

        return $next($request);
    }
}
