<?php

namespace App\Http\Middleware;

use Auth, Closure;
use Illuminate\Http\Request;

class ACH
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (in_array('ach', json_decode(Auth::user()->permissions, true))) {
            return $next($request);
        } else {
            return abort(403, 'Unauthorized action.');
        }
    }
}
