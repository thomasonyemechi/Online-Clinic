<?php

// namespace App\Http\Middleware;

// use Illuminate\Auth\Middleware\Authenticate as Middleware;

// class Authenticate extends Middleware
// {
//     /**
//      * Get the path the user should be redirected to when they are not authenticated.
//      *
//      * @param  \Illuminate\Http\Request  $request
//      * @return string|null
//      */
//     protected function redirectTo($request)
//     {
//         return 'vwdvsdv';
//         if (auth()->user()) {
//             return $next($request);
//         }

//         return redirect('/login')->with('error', 'Your session has expired, Login Again');
//     }
// }

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Authenticate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (auth()->user()) {
            return $next($request);
        }

        return redirect('/login')->with('error', 'Your session has expired, Login Again');
    }
}
