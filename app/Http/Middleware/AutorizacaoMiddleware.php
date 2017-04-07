<?php

namespace estoque\Http\Middleware;

use Closure;
use Auth;

class AutorizacaoMiddleware
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
        if(!$request->is('auth/login') && \Auth::guest()){
            return redirect('/Auth/login');
        }
        return $next($request);
    }
}
