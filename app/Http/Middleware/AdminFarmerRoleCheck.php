<?php

namespace App\Http\Middleware;

use Closure;

class AdminFarmerRoleCheck
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
        if(auth()->user()->role_id != 1 AND auth()->user()->role_id != 2) {
            abort(403, 'Unauthorized Request');
        }

        return $next($request);
    }
}
