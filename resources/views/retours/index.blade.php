@extends('voyager::master')

@section('page_title', 'Retours de ressources aujourd\'hui')

@section('content')
<div class="container-fluid">
    <h1 class="page-title">Retours de ressources du {{ \Carbon\Carbon::today()->format('d/m/Y') }}</h1>

    @if($reservations->isEmpty())
        <p>Aucune ressource attendue aujourd'hui.</p>
    @else
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Ressource</th>
                    <th>Quantité</th>
                    <th>Utilisateur</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($reservations as $reservation)
                    <tr id="reservation-{{ $reservation->id }}">
                        <td>{{ $reservation->ressource->designation_fr ?? '-' }}</td>
                        <td>{{ $reservation->quantité }}</td>
                        <td>{{ $reservation->user_name }}</td>
                        <td>
                            @if($reservation->statut === 'retournée')
                                <span class="text-success">
                                    La ressource <strong>{{ $reservation->ressource->designation_fr }}</strong> a été retournée le {{ \Carbon\Carbon::parse($reservation->updated_at)->format('d/m/Y H:i') }}.
                                </span>
                            @else
                                <label>
                                    <input type="checkbox" onchange="handleRetour({{ $reservation->id }})">
                                    La ressource a-t-elle été retournée ?
                                </label>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>

<script>
    function handleRetour(id) {
        fetch(`/retours-aujourd-hui/${id}/retourner`, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Accept': 'application/json',
                'Content-Type': 'application/json'
            }
        })
        .then(res => res.json())
        .then(data => {
            const row = document.getElementById('reservation-' + id);
            row.querySelector('td:last-child').innerHTML =
                `<span class="text-success">
                    La ressource <strong>${data.ressource}</strong> a été retournée le ${data.date}.
                </span>`;
        });
    }
</script>
@endsection
