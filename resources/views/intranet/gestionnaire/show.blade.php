@extends('voyager::master-gest')

@section('page_title', __('Supplier Details'))

@section('page_header')
    <div class="container-fluid">
        <h1 class="page-title">
            <i class="voyager-people"></i> Détails du fournisseur
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
                            <label>Raison sociale:</label>
                            <p>{{ $supplier->raisonSocial }}</p>
                        </div>
                        <div class="form-group">
                            <label>Numéro téléphone:</label>
                            <p>{{ $supplier->numeroTel }}</p>
                        </div>
                        <div class="form-group">
                            <label>Email:</label>
                            <p>{{ $supplier->email }}</p>
                        </div>
                        <div class="form-group">
                            <label>Adresse:</label>
                            <p>{{ $supplier->adresse }}</p>
                        </div>
                        <div class="form-group">
                            <label>Nom du responsable:</label>
                            <p>{{ $supplier->nomResponsable }}</p>
                        </div>
                        <div class="form-group">
                            <label>Email du responsable:</label>
                            <p>{{ $supplier->emailResponsable }}</p>
                        </div>
                        <div class="form-group">
                            <label>Téléphone du responsable :</label>
                            <p>{{ $supplier->telResponsable }}</p>
                        </div>
                        <div class="form-group">
                            <label>Créé le:</label>
                            <p>{{ $supplier->created_at }}</p>
                        </div>
                        <div class="form-group">
                            <label>Modifié le:</label>
                            <p>{{ $supplier->updated_at }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop