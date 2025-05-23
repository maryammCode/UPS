@extends('intranet.layouts.app')
@section('content')
    @if (Session::has('success'))
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@7"></script>
        <script type="text/javascript">
            var msg = '{{ session('success') }}';
            swal({
                text: msg,
                title: 'Merci',
                type: 'success',
                toastr: true,
                timer: 3000,
                showConfirmButton: false
            })
        </script>
    @endif
    @if (Session::has('error'))
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@7"></script>
        <script type="text/javascript">
            var msg = '{{ session('error') }}';
            swal({
                text: msg,
                title: 'réessayer SVP',
                type: 'warning',
                toastr: true,
                timer: 3000,
                showConfirmButton: false
            })
            //     swal(
            //     '',
            //     msg,
            //     'warning'
            //   )
        </script>
    @endif
    @if (Session::has('warning'))
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@7"></script>
        <script type="text/javascript">
            var msg = '{{ session('warning') }}';
            swal(
                msg,
                'réessayer SVP',
                'danger'
            )
        </script>
    @endif
    <style>
        .row>[class*="col-"] {
            margin-bottom: 15px
        }

        hr {
            width: 100%;
        }

        .add_stage {
            max-width: 100%;
            width: 55%;
        }



        @media (max-width: 768px) {
            .add_stage {
                width: 100%;
            }
        }
    </style>
    <div class="row">
        <div class="col-md-12 fcrse_2" style="padding-bottom: 30px;">
            <div class="value_content stage_header">
                <h4 class="">@lang("intranet.Offres d'emploi et stages")</h4>
                <button class="btn btn-primary " data-toggle="modal" data-target="#exampleModal"> + Ajouter </button>
            </div>
        </div>
        @if ($offres->count() > 0)
            <div class="_215td5 col-md-12" style="padding-top: 10px;">
                <div class="row">
                    <table class="table ucp-table">
                        <thead class="thead-s">
                            <tr>
                                <th class="text-center specific_th" scope="col">#</th>
                                <th class="cell-ta specific_th" scope="col">@lang('intranet.Désignation')
                                </th>
                                <th class="cell-ta specific_th" scope="col">@lang('intranet.Type')
                                </th>
                                {{-- <th class="cell-ta specific_th" scope="col">@lang('intranet.Fichier')
                                </th> --}}
                                <th class="text-center specific_th" scope="col">
                                    @lang("intranet.Date d'ajout")</th>
                                <th class="text-center specific_th" scope="col">
                                    @lang('intranet.Statut')</th>
                                <th class="text-center specific_th" scope="col">
                                    @lang('intranet.Action')</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach (@$offres as $offre)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td class="cell-ta">{{ $offre->designation_fr }} </td>
                                    <td class="text-center"> {{ $offre->type }} </td>
                                    {{-- <td class="text-center">
                                         @if ($offre->cover)
                                            @php
                                                $files = json_decode($offre->files);

                                            @endphp
                                            @if (count(@$files) > 0)
                                                @foreach ($files as $file)
                                                    <a href="{{ Voyager::image($file->download_link) }}"
                                                        download="{{ $file->download_link }}"
                                                        target="_blank" style="color:blue;font-size:14px;">{{ $file->original_name }}  <i class="uil uil-download-alt"></i></a><br>
                                                @endforeach
                                            @endif
                                        @endif
                                    </td> --}}
                                    <td class="text-center">
                                        {{ Carbon\Carbon::parse($offre->expiration_date)->format('d-m-Y') }} /
                                        {{ Carbon\Carbon::parse($offre->expiration_date)->format('H:i') }}
                                    </td>
                                    <td class="text-center">
                                        @if ($offre->publier == 1)
                                            <span class="badge badge-primary">@lang('intranet.Publier')</span>
                                        @else
                                            <span class="badge badge-secondary">@lang('intranet.Non publier')</span>
                                        @endif
                                    </td>
                                    <td class="d-flex justify-content-center ">
                                        {{-- <div>
                                             <a title="Voir" href="{{route('render_details', ['id' => $offre->id])}}">
                                                <i class="uil uil-eye" style="font-size: 20px;"></i>
                                            </a>
                                        </div> --}}
                                        <div>
                                            <button title="Modifier" class="gray-s pointer" data-toggle="modal"
                                                style="color: orange;border: none; background-color: #fff;"
                                                data-target="#update_Offre{{ $offre->id }}"><i class="uil uil-edit-alt"
                                                    style="font-size:20px;"></i>
                                            </button>
                                        </div>
                                        <div>
                                            <form id="f{{ $offre->id }}"
                                                action="{{ route('delete_offre', ['id' => $offre->id]) }}" method="POST">
                                                @csrf
                                                {{ method_field('DELETE') }}
                                                <button title="Supprimer" type="button" class="gray-s pointer"
                                                    onclick="sureDeleteOffres({{ $offre->id }})"
                                                    style="color: crimson;border: none;  background-color: #fff;"><i
                                                        class="uil uil-trash-alt" style="font-size: 20px;"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                {{-- modal update compte rendu start --}}
                                <div class="modal fade" id="update_Offre{{ $offre->id }}" tabindex="-1"
                                    aria-labelledby="lectureModalLabel" aria-hidden="true"
                                    style="background-color:#3e3e3e7d;">
                                    <div class="modal-dialog modal-lg" style="margin-top: 212px;">
                                        <form action="{{ route('updateOffre', ['id' => $offre->id]) }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="modal-content">
                                                <div class="modal-header" style="padding-bottom: 0px;">
                                                    <h5 class="modal-title" id="lectureModalLabel">@lang('intranet.Modifier')
                                                    </h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body" style="padding-top: 0px;">
                                                    <div class="new-section-block">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="new-section">
                                                                    <div class="form_group">
                                                                        <label for="">@lang('intranet.Types')</label>
                                                                        <div class="ui left icon input swdh11 swdh19">
                                                                            <select class="form-control mt-10"
                                                                                name="type">
                                                                                <option value="Offres de stage"
                                                                                    @if ($offre->type == 'Offres de stage') selected @endif>
                                                                                    Offres de stage</option>
                                                                                <option value="Offre d'emploi"
                                                                                    @if ($offre->type == 'Offre d\'emploi') selected @endif>
                                                                                    Offre d'emploi</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-12">
                                                                <div class="new-section">
                                                                    <div class="form_group">
                                                                        <label class="label25">@lang('intranet.Désignation')</label>
                                                                        <input class="form_input_1" type="text"
                                                                            name="designation_fr"
                                                                            value="{{ $offre->designation_fr }}"
                                                                            placeholder="@lang('intranet.Titre')" />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <div class="new-section">
                                                                    <div class="form_group">
                                                                        <label class="label25">@lang('intranet.Email')</label>
                                                                        <input class="form_input_1" type="email"
                                                                            name="email" value="{{ $offre->email }}"
                                                                            placeholder="@lang('intranet.Email')" />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <div class="new-section">
                                                                    <div class="form_group">
                                                                        <label class="label25">@lang("intranet.Date d'expiration")</label>
                                                                        <input class="form_input_1" type="datetime-local"
                                                                            value="{{ $offre->expiration_date }}"
                                                                            name="expiration_date" />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <div class="new-section">
                                                                    <div class="form_group">
                                                                        <label class="label25">@lang('intranet.Description')</label>
                                                                        <textarea class="form_input_1" rows="5" style="height: unset;" name="description_fr"
                                                                            placeholder="@lang('intranet.Description')">{{ $offre->description_fr }}</textarea>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-12">
                                                                <div class="new-section">
                                                                    <div class="form_group">
                                                                        <label class="label25">@lang('intranet.Couverture')</label>
                                                                        <input class="form_input_1" type="file"
                                                                            name="cover" />

                                                                        @if ($offre->cover)
                                                                            <img src="{{ Voyager::image($offre->cover) }}"
                                                                                alt="cover" height="150">
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="ui toggle checkbox _1457s2"
                                                                    style="padding-left: 15px;">
                                                                    <input type="checkbox" name="mode"
                                                                        @if ($offre->mode == 1) checked="true" @endif>
                                                                    <label>@lang('intranet.Privé')</label>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="main-btn cancel" data-dismiss="modal">
                                                        @lang('intranet.Fermer')
                                                    </button>
                                                    <button type="submit" class="main-btn">@lang('intranet.Soumettre')</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                {{-- modal update compte rendu end --}}
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @else
            @include('intranet.layouts.empty_status', [
                'message' => 'Aucune données trouvées',
            ])
        @endif

    </div>

    {{-- modal add offre start --}}
    <div class="modal fade bd-example-modal-lg" id="exampleModal" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog add_stage" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-center" id="exampleModalLabel">@lang('intranet.Ajouter votre offre')</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('addOffers') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body ">
                        <div class="ui search focus">
                            <label for="">@lang('intranet.Types')</label>
                            <div class="ui form swdh30">
                                <select class="ui hj145 dropdown cntry152 prompt srch_explore mt-10" name="type">
                                    <option value="Offres de stage">Offres de stage</option>
                                    <option value="Offre d'emploi">Offre d'emploi</option>
                                </select>
                            </div>
                        </div>
                        <input type="text" name="entreprise_id" value="{{ Auth::user()->entreprise_id }}" hidden>
                        <div class="ui search focus mt-10">
                            <label for="">@lang('intranet.Désignation')</label>
                            <div class="ui form swdh30">
                                <input type="text" name="designation_fr" placeholder="@lang('intranet.Désignation')"
                                    class="form-control">
                            </div>
                        </div>
                        {{-- <div class="ui search focus mt-10">
                            <label for="">@lang('intranet.Téléphone')</label>
                            <div class="ui left icon input swdh11 swdh19">
                                <input type="text" name="phone" placeholder="@lang('intranet.Téléphone')" class="form-control">
                            </div>
                        </div> --}}
                        {{-- <div class="ui search focus mt-10">
                            <label for="">@lang('intranet.Adresse')</label>
                            <div class="ui left icon input swdh11 swdh19">
                                <input type="text" name="address" placeholder="@lang('intranet.Adresse')" class="form-control">
                            </div>
                        </div> --}}
                        {{-- <div class="ui search focus mt-10">
                            <label for="">@lang('intranet.Responsable')</label>
                            <div class="ui left icon input swdh11 swdh19">
                                <input type="text" name="responsible" placeholder="@lang('intranet.Responsable')" class="form-control">
                            </div>
                        </div> --}}
                        <div class="ui search focus mt-10">
                            <label for="">@lang('intranet.Email')</label>
                            <div class="ui form swdh30">
                                <input type="email" name="email" placeholder="@lang('intranet.Email')"
                                    class="form-control specific_input">
                            </div>
                        </div>
                        <div class="ui search focus mt-10">
                            <label for="expiration_date">@lang("intranet.Date d'expiration")</label>
                            <div class="ui form swdh30">
                                <input type="datetime-local" name="expiration_date" placeholder="@lang("intranet.Date d'expiration")"
                                    class="form-control">
                            </div>
                        </div>
                        <div class="ui search focus mt-30">
                            <label for="">@lang('intranet.Description')</label>
                            <div class="ui form swdh30">
                                <div class="field">
                                    <textarea rows="6" name="description_fr" id="id_about" placeholder="@lang('intranet.Description')"></textarea>
                                </div>
                            </div>
                        </div>
                        {{-- <div class="form-group1 mt-30">
                            <label for="file5">@lang('intranet.Ajouter une couverture (facultative)')</label>
                            <div class="image-upload-wrap">
                                <input class="file-upload-input" id="file5" type="file" name="cover"
                                    onchange="readURL(this);" accept="image/*" onchange="FileOfferUpload()">
                                <div class="drag-text">
                                    <i class="fas fa-cloud-upload-alt"></i>
                                    <h4>@lang('intranet.Sélectionnez vos couverture')</h4>

                                    <p id="showFileUploaded"></p>
                                </div>
                            </div>
                        </div> --}}
                        <div class="form-group1 mt-30">
                            <div class="form_group">
                                <label class="label25">@lang('intranet.Ajouter une couverture (facultative)')</label>
                                <input class="form_input_1" type="file" name="cover" />
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="ui toggle checkbox _1457s2" style="padding-left: 15px;">
                                <input type="checkbox" name="mode" checked="">
                                <label>@lang('intranet.Privé')</label>
                            </div>
                        </div>

                        {{-- <button class="save_btn color-btn-ups" type="submit">@lang('intranet.Envoyer vos avis')</button> --}}
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                        <button type="submit" class="btn btn-primary">Sauvegarder</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- modal add offre end --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@7"></script>
    <script>
        function sureDeleteOffres(id) {
            swal({
                    title: "êtes-vous sûr?",
                    text: "Une fois supprimé, vous ne serez pas en mesure de récupérer ce fichier imaginaire!",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonText: "Supprimer",
                    cancelButtonText: "Annuler",
                })
                .then((willDelete) => {
                    console.log(willDelete)
                    if (willDelete.value) {
                        document.getElementById('f' + id).submit()
                    }
                });
        }

        function FileOfferUpload() {
            var file = document.getElementById("file5").files[0];
            document.getElementById("showFileUploaded").innerHTML = file.name + "(" + (file.size / 1024).toFixed('3') +
                " Ko )";
        }
    </script>

@endsection
