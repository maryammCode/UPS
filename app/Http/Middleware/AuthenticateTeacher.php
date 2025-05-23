<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class AuthenticateTeacher
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if ( @Auth::user()->role->name != 'Enseignant') {
            return redirect()->route('index');
        }else {
            $user = Auth::user();

            // Check if the user has an associated teacher record (using the relationship defined earlier)
            if ($user && $user->teacher) {
                $teacher = $user->teacher;

                // Check if limit_access_date is set (not null)
                if ($teacher->limit_access_date) {
                    $limitAccessDate = Carbon::parse($teacher->limit_access_date);

                    // If the current date is after the limit_access_date, block access
                    if (Carbon::now()->greaterThan($limitAccessDate)) {
                        Auth::logout(); // Optionally log out the user if access has expired
                        return redirect()->route('login')->withErrors(['access' => 'Votre accès a expiré.']);
                    }
                }
            }
        }
        return $next($request);
    }
}
