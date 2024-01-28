<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckUserRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if the user is authenticated
    if (!auth()->check()) {
        return redirect('/login');
    }

    // Get the user's role
    $role = auth()->user()->role;

    // Check the role and grant access accordingly
    if ($role === 'admin') {
        return $next($request); // Admin has full access
    } elseif ($role === 'teacher') {
        // Teacher can only access certain routes
        if ($request->is('teacher', 'attendance', 'result','exam') || 
            ($request->isMethod('get') && $request->routeIs('result.create','attendance.create'))) {
            return $next($request);
        }
    } elseif ($role === 'student') {
        // Students can only access the result view page
        if ($request->is('results','exam') && $request->isMethod('get')) {
            return $next($request);
        }
    }

    // If none of the conditions are met, redirect or show an error
    return redirect('/unauthorized'); // Redirect to an unauthorized page or show an error message
    }
}
