@extends('intranet.layouts.app')
@section('content')
<style>
      .add_stage {
            max-width: 100%;
            width: 70%;
        }

        .deep_row {
            margin-left: 0px;
            padding-left: 0;
            padding-right: 0;
        }

        @media (max-width: 768px) {
            .add_stage {
                width: 100%;
            }
        }
</style>
    <div class="row">
        <div class="col-md-12 fcrse_2" style="padding-bottom: 30px;">
            <div class="value_content">
                <h4 class="">@lang('intranet.Stages')</h4>
            </div>
        </div>
        <div class="col-md-12 fcrse_2" style="padding-top: 0px;">
            <div class="row col-md-12" style="display: contents">
                <div class="my_courses_tabs" style="margin-top:0px !important;">
                    <ul class="nav nav-pills my_crse_nav" id="pills-tab" role="tablist">
                        @foreach ($years as $year)
                            <li class="nav-item">
                                <a class="nav-link @if ($loop->index == 0) active @endif"
                                    id="year{{ $year->id }}-tab" data-toggle="pill" href="#year{{ $year->id }}"
                                    role="tab" aria-controls="year{{ $year->id }}" aria-selected="true"
                                    style="font-size: 20px; font-weight: 600;"><i
                                        class="uil uil-book-alt"></i>{{ $year->designation }}</a>
                            </li>
                        @endforeach

                    </ul>
                    <div class="tab-content" id="pills-tabContent">
                        @foreach ($years as $year)
                            <div class="tab-pane @if ($loop->index == 0) fade show active @endif"
                                id="year{{ $year->id }}" role="tabpanel" style="padding:0 !important;">

                                <div class="table-responsive review_all120" >


                                    @php
                                        $stages = $year->stagesCompany;
                                        $stage_with_acceptation = count($stages->filter(function ($stage) {
                                            return $stage->teacher_acceptation == 1;
                                        }));
                                        $teacher = App\Teacher::where('cin', Auth::user()->cin)->first();
                                        if ($teacher && $teacher->max_supervising_nb) {
                                            $max_supervising_nb = $teacher->max_supervising_nb;
                                        } else {
                                            $max_supervising_nb = 5;
                                        }
                                    @endphp

                                    @if ($stages->count() > 0)
                                        <div class="table-responsive" style="margin-bottom:0;">

                                            <table id="stagesCompanies" class="table ucp-table">
                                                <thead class="thead-s">
                                                    <tr>
                                                        <th class="text-center" scope="col">@lang('intranet.Candidats')</th>
                                                        <th class="text-center">@lang('intranet.Entreprise')</th>
                                                        <th class="text-center" scope="col">@lang('intranet.Date début')</th>
                                                        <th class="text-center" scope="col">@lang('intranet.Date fin')</th>
                                                        <th class="text-center" scope="col">@lang('intranet.Sujet')</th>
                                                        <th class="text-center" scope="col">@lang('intranet.Documents')</th>
                                                        <th class="text-center" scope="col">@lang('intranet.Etat')</th>
                                                        <th class="text-center" scope="col">@lang('intranet.Action')</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($stages as $stage)
                                                        <tr>
                                                            <td class="text-center">
                                                                <ul>
                                                                    <li>- {{ $stage->candidat_1_name }}</li>
                                                                    @if ($stage->candidat_2_name)
                                                                        <li>- {{ $stage->candidat_2_name }}</li>
                                                                    @endif
                                                                    @if ($stage->candidat_3_name)
                                                                        <li>- {{ $stage->candidat_3_name }}</li>
                                                                    @endif
                                                                </ul>
                                                            </td>
                                                            <td class="text-center">{{ $stage->entreprise->designation }}</td>
                                                            <td class="text-center">{{ Carbon\Carbon::parse($stage->start)->format('d-m-Y') }}
                                                            </td>
                                                            <td class="text-center">{{ Carbon\Carbon::parse($stage->end)->format('d-m-Y') }}
                                                            </td>
                                                            <td class="text-center" style="width: 20%;">{{ $stage->sujet }}</td>
                                                            <td class="text-center" style="width: 20%;">
                                                                @if ($stage->appui_request && count(json_decode($stage->appui_request)) > 0)
                                                                    @php
                                                                        $file = json_decode($stage->appui_request)[0];
                                                                    @endphp
                                                                    <p><a href="{{ Voyager::image($file->download_link) }}" target="_blank"
                                                                        noreferrer rel="noopener" title="Détails"><i
                                                                            class="uil uil-download-alt"></i>@lang('intranet.Demande de stage')</a></p>
                                                                @endif
                                                                @if ($stage->company_request_sheet && count(json_decode($stage->company_request_sheet)) > 0)
                                                                    @php
                                                                        $file = json_decode($stage->company_request_sheet)[0];
                                                                    @endphp
                                                                    <p><a href="{{ Voyager::image($file->download_link) }}" target="_blank"
                                                                        noreferrer rel="noopener" title="Détails"><i
                                                                            class="uil uil-download-alt"></i>@lang('intranet.Fiche de réponse de stage')</a></p>
                                                                @endif
                                                                @if ($stage->assignment_file && count(json_decode($stage->assignment_file)) > 0)
                                                                @php
                                                                    $file = json_decode($stage->assignment_file)[0];
                                                                @endphp
                                                                <a href="{{ Voyager::image($file->download_link) }}" target="_blank"
                                                                    noreferrer rel="noopener" title="Détails"><i
                                                                        class="uil uil-download-alt"></i>@lang('intranet.Affectation de stage')</a>
                                                                @endif
                                                                @if ($stage->convention_file && count(json_decode($stage->convention_file)) > 0)
                                                                    @php
                                                                        $file = json_decode($stage->convention_file)[0];
                                                                    @endphp
                                                                    <p> <a href="{{ Voyager::image($file->download_link) }}" target="_blank"
                                                                        noreferrer rel="noopener" title="Détails"><i
                                                                            class="uil uil-download-alt"></i>@lang('intranet.Covention de stage')</a></p>
                                                                @endif
                                                            </td>
                                                            <td class="text-center">
                                                                <b class="course_active" style="display: flex;justify-content: center; padding-bottom:10px;">
                                                                    @switch($stage->etat)
                                                                        @case(1)
                                                                            @lang('intranet.etat_stage_1')
                                                                        @break

                                                                        @case(2)
                                                                            @lang('intranet.etat_stage_2')
                                                                        @break

                                                                        @case(3)
                                                                            @lang('intranet.etat_stage_3')
                                                                        @break

                                                                        @case(4)
                                                                            @lang('intranet.etat_stage_4')
                                                                        @break

                                                                        @case(5)
                                                                            @lang('intranet.etat_stage_5')
                                                                        @break

                                                                        @case(6)
                                                                            @lang('intranet.etat_stage_6')
                                                                        @break

                                                                        @case(7)
                                                                            @lang('intranet.etat_stage_7')
                                                                        @break

                                                                        @case(8)
                                                                            @lang('intranet.etat_stage_8')
                                                                        @break
                                                                    @endswitch
                                                                </b>
                                                                @if ($stage->validation == 1)
                                                                    <span class="badge badge-success text-center"
                                                                        style="font-size: 12px">@lang('intranet.Stage validée')</span>
                                                                @elseif ($stage->company_validation == 1)
                                                                    <span class="badge badge-danger text-center" style="font-size: 12px">@lang('intranet.Stage validé en attente de soutenance')</span>
                                                                @elseif ($stage->acceptation == 1)
                                                                    <span class="badge badge-success text-center" style="font-size: 12px">@lang('intranet.Stage en cours')</span>
                                                                @elseif ($stage->company_acceptation == 1)
                                                                    <span class="badge badge-success text-center" style="font-size: 12px">@lang('intranet.En attente d’affectation par la direction des stages')</span>
                                                                @else
                                                                   {{-- <form action="{{ route('CompanyAcceptStage') }}" method="POST">
                                                                    @csrf
                                                                    <input type="text" name="stage_id" value="{{ $stage->id }}" hidden>
                                                                        <button class="acceptation-stage">@lang('intranet.Accepter')</button>
                                                                    </form> --}}
                                                                     <a class="acceptation-stage" data-toggle="modal" data-target="#updateStageStudent{{ $stage->id }}" style="text-decoration: none !important;">@lang('intranet.Accepter')</a>

                                                                         {{-- modal update status  --}}
                                                                        <div class="modal fade bd-example-modal-lg"
                                                                        id="updateStageStudent{{ $stage->id }}" tabindex="-1" role="dialog"
                                                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                        <div class="modal-dialog add_stage" role="document">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header">
                                                                                    <h5 class="modal-title text-center" id="exampleModalLabel">
                                                                                        @lang('intranet.Modifier')</h5>
                                                                                    <button type="button" class="close" data-dismiss="modal"
                                                                                        aria-label="Close">
                                                                                        <span aria-hidden="true">&times;</span>
                                                                                    </button>
                                                                                </div>
                                                                                <form action="{{ route('CompanyAcceptStage') }}" method="POST" enctype="multipart/form-data">
                                                                                    @csrf
                                                                                    <input type="hidden" name="stage_id" value="{{ $stage->id }}">
                                                                                    <div class="modal-body row">
                                                                                        <!-- form fields : end(date) , encadrant_id(select) , company(select) -->
                                                                                        <input type="text" name="stage_type_id" value="{{ $stage->id }}" hidden>
                                                                                        <div class="form-group col-12">
                                                                                            <label> @lang('intranet.Type de stage') </label>
                                                                                            <div class="input-group mb-3 col-12">
                                                                                                <select class="form-control" name="#"
                                                                                                    id="type_stage{{ $stage->id }}" required
                                                                                                    disabled>

                                                                                                    @foreach ($stage_types as $type)
                                                                                                        <option value="{{ $type->id }}"
                                                                                                            @if ($stage->stage_type_id == $type->id) selected @endif>
                                                                                                            {{ $type->designation_fr }}</option>
                                                                                                    @endforeach
                                                                                                </select>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="form-group col-6">
                                                                                            <label for="title">@lang('intranet.Sujet du stage')</label>
                                                                                            <input type="text" class="form-control" name="sujet"
                                                                                                value="{{ $stage->sujet }}"
                                                                                                placeholder="@lang('intranet.Sujet du stage')" required>
                                                                                        </div>
                                                                                        <div class="form-group col-6">
                                                                                            <label for="title">@lang('intranet.Domaine')</label>
                                                                                            <input type="text" class="form-control" name="domaine"
                                                                                                placeholder="@lang('intranet.Domaine')" required
                                                                                                value="{{ $stage->domaine }}">
                                                                                        </div>
                                                                                        <div class="form-group col-6">
                                                                                            <label for="title">@lang("intranet.Nom de l'encadrant")</label>
                                                                                            <input type="text" class="form-control" name="responsible_name"
                                                                                                placeholder="@lang("intranet.Nom de l'encadrant professionnel")" required
                                                                                                value="{{ $stage->responsible_name ?? Auth::user()->name }}">
                                                                                        </div>
                                                                                        <div class="form-group col-6">
                                                                                            <label for="title">@lang("intranet.Email de l'encadrant")</label>
                                                                                            <input type="text" class="form-control" name="responsible_email"
                                                                                                placeholder="@lang("intranet.Email de l'encadrant professionnel")" required
                                                                                                value="{{$stage->responsible_email ?? Auth::user()->email }}">
                                                                                        </div>
                                                                                        {{-- <div class="form-group col-12">
                                                                                            <label for="startDate">@lang('intranet.Description')</label>
                                                                                            <textarea class="form-control" name="description" placeholder="@lang('intranet.Description')" rows="4" required>{!! $stage->description !!}</textarea>
                                                                                        </div> --}}
                                                                                        <div class="form-group col-12">
                                                                                            <label for="nachd">@lang('intranet.Description')</label>
                                                                                            <textarea name="description" id="nachd" class="form-control" placeholder="@lang('intranet.Description')" required>{!! $stage->description !!}</textarea>
                                                                                        </div>
                                                                                        <div class="form-group col-6">
                                                                                            <label for="title">@lang('intranet.Date de début')</label>
                                                                                            <input type="date" class="form-control" name="start"
                                                                                                id="startDate{{ $stage->id }}"
                                                                                                placeholder="@lang('intranet.Date de début')" required
                                                                                                value="{{ Carbon\Carbon::parse($stage->start)->format('Y-m-d') }}">
                                                                                        </div>
                                                                                        <div class="form-group col-6">
                                                                                            <label for="endDate">@lang('intranet.Date de fin')</label>
                                                                                            <input type="date" id="endDate{{ $stage->id }}"
                                                                                                class="form-control" name="end"
                                                                                                placeholder="@lang('intranet.Date de fin')" required
                                                                                                value="{{ Carbon\Carbon::parse($stage->end)->format('Y-m-d') }}">
                                                                                        </div>
                                                                                        <div class="form-group col-12">
                                                                                            <p id="messageValidationDate{{ $stage->id }}"></p>
                                                                                        </div>

                                                                                        <div class="col-lg-12 col-md-12">
                                                                                            <label for="file5">@lang('intranet.Ajoutez votre signature électronique')</label>
                                                                                            <div class="image-upload-wrap">
                                                                                                <input class="file-upload-input" id="filerectStudent"
                                                                                                    type="file" name="signature" onchange="upload()">
                                                                                                <div class="drag-text">
                                                                                                    <i class="fas fa-cloud-upload-alt"></i>
                                                                                                    <h4>@lang('intranet.Sélectionner votre fichier')</h4>
                                                                                                    <p id="showFile"></p>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        {{-- <div class="form-group col-12" id="encadrant_section{{$stage->id}}"
                                                                                                style="display: none;">
                                                                                                <label> @lang('intranet.encadrant') </label>
                                                                                                <div class="input-group mb-3 col-12">
                                                                                                    <div class="input-group-prepend">
                                                                                                        <span class="input-group-text" id="basic-addon1"
                                                                                                            style="padding: 5px 10px !important;"><i
                                                                                                                class="uil uil-search"></i></span>
                                                                                                    </div>
                                                                                                    <input type="text" class="form-control"
                                                                                                        placeholder="@lang('intranet.Tapez le nom')"
                                                                                                        aria-label="Username"
                                                                                                        aria-describedby="basic-addon1" id="search_user{{$stage->id}}" onchange="search({{$stage->id}})">
                                                                                                    <select class="form-control" id="encadrant{{$stage->id}}"
                                                                                                        name="encadrant_id">
                                                                                                        @foreach ($teachers as $teacher)
                                                                                                        <option value="{{ $teacher->id }}" @if ($stage->encadrant_id == $teacher->id) selected @endif>{{ $teacher->name }}</option>  @endforeach
                                                                                                    </select>
                                                                                                </div>
                                                                                            </div> --}}
                                                                                    </div>
                                                                                    <div class="modal-footer">
                                                                                        <button type="button" class="btn btn-secondary"
                                                                                            data-dismiss="modal">@lang('intranet.Annuler')</button>
                                                                                        <button type="submit" class="btn btn-primary"
                                                                                            onclick="validateDates({{ $stage->id }})">@lang('intranet.Enregistrer')</button>
                                                                                    </div>

                                                                                </form>
                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                    {{-- / modal update status --}}
                                                                @endif
                                                            </td>
                                                            <td class="text-center">
                                                                <a href="{{ route('stage_details', ['id' => $stage->id]) }}" title="Détails"
                                                                    class="gray-s"><i class="uil uil-eye"></i></a>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>


                                        </div>
                                    @else
                                        @include('intranet.layouts.empty_status', [
                                            'message' => 'Aucune données trouvées',
                                        ])
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
         function upload() {
            var file = document.getElementById("filerectStudent").files[0];
            document.getElementById("showFile").innerHTML = file.name + "(" + (file.size / 1024).toFixed('3') +
                " Ko )";
        }
        tinymce.init({
            selector: '#nachd',
            license_key: 'gpl',

        });
    </script>
@endsection
@section('specific_js')
<script src="{{ asset('public/data_table/jquery.dataTables.min.js') }}"></script>
<script>
    $(document).ready(function () {
        $('#stagesCompanies').DataTable({
            layout: {
                topStart: {
                    buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
                }
            }
        });
    });
</script>
@endsection
