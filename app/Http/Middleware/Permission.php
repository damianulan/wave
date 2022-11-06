<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Permission
{
    /**
     * Handle an incoming request.
     * @param $request
     * @param Closure $next
     * @param $permission
     * @return mixed
     */
    public function handle($request, Closure $next, $permission)
    {
        if(!auth()->user()->can($permission)) {
            return redirect()->route('request.notAuthorized');
        }
        return $next($request);
    }
}
