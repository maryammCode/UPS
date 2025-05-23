@extends('voyager::master')

@section('page_title', 'Mes réservations')

@section('content')
<div class="container-fluid">
    <h1 class="page-title">Mes réservations</h1>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Ressource</th>
                <th>Quantité</th>
                <th>Type</th>
                <th>Date début</th>
                <th>Date fin</th>
                <th>Statut</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        @foreach($reservations as $reservation)
            <tr>
                <td>{{ $reservation->ressource ?? '-' }}</td>
                <td>{{ $reservation->quantité }}</td>
                <td>{{ $reservation->type_id == 1 ? 'Retournable' : 'Non retournable' }}</td>
                <td>{{ $reservation->dateDebut ?? '-' }}</td>
                <td>{{ $reservation->dateFin ?? '-' }}</td>
                <td>
                    @if($reservation->statut === 'en cours')
                        <span class="badge badge-warning">En cours</span>

                    @elseif($reservation->statut === 'accepté')
                        <span class="badge badge-success">Accepté</span>

                    @elseif($reservation->statut === 'annulée')
                        <span class="badge" style="background-color: #FFD700; color: white;">Annulée</span>
                    @else
                        <span class="badge badge-danger">Refusé</span>
                    @endif
                </td>
                <td>
                    @if(in_array($reservation->statut, ['en cours', 'accepté']))
                        @if($reservation->statut === 'en cours')
                            <a href="{{ route('intranet.user.reservations.edit', $reservation->id) }}" class="btn btn-sm btn-warning rounded-circle text-white" style="width: 30px; height: 30px; padding: 5px;">
                                <i class="voyager-edit" style="font-size: 14px;"></i>
                            </a>
                        @endif

                        <form action="{{ route('intranet.user.reservations.cancel', $reservation->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            <button class="btn btn-xs" style="background-color: #dc3545; color: white; border-radius: 999px; padding: 4px 10px;" onclick="return confirm('Annuler cette réservation ?')">
                                Annuler
                            </button>
                        </form>
                    @else
                        -
                    @endif
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection

