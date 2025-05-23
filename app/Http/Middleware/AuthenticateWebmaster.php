<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Auth;

class AuthenticateWebmaster
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (@Auth::user()->role->name !== 'webmaster') {
            abort(403, 'Unauthorized action.');
        }

        return $next($request);
    }
}
