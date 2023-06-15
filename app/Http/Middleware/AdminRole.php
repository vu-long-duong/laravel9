<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
//        if(Auth::check()){
//            // admin role ==1, user role =0
//            if(Auth::user()->role()==env('ADMIN_ROLE')){
//               return $next($request);
//            } else{
//                return redirect()->route('home')->with('message','Bạn ko phải là người quản trị');
//            }
//
//        } else{
//            return redirect('/')->with('message','Bạn chưa đăng nhập');
//        }
//        return $next($request);
    }
}
