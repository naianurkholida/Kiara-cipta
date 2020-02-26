<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Session;

use Closure;

class SessionHasBackend
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
        $session = session::get('login');
        $role    = session::get('role_id');

        if($session != null) {
            return $next($request);
        }else{
            return abort(404);
        }
    }
}
