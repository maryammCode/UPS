@extends('voyager::master-gest')

@section('page_title', __('Suppliers'))

@section('page_header')
    <div class="container-fluid">
        <h1 class="page-title">
            <i class="voyager-people"></i> Fournisseurs
        </h1>

        @if(session('success'))
           <div class="alert alert-success">
              {{ session('success') }}
           </div>
        @endif

        @if(session('import_errors'))
            <div class="alert alert-danger">
                <strong>Erreur d'importation !</strong> Certaines lignes contiennent des erreurs :
                <ul>
                    @foreach(session('import_errors') as $failure)
                        <li>
                            Ligne {{ $failure->row() }} :
                            @foreach($failure->errors() as $error)
                                <span>{{ $error }}</span>
                            @endforeach
                        </li>
                    @endforeach
                </ul>
            </div>
        @endif
    

        <a href="{{ route('intranet.suppliers.create') }}" class="btn btn-success btn-add-new">
            <i class="voyager-plus"></i> <span>Ajouter nouveau</span>
        </a>
        
        <!-- Export Excel Button -->
        <a href="{{ route('intranet.suppliers.export') }}" class="btn btn-info btn-add-new">
            <i class="voyager-down-circled"></i> <span>Exporter</span>
        </a>


        <!-- Import Excel Modal Trigger -->
        <a href="{{ route('intranet.suppliers.import') }}" data-toggle="modal" data-target="#modal_importation">
            <button class="btn btn-warning" style="background-color: #ffc107"><i class="bi bi-pen"></i> Importer</button>
        </a>
    </div>
@stop

@section('content')
    <div class="page-content browse container-fluid">
        @include('voyager::alerts')
        
        <!-- Import Excel Modal -->
        <div id="modal_importation" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content" style="min-height: 210px; min-width: 665px;">
                    <div class="modal-header" style="background-color: #ffc107; color:#fff; border-radius: 4px;">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        <h4 class="modal-title"><i class="voyager-window-list"></i> Importer un fichier Excel</h4>
                    </div>
                    <div class="container" style="direction: ltr;">
                        <div class="row" style="flex-wrap: nowrap; margin-top:22px;">
                            <div class="timeline-steps aos-init aos-animate" data-aos="fade-up" style="flex-direction:row-reverse; margin: 10px 30px">
                                <form action="{{ route('intranet.suppliers.import') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="file">Choisir le fichier</label>
                                        <input type="file" name="file" class="form-control" required>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Importer</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Suppliers Table -->
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-bordered">
                    <div class="panel-body">

                        {{-- search --}}
<form method="GET" action="{{ route('intranet.suppliers.index') }}" class="mb-4" style="display: flex; justify-content: flex-end; align-items: center; margin-bottom: 20px;">
    <label for="live-search" class="me-2">Chercher : </label>
    <input 
        type="text" 
        name="search" 
        id="live-search" 
        value="{{ request('search') }}" 
        style="border: 1px solid #ccc; padding: 4px 8px;"
    >
</form>

                        
                        

                        <div class="table-responsive">
                            <table id="dataTable" class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Matricule</th>
                                        <th>Raison Sociale</th>
                                        <th>Numéro Tel</th>
                                        <th>Adresse</th>
                                        <th>Email</th>
                                        <th>Nom Responsable</th>
                                        <th>Email Responsable</th>
                                        <th>Tel Responsable</th>
                                        <th>Créé le</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody id="supplier-table-body">
                                    @forelse($suppliers as $supplier)
                                        <tr>
                                            <td>{{ $supplier->matricule }}</td>
                                            <td>{{ $supplier->raisonSocial }}</td>
                                            <td>{{ $supplier->numeroTel }}</td>
                                            <td>{{ $supplier->adresse }}</td>
                                            <td>{{ $supplier->email }}</td>
                                            <td>{{ $supplier->nomResponsable }}</td>
                                            <td>{{ $supplier->emailResponsable }}</td>
                                            <td>{{ $supplier->telResponsable }}</td>
                                            <td>{{ $supplier->created_at }}</td>
                                            
                                            <td class="no-sort no-click bread-actions">
                                                <div style="display: flex; flex-direction: column; align-items: flex-start; gap: 4px;">
                                                    <a href="{{ route('intranet.suppliers.show', $supplier->id) }}" class="btn btn-sm btn-warning" style="width: auto;">
                                                        <i class="voyager-eye"></i>
                                                    </a>
                                            
                                                    <a href="{{ route('intranet.suppliers.edit', $supplier->id) }}" class="btn btn-sm btn-primary" style="width: auto;">
                                                        <i class="voyager-edit"></i>
                                                    </a>
                                            
                                                    <form id="delete-form-{{ $supplier->id }}" action="{{ route('intranet.suppliers.destroy', $supplier->id) }}" method="POST" style="margin: 0;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="button" class="btn btn-sm btn-danger" style="width: auto;" onclick="confirmDelete({{ $supplier->id }})">
                                                            <i class="voyager-trash"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>                                            
                                            
                                        </tr>

                                        @empty
                                       @if(isset($message))
                                           <tr>
                                            <td colspan="10" style="text-align: center; padding: 20px;">
                                              {{ $message }}
                                            </td>
                                           </tr>
                                       @endif

                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        <div class="pull-right">
                            {{ $suppliers->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('javascript')

     <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <script>
        document.getElementById("live-search").addEventListener("keypress", function(event) {
            if (event.key === "Enter") {
                this.form.submit();
            }
        });
    </script>



    <!-- Delete Confirmation -->
    <script>
        function confirmDelete(id) {
            Swal.fire({
                title: 'Êtes-vous sûr ?',
                text: "Cette action est irréversible !",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Oui, supprimer !',
                cancelButtonText: 'Annuler'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('delete-form-' + id).submit();
                }
            });
        }
    </script>
@stop
