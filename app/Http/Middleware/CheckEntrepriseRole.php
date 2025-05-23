<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;


class CheckEntrepriseRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // Check if the authenticated user has the 'Entreprise' role
        if (!Auth::user()->hasRole('Entreprise')) {
            // User doesn't have the 'Entreprise' role, deny access
            \Log::info('You are not authorized to access this page');
            return redirect()->route('index');
        }
        // User is authenticated and has the 'Entreprise' role, proceed with the request
        return $next($request);
    }
}