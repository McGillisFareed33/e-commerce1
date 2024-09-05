<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $role
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $role = null)
    {
        $user = Auth::user();

        if(!Auth::check()){
        $errors[]= 'Önce giriş yapmalısınız.';
        }
        if ($user) {
            if(strpos($request->route()->getName(), 'anasayfa')!== false){
                return $next($request);
            }elseif($user->role === 'admin') {
                return $next($request);
            }elseif($user->role === 'provisor' && strpos($request->route()->getName(), 'list') !== false) {
                return $next($request);
            }else{
            $errors[]= 'Bu sayfaya erişimeye ya da bunu yapmaya yetkiniz yoktur.';
            }
        }
        
        return redirect()->back()->withErrors($errors);
    }
}

