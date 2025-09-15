<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CheckRole
{
    public function handle(Request $request, Closure $next, $role = null)
    {
        if (!Session::has('user')) {
            return redirect('/login')->with('success', 'Please login first!');
        }

        if ($role && Session::get('role') != $role) {
            return redirect('/login')->with('success', 'You do not have permission to access this page.');
        }

        return $next($request);
    }
}
