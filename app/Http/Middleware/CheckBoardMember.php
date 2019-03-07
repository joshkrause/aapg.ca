<?php

namespace App\Http\Middleware;

use Auth;
use Closure;

class CheckBoardMember
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
        if (! $request->user()->board == "1") {
            abort(403);
        }
        return $next($request);
    }
}
