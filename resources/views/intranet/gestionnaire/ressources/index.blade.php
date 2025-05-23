@extends('voyager::master-gest')

@section('page_title', __('Resources'))

@section('page_header')
    <div class="container-fluid">
        <h1 class="page-title">
            <i class="voyager-box"></i> Resources
        </h1>

        <a href="{{ route('intranet.ressources.create') }}" class="btn btn-success btn-add-new">
            <i class="voyager-plus"></i> <span>Ajouter nouveau</span>
        </a>

    </div>
@stop

@section('content')
    <div class="page-content browse container-fluid">
        @include('voyager::alerts')
        
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-bordered">
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table id="dataTable" class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Catégorie</th>
                                        <th>designation</th>
                                        <th>image</th>
                                        <th>prix</th>
                                        <th>quantité</th>
                                        <th>Fournisseur</th>
                                        <th>description</th>	
                                        <th>Créer à</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($ressources as $ressource)
                                        <tr>
                                            <td>{{ $ressource->category->designation_fr ?? 'N/A' }}</td>
                                            <td>{{ $ressource->designation_fr }}</td>
                                            <td>{{ $ressource->image }}</td>
                                            <td>{{ $ressource->prix }}</td>
                                            <td>{{ $ressource->quantité }}</td>
                                            <td>{{ $ressource->supplier->raisonSocial ?? 'N/A' }}</td>
                                            <td>{{ $ressource->description_fr}}</td>
                                            <td>{{ $ressource->created_at }}</td>
                                            <td class="no-sort no-click bread-actions" style="width: 7px;">
                                                <div class="d-flex flex-column">
                                                    <a href="{{ route('intranet.ressources.show', $ressource->id) }}" class="btn btn-sm btn-warning mb-1">
                                                        <i class="voyager-eye"></i>
                                                    </a>
                                                    <a href="{{ route('intranet.ressources.edit', $ressource->id) }}" class="btn btn-sm btn-primary mb-1">
                                                        <i class="voyager-edit"></i>
                                                    </a>
                                                    <form id="delete-form-{{ $ressource->id }}" action="{{ route('intranet.ressources.destroy', $ressource->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="button" class="btn btn-sm btn-danger" onclick="confirmDelete({{ $ressource->id }})">
                                                            <i class="voyager-trash"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="pull-right">
                            {{ $ressources->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('javascript')
<script>
    $(document).ready(function () {
        $('#dataTable').DataTable({
            paging: false,
            info: false,
            language: {
                search: "Chercher:"
            }
        });
    });
</script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function confirmDelete(id) {
            Swal.fire({
                title: 'Are you sure?',
                text: "This action is irreversible!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('delete-form-' + id).submit();
                }
            });
        }
    </script>
@stop
