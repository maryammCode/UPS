@extends('voyager::master-gest')

@section('page_title', __('Réserver une ressource'))

@section('page_header')
    <div class="container-fluid">
        <h1 class="page-title">
            <i class="voyager-box"></i> Réserver: {{ $ressource->designation_fr }}
        </h1>
    </div>
@stop

@section('content')
    <div class="page-content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-bordered">
                    <div class="panel-body">

                        {{-- Show Validation Errors --}}
                        @if ($errors->any())
                           <div class="alert alert-danger">
                           <ul class="mb-0">
                           @foreach ($errors->all() as $error)
                               <li>{{ $error }}</li>
                           @endforeach
                           </ul>
                           </div>
                        @endif
                        

                        <form action="{{ route('intranet.ressources.reserve.store') }}" method="POST">
                            @csrf

                            <input type="hidden" name="ressource_id" value="{{ $ressource->id }}">
                            <input type="hidden" name="ressource" value="{{ $ressource->designation_fr}}">
                           
                            {{-- Type selection --}}
                            <div class="form-group">
                                <label>Type de ressource</label><br>
                                <label><input type="radio" name="type_id" value="1"> Retournable</label><br>
                                <label><input type="radio" name="type_id" value="2"> Non retournable</label>
                            </div>

                            {{-- Conditional date fields --}}
                            <div class="form-group date-fields" style="display:none;">
                                <label for="dateDebut">Date début</label>
                                <input type="date" name="dateDebut" class="form-control">
                            </div>

                            <div class="form-group date-fields" style="display:none;">
                                <label for="dateFin">Date fin</label>
                                <input type="date" name="dateFin" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="quantité">Quantité à réserver</label>
                                <input type="number" name="quantité" class="form-control">
                                <small class="text-muted">Quantité disponible: {{ $ressource->quantité }}</small>
                            </div>
                            

                            <button type="submit" class="btn btn-primary">Réserver</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- JavaScript to toggle date fields --}}
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
