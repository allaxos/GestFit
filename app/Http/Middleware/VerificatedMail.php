<?php

namespace App\Http\Middleware;

use Closure;

class VerificatedMail
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
        if(auth()->user()->email_verified_at==null){
            return view('auth.verify');
        }
        return $next($request);
    }
}
