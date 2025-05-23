<?php

namespace App\Http\Controllers\Intranet;

use App\Ressource;
use App\RessourceCategory;
use App\Supplier;
use App\RessourceType;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\RessourceReservation;
use Illuminate\Support\Facades\Auth;
use App\Models\User;


class ReservationController extends Controller
{
    

    public function index()
{
    $reservations = RessourceReservation::with('user', 'ressource')->latest()->get();
    return view('intranet.ressources.reservation.index', compact('reservations'));
}


/**
     * Show the form for creating a new resource.
     */

 public function create($id)
{
    $ressource = Ressource::findOrFail($id);
    $types = RessourceType::all();

    return view('intranet.ressources.reservation.create', compact('ressource', 'types'));
}


public function store(Request $request)
{

    // Get the ressource
    $ressource = Ressource::findOrFail($request->ressource_id);

    $validated = $request->validate([
        'ressource_id' => 'required|exists:ressources,id',
        'ressource' => 'required|exists:ressources,designation_fr',
        'type_id' => 'required|exists:ressource_type,id',
        'dateDebut' => 'nullable|date',
        'dateFin' => 'nullable|date|after_or_equal:dateDebut',
        'quantité' => 'required|integer|min:1|max:' . $ressource->quantité,
    ]);

    // Get the selected ressource to access its categorie_id
    // $ressource = Ressource::findOrFail($validated['ressource_id']);

     // Check if requested quantity is available
     if ($validated['quantité'] > $ressource->quantité) {
        return back()->withErrors(['quantité' => 'La quantité demandée dépasse la quantité disponible.'])->withInput();
     }
    $reservation = new RessourceReservation();
    $reservation->user_id = Auth::id(); // Automatically use logged-in user
    $reservation->ressource_id = $validated['ressource_id'];
    $reservation->categorie_id = $ressource->ressource_category_id; // Automatically use ressource's category
    $reservation->type_id = $validated['type_id'];
    $reservation->quantité = $validated['quantité'];
    $reservation->ressource = $validated['ressource'];


    //Set default status
    $reservation->statut = 'en cours';


    if ($validated['type_id'] == 1) { // If it's "retournable"
        $reservation->dateDebut = $validated['dateDebut'];
        $reservation->dateFin = $validated['dateFin'];
    }


    $reservation->save();

    return redirect()->route('intranet.ressources.reserve', $validated['ressource_id'])
        ->with('success', 'Demande de réservation envoyée avec succès.');
}



// Accept reservation
public function accept($id)
{
    $reservation = RessourceReservation::findOrFail($id);
    if ($reservation->statut !== 'en cours') {
        return back()->with('error', 'Cette demande a déjà été traitée.');
    }

    // Reduce the resource quantity
    $ressource = Ressource::find($reservation->ressource_id);

    if (!$ressource) {
        return back()->with('error', 'Ressource introuvable.');
    }
    if ($ressource->quantité < $reservation->quantité) {
        return back()->with('error', 'Quantité insuffisante.');
    }

    $ressource->quantité -= $reservation->quantité;
    $ressource->save();

    $reservation->statut = 'acceptée';
    $reservation->save();

    return back()->with('success', 'Réservation acceptée.');
}



// Refuse reservation
public function refuse($id)
{
    $reservation = RessourceReservation::findOrFail($id);
    if ($reservation->statut !== 'en cours') {
        return back()->with('error', 'Cette demande a déjà été traitée.');
    }

    $reservation->statut = 'refusée';
    $reservation->save();

    return back()->with('success', 'Réservation refusée.');
}

public function myReservations()
{
    $reservations = RessourceReservation::with('ressource')
        ->where('user_id', Auth::id())
        ->latest()
        ->get();

    return view('intranet.ressources.reservation.demandes', compact('reservations'));
}

// Edit form
public function edit($id)
{
    $reservation = RessourceReservation::where('user_id', Auth::id())->findOrFail($id);
    $ressource = Ressource::findOrFail($reservation->ressource_id);
    $types = RessourceType::all();

    return view('intranet.ressources.reservation.edit', compact('reservation', 'ressource', 'types'));
}

// Update reservation
public function update(Request $request, $id)
{
    $reservation = RessourceReservation::where('user_id', Auth::id())->findOrFail($id);
    $ressource = Ressource::findOrFail($reservation->ressource_id);

    $validated = $request->validate([
        'type_id' => 'required|exists:ressource_type,id',
        'dateDebut' => 'nullable|date',
        'dateFin' => 'nullable|date|after_or_equal:dateDebut',
        'quantité' => 'required|integer|min:1|max:' . $ressource->quantité,
    ]);

    $reservation->type_id = $validated['type_id'];
    $reservation->quantité = $validated['quantité'];

    if ($validated['type_id'] == 1) {
        $reservation->dateDebut = $validated['dateDebut'];
        $reservation->dateFin = $validated['dateFin'];
    } else {
        $reservation->dateDebut = null;
        $reservation->dateFin = null;
    }

    $reservation->save();

    return redirect()->route('intranet.user.reservations.demandes')->with('success', 'Réservation modifiée.');
}

// Annuler (just change statut)
public function cancel($id)
{
    $reservation = RessourceReservation::where('user_id', Auth::id())->findOrFail($id);
        $reservation->statut = 'annulée';
        $reservation->save();
    

    return back()->with('success', 'Réservation annulée.');
}


}


