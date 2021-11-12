<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckUserType
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $user_type = null)
    {
        if (auth()->user()->user_type == $user_type) {
            return $next($request);
        }

        if($user_type == '0' || $user_type == '1'){
            return redirect('/employer-login');
        }
        if($user_type == '2'){
            return redirect('/job-login');
        }
        if($user_type == '3'){
            return redirect('/admin_login');
        }
        
        
    }
}
