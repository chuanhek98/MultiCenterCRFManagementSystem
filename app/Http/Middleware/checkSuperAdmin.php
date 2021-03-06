<?php

namespace App\Http\Middleware;

use Closure;

class checkSuperAdmin
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
        if(auth()->check() && auth()->user()->hasRole('superAdmin')){
            return $next($request);
        }else
        {
            alert()->error('Error!','You have no access to this!');
            return redirect(route('dashboard'));
        }

    }
}
