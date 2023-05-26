<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Emailverified
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
        if(auth()->user()->email_verified_at != null){
            return $next($request);
        }

        return redirect('/dashboard')->with('error', 'You have to verify your email to book appointment');
    }
}
