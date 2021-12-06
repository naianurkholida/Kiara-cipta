<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Session;

use Closure;

class SessionHasFrontend
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
        $session = session::get('customer_id');

        if($session != null) {
            return $next($request);
        }else{
            return abort(404);
        }
    }
}
