<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminAuth
{
    public function handle(Request $request, Closure $next)
    {

        if (!stristr($request->getPathInfo(), '/admin/login') && !session('login')) {
            return redirect(route('admin.login'));
        }


        return $next($request);
    }
}
