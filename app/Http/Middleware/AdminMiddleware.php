<?php

namespace App\Http\Middleware;

use App\Domain\Enum\Profile;
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
        if ($request->user()?->profile_id !== Profile::ADMIN->value) {
            return redirect('/dashboard');
        }

        return $next($request);
    }
}
