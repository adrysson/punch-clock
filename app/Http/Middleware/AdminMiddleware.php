<?php

namespace App\Http\Middleware;

use App\Domain\Enum\Role;
use Closure;
use Illuminate\Http\Request;
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
        if ($request->user()?->role_id !== Role::MANAGER->value) {
            return redirect('/dashboard');
        }

        return $next($request);
    }
}
