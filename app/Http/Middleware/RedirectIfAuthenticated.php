<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        switch ($guard){

            case 'web':
                 if (Auth::guard($guard)->check()) {
            return redirect('/admin');
                }
            default:
                if (Auth::guard($guard)->check()) {
                    return redirect('/');
                }
                break;
        }


        return $next($request);
}
}




//        switch ($guard){
//            case 'web':
//                if(Auth::guard($guard)->check()){
//                    return redirect()->route('admin');
//                }
//                break;
//            default:
//                if (Auth::guard($guard)->check()) {
//                    return redirect('front.home');
//                }
//                break;
//
//        return $next($request);
//        }
