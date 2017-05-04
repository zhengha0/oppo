<?php

namespace App\Http\Middleware;

use Closure;

class dl
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
        if(session()->has('adminuser')){
            return $next($request);
        }
        return redirect('home/dl');
    }
}
