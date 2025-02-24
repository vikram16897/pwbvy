<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        //0=blockuser,admin & 1=main-Admin & 2=Admin & 3=user

        if (Auth::check()) {
            if (Auth::User()->role == 'Admin')
            {
                return $next($request);
            }
            elseif(Auth::User()->role == 'Staff')
            {
                return $next($request);
            }elseif(Auth::User()->role=='student'){
                return redirect(route('FrontEnd_index'))->with('error', 'Please Login First');
            }
            else {
                return redirect('404');
            }
        } else {
            return redirect(route('FrontEnd_index'))->with('error', 'Please Login First');
        }


    }
}
