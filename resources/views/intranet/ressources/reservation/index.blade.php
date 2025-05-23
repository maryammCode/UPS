@extends('voyager::master')

@section('page_title', 'Demandes de réservation')

@section('content')
<div class="container-fluid">
    <h1 class="page-title">Demandes de réservation</h1>

    @if(session('success')) <div class="alert alert-success">{{ session('success') }}</div> @endif
    @if(session('error')) <div class="alert alert-danger">{{ session('error') }}</div> @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Utilisateur</th>
                <th>Ressource</th>
                <th>Quantité</th>
                <th>Type</th>
                <th>Date début</th>
                <th>Date fin</th>
                <th>Statut</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($reservations as $reservation)
            <tr>
                <td>{{ $reservation->id }}</td>
                <td>{{ $reservation->user->name ?? '-' }}</td>
                <td>{{ $reservation->ressource ?? '-' }}</td>
                <td>{{ $reservation->quantité }}</td>
                <td>{{ $reservation->type_id == 1 ? 'Retournable' : 'Non retournable' }}</td>
                <td>{{ $reservation->dateDebut ?? '-' }}</td>
                <td>{{ $reservation->dateFin ?? '-' }}</td>
                <td>{{ ucfirst($reservation->statut) }}</td>
                <td>
                    @if($reservation->statut === 'en cours')
                        <form action="{{ route('intranet.reservations.accept', $reservation->id) }}" method="POST" style="display:inline">
                            @csrf
                            <button class="btn btn-success btn-sm">Accepter</button>
                        </form>
                        <form action="{{ route('intranet.reservations.refuse', $reservation->id) }}" method="POST" style="display:inline">
                            @csrf
                            <button class="btn btn-danger btn-sm">Refuser</button>
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
