@extends('voyager::master-gest')

@section('page_title', __('Resource Details'))

@section('page_header')
    <div class="container-fluid">
        <h1 class="page-title">
            <i class="voyager-box"></i> Resource Details
        </h1>
    </div>
@stop

@section('content')
    <div class="page-content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-bordered">
                    <div class="panel-body">
                        <div class="form-group">
                            <label>Name:</label>
                            <p>{{ $ressource->nom }}</p>
                        </div>
                        <div class="form-group">
                            <label>Description:</label>
                            <p>{{ $ressource->description ?? 'N/A' }}</p>
                        </div>
                        <div class="form-group">
                            <label>Category:</label>
                            <p>{{ $ressource->category->name ?? 'N/A' }}</p>
                        </div>
                        <div class="form-group">
                            <label>Quantity:</label>
                            <p>{{ $ressource->quantite }}</p>
                        </div>
                        <div class="form-group">
                            <label>Price:</label>
                            <p>{{ $ressource->prix ?? 'N/A' }}</p>
                        </div>
                        <div class="form-group">
                            <label>Supplier:</label>
                            <p>{{ $ressource->supplier->raisonSocial ?? 'N/A' }}</p>
                        </div>
                        <div class="form-group">
                            <label>Created At:</label>
                            <p>{{ $ressource->created_at }}</p>
                        </div>
                        <div class="form-group">
                            <label>Updated At:</label>
                            <p>{{ $ressource->updated_at }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop