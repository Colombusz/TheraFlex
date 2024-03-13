<?php

namespace App\Http\Middleware;

use Closure;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class MultGuard
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$guards): Response
    {

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                // User is authenticated in one of the guards, proceed with the request
                return $next($request);
            }
        }

        // User is not authenticated in any of the guards, redirect to the 'welcome' route
        // dd(auth()->guard('customer')->user());
        if(auth()->guard('customer')->user() != null)
        {
            return redirect()->route('itemList');
        }

        if(auth()->guard('customer')->user() == null)
        {
            return redirect()->route('welcome');
        }

        if(auth()->guard('employee')->user() != null || auth()->guard('manager')->user() != null )
        {

            return redirect()->route('adminlogin.profile');
        }

        if(auth()->guard('employee')->user() == null || auth()->guard('manager')->user() == null )
        {
            return redirect()->route('adminlogin.index');
        }


        // return "error";
        // dd($request);
        // ->route('adminlogin.index');
    }
}
