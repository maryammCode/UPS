@extends('intranet.layouts.app')
@section('content')

    <style>
        .row>[class*="col-"] {
            margin-bottom: 15px
        }

        hr {
            width: 100%;
        }

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
            <div class="value_content stage_header">
                <h4 class="">@lang('intranet.Stages')</h4>
                @if ($stage_types->count() > 0)
                    <button class="btn btn-primary " data-toggle="modal" data-target="#addStageStudent"> + Affecter </button>

                    <a data-toggle="modal" data-target="#demande" class="btn btn-info" style="position:absolute;right: 90px; top: 0; margin: 0 auto;">
                        <div>@lang('intranet.Générer demande de stage')</div>
                    </a>
                @endif
            </div>

        </div>
        @if ($stages->count() > 0)
            <div class="_215td5 col-md-12" style="padding-top: 10px;">
                <div class="row">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="table-responsive">
                        <table class="table ucp-table">
                            <thead class="thead-s">
                                <tr>
                                    <th class="text-center" scope="col">@lang('intranet.AU')</th>
                                    <th class="text-center" scope="col">@lang('intranet.Type de stage')</th>
                                    <th class="text-center" scope="col">@lang('intranet.Candidats')</th>
                                    <th class="text-center" scope="col">@lang('intranet.Entreprise')</th>
                                    <th class="text-center" scope="col">@lang('intranet.Sujet')</th>
                                    <th class="text-center" scope="col">@lang('intranet.Etat')</th>
                                    <th class="text-center" scope="col">@lang('intranet.Action')</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($stages as $stage)
                                    <tr>
                                        <td class="text-center">
                                            {{ @$stage->year->designation }}
                                        </td>
                                        <td class="text-center">
                                            {{ @$stage->stageType->designation_fr }}
                                        </td>
                                        <td class="text-center">
                                            <ul>
                                                <li>
                                                    - {{ $stage->candidat_1_name }}
                                                    @if (auth()->user()->id == $stage->candidat_1_id)
                                                        <span style="color: red">(Vous)</span>
                                                    @endif
                                                </li>
                                                @if ($stage->candidat_2_name)
                                                    <li>- {{ $stage->candidat_2_name }}</li>
                                                    @if (auth()->user()->id == $stage->candidat_2_id)
                                                        <span style="color: red">(Vous)</span>
                                                    @endif
                                                @endif
                                                @if ($stage->candidat_3_name)
                                                    <li>- {{ $stage->candidat_3_name }}</li>
                                                    @if (auth()->user()->id == $stage->candidat_3_id)
                                                        <span style="color: red">(Vous)</span>
                                                    @endif
                                                @endif
                                            </ul>
                                        </td>
                                        <td class="text-center">
                                            {{ @$stage->entreprise->designation }} <br>
                                            @if ( @$stage->encadrant->name)
                                                @lang('intranet.Encadrant(e)') : {{ @$stage->encadrant->name }}
                                            @endif
                                        </td>

                                        <td class="text-center" style="width: 20%;">
                                            {{ $stage->sujet }} <br>
                                            @if ($stage->start )
                                                @lang('intranet.D.Début') : {{ Carbon\Carbon::parse($stage->start)->format('d-m-Y') }}
                                            @endif
                                        </td>
                                        <td class="text-center">

                                            @if ($stage->validation == 1)
                                                <span class="badge badge-success text-center"
                                                    style="font-size: 12px">@lang('intranet.Stage validée')</span>
                                            @elseif ($stage->acceptation == 1)
                                                <span class="badge badge-success text-center"
                                                    style="font-size: 12px">@lang('intranet.Stage en cours')</span>
                                            @else
                                                <span class="badge badge-success text-center"
                                                    style="font-size: 12px">@lang('intranet.Stage non affecté')</span>
                                            @endif
                                        </td>
                                        <td class="text-center d-flex justify-content-center ">
                                            <a href="{{ route('stage_details', ['id' => $stage->id]) }}" title="Voir"
                                                class="gray-s"><i class="uil uil-eye" style="color: #d58200"></i></a>

                                            @if ($stage->etat == 1)
                                                <a data-toggle="modal" data-target="#updateStageStudent{{ $stage->id }}"
                                                    title="Modifier" onclick="onChangeTypeStage({{ $stage->id }} , {{$stage->stageType}})"
                                                    class="gray-s"><i class="uil uil-pen" style="color: blue"></i></a>
                                                {{-- <form action="">
                                                    <botton title="Supprimer" class="gray-s"><i class="uil uil-trash"
                                                            style="color: red"></i></botton>
                                                </form> --}}
                                                @if (@$stage->candidat_1_id == auth()->user()->id)
                                                    <form id="stageStudent{{ $stage->id }}"
                                                        action="{{ route('deleteStageStudent', [$stage->id]) }}"
                                                        method="POST">
                                                        @csrf
                                                        {{-- {{ method_field('DELETE') }} --}}
                                                        <button title="Supprimer" type="button" class="gray-s"
                                                            style="background: none ;border: none;"
                                                            onclick="sureDeleteStage({{ $stage->id }})"> <i
                                                                class="uil uil-trash" style="color: red"></i></button>
                                                    </form>
                                                @endif
                                            @endif
                                        </td>
                                        {{-- modal update satge student  --}}
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
                                                    <form action="{{ route('create_stage') }}" method="POST">
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


                                                                            <option value="{{ @$stage->stageType->id }}">
                                                                                {{ $stage->stageType->designation_fr }}</option>

                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="form-group col-12"
                                                                id="candidate_2{{ $stage->id }}"
                                                                style="display: none">
                                                                <label> @lang('intranet.Candidats') </label>
                                                                <div class="input-group mb-3 col-12">
                                                                    <select class="form-control" name="candidat_2_cin">
                                                                        <option disabled selected>@lang('intranet.Choisir')
                                                                        </option>
                                                                        @foreach ($candidats as $candidat)
                                                                            <option value="{{ $candidat->cin }}"
                                                                                @if ($stage->candidat_2_id == $candidat->id) selected @endif>
                                                                                {{ $candidat->name }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="form-group col-12"
                                                                id="candidate_3{{ $stage->id }}"
                                                                style="display: none">
                                                                <label> @lang('intranet.Candidats') </label>
                                                                <div class="input-group mb-3 col-12">
                                                                    <select class="form-control" name="candidat_3_cin">
                                                                        <option disabled selected>@lang('intranet.Choisir')
                                                                        </option>
                                                                        @foreach ($candidats as $candidat)
                                                                            <option value="{{ $candidat->cin }}"
                                                                                @if ($stage->candidat_3_id == $candidat->id) selected @endif>
                                                                                {{ $candidat->name }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="form-group col-12">
                                                                <label for="title">@lang('intranet.Sujet du stage')</label>
                                                                <input type="text" class="form-control" name="sujet"
                                                                    value="{{ $stage->sujet }}"
                                                                    placeholder="@lang('intranet.Sujet du stage')" required>
                                                            </div>
                                                            <div class="form-group col-12">
                                                                <label for="title">@lang('intranet.Domaine')</label>
                                                                <input type="text" class="form-control" name="domaine"
                                                                    placeholder="@lang('intranet.Domaine')" required
                                                                    value="{{ $stage->domaine }}">
                                                            </div>
                                                            <div class="form-group col-12">
                                                                <label for="startDate">@lang('intranet.Description')</label>
                                                                <textarea class="form-control" name="description" placeholder="@lang('intranet.Description')" rows="4" required>{!! $stage->description !!}</textarea>
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
                                                             <div class="form-group col-12" id="encadrant_section{{$stage->id}}"
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
                                                                </div>
                                                            <div id="company_section{{$stage->id}}" style="display: none"
                                                                    class="col-12">
                                                                    <hr>
                                                                    <div class="form-group col-12">
                                                                        <label> @lang('intranet.Entreprise') </label> &nbsp;
                                                                        <label class="switch">
                                                                            <input type="checkbox" id="other_company_checkbox{{$stage->id}}"
                                                                                value="1" name="is_other_company" onchange="otherCompanyHandler({{$stage->id}})">
                                                                            <span></span>
                                                                            <label for="other_company_checkbox{{$stage->id}}"
                                                                                class="lbl-quiz"> @lang('intranet.Autre ?')</label>
                                                                        </label>
                                                                        {{-- <label class="switch" style="float: right;">
                                                                            <input type="checkbox"
                                                                                id="other_company_user_checkbox{{$stage->id}}" onChange="otherCompanyUserHandler({{$stage->id}})"
                                                                                value="1" name="is_other_company_user">
                                                                            <span></span>
                                                                            <label for="other_company_user_checkbox{{$stage->id}}"
                                                                                class="lbl-quiz"> @lang('intranet.Encadrant non trouvé?')</label>
                                                                        </label> --}}
                                                                        <div class="input-group mb-3 col-12"
                                                                            id="company_search_zone">
                                                                            <div class="input-group-prepend">
                                                                                <span class="input-group-text"
                                                                                    id="basic-addon1"
                                                                                    style="padding: 5px 10px !important;"><i
                                                                                        class="uil uil-search"></i></span>
                                                                            </div>
                                                                            <input type="text" class="form-control"
                                                                                placeholder="@lang('intranet.Tapez le nom')"
                                                                                aria-label="Username"
                                                                                aria-describedby="basic-addon1"
                                                                                onkeyup="searchCompany({{$stage->id}})"
                                                                                id="search_company{{$stage->id}}">
                                                                            <select class="form-control" id="company{{$stage->id}}"
                                                                                name="entreprise_id">


                                                                            </select>
                 {{--                                                            <select class="form-control" id="company_users{{$stage->id}}"
                                                                                name="company_responsible_id">


                                                                            </select> --}}
                                                                        </div>


                                                                    </div>





                                                                    <div class="row col-12 deep_row" id="company_new_zone{{$stage->id}}"
                                                                        style="display: none;">
                                                                        <div class="form-group col-6">
                                                                            <label
                                                                                for="company_designation">@lang('intranet.Nom de la société')</label>
                                                                            <input type="text" class="form-control"
                                                                                id="company_designation{{$stage->id}}"
                                                                                name="company_designation">
                                                                        </div>
                                                                        <div class="form-group col-6">
                                                                            <label
                                                                                for="company_email{{$stage->id}}">@lang('intranet.Email')</label>
                                                                            <input type="text" class="form-control"
                                                                                id="company_email{{$stage->id}}" name="company_email">
                                                                        </div>
                                                                        <div class="form-group col-6">
                                                                            <label
                                                                                for="company_phone{{$stage->id}}">@lang('intranet.Phone')</label>
                                                                            <input type="text" class="form-control"
                                                                                id="company_phone{{$stage->id}}" name="company_phone">
                                                                        </div>
                                                                        <div class="form-group col-6">
                                                                            <label
                                                                                for="company_website{{$stage->id}}">@lang('intranet.Site web')</label>
                                                                            <input type="text" class="form-control"
                                                                                id="company_website{{$stage->id}}" name="company_website">
                                                                        </div>
                                                                    </div>
                                                                    <div class="row col-12 deep_row"
                                                                        id="company_new_responsible_zone{{$stage->id}}"
                                                                       >
                                                                        <div class="form-group col-6">
                                                                            <label
                                                                                for="company_user_nam{{$stage->id}}e">@lang('intranet.EncadrantProfessionnel')</label>
                                                                            <input type="text" class="form-control"
                                                                                id="company_user_name{{$stage->id}}"
                                                                                name="company_user_name">
                                                                        </div>
                                                                        <div class="form-group col-6">
                                                                            <label
                                                                                for="company_user_email{{$stage->id}}">@lang('intranet.EmailEncadrantProfessionnel')</label>
                                                                            <input type="text" class="form-control"
                                                                                id="company_user_email{{$stage->id}}"
                                                                                name="company_user_email">
                                                                        </div>
                                                                    </div>

                                                                </div>

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
                                        {{-- / modal update stage student --}}
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        @else
            @include('intranet.layouts.empty_status', [
                'message' => 'Aucune données trouvées',
            ])
        @endif

    </div>

{{-- modal add stage student --}}
    <div class="modal fade bd-example-modal-lg" id="addStageStudent" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog add_stage" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-center" id="exampleModalLabel">@lang('intranet.Déposer Votre Stage')</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('create_stage') }}" method="POST">
                    @csrf
                    <div class="modal-body row">
                        <!-- form fields : end(date) , encadrant_id(select) , company(select) -->
                        <div class="form-group col-12">
                            <label> @lang('intranet.AU') </label>
                            <div class="input-group mb-3 col-12">
                                <select class="form-control" name="year_id" id="year" required>
                                    <option disabled selected>@lang('intranet.Choisir')</option>
                                    @foreach ($years as $year)
                                        <option value="{{ $year->id }}">{{ $year->designation }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group col-12">
                            <label> @lang('intranet.Type de stage') </label>
                            <div class="input-group mb-3 col-12">
                                <select class="form-control" name="stage_type_id" id="type_stage" required
                                    onchange="onChangeTypeStage()">
                                    <option disabled selected>@lang('intranet.Choisir')</option>
                                    @foreach ($stage_types as $type)
                                        <option value="{{ $type->id }}">{{ $type->designation_fr }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group col-12" id="candidate_2" style="display: none">
                            <label> @lang('intranet.Candidats') </label>
                            <div class="input-group mb-3 col-12">
                                <select class="form-control" name="candidat_2_cin">
                                    <option disabled selected>@lang('intranet.Choisir')</option>
                                    @foreach ($candidats as $candidat)
                                        <option value="{{ $candidat->cin }}">{{ $candidat->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group col-12" id="candidate_3" style="display: none">
                            <label> @lang('intranet.Candidats') </label>
                            <div class="input-group mb-3 col-12">
                                <select class="form-control" name="candidat_3_cin">
                                    <option disabled selected>@lang('intranet.Choisir')</option>
                                    @foreach ($candidats as $candidat)
                                        <option value="{{ $candidat->cin }}">{{ $candidat->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group col-12">
                            <label for="title">@lang('intranet.Sujet du stage')</label>
                            <input type="text" class="form-control" name="sujet" placeholder="@lang('intranet.Sujet du stage')"
                                required>
                        </div>
                        <div class="form-group col-12">
                            <label for="title">@lang('intranet.Domaine')</label>
                            <input type="text" class="form-control" name="domaine" placeholder="@lang('intranet.Domaine')"
                                required>
                        </div>
                        <div class="form-group col-12">
                            <label>@lang('intranet.Description')</label>
                            <textarea class="form-control" name="description" placeholder="@lang('intranet.Description')" rows="4" required></textarea>
                        </div>
                        <div class="form-group col-6">
                            <label for="startDate">@lang('intranet.Date de début')</label>
                            <input type="date" class="form-control" name="start" placeholder="@lang('intranet.Date de début')"
                                id="startDate" required>
                        </div>
                        <div class="form-group col-6">
                            <label for="endDate">@lang('intranet.Date de fin')</label>
                            <input type="date" id="endDate" class="form-control" name="end"
                                placeholder="@lang('intranet.Date de fin')" required>
                        </div>
                        <div class="form-group col-12">
                            <p id="messageValidationDate"></p>
                        </div>
                        <div class="form-group col-12" id="encadrant_section" style="display: none;">
                            <label> @lang('intranet.encadrant') </label>
                            <div class="input-group mb-3 col-12">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1"
                                        style="padding: 5px 10px !important;"><i class="uil uil-search"></i></span>
                                </div>
                                <input type="text" class="form-control" placeholder="@lang('intranet.Tapez le nom')"
                                    aria-label="Username" aria-describedby="basic-addon1" id="search_user">
                                <select class="form-control" id="encadrant" name="encadrant_id">
                                    <option value=""></option>
                                    @foreach ($teachers as $teacher)

                                    <option value="{{ $teacher->id }}" >{{ $teacher->name }}</option>
                                    @endforeach

                                </select>
                            </div>
                        </div>


                        <hr>
                        <div id="company_section" style="display: none" class="col-12">
                            <hr>
                            <div class="form-group col-12">
                                <label> @lang('intranet.Entreprise') </label> &nbsp;
                                <label class="switch">
                                    <input type="checkbox" id="other_company_checkbox" value="1"
                                        name="is_other_company"> <span></span>
                                    <label for="other_company_checkbox" class="lbl-quiz"> @lang('intranet.Autre ?')</label>
                                </label>
                                {{-- <label class="switch" style="float: right;">
                                    <input type="checkbox" id="other_company_user_checkbox" value="1"
                                        name="is_other_company_user"> <span></span>
                                    <label for="other_company_user_checkbox" class="lbl-quiz"> @lang('intranet.Encadrant non trouvé?')</label>
                                </label> --}}
                                <div class="input-group mb-3 col-12" id="company_search_zone">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1"
                                            style="padding: 5px 10px !important;"><i class="uil uil-search"></i></span>
                                    </div>
                                    <input type="text" class="form-control" placeholder="@lang('intranet.Tapez le nom')"
                                        aria-label="Username" aria-describedby="basic-addon1" id="search_company" onkeyup="searchCompany()">
                                    <select class="form-control" id="company" name="entreprise_id">


                                    </select>

                                </div>

                            </div>





                            <div class="row col-12 deep_row" id="company_new_zone" style="display: none;">
                                <div class="form-group col-6">
                                    <label for="company_designation">@lang('intranet.Nom de la société')</label>
                                    <input type="text" class="form-control" id="company_designation"
                                        name="company_designation">
                                </div>
                                <div class="form-group col-6">
                                    <label for="company_email">@lang('intranet.Email')</label>
                                    <input type="text" class="form-control" id="company_email" name="company_email">
                                </div>
                                <div class="form-group col-6">
                                    <label for="company_phone">@lang('intranet.Phone')</label>
                                    <input type="text" class="form-control" id="company_phone" name="company_phone">
                                </div>
                                <div class="form-group col-6">
                                    <label for="company_website">@lang('intranet.Site web')</label>
                                    <input type="text" class="form-control" id="company_website"
                                        name="company_website">

                                </div>
                            </div>
                            <div class="row col-12 deep_row">
                                <div class="form-group col-6">
                                    <label for="company_user_name">@lang('intranet.EncadrantProfessionnel')</label>
                                    <input type="text" class="form-control" id="company_user_name"
                                        name="responsible_name">
                                </div>
                                <div class="form-group col-6">
                                    <label for="company_user_email">@lang('intranet.EmailEncadrantProfessionnel')</label>
                                    <input type="text" class="form-control" id="company_user_email"
                                        name="responsible_email">
                                </div>
                            </div>


                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">@lang('intranet.Annuler')</button>
                        <button type="submit" class="btn btn-primary"
                            onclick="validateDates()">@lang('intranet.Enregistrer')</button>
                    </div>
                </form>
            </div>
        </div>

    </div>

       {{-- modal demande lettre d'appui --}}
       <div class="modal fade bd-example-modal-lg" id="demande" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog add_stage" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-center" id="exampleModalLabel">
                        @lang("intranet.Générer demande de stage")</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST" action="{{ route('CompanyApply') }}" enctype="multipart/form-data" id="companyForm">
                    @csrf
                    <div class="modal-body row">
                        <!-- Company Selection -->
                        <div class="form-group col-12">
                            <label for="company_select">
                                @lang('intranet.Société') <span class="text-danger">*</span>
                            </label>
                            <select class="form-control required-field" name="company_name" id="company_select" required>
                                <option disabled selected>@lang('intranet.Choisir une société')</option>
                                @foreach ($companies as $company)
                                    <option value="{{ $company->designation }}">{{ $company->designation }}</option>
                                @endforeach
                            </select>
                            <div class="mt-2">
                                <input type="checkbox" id="addNewCompany" value="1" name="is_add_other_company" onchange="addNewCompanyCheckbox()">
                                <label for="addNewCompany">@lang('intranet.Autre ?')</label>
                            </div>
                        </div>

                        <!-- New Company Fields (Hidden Initially) -->
                        <div id="newCompanyFields" class="col-12" style="display: none;">
                            <div class="form-group">
                                <label for="company_designation">@lang('intranet.Nom de la société') <span class="text-danger">*</span></label>
                                <input class="form-control new-company-input" type="text" name="company_designation">
                            </div>
                            <div class="form-group">
                                <label for="company_address">@lang('intranet.Adresse') <span class="text-danger">*</span></label>
                                <input class="form-control new-company-input" type="text" name="company_address">
                            </div>
                            <div class="form-group">
                                <label for="company_email">@lang('intranet.Email') <span class="text-danger">*</span></label>
                                <input class="form-control new-company-input" type="email" name="company_email">
                            </div>
                            <div class="form-group">
                                <label for="company_phone">@lang('intranet.Téléphone') <span class="text-danger">*</span></label>
                                <input class="form-control new-company-input" type="text" name="company_phone">
                            </div>
                        </div>

                        <!-- Stage Type -->
                        <div class="form-group col-12">
                            <label>@lang('intranet.Type de stage') <span class="text-danger">*</span></label>
                            <select class="form-control required-field" name="stage_type_id" required>
                                <option disabled selected>@lang('intranet.Choisir')</option>
                                @foreach ($stage_types as $type)
                                    @if($type->appui_model && $type->appui_model != '')
                                        <option value="{{ $type->id }}">{{ $type->designation_fr }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>

                        <!-- Dates -->
                        <div class="form-group col-6">
                            <label for="startDate">@lang('intranet.Date de début') <span class="text-danger">*</span></label>
                            <input type="date" class="form-control required-field" name="start" id="startDate" required>
                        </div>
                        <div class="form-group col-6">
                            <label for="endDate">@lang('intranet.Date de fin') <span class="text-danger">*</span></label>
                            <input type="date" class="form-control required-field" name="end" id="endDate" required>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">@lang('intranet.Annuler')</button>
                        <button type="submit" class="btn btn-primary" data-dismiss="modal">@lang('intranet.Générer')</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- modal demande lettre d'appui --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@7"></script>

    <script>
        var teachers = {!! $teachers !!}
        console.log(teachers);
        var companies = {!! $companies !!}
        var stage_types = {!! $stage_types !!}
        var selectedType
        console.log(stage_types)
        $(document).ready(function() {
            $('#search_user').on('input', function() {
                var searchText = $(this).val().trim();
                if (searchText.length >= 2) {
                    fetchUsers(searchText);
                }
            });

            function fetchUsers(searchText) {
                teacher_result = teachers.filter(function(user) {
                    return user.name.toLowerCase().includes(searchText.toLowerCase());
                })


                var options = '<option value="">Sélectionner votre encadrant (' + teacher_result.length +
                    ' résultat(s) )</option>';
                teacher_result.forEach(function(user) {
                    if(user.stages && user.teacher && user.stages.length < (user.teacher.max_supervising_nb || 5 )){
                        options += '<option value="' + user.id + '">' + user.name + '</option>';
                    }else{
                        options += '<option value="' + user.id + '" disabled>' + user.name + ' (complet)</option>';
                    }

                });
                $('#encadrant').html(options);
            }








            // $('#company').on('change', function(event) {
            //     let company_id = event.target.value
            //     let responsibles = companies.find(company => company.id == company_id).users || []


            //     var options = '<option value="">Sélectionner votre encadrant professionnel </option>';
            //     responsibles.forEach(function(user) {
            //         options += '<option value="' + user.id + '">' + user.name + '</option>';
            //     });
            //     $('#company_users').html(options);
            // });


        });

       function searchCompany(stage_id) {
            var inputZone = document.getElementById('search_company'+stage_id)
                var searchText = inputZone.value.trim();
                if (searchText.length >= 2) {
                    fetchCompanies(searchText , stage_id);
                }
            };

            function fetchCompanies(searchText , stage_id) {
                companies_result = companies.filter(function(company) {
                    return company.designation.toLowerCase().includes(searchText.toLowerCase());
                })
                var options = '<option value="">Sélectionner votre entreprise d\'accueil (' + companies_result
                    .length + ' résultat(s) )</option>';
                companies_result.forEach(function(company) {
                    options += '<option value="' + company.id + '">' + company.designation + '</option>';
                });
                document.getElementById('company'+stage_id).innerHTML = options
                // $('#company').html(options);
            }

        function otherCompanyHandler(stage_id='') {
                var isOtherCompany = document.getElementById('other_company_checkbox'+stage_id)
                if (isOtherCompany.checked) {

                    $('#company_search_zone'+stage_id).hide();
                    $('#company_new_zone'+stage_id).show();
                    // $('#company_new_responsible_zone'+stage_id).show();



                } else {
                    $('#company_search_zone'+stage_id).show();
                    $('#company_new_zone'+stage_id).hide();
                    // $('#company_new_responsible_zone'+stage_id).hide();


                }
            }
       /*  function otherCompanyUserHandler(stage_id='') {
                var isOtherUserCompany = document.getElementById('other_company_user_checkbox'+stage_id)
                if (isOtherUserCompany.checked) {
                    $('#company_new_responsible_zone'+stage_id).show();
                    $('#company_users'+stage_id).hide()
                } else {
                    $('#company_new_responsible_zone'+stage_id).hide();
                    $('#company_users'+stage_id).show()
                }
            } */
        // on change type stage function
        function onChangeTypeStage(stage_id = '' , typeStage=false) {

            if(typeStage){
                typeStage = typeStage;
                var type_id = typeStage.id;
                var type = typeStage
            }else{
                var type_id = $('#type_stage' + stage_id).val();
                var type = stage_types.find(type => type.id == type_id)
            }

            selectedType = type
            console.log('r' , type)
            if (type) {
                if (type.nb_candidate > 1) {

                    $('#candidate_2' + stage_id).css('display', 'block');
                } else {

                    $('#candidate_2' + stage_id).css('display', 'none');
                }
                if (type.nb_candidate > 2) {

                    $('#candidate_3' + stage_id).css('display', 'block');
                } else {

                    $('#candidate_3' + stage_id).css('display', 'none');
                }

                if (type.is_supervised == 1) {

                    $('#encadrant_section' + stage_id).css('display', 'block');
                } else {

                    $('#encadrant_section' + stage_id).css('display', 'none');
                }

                if (type.is_company == 1) {

                    $('#company_section' + stage_id).css('display', 'block');
                } else {

                    $('#company_section' + stage_id).css('display', 'none');
                }
            } else {
                $('#candidate_2' + stage_id).css('display', 'none');
                $('#candidate_3' + stage_id).css('display', 'none');
                $('#encadrant_section' + stage_id).css('display', 'none');
                $('#company_section' + stage_id).css('display', 'none');

            }
        }

        function validateDates(stage_id = '') {

            console.log(selectedType)
            const startDate = document.getElementById('startDate' + stage_id).value;
            let endDate = document.getElementById('endDate' + stage_id);
            const message = document.getElementById('messageValidationDate' + stage_id);

            // Check if both dates are provided
            if (!startDate || !endDate.value) {
                message.textContent = 'Veuillez sélectionner les dates de début et de fin.';
                message.style.color = 'red';
                return;
            }

            // Convert to Date objects
            const start = new Date(startDate);
            const end = new Date(endDate.value);
            const diffTime = Math.abs(end - start);
            const diffWeeks = Math.ceil(diffTime / (1000 * 60 * 60 * 24 * 7));

            // Validate the dates
            if (end > start && diffWeeks <= selectedType.duration_max && diffWeeks >= selectedType.duration_min) {
                message.textContent = '';
                message.style.color = '';
            } else {
                if (end <= start) {
                    message.textContent = 'La date de fin doit être supérieure à la date de début';
                    message.style.color = 'red';
                    endDate.value = ''
                } else {

                    message.textContent = 'La duree doit etre comprise entre ' + selectedType.duration_min + ' et ' +
                        selectedType.duration_max + ' semaines';
                    message.style.color = 'red';
                    endDate.value = ''
                }
            }

        }

        function sureDeleteStage(id) {
            Swal({
                    title: "êtes-vous sûr?",
                    text: "Une fois supprimé, vous ne serez pas en mesure de récupérer ce fichier imaginaire!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonText: "Supprimer",
                    cancelButtonText: "Annuler",
                })
                .then((willDelete) => {
                    console.log(willDelete)
                    if (willDelete.value) {
                        document.getElementById('stageStudent' + id).submit()
                    }
                });
        }

        function search(id) {

                var searchText = $('#search_user'+id).val().trim();
                if (searchText.length >= 2) {
                    fetchUsers2(searchText  , id);
                }



        }
        function fetchUsers2(searchText , id) {
                teacher_result = teachers.filter(function(user) {
                    return user.name.toLowerCase().includes(searchText.toLowerCase());
                })


                var options = '<option value="">Sélectionner votre encadrant (' + teacher_result.length +
                    ' résultat(s) )</option>';
                teacher_result.forEach(function(user) {
                    if(user.stages && user.teacher && user.stages.length < (user.teacher.max_supervising_nb || 5 )){
                        options += '<option value="' + user.id + '">' + user.name + '</option>';
                    }else{
                        options += '<option value="' + user.id + '" disabled>' + user.name + ' (complet)</option>';
                    }

                });
                $('#encadrant'+id).html(options);
            }



            // document.getElementById('addNewCompany').addEventListener('change', function () {
            // document.getElementById('newCompanyFields').style.display = this.checked ? 'block' : 'none';
            // document.getElementById('company_select').style.display = this.checked ? 'none' : 'block';
            // });
            // script for modal  generate demande de stage whene add new company
            document.addEventListener('DOMContentLoaded', function () {


        // Toggle visibility and required attributes
      function addNewCompanyHandler(stage_id ='') {
        const addNewCompanyCheckbox = document.getElementById('addNewCompany'+stage_id);
        const newCompanyFields = document.getElementById('newCompanyFields'+stage_id);
        const companySelect = document.getElementById('company_select'+stage_id);
        // const newCompanyInputs = document.querySelectorAll('.new-company-input');
        const phoneInput = document.getElementById('company_phone'+stage_id);
        phoneInput.addEventListener('input', function () {
            this.value = this.value.replace(/[^0-9]/g, ''); // Allow only numbers
        });
            if (addNewCompanyCheckbox.checked) {
                newCompanyFields.style.display = 'block';
                companySelect.style.display = 'none';
                companySelect.removeAttribute('required'); // Make select NOT required
                companySelect.value = ''; // Clear select value
                newCompanyInputs.forEach(input => input.setAttribute('required', 'required')); // Make inputs required
            } else {
                newCompanyFields.style.display = 'none';
                companySelect.style.display = 'block';
                companySelect.setAttribute('required', 'required'); // Make select required again
                newCompanyInputs.forEach(input => {
                    input.removeAttribute('required'); // Remove required from new company inputs
                    input.value = ''; // Clear input values
                });
            }
        }
    });
    </script>

@endsection
