<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Role
{
    /**
     * Handle an incoming request.
     * @param $request
     * @param Closure $next
     * @param $role
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {
        if(!auth()->user()->hasRole($role)) {
            return redirect()->route('notAuthorized');
        }
        return $next($request);
    }
}
