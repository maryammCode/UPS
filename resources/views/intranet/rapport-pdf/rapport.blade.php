<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Rapport Statistique</title>
    <style>
        body { font-family: Arial, sans-serif; font-size: 12px; }
        h2 { text-align: center; margin-bottom: 10px; }
        table { width: 100%; border-collapse: collapse; margin-bottom: 20px; }
        th, td { border: 1px solid #ccc; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>

<h2>Rapport Statistique</h2>

<h3>Évolution quotidienne des demandes</h3>
<table>
    <tr><th>Date</th><th>Nombre de demandes</th></tr>
    @foreach ($dailyRequests as $item)
    <tr><td>{{ $item->day }}</td><td>{{ $item->total }}</td></tr>
    @endforeach
</table>

<h3>Évolution mensuelle des demandes</h3>
<table>
    <tr><th>Mois</th><th>Nombre de demandes</th></tr>
    @foreach ($monthlyRequests as $item)
    <tr><td>{{ $item->month }}</td><td>{{ $item->total }}</td></tr>
    @endforeach
</table>

<h3>KPIs Généraux</h3>
<ul>
    <li>Taux d'acceptation : {{ $acceptanceRate }} %</li>
    <li>Taux de refus : {{ $refusalRate }} %</li>
    <li>Temps moyen de traitement : {{ $averageProcessingTime }} minutes</li>
    <li>Demandes aujourd'hui : {{ $todayRequests }}</li>
    <li>Taux d’occupation des ressources en attente : {{ $pendingOccupationRate }} %</li>
</ul>

<h3>Nombre de demandes par statut</h3>
<table>
    <tr><th>Statut</th><th>Nombre</th></tr>
    @foreach ($requestsByStatus as $item)
    <tr><td>{{ $item->statut }}</td><td>{{ $item->total }}</td></tr>
    @endforeach
</table>

<h3>Top 10 Ressources les plus demandées</h3>
<table>
    <tr><th>Ressource</th><th>Nombre de demandes</th></tr>
    @foreach ($topResources as $item)
    <tr>
        <td>{{ $item->ressource ? $item->ressource->name : 'Inconnu' }}</td>
        <td>{{ $item->total }}</td>
    </tr>
    @endforeach
</table>

<h3>Évolution quotidienne du stock</h3>
<table>
    <tr><th>Date</th><th>Quantité totale</th></tr>
    @foreach ($stockEvolution as $item)
    <tr><td>{{ $item->day }}</td><td>{{ $item->total }}</td></tr>
    @endforeach
</table>

<h3>Demandes par mois et catégorie</h3>
<table>
    <tr><th>Mois</th><th>Catégorie</th><th>Nombre de demandes</th></tr>
    @foreach ($requestsByMonthCategory as $item)
    <tr><td>{{ $item->month }}</td><td>{{ $item->category_name }}</td><td>{{ $item->total }}</td></tr>
    @endforeach
</table>

</body>
</html>
