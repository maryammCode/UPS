<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class FrameOptions
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
        $response = $next($request);

        if ($response instanceof \Symfony\Component\HttpFoundation\Response) {
            $response->headers->set('X-Frame-Options', 'DENY'); // Vous pouvez également utiliser 'SAMEORIGIN' selon vos besoins
        }

        return $response;
    }
}
