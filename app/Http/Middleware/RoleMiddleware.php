<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, string $role): Response
    {
        if (!auth()->check()) {
            return redirect('login');
        }

        $user = auth()->user();
        
        if ($role === 'admin' && !$user->hasRole('admin')) {
            abort(403, 'Unauthorized access.');
        }
        
        if ($role === 'staff' && !($user->hasRole('admin') || $user->hasRole('staff'))) {
            abort(403, 'Unauthorized access.');
        }

        return $next($request);
    }
}