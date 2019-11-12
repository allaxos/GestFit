<?php

namespace App\Http\Middleware;

use Closure;

class DispatcherProprio
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
        if(auth()->user()->categorie == 1){
            return $next($request);
        }
        return redirect('/home')->with("infoDanger’,’vous n'aveez pas le droit");

    }
}
