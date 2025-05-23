@extends('voyager::master-gest')

@section('page_title', __('Réserver une ressource'))

@section('page_header')
    <div class="container-fluid">
        <h1 class="page-title">
            <i class="voyager-box"></i> Réserver une ressource
        </h1>
    </div>
@stop

@section('content')
    <div class="page-content browse container-fluid">
        @include('voyager::alerts')
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-bordered">
                    <div class="panel-body">
                        <a href="{{ route('retours.index') }}" class="btn btn-primary">
                            Suivi des retours
                        </a>
                        <a href="{{ route('intranet.reservations.index') }}" class="btn btn-info btn-add-new">
                            <i class=""></i> <span>Demandes réservation</span>
                        </a>
                        <a href="{{ route('intranet.user.reservations.demandes') }}">
                            <button class="btn btn-warning" style="background-color: #ffc107"><i class="bi bi-pen"></i> Mes demandes</button>
                        </a>

                        {{-- Show Success Message --}}
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        <div class="table-responsive">
                            <table id="dataTable" class="table table-hover">
                                <tbody>
                                    @php
                                        // Group resources by category
                                        $groupedRessources = $ressources->groupBy('category.designation_fr');
                                    @endphp
                                    @foreach($groupedRessources as $category => $ressources)
                                        <tr class="category-row" data-toggle="collapse" data-target="#collapse-{{ md5($category) }}" style="cursor: pointer;">
                                            
                                            <td colspan="7">
                                                <strong>{{ $category }}</strong>
                                                <span class="toggle-icon" style="float: right;">&#9660;</span> {{-- ▼ icon --}}
                                            </td>
                                            
                                        </tr>
                                        <tr id="collapse-{{ md5($category) }}" class="collapse">
                                            <td colspan="7">
                                                <table class="table table-hover sub-table">
                                                    <thead>
                                                        <tr>
                                                            <th>Catégorie</th>
                                                            <th>designation</th>
                                                            <th>image</th>
                                                            <th>quantité</th>
                                                            <th>Fournisseur</th>
                                                            <th>Description</th>
                                                            <th>Actions</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($ressources as $ressource)
                                                            <tr>
                                                                <td>{{ $ressource->category->designation_fr }}</td>
                                                                <td>{{ $ressource->designation_fr }}</td>
                                                                <td>{{ $ressource->image }}</td>
                                                                <td>{{ $ressource->quantité }}</td>
                                                                <td>{{ $ressource->supplier->raisonSocial ?? 'N/A' }}</td>
                                                                <td>{{ $ressource->description_fr }}</td>
                                                                <td>
                                                                    <a href="{{ route('intranet.ressources.reserve.create', $ressource->id) }}" class="btn btn-sm btn-success">
                                                                        Réserver
                                                                    </a>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
    <style>
        .category-row:hover {
            background-color: #f5f5f5;
        }
        .sub-table {
            width: 100%;
            margin: 0;
            border: none;
        }
        .sub-table thead th {
            background-color: #f8f9fa;
            border-bottom: 2px solid #dee2e6;
        }
        .sub-table tr {
            border-bottom: 1px solid #dee2e6;
        }
    </style>
@stop

@section('javascript')
    <script>
        $(document).ready(function () {
            $('#dataTable').DataTable({
                paging: false,
                info: false,
                language: {
                    search: "Chercher:"
                },
                ordering: false // Disable sorting to maintain category grouping
            });

            // Toggle collapse on click
            $('.category-row').on('click', function () {
                const target = $(this).data('target');
                $(target).collapse('toggle');
            });
        });
    </script>
@stop
