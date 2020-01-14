<?php

namespace App\Http\Middleware;

use Closure;

class ConsultantRoleCheck
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
        if(auth()->user()->role_id != 3) {
            abort(401, 'Unauthorized Request');
        }

        return $next($request);
    }
}
