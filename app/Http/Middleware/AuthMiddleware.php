<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    // public function handle(Request $request, Closure $next)
    // {
    //     return $next($request);
    // }

    public function handle($request, Closure $next)
    {


        // // if ($request->session()->has('BearerToken')) {
        // //     return $next($request);
        // // }
        // // return redirect('/'); 
        // $response = $next($request);

        // // Check if the 'BearerToken' cookie exists
        // if ($token = $request->cookie('BearerToken')) {
        //     // Add 'Authorization' header with Bearer token
        //     $response->header('Authorization', 'Bearer ' . $token);
        // }

        // return $response;





        $response = $next($request);

        if ($response->getStatusCode() == 200) {
            $responseData = json_decode($response->getContent(), true);
            $token = $responseData['token'] ?? null;

            if ($token) {
                $cookie = cookie('BearerToken', $token, 1); // Create a cookie named 'BearerToken'
                $response->withCookie($cookie);
            }
        }

        return $response;

    }
}
