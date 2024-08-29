<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Authenticate
{
    public function handle($request, Closure $next, ...$guards)
    {
        if (Auth::guest()) {
            return redirect()->route('anasayfa');
        }

        return $next($request);
    }
}
