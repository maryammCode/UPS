@extends('voyager::master-gest')

@section('page_title', __('Edit Supplier'))

@section('page_header')
    <div class="container-fluid">
        <h1 class="page-title">
            <i class="voyager-people"></i> Modifier fournisseur
        </h1>
    </div>
@stop

@section('content')
    <div class="page-content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-bordered">
                    <div class="panel-body">
                        <form action="{{ route('intranet.suppliers.update', $supplier->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="matricule">Matricule</label>
                                <input name="matricule" class="form-control" value="{{ $supplier->matricule }}">
                                @error('matricule') 
                                    <span style="color: red; font-size: 12px; margin-top: 5px; display: block;">{{ $message }}</span> 
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="raisonSocial">Raison Social</label>
                                <input name="raisonSocial" class="form-control" value="{{ $supplier->raisonSocial }}" >
                                @error('raisonSocial') 
                                    <span style="color: red; font-size: 12px; margin-top: 5px; display: block;">{{ $message }}</span> 
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="numeroTel">Numéro Téléphone</label>
                                <input name="numeroTel" class="form-control" value="{{ $supplier->numeroTel }}" >
                                @error('numeroTel') 
                                    <span style="color: red; font-size: 12px; margin-top: 5px; display: block;">{{ $message }}</span> 
                                @enderror
                            </div>
                    
                            <div class="form-group">
                                <label for="adresse">Adresse</label>
                                <input name="adresse" class="form-control" value="{{ $supplier->adresse }}">
                                @error('adresse') 
                                    <span style="color: red; font-size: 12px; margin-top: 5px; display: block;">{{ $message }}</span> 
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="email">Email</label>
                                <input name="email" class="form-control" value="{{ $supplier->email }}">
                                @error('email') 
                                <span style="color: red; font-size: 12px; margin-top: 5px; display: block;">{{ $message }}</span> 
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="nomResponsable">Nom Responsable</label>
                                <input name="nomResponsable" class="form-control" value="{{ $supplier->nomResponsable }}" >
                                @error('nomResponsable') 
                                    <span style="color: red; font-size: 12px; margin-top: 5px; display: block;">{{ $message }}</span> 
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="emailResponsable">Email du Responsable</label>
                                <input name="emailResponsable" class="form-control" value="{{ $supplier->emailResponsable }}">
                                @error('emailResponsable') 
                                    <span style="color: red; font-size: 12px; margin-top: 5px; display: block;">{{ $message }}</span> 
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="telResponsable">Téléphone du Responsable</label>
                                <input name="telResponsable" class="form-control" value="{{ $supplier->telResponsable }}">
                                @error('telResponsable') 
                                    <span style="color: red; font-size: 12px; margin-top: 5px; display: block;">{{ $message }}</span> 
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Enregistrer</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop