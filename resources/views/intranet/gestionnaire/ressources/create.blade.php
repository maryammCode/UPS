@extends('voyager::master-gest')

@section('page_title', __('Create Resource'))

@section('page_header')
    <div class="container-fluid">
        <h1 class="page-title">
            <i class="voyager-box"></i> Ajouter Resource
        </h1>
    </div>
@stop

@section('content')
    <div class="page-content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-bordered">
                    <div class="panel-body">
                        <form action="{{ route('intranet.ressources.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="designation_fr">Designation (FR)</label>
                                <input name="designation_fr" class="form-control" value="{{ old('designation_fr') }}">
                                @error('designation_fr') 
                                    <span style="color: red; font-size: 12px; margin-top: 5px; display: block;">{{ $message }}</span> 
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="designation_en">Designation (EN)</label>
                                <input name="designation_en" class="form-control" value="{{ old('designation_en') }}">
                                @error('designation_en') 
                                    <span style="color: red; font-size: 12px; margin-top: 5px; display: block;">{{ $message }}</span> 
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="designation_ar">Designation (AR)</label>
                                <input name="designation_ar" class="form-control" value="{{ old('designation_ar') }}">
                                @error('designation_ar') 
                                    <span style="color: red; font-size: 12px; margin-top: 5px; display: block;">{{ $message }}</span> 
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="description_fr">Description (FR)</label>
                                <textarea name="description_fr" class="form-control">{{ old('description_fr') }}</textarea>
                                @error('description_fr') 
                                    <span style="color: red; font-size: 12px; margin-top: 5px; display: block;">{{ $message }}</span> 
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="description_en">Description (EN)</label>
                                <textarea name="description_en" class="form-control">{{ old('description_en') }}</textarea>
                                @error('description_en') 
                                    <span style="color: red; font-size: 12px; margin-top: 5px; display: block;">{{ $message }}</span> 
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="description_ar">Description (AR)</label>
                                <textarea name="description_ar" class="form-control">{{ old('description_ar') }}</textarea>
                                @error('description_ar') 
                                    <span style="color: red; font-size: 12px; margin-top: 5px; display: block;">{{ $message }}</span> 
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="ressource_category_id">Catégorie</label>
                                <select name="ressource_category_id" class="form-control">
                                    <option value="">-- Sélectionner Catégorie --</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->designation_fr }}</option>
                                    @endforeach
                                </select>
                                @error('ressource_category_id') 
                                    <span style="color: red; font-size: 12px; margin-top: 5px; display: block;">{{ $message }}</span> 
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="quantité">Quantité</label>
                                <input name="quantité" class="form-control" value="{{ old('quantité', 1) }}" min="0" required>
                                @error('quantité') 
                                    <span style="color: red; font-size: 12px; margin-top: 5px; display: block;">{{ $message }}</span> 
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="prix">Prix</label>
                                <input step="0.01" name="prix" class="form-control" value="{{ old('prix') }}">
                                @error('prix') 
                                    <span style="color: red; font-size: 12px; margin-top: 5px; display: block;">{{ $message }}</span> 
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="image">Image Path</label>
                                <input name="image" class="form-control" value="{{ old('image') }}">
                                @error('image') 
                                    <span style="color: red; font-size: 12px; margin-top: 5px; display: block;">{{ $message }}</span> 
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="supplier_id">Fournisseur</label>
                                <select name="supplier_id" class="form-control">
                                    <option value="">-- Sélectionner Fournisseur --</option>
                                    @foreach($suppliers as $supplier)
                                        <option value="{{ $supplier->id }}">{{ $supplier->raisonSocial }}</option>
                                    @endforeach
                                </select>
                                @error('supplier_id') 
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