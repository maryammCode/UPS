<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\RessourceReservation;
use App\Ressource;
use Carbon\Carbon;

class RetourController extends Controller
{
    public function index()
    {
        $today = Carbon::today()->toDateString();

        $reservations = RessourceReservation::with('ressource')
            ->whereDate('dateFin', $today)
            ->where('statut', '!=', 'annulée')
            ->get();

        return view('retours.index', compact('reservations'));
    }

    public function retourner($id)
    {
        $reservation = RessourceReservation::findOrFail($id);
        $ressource = $reservation->ressource;

        if ($ressource && $reservation->statut !== 'retournée') {
            $ressource->quantité += $reservation->quantité;
            $ressource->save();

            $reservation->statut = 'retournée';
            $reservation->save();
        }

        return response()->json([
            'message' => 'Retour enregistré.',
            'date' => now()->format('d/m/Y H:i'),
            'ressource' => $ressource->designation_fr ?? 'Ressource',
        ]);
    }
}
