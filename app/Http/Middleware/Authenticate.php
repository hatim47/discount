<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Authenticate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
   
    if ($request->is('admin/*')) {

            // Allow login page
            if ($request->routeIs('admin.login') || $request->routeIs('admin.login.post')) {
                return $next($request);
            }

            // Check if user is logged in
            if (!Auth::check()) {
                return redirect()->route('admin.login');
            }

            // Optional: only admin role
            if (Auth::user()->role !== 0) {
                abort(403, 'Unauthorized');
            }
        }

        return $next($request);

      
    }
}
