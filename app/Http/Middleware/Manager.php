<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;


class Manager
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    // public function handle($request, Closure $next) { 
    //        return $next($request); 
    // }

    public function handle($request, Closure $next) { 
    if(Auth::check() == false) { 
        return redirect('/login'); 
    } else { 
        $user = Auth::user(); 
        if($user->hasRole('admin')) { 
            return $next($request); 
        } else {
             return redirect('/home'); 
            } 
        } 
    }
}