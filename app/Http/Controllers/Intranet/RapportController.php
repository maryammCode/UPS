<?php

namespace App\Http\Controllers\Intranet;

use App\Http\Controllers\Controller;
use App\RessourceReservation;
use App\RessourceCategory;
use App\Ressource;
use Illuminate\Support\Facades\DB;
use PDF;

class RapportController extends Controller
{
    public function download()
    {
        // 1. Récupérer les données nécessaires

        // Évolution quotidienne/mensuelle
        $dailyRequests = RessourceReservation::selectRaw('DATE(created_at) as day, COUNT(*) as total')
            ->groupBy('day')
            ->orderBy('day')
            ->get();

        $monthlyRequests = RessourceReservation::selectRaw('MONTH(created_at) as month, COUNT(*) as total')
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        // Taux acceptation et refus
        $totalRequests = RessourceReservation::count();
        $acceptedRequests = RessourceReservation::where('statut', 'accepted')->count();
        $refusedRequests = RessourceReservation::where('statut', 'refused')->count();

        $acceptanceRate = $totalRequests > 0 ? round(($acceptedRequests / $totalRequests) * 100, 2) : 0;
        $refusalRate = $totalRequests > 0 ? round(($refusedRequests / $totalRequests) * 100, 2) : 0;

        // Temps moyen de traitement
        $averageProcessingTime = RessourceReservation::whereNotNull('updated_at')
            ->selectRaw('AVG(TIMESTAMPDIFF(MINUTE, created_at, updated_at)) as avg_time')
            ->value('avg_time');
        $averageProcessingTime = $averageProcessingTime ? round($averageProcessingTime, 2) : 0;

        // Nombre des demandes par statut
        $requestsByStatus = RessourceReservation::select('statut', DB::raw('count(*) as total'))
            ->groupBy('statut')
            ->get();

        // Nombre des demandes aujourd'hui
        $todayRequests = RessourceReservation::whereDate('created_at', today())->count();

        // Top 10 ressources les plus demandées
        $topResources = RessourceReservation::select('ressource_id', DB::raw('count(*) as total'))
            ->groupBy('ressource_id')
            ->orderByDesc('total')
            ->with('ressource')
            ->take(10)
            ->get();

        // Taux d’occupation des ressources par réservation en attente
        $pendingReservations = RessourceReservation::where('statut', 'pending')->count();
        $pendingOccupationRate = $totalRequests > 0 ? round(($pendingReservations / $totalRequests) * 100, 2) : 0;

        // Évolution quotidienne du stock
        $stockEvolution = DB::table('stock_histories')
            ->selectRaw('DATE(created_at) as day, SUM(quantité) as total')
            ->groupBy('day')
            ->orderBy('day')
            ->get();

        // Nombre demandes par mois et catégorie
        $requestsByMonthCategory = RessourceReservation::selectRaw('MONTH(created_at) as month, categorie_id, COUNT(*) as total')
            ->groupBy('month', 'categorie_id')
            ->orderBy('month')
            ->get()
            ->map(function ($item) {
                $category = RessourceCategory::find($item->categorie_id);
                $item->category_name = $category ? $category->name : 'Inconnu';
                return $item;
            });

        // 2. Passer les données à une vue
        $pdf = PDF::loadView('intranet.rapport-pdf.rapport', compact(
            'dailyRequests', 'monthlyRequests', 'acceptanceRate', 'refusalRate',
            'averageProcessingTime', 'requestsByStatus', 'todayRequests', 'topResources',
            'pendingOccupationRate', 'stockEvolution', 'requestsByMonthCategory'
        ));

        // 3. Retourner le téléchargement
        return $pdf->download('rapport_statistique.pdf');
    }
}

