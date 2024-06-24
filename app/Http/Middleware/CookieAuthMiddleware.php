<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CookieAuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle($request, Closure $next)
    {
    //     if ($this->isValidAuthenticationCookie($request)) {
    //         return $next($request);
    //     }
    
    //     return redirect('/'); // Redirect to login if cookie is not valid
    // }
    
    // private function isValidAuthenticationCookie($request)
    // {
    //     // Logic to validate the presence and integrity of authentication cookies
    // }

    if (auth()->guard('web')->check()) {
        return $next($request);
    }

    return redirect('/');
}
    
}