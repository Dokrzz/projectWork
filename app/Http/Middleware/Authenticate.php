<?php

namespace App\Http\Middleware;
use Illuminate\Support\Arr;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Closure;

/*protected function handle($request, Closure $next, $guard = null)
{
    if (Auth::guard($guard)->guest()) {
        if (! $request->expectsJson()) {
            return response('Unauthorized', 401);
        }
        else {
            return redirect()->route('home');
        }
    }


    return $next($request);
}
}*/
class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request) {
        if (! $request->expectsJson()) {
                return route('home');
            }
        else {
                return redirect()->route('dashboard');
            }
        }
}
