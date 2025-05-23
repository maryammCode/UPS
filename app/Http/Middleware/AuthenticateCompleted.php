<?php

namespace App\Http\Middleware;

use App\Coordinate;
use App\FormFicheRenseignement;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticateCompleted
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

        if (@Auth::user()->role->name == 'Etudiant') {
            $coordinate = Coordinate::first();
            $fiche_renseignement = FormFicheRenseignement::where('student_id', Auth::user()->id)
                ->where('year_id', $coordinate->current_year_id)
                ->first();
            if (!isset($fiche_renseignement)) {
                return redirect()->route('fiche_renseignements');
            }
        }

        return $next($request);
    }
}
