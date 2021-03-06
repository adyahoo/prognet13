<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Foundation\Auth\User as Authenticateable;
use App\Admin;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Middleware\Authenticate as Middleware;

class AdminMiddleware extends Middleware
{
    public function redirectTo($request)
    {
        if(Auth::guard('admin')->check()){
            return redirect('/dashboardAdmin');
        }else{
            return redirect('/adminLogin');
        }

        // return $next($request);
    }
}
