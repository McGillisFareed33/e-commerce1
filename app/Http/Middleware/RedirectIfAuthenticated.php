<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * The URIs that should be excluded from interception.
     *
     * @var array
     */
    protected $except = [
        //
    ];

    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @param string ...$guards
     * @return mixed
     */
    public function handle($request, Closure $next, ...$guards)
    {
        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                return redirect('/home'); // Oturum açmış kullanıcıları yönlendirme
            }
        }

        return $next($request);
    }
}
