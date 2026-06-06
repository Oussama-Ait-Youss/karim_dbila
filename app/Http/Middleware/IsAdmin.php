<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class IsAdmin
{
    /**
     * Handle an incoming request and secure the admin back office.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // STEP 1: Check if the user is authenticated. If not, redirect to login route.
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        // STEP 2: Inspect their role property. If not admin, block and redirect to home with flash error.
        if (Auth::user()->role !== 'admin') {
            return redirect('/')->with('error', 'Unauthorized! You do not have permission to access the administration panel.');
        }

        // STEP 3: Both checks pass, allow the request to proceed.
        return $next($request);
    }
}
