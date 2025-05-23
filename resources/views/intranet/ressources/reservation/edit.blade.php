@extends('voyager::master-gest')

@section('page_title', __('Modifier la réservation'))

@section('page_header')
    <div class="container-fluid">
        <h1 class="page-title">
            <i class="voyager-box"></i> Modifier la réservation: {{ $ressource->designation_fr }}
        </h1>
    </div>
@stop

@section('content')
    <div class="page-content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-bordered">
                    <div class="panel-body">

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('intranet.user.reservations.update', $reservation->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label>Type de ressource</label><br>
                                <label><input type="radio" name="type_id" value="1" {{ $reservation->type_id == 1 ? 'checked' : '' }}> Retournable</label><br>
                                <label><input type="radio" name="type_id" value="2" {{ $reservation->type_id == 2 ? 'checked' : '' }}> Non retournable</label>
                            </div>

                            <div class="form-group date-fields" style="display: {{ $reservation->type_id == 1 ? 'block' : 'none' }};">
                                <label for="dateDebut">Date début</label>
                                <input type="date" name="dateDebut" class="form-control" value="{{ $reservation->dateDebut }}">
                            </div>

                            <div class="form-group date-fields" style="display: {{ $reservation->type_id == 1 ? 'block' : 'none' }};">
                                <label for="dateFin">Date fin</label>
                                <input type="date" name="dateFin" class="form-control" value="{{ $reservation->dateFin }}">
                            </div>

                            <div class="form-group">
                                <label for="quantité">Quantité à réserver</label>
                                <input type="number" name="quantité" class="form-control" value="{{ $reservation->quantité }}">
                                <small class="text-muted">Quantité disponible: {{ $ressource->quantité }}</small>
                            </div>

                            <button type="submit" class="btn btn-primary">Modifier</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const radios = document.querySelectorAll('input[name="type_id"]');
            const dateFields = document.querySelectorAll('.date-fields');

            radios.forEach(radio => {
                radio.addEventListener('change', function () {
                    if (this.value == '1') {
                        dateFields.forEach(f => f.style.display = 'block');
                    } else {
                        dateFields.forEach(f => f.style.display = 'none');
                    }
                });
            });
        });
    </script>
@stop



