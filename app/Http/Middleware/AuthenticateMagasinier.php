<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Auth;

class AuthenticateMagasinier
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */

    public function handle(Request $request, Closure $next): Response
    {
        if ( @Auth::user()->role->name != 'gestionnaire du magasin') {
            //return redirect()->route('index');
            abort(403, 'Unauthorized action.');
        }
        return $next($request);
    }
}

