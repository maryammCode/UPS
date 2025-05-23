@extends('voyager::master-gest')

@section('page_title', __('Edit Resource'))

@section('page_header')
    <div class="container-fluid">
        <h1 class="page-title">
            <i class="voyager-box"></i> Edit Resource
        </h1>
    </div>
@stop

@section('content')
    <div class="page-content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-bordered">
                    <div class="panel-body">
                        <form action="{{ route('intranet.ressources.update', $ressource->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="nom">Name</label>
                                <input name="nom" class="form-control" value="{{ $ressource->nom }}" required>
                                @error('nom') 
                                    <span style="color: red; font-size: 12px; margin-top: 5px; display: block;">{{ $message }}</span> 
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea name="description" class="form-control">{{ $ressource->description }}</textarea>
                                @error('description') 
                                    <span style="color: red; font-size: 12px; margin-top: 5px; display: block;">{{ $message }}</span> 
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="categorie_id">Category</label>
                                <select name="categorie_id" class="form-control" required>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}" {{ $ressource->categorie_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                @error('categorie_id') 
                                    <span style="color: red; font-size: 12px; margin-top: 5px; display: block;">{{ $message }}</span> 
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="quantite">Quantity</label>
                                <input type="number" name="quantite" class="form-control" value="{{ $ressource->quantite }}" min="0" required>
                                @error('quantite') 
                                    <span style="color: red; font-size: 12px; margin-top: 5px; display: block;">{{ $message }}</span> 
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="prix">Price</label>
                                <input type="number" step="0.01" name="prix" class="form-control" value="{{ $ressource->prix }}">
                                @error('prix') 
                                    <span style="color: red; font-size: 12px; margin-top: 5px; display: block;">{{ $message }}</span> 
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="image">Image Path</label>
                                <input name="image" class="form-control" value="{{ $ressource->image }}">
                                @error('image') 
                                    <span style="color: red; font-size: 12px; margin-top: 5px; display: block;">{{ $message }}</span> 
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="supplier_id">Supplier</label>
                                <select name="supplier_id" class="form-control">
                                    <option value="">-- Select Supplier --</option>
                                    @foreach($suppliers as $supplier)
                                        <option value="{{ $supplier->id }}" {{ $ressource->supplier_id == $supplier->id ? 'selected' : '' }}>{{ $supplier->raisonSocial }}</option>
                                    @endforeach
                                </select>
                                @error('supplier_id') 
                                    <span style="color: red; font-size: 12px; margin-top: 5px; display: block;">{{ $message }}</span> 
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop