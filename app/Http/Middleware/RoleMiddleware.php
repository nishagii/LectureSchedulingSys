<?php

namespace App\Http\Middleware;

use Closure;

class RoleMiddleware
{
    
    public function handle($request, Closure $next)
    {
        if (auth()->user() === null) {
            abort(403, 'Unauthorized action.');
        }



        $actions = request()->route()->getAction();
        $roles = isset($actions['roles']) ? $actions['roles'] : Null;

        if (auth()->user()->hasAnyRole($roles) && $roles !== Null) {
            return $next($request);
        }

        abort(403, 'Unauthorized action.');
    }
}
