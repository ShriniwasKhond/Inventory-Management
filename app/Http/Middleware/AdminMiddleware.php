<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class AdminMiddleware
{
  
    public function handle($request, Closure $next) {
        if (Auth::check()) {
            if (Auth::user()->is_admin == 1) {
                return $next($request);
            } else {
                Auth::logout();
                return redirect(url('/'));
            }
        } else {
            Auth::logout();
            return redirect(url('/'));
        }
    }
}

?>