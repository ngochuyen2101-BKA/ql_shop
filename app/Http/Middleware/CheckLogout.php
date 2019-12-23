<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckLogout
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
        if (Auth::check()) {
            if(Auth::user()->level == 1){
                return redirect('admin');
            }
            if(Auth::user()->level == 2){
                return redirect('/product');
            }
            
        }
        else {
            return $next($request);
        }
        
    }
}
