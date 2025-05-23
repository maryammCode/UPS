<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Auth;

class AuthenticateMagasinierOrWebmaster
{
    public function handle(Request $request, Closure $next): Response
    {
        $role = @Auth::user()->role->name;

        if (!in_array($role, ['gestionnaire du magasin', 'webmaster'])) {
            abort(403, 'Unauthorized action.');
        }

        return $next($request);
    }
}

