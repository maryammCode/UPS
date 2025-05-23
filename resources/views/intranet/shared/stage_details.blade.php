@extends('intranet.layouts.app')
@section('content')
    @php
        $lang = Session::get('language');
        if (!$lang) {
            $lang = App::getLocale();
        }
        $short_description = 'short_description_' . $lang;
        $description = 'description_' . $lang;
        $designation = 'designation_' . $lang;
        App::setLocale($lang);
    @endphp
    @if (Session::has('success'))
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@7"></script>
        <script type="text/javascript">
            var msg =
                '{{ session('
                                                                                                                                        success ') }}';
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
            var msg =
                '{{ session('
                                                                                                                                        error ') }}';
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
            var msg =
                '{{ session('
                                                                                                                                        warning ') }}';
            swal(
                msg,
                'réessayer SVP',
                'danger'
            )
        </script>
    @endif

    <style>
        ul.timeline {
            list-style-type: none;
            position: relative;
        }

        ul.timeline:before {
            content: ' ';
            background: #d4d9df;
            display: inline-block;
            position: absolute;
            left: 29px;
            width: 2px;
            height: 100%;
            z-index: 400;
        }

        ul.timeline>li {
            margin: 20px 0;
            padding-left: 50px;
        }

        ul.timeline>li .activity_date {
            font-size: 14px;
            color: #3f60b5;
        }

        ul.timeline>li:before {
            content: ' ';
            background: white;
            display: inline-block;
            position: absolute;
            border-radius: 50%;
            border: 3px solid #ac1a1a;
            left: 20px;
            width: 20px;
            height: 20px;
            z-index: 400;
        }

        .border-bottom {
            border-bottom: 1px solid #dee2e6 !important;
            padding: 0;
            margin: 0;
        }

        .activity_title {
            display: flex;
            justify-content: space-between;
        }

        .my_crse_nav .nav-item {
            width: 16%;
        }

        .ucp-table td {
            padding: 1rem 0.75rem !important;
        }
    </style>

    <div class="row">
        <div class="col-md-12 fcrse_2" style="padding-bottom: 30px;">
            <div class="value_content">
                <h4 class="">@lang('intranet.Stages')</h4>
                <a class="btn btn-secondary" href="@if(Auth::user()->isRole('Etudiant')){{ route('stages_students') }}@elseif(Auth::user()->isRole('Enseignant')){{route('stages_encadrant')}}@elseif(Auth::user()->isRole('Entreprise')){{route('stages_companies')}}@else javascript:history.back() @endif"
                style="position:absolute;right: 7px; top: 28px; margin: 0 auto;">
                    <div>@lang('intranet.Liste des stages')</div>
                </a>
            </div>
        </div>
        @php
            $fromTab =  session('fromTab') ?? '';
        @endphp
        <div class=" col-md-12 p-0" style="padding-top: 10px;">
            <div class="my_courses_tabs mt-0">
                <ul class="nav nav-pills my_crse_nav" id="general-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link @if (@$fromTab == '') active @endif" id="general-info-tab"
                            data-toggle="pill" href="#general-info" role="tab" aria-controls="general-info"
                            aria-selected="true"><i class="uil uil-book-alt"></i>@lang('intranet.Info Stage')</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="company-tab-tab" data-toggle="pill" href="#company-tab" role="tab"
                            aria-controls="company-tab" aria-selected="false"><i
                                class="uil uil-building"></i>@lang('intranet.Entreprise')</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " id="description-tab-tab" data-toggle="pill" href="#description-tab"
                            role="tab" aria-controls="description-tab" aria-selected="false"><i
                                class="uil uil-tag-alt"></i>@lang('intranet.Description')</a>
                    </li>
                    @if ($stage->acceptation == 1)
                        {{-- <li class="nav-item">
                            <a class="nav-link @if (@$fromTab == 'activities') active @endif" id="activities-tab"
                                data-toggle="pill" href="#activities" role="tab" aria-controls="activities"
                                aria-selected="false"><i class="uil uil-calendar-alt"></i>@lang('intranet.Activités')</a>
                        </li> --}}
                        <li class="nav-item">
                            <a class="nav-link  @if (@$fromTab == 'reports') active @endif" id="reports-tab"
                                data-toggle="pill" href="#reports" role="tab" aria-controls="reports"
                                aria-selected="false"><i class="uil uil-file"></i>@lang('intranet.Rapport')</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="soutenances-tab" data-toggle="pill" href="#soutenances" role="tab"
                                aria-controls="soutenances" aria-selected="false"><i
                                    class="uil uil-megaphone"></i>@lang('intranet.Soutenance')</a>
                        </li>
                    @endif

                </ul>
                <div class="tab-content" id="general-tabContent">
                    <div class="tab-pane fade  @if (@$fromTab == '') show active @endif  p-0" id="general-info"
                        role="tabpanel">
                        <div class="table-responsive">
                            <table class="table ucp-table">
                                <thead class="thead-s">
                                    <tr>
                                        <th class="text-center" scope="col" colspan="2">@lang('intranet.Candidats')</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><strong>@lang('intranet.Nom et prénom') </strong></td>
                                        <td> <strong>{{ $stage->candidat_1->name }} </strong>
                                            @if (auth()->user()->id == $stage->candidat_1_id)
                                                <span class="text-danger">(@lang('intranet.Vous'))</span>
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>@lang('intranet.Email')</td>
                                        <td>{{ $stage->candidat_1->email }}</td>
                                    </tr>
                                    <tr>
                                        <td>@lang('intranet.Téléphone')</td>
                                        <td>{{ $stage->candidat_1->phone }}</td>
                                    <tr>
                                        @if ($stage->candidat_2_id)
                                    <tr>
                                        <td> <strong>@lang('intranet.Nom et prénom') </strong></td>
                                        <td> <strong>{{ $stage->candidat_2->name }} </strong>
                                            @if (auth()->user()->id == $stage->candidat_2_id)
                                                <span class="text-danger">(@lang('intranet.Vous'))</span>
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>@lang('intranet.Email')</td>
                                        <td>{{ $stage->candidat_2->email }}</td>
                                    </tr>
                                    <tr>
                                        <td>@lang('intranet.Téléphone')</td>
                                        <td>{{ $stage->candidat_2->phone }}</td>
                                    <tr>
                                        @endif
                                        @if ($stage->candidat_3_id)
                                    <tr>
                                        <td> <strong>@lang('intranet.Nom et prénom')</strong></td>
                                        <td> <strong>{{ $stage->candidat_3->name }} </strong>
                                            @if (auth()->user()->id == $stage->candidat_3_id)
                                                <span class="text-danger">(@lang('intranet.Vous'))</span>
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>@lang('intranet.Email')</td>
                                        <td>{{ $stage->candidat_3->email }}</td>
                                    </tr>
                                    <tr>
                                        <td>@lang('intranet.Téléphone')</td>
                                        <td>{{ $stage->candidat_3->phone }}</td>
                                    <tr>
                                        @endif
                                </tbody>
                            </table>
                            <br>
                            <table class="table ucp-table">
                                <thead class="thead-s">
                                    <tr>
                                        <th scope="col" colspan="2">
                                            @lang('intranet.Information stage')</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td scope="row" style="font-weight: 600">@lang('intranet.Etat')</td>
                                        <td>
                                            @switch($stage->etat)
                                                @case(1)
                                                    <span> @lang('intranet.etat_stage_1')</span>
                                                @break

                                                @case(2)
                                                    <span> @lang('intranet.etat_stage_2')</span>
                                                @break

                                                @case(3)
                                                    <span> @lang('intranet.etat_stage_3')</span>
                                                @break

                                                @case(4)
                                                    <span> @lang('intranet.etat_stage_4')</span>
                                                @break

                                                @case(5)
                                                    <span> @lang('intranet.etat_stage_5')</span>
                                                @break

                                                @case(6)
                                                    <span class="text-success"> @lang('intranet.etat_stage_6') </span>
                                                @break

                                                @case(7)
                                                    <span class="text-danger"> @lang('intranet.etat_stage_7') </span>
                                                @break

                                                @case(8)
                                                    <span class="text-warning"> @lang('intranet.etat_stage_8') </span>
                                                @break
                                            @endswitch
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">@lang('intranet.Level')</th>
                                        <td>
                                            @switch($stage->level)
                                                @case(1)
                                                    @lang('intranet.Première année')
                                                @break

                                                @case(2)
                                                    @lang('intranet.Deuxième année')
                                                @break

                                                @case(3)
                                                    @lang('intranet.Troisième année')
                                                @break
                                            @endswitch
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">@lang('intranet.Type')</th>
                                        <td>
                                            @switch($stage->type)
                                                @case(1)
                                                    @lang('intranet.Stage ouvrier')
                                                @break

                                                @case(2)
                                                    @lang('intranet.Stage de technicien')
                                                @break

                                                @case(3)
                                                    @lang('intranet.PFE')
                                                @break
                                            @endswitch
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">@lang('intranet.Sujet')</th>
                                        <td>{{ $stage->sujet }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">@lang('intranet.Encadrant(e)')</th>
                                        <td style="font-weight: 600">{{ @$stage->encadrant->name }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">@lang('intranet.Domaine')</th>
                                        <td> {{ $stage->domaine }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">@lang('intranet.Durée')</th>
                                        <td>{{ $stage->duree }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">@lang('intranet.Date début')</th>
                                        <td>{{ Carbon\Carbon::parse($stage->start)->format('d-m-Y') }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">@lang('intranet.Date fin')</th>
                                        <td>{{ Carbon\Carbon::parse($stage->end)->format('d-m-Y') }}</td>
                                    </tr>

                                    <tr>
                                        <th scope="row">@lang('intranet.Avis encadrant(e)')</th>
                                        <td>
                                            @switch($stage->avis_encadrant)
                                                @case(1)
                                                    <span class="text-secondary"> @lang('intranet.avis_encadrant_1')</span>
                                                @break

                                                @case(2)
                                                    @lang('intranet.avis_encadrant_2')
                                                @break

                                                @case(2)
                                                    @lang('intranet.avis_encadrant_3')
                                                @break
                                            @endswitch
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">@lang('intranet.Remarque encadrant(e)')</th>
                                        <td>
                                            @if ($stage->remarque_encadrant)
                                                {!! $stage->remarque_encadrant !!}
                                            @else
                                                @lang('intranet.Pas de remarque')
                                            @endif
                                        </td>
                                    </tr>

                                    <tr>
                                        <th scope="row">@lang('intranet.Documents')</th>
                                        <td>
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
                                                        class="uil uil-download-alt"></i>@lang('intranet.Convention de stage')</a></p>
                                            @endif
                                        </td>
                                    </tr>

                                </tbody>
                            </table>
                            <?php
                            // "1": "Demande en attente d'approbation",
                            // "2": "Stage en attente de dépôt du rapport",
                            // "3": "Rapport en attente d'approbation",
                            // "4": "Stage en attente de planification de soutenance",
                            // "5": "Stage en attente de soutenance",
                            // "6": "Stage soutenu",
                            // "7": "Stage reporté",
                            // "8": "Stage reporté en attente de rectification du rapport"
                            ?>
                            @if (
                                $stage->etat == 3 &&
                                    Auth::user()->role->name == 'Enseignant' &&
                                    $stage->remarque_encadrant == null &&
                                    $stage->avis_encadrant == 1)
                                <form action="{{ route('add_avis_encadrant', ['id' => $stage->id]) }}" method="POST"
                                    class="mt-30">
                                    @csrf
                                    {{-- <label for="remarque_encadrant ">@lang('intranet.Remarque encadrant(e)') :</label> --}}
                                    <h4>@lang('intranet.Remarque encadrant(e)')</h4>
                                    <textarea name="remarque_encadrant" id="" class="form-control mt-30" rows="5"
                                        style="height: unset;"></textarea>
                                    <div class="basic_profile">
                                        <div class="basic_form">
                                            <div class="nstting_content">
                                                <div class="basic_ptitle">
                                                    <h4>@lang('intranet.Avis encadrant(e)')</h4>
                                                </div>
                                                <div class="ui toggle checkbox _1457s2">
                                                    <input type="checkbox" name="avis_encadrant">
                                                    <label>@lang('intranet.Autoriser')</label>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <button class="login-btn" type="submit"
                                            style="width: 112px;">@lang('intranet.Enregistrer')</button>
                                    </div>
                                </form>
                            @endif
                        </div>
                    </div>
                    <div class="tab-pane fade  p-0" id="company-tab" role="tabpanel">
                        <div class="table-responsive">
                            <table class="table ucp-table">

                                <tbody>
                                    <tr>
                                        <th scope="col"><img  src="@if(@$stage->entreprise->logo && Storage::exists($stage->entreprise->logo)) {{ Voyager::image(@$stage->entreprise->logo) }}@else {{Voyager::image($default_cover->cover) }} @endif"
                                                alt=""
                                                style="width: 120px !important;    height: fit-content;  border-radius: 0;">
                                        </th>
                                        <td scope="col" class="table_designation_entreprise">
                                            {{ @$stage->entreprise->designation }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td scope="row">@lang('intranet.Email')</td>
                                        <td>{{ @$stage->entreprise->email }}</td>
                                    </tr>
                                    <tr>
                                        <td scope="row">@lang('intranet.Téléphone')</td>
                                        <td>{{ @$stage->entreprise->phone }}</td>
                                    </tr>
                                    <tr>
                                        <td scope="row">@lang('intranet.Adresse')</td>
                                        <td>{{ @$stage->entreprise->address }}</td>
                                    </tr>
                                    <tr>
                                        <td scope="row">@lang('intranet.Responsable')</td>
                                        <td>{{ @$stage->entreprise->responsable_name }}</td>
                                    </tr>
                                    <tr>
                                        <td colspan="2"> {!! @$stage->entreprise->description !!}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane fade p-0" id="description-tab" role="tabpanel">
                        <div class="table-responsive">
                            @if ($stage->description)
                                <div class="review_all120">
                                    <div class="review_item richtext_init" style="line-height:28px;">
                                        {{-- <h4 class="tutor_name1"> <strong style="font-weight: 600"> Descriptiont : </strong> </h4> --}}
                                        <p class="">{!! $stage->description !!}</p>

                                    </div>
                                </div>
                            @else
                                @include('intranet.layouts.empty_status', [
                                    'message' => 'Aucun cahier des charges',
                                ])
                            @endif
                        </div>
                    </div>
                    <div class="tab-pane fade  @if (@$fromTab == 'activities') show active @endif p-0" id="activities"
                        role="tabpanel">
                        <div class="panel-group">
                            @if (in_array(Auth::user()->id, [$stage->candidat_1_id, $stage->candidat_2_id, $stage->candidat_3_id]))
                                <div class="card">
                                    <div class="card-body">
                                        @if ($stage->validation != 1)
                                            <form action="{{ route('create_activity') }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="stage_id" value="{{ $stage->id }}">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="activities">@lang('intranet.Date')</label>
                                                            <input type="date" required class="form-control"
                                                                name="activity_date" style="height: 54px;">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="activities">@lang('intranet.Description')</label>
                                                            <textarea type="date" rquired class="form-control" name="description" rows="2" style="resize : none"
                                                                required></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <button type="submit" class="bn btn-success form-control"
                                                            style="margin-top: 19px; height: 54px;">@lang('intranet.Enregistrer')</button>
                                                    </div>

                                                </div>
                                            </form>
                                        @endif

                                    </div>
                                    <div class="card-body">
                                        <form action="{{ route('generate_activity_report') }}" method="POST">
                                            @csrf
                                            <input name="stage_id" value="{{ $stage->id }}" type="hidden">
                                            <button type="submit" class="btn btn-danger">Genérer Journal de
                                                Stages</button>
                                        </form>
                                    </div>
                                </div>
                            @endif
                            @if ($activities->count() > 0)
                                <div class="review_all120">
                                    <div class="review_item richtext_init" style="line-height:28px;">

                                        <div class="col-md-12">

                                            <ul class="timeline">
                                                @foreach ($activities as $activity)
                                                    <li>
                                                        <div class="activity_title">
                                                            <h6 class="activity_date">{{ $activity->activity_date }}</h6>
                                                            @if ($stage->validation != 1)
                                                                <form action="{{ route('delete_activity') }}"
                                                                    method="POST"
                                                                    id="delete-activity-{{ $activity->id }}">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <input type="hidden" name="activity_id"
                                                                        value="{{ $activity->id }}">
                                                                    <a onclick="removeActivity({{ $activity->id }})"><i
                                                                            class="fa fa-trash text-danger text-small"></i></a>
                                                                </form>
                                                            @endif

                                                        </div>

                                                        <p>{!! $activity->description !!}</p>
                                                        <p class="border-bottom"></p>
                                                    </li>
                                                @endforeach

                                            </ul>
                                        </div>

                                    </div>
                                </div>
                            @else
                                @include('intranet.layouts.empty_status', [
                                    'message' => 'Aucune activité trouvée',
                                ])
                            @endif
                        </div>

                    </div>
                    <div class="tab-pane fade p-0  @if (@$fromTab == 'reports') show active @endif" id="reports"
                        role="tabpanel" aria-labelledby="reports-tab">
                        <div class="review_all120">

                            @if ($stage->etat < 2)
                                @include('intranet.layouts.empty_status', [
                                    'message' => 'Vous êtes non autorisé a déposer un rapport',
                                ])
                            @else
                                <div class="review_item">
                                    @if ($stage->etat == 2 && Auth::user()->role->name == 'Etudiant')
                                        <form action="{{ route('add_version_rapport', ['stage_id' => $stage->id]) }}"
                                            method="POST" enctype="multipart/form-data">
                                            @csrf
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="title889">
                                                            <h2>@lang('intranet.Déposer votre Document') </h2>
                                                        </div>
                                                    </div>
                                                    <div class="{{ $stage_rapport_types->count() <= 1 ? 'col-lg-12 col-md-12' : 'col-lg-6 col-md-6'}}">
                                                        {{-- <label for="file5">Add Screenshots</label> --}}
                                                        <div class="image-upload-wrap">
                                                            <input class="file-upload-input" id="filerectStudent"
                                                                type="file" name="rapport" onchange="StudentUpload()">
                                                            <div class="drag-text">
                                                                <i class="fas fa-cloud-upload-alt"></i>
                                                                <h4>@lang('intranet.Sélectionner votre fichier')</h4>
                                                                <p id="showFileStudent"></p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @if($stage_rapport_types->count() > 1)
                                                    <div class="col-lg-6 col-md-6">
                                                        <label class="control-label">@lang('intranet.Type')</label>
                                                        <select class="form-control" name="stage_rapport_type_id" required>
                                                            <option value="" disabled>@lang('intranet.Choisir')</option>
                                                            @foreach ($types as $type )
                                                                <option value="{{ $type->id }}">{{ $type->designation_fr }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    @elseif($stage_rapport_types->count() == 1)
                                                        <input type="hidden" name="stage_rapport_type_id" value="{{ $stage_rapport_types[0]->id }}">
                                                    @endif
                                                    <div class="offset-md-9 col-md-3">
                                                        <button class="login-btn" type="submit">@lang('intranet.Déposer')</button>
                                                    </div>
                                                </div>
                                        </form>
                                    @endif


                                    <div class="table-responsive">
                                        <div class="my_courses_tabs mt-0">
                                            <ul class="nav nav-pills my_crse_nav" id="documents-tab" role="tablist">
                                                @php
                                                    $document_types = App\StageDocumentType::where('publier', 1)->latest()->get();
                                                @endphp
                                                @foreach ($document_types as $type)
                                                <li class="nav-item">
                                                    <a class="nav-link @if (@$loop->index == 0)  active @endif"   id="doc_tab_{{ $type->id }}"
                                                        data-toggle="pill" href="#doc_{{ $type->id }}" role="tab" aria-controls="doc_{{ $type->id }}"
                                                        aria-selected="true"><i class="uil uil-book-alt"></i>{{ $type->designation_fr }}</a>
                                                </li>
                                                @endforeach
                                            </ul>
                                            <div class="tab-content" id="documents-tabContent">
                                                @foreach ($document_types as $type)
                                                <div class="tab-pane fade  @if (@$loop->index == 0) show active @endif  p-0" id="doc_{{ $type->id }}"
                                                    role="tabpanel">
                                                    <table class="table ucp-table">
                                                        <thead class="thead-s">
                                                            <tr>
                                                                <th style="width: 30%;">@lang('intranet.Documents')</th>
                                                                <th style="width: 10%;">@lang('intranet.Publié par')</th>
                                                                <th style="width: 40%;">@lang('intranet.Avis encadrant(e)')</th>
                                                                <th style="width: 20%;">@lang('intranet.Rapport encadrant(e)')</th>
                                                                @if ($stage->etat == 2 && Auth::user()->role->name == 'Enseignant')
                                                                    <th>@lang('intranet.Décision')</th>
                                                                @endif
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @php
                                                                $rapports = App\Rapport::where('stage_rapport_type_id', $type->id)->where('stage_id', $stage->id)->get();
                                                            @endphp
                                                            @foreach ($rapports as $rapport)
                                                                <tr
                                                                    @if ($rapport->etat == 1) style="background-color: #4caf501f;" @endif>
                                                                    <td scope="row" class="td_stages">
                                                                        <div class="user_dt_trans" style="margin-bottom: 10px;">
                                                                            @if ($rapport->rapport && $rapport->rapport != '[]')
                                                                                @if ( @$stage_rapport_types->count() > 1)
                                                                                    <p style="font-weight:600;color:#000">@lang('intranet.Type de document'): {{@$rapport->StageDocumentType->designation_fr}}</p>
                                                                                @endif

                                                                                <a  href="{{ Voyager::image(json_decode($rapport->rapport)[0]->download_link) }}"
                                                                                    target="_blank">
                                                                                    <p style="color: blue"><i class="uil uil-cloud-download"></i>
                                                                                        {{ json_decode($rapport->rapport)[0]->original_name }}
                                                                                    </p>
                                                                                </a>
                                                                                <p><label
                                                                                        style="font-weight:600;">@lang('intranet.Publié le')</label>
                                                                                    {{ Carbon\Carbon::parse($rapport->created_at)->format('d/m/Y') }}
                                                                                    à
                                                                                    {{ Carbon\Carbon::parse($rapport->created_at)->format('H:i') }}
                                                                                </p>
                                                                                @if ($rapport->etat == 1)
                                                                                    <span
                                                                                        class="span_rapport text-success">(@lang('intranet.Autorisé'))</span>
                                                                                @endif
                                                                            @endif

                                                                            @if ($rapport->plagiat_rapport && $rapport->plagiat_rapport != '[]')
                                                                                <a href="{{ Voyager::image(json_decode($rapport->plagiat_rapport)[0]->download_link) }}"
                                                                                    target="_blank">
                                                                                    <span style="font-weight: 600">Rapport de Plagiat: ({{ $rapport->plagiat_note }})</span>
                                                                                    <p style="color: blue"><i class="uil uil-cloud-download"></i>
                                                                                        {{ json_decode($rapport->plagiat_rapport)[0]->original_name }}
                                                                                    </p>
                                                                                </a>

                                                                            @endif
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="user_dt_trans">
                                                                            <p>{{ $rapport->created_by }}</p>
                                                                        </div>
                                                                    </td>

                                                                    <td class="td_stages text-center">
                                                                        <div >
                                                                            @if ($rapport->avis_encadrant == null && Auth::user()->role->name == 'Enseignant' && $stage->etat == 2 && $loop->last)
                                                                                <div id="add_remarque_encadrant">
                                                                                    <button class="login-btn p_10" type="button"
                                                                                        onclick="addRemarqueEncadrant({{ $rapport->id }})">@lang('intranet.Ajouter une remarque')</button>
                                                                                </div>
                                                                                <div id="remarque_encadrant{{ $rapport->id }}" style="display: none;">
                                                                                    <form
                                                                                        action="{{ route('update_rapport', [$rapport->id]) }}"
                                                                                        method="post">
                                                                                        @csrf
                                                                                        <p>
                                                                                            <textarea name="avis_encadrant" id="" class="form-control" rows="5" required
                                                                                                placeholder="Laissez une remarque" style=" height:unset"></textarea>
                                                                                        </p>
                                                                                        <div>
                                                                                            <button class="login-btn p_10"
                                                                                                type="submit">@lang('intranet.Enregistrer')</button>
                                                                                        </div>
                                                                                    </form>
                                                                                </div>
                                                                            @else
                                                                                @if ($rapport->avis_encadrant)
                                                                                    <p>{!! $rapport->avis_encadrant !!}</p>
                                                                                @else
                                                                                    <p class="text-secondary">@lang("intranet.Pas d'avis")
                                                                                    </p>
                                                                                @endif
                                                                            @endif
                                                                        </div>
                                                                    </td>
                                                                    <td class="td_stages">
                                                                        <div class="user_dt_trans">
                                                                            @if ($rapport->rapport_encadrant && $rapport->rapport_encadrant != '[]')
                                                                                <p>
                                                                                    <a
                                                                                        href="{{ Voyager::image(json_decode($rapport->rapport_encadrant)[0]->download_link) }}">
                                                                                        <i class="uil uil-cloud-download"></i>
                                                                                        {{ json_decode($rapport->rapport_encadrant)[0]->original_name }}
                                                                                    </a>
                                                                                <p><label
                                                                                        style="font-weight:600;">@lang('intranet.Publié le')</label>
                                                                                    {{ Carbon\Carbon::parse($rapport->rapport_encadrant_created_at)->format('d/m/Y') }}
                                                                                    à
                                                                                    {{ Carbon\Carbon::parse($rapport->rapport_encadrant_created_at)->format('H:i') }}
                                                                                </p>
                                                                                @if ($loop->last && $rapport->rapport_encadrant && Auth::user()->role->name == 'Enseignant')
                                                                                    <br>
                                                                                    <form
                                                                                        action="{{ route('delete_rapport', ['id' => $rapport->id]) }}"
                                                                                        method="POST"
                                                                                        id="delete_rapport_{{ $rapport->id }}">
                                                                                        @csrf
                                                                                        {{ method_field('DELETE') }}
                                                                                    </form>
                                                                                    <button class="btn btn-danger" title="Delete"
                                                                                        onclick="sureDeleteRapport({{ $rapport->id }})">
                                                                                        <i class="uil uil-trash">@lang('intranet.Supprimer')</i>
                                                                                    </button>
                                                                                @endif
                                                                                </p>
                                                                            @elseif ($loop->last && Auth::user()->role->name == 'Enseignant' && $stage->etat == 2)
                                                                                <form
                                                                                    action="{{ route('add_rapport_ens', ['rapport_id' => $rapport->id]) }}"
                                                                                    method="POST" enctype="multipart/form-data">
                                                                                    @csrf
                                                                                    <div style="text-align:center;">
                                                                                        <label for="filerectTeacher" class="drag-text"
                                                                                            class="form-label"
                                                                                            style="padding: 10px 5px;">
                                                                                            <i class="fas fa-cloud-upload-alt"></i>
                                                                                            <h4>@lang('intranet.Téléverser')</h4>
                                                                                        </label>
                                                                                        <input class="form-control"
                                                                                            id="filerectTeacher" type="file"
                                                                                            style="display: none"
                                                                                            onchange="TeacherUpload()"
                                                                                            name="rapport_encadrant">
                                                                                        <p id="showFileTeacher"></p>
                                                                                    </div>
                                                                                    <div>
                                                                                        {{-- <span id="showFileTeacher"></span> --}}
                                                                                        <button class="login-btn p_10"
                                                                                            type="submit">@lang('intranet.Téléverser')</button>
                                                                                    </div>
                                                                                </form>
                                                                            @else
                                                                                <p class="text-secondary"> @lang('intranet.Pas de fichier')</p>
                                                                            @endif
                                                                        </div>
                                                                    </td>
                                                                    @if ($stage->etat == 2 && Auth::user()->role->name == 'Enseignant')
                                                                        @if ($loop->last)
                                                                            <td>
                                                                                <form
                                                                                    action="{{ route('autorise_rapport', [$rapport->id]) }}"
                                                                                    method="POST" id="rapport_{{ $rapport->id }}">
                                                                                    @csrf
                                                                                    <div class="ui toggle checkbox _1457s2">
                                                                                        <input type="checkbox" name="avis_encadrant"
                                                                                            id="check"
                                                                                            onchange="sureAutoriseRapport({{ $rapport->id }})">
                                                                                        <label>@lang('intranet.Autoriser')</label>
                                                                                    </div>
                                                                                </form>
                                                                            </td>
                                                                        @else
                                                                            <td>
                                                                                <span class="text-secondary">
                                                                                    @lang('intranet.Non autorisé')</span>
                                                                            </td>
                                                                        @endif
                                                                    @endif
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                                @endforeach
                                            </div>


                                    </div>
                                    </div>

                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="tab-pane fade p-0 @if (@$fromTab == 'soutenances') show active @endif" id="soutenances" role="tabpanel" aria-labelledby="soutenances-tab">
                        <div class="review_all120">
                            @if (Auth::user()->role->name == 'Entreprise' && $stage->company_validation != 1)
                                <form action="{{ route('upload_file_company') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="title889">
                                                <h2>@lang('intranet.Attestation de stage') </h2>
                                            </div>
                                        </div>
                                        <input type="text" name="stage_id" value="{{ $stage->id }}" hidden>
                                        <div class="col-lg-6 col-md-6">
                                            {{-- <label for="file5">Add Screenshots</label> --}}
                                            <div class="image-upload-wrap">
                                                <input class="file-upload-input" id="filerectCompany" type="file"
                                                    name="internship_certificate" onchange="companytUpload()">
                                                <div class="drag-text">
                                                    <i class="fas fa-cloud-upload-alt"></i>
                                                    <h4>@lang('intranet.Sélectionner votre fichier')</h4>
                                                    <p id="showFileCompany"></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <button class="login-btn" type="submit">@lang('intranet.Déposer')</button>
                                        </div>
                                    </div>
                                </form>
                            @elseif ($stage->internship_certificate)
                                @if ($stage->internship_certificate && count(json_decode($stage->internship_certificate)) > 0)
                                    <div class="col-lg-12 col-md-12 col-12 pt-3 pb-3 flex justify-content-start">
                                        <p style="color: #000;">@lang('intranet.Certificat de stage') :</p>
                                        <a href="{{ Voyager::image(json_decode($stage->internship_certificate)[0]->download_link) }}"
                                            target="_blank">
                                            <p><i class="uil uil-cloud-download"></i>
                                                {{ json_decode($stage->internship_certificate)[0]->original_name }}
                                            </p>
                                        </a>
                                    </div>
                                @endif
                            @endif
                            @if ($stage->etat < 5 || $soutenance == null)
                                @include('intranet.layouts.empty_status', [
                                    'message' => 'Soutenance non planifiée',
                                ])
                            @else
                                <table class="table ucp-table">
                                    <tbody>
                                        <tr>
                                            <td style="font-weight: 600;"> @lang('intranet.Etat')</th>
                                            <td style="font-weight: 600;">
                                                @switch($stage->etat)
                                                    @case(5)
                                                        <span class="text-primary"> @lang('intranet.etat_stage_5')</span>
                                                    @break

                                                    @case(6)
                                                        <span class="text-success"> @lang('intranet.etat_stage_6') </span>
                                                    @break

                                                    @case(7)
                                                        <span class="text-danger"> @lang('intranet.etat_stage_7') </span>
                                                    @break

                                                    @case(8)
                                                        <span class="text-warning"> @lang('intranet.etat_stage_8') </span>
                                                    @break
                                                @endswitch
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">@lang('intranet.Date')</th>
                                            <td>{{ $soutenance->date }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row"> @lang('intranet.Horaire')</th>
                                            <td>{{ $soutenance->horaire_start }} - {{ $soutenance->horaire_end }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">@lang('intranet.Salle')</th>
                                            <td>{{ $soutenance->salle }}</td>
                                        </tr>
                                        @php
                                            $soutenance_teacher_liste = App\SoutenanceTeacher::where(
                                                'soutenance_id',
                                                $soutenance->id,
                                            )->get();
                                        @endphp

                                        @if ($stage->etat >= 5)
                                            <tr>
                                                <th scope="row">@lang('intranet.Jury'):</th>
                                                <td>
                                                    @foreach ($soutenance_teacher_liste as $teacher)
                                                        <span>{{ $teacher->user_name }} </span>
                                                        <span class="badge badge-primary">
                                                            @switch($teacher->poste)
                                                                @case(1)
                                                                    @lang('intranet.Président(e)')
                                                                @break

                                                                @case(2)
                                                                    @lang('intranet.Rapporteur(e)')
                                                                @break

                                                                @case(3)
                                                                    @lang('intranet.Membre')
                                                                @break
                                                            @endswitch
                                                        </span><br>
                                                    @endforeach
                                                </td>
                                            </tr>
                                        @endif
                                        @if ($stage->etat > 5)
                                            <tr>
                                                <th scope="row">@lang('intranet.Avis jury')</th>
                                                <td>
                                                    @switch($stage->avis_jury)
                                                        @case(1)
                                                            @lang('intranet.avis_jury_1')
                                                        @break

                                                        @case(2)
                                                            @lang('intranet.avis_jury_2')
                                                        @break

                                                        @case(3)
                                                            @lang('intranet.avis_jury_3')
                                                        @break

                                                        @case(4)
                                                            @lang('intranet.avis_jury_4')
                                                        @break
                                                    @endswitch
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="row">@lang('intranet.Résultat')</th>
                                                <td>{{ $stage->resultat_jury }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">@lang('intranet.Remarque jury')</th>
                                                @if ($stage->remarque_jury)
                                                    <td>{{ $stage->remarque_jury }}</td>
                                                @else
                                                    <td> @lang('intranet.Aucune remarque') </td>
                                                @endif
                                            </tr>
                                        @endif
                                    </tbody>
                                </table>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>


    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@7"></script>
    <script>
        function sureAutoriseRapport(id) {
            swal({
                    title: "êtes-vous sûr?",
                    text: "Une fois autorisé, vous ne serez pas en mesure de modifier votre avis!",
                    type: "question",
                    showCancelButton: true,
                    confirmButtonText: "Autoriser",
                    cancelButtonText: "Annuler",
                })
                .then((willDelete) => {
                    console.log(willDelete)
                    if (willDelete.value) {
                        document.getElementById('rapport_' + id).submit()
                    }
                    document.getElementById('check').checked = false
                });
        }

        function sureDeleteRapport(id) {
            swal({
                    title: "êtes-vous sûr?",
                    text: "Une fois supprimé, vous ne serez pas en mesure de récupérer ce fichier!",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonText: "Supprimer",
                    cancelButtonText: "Annuler",
                })
                .then((willDelete) => {
                    console.log(willDelete)
                    if (willDelete.value) {
                        console.log(id)
                        document.getElementById('delete_rapport_' + id).submit()
                    }
                });
        }


        function TeacherUpload() {
            var file = document.getElementById("filerectTeacher").files[0];
            document.getElementById("showFileTeacher").innerHTML = file.name + "(" + (file.size / 1024).toFixed('3') +
                " Ko )";
        }

        function StudentUpload() {
            var file = document.getElementById("filerectStudent").files[0];
            document.getElementById("showFileStudent").innerHTML = file.name + "(" + (file.size / 1024).toFixed('3') +
                " Ko )";
        }

        function companytUpload() {
            var file = document.getElementById("filerectCompany").files[0];
            document.getElementById("showFileCompany").innerHTML = file.name + "(" + (file.size / 1024).toFixed('3') +
                " Ko )";
        }

        function addRemarqueEncadrant(id) {

            document.getElementById("remarque_encadrant" + id).style.display = "block";
            document.getElementById("add_remarque_encadrant" + id).style.display = "none";
        }

        function removeActivity(activity_id) {
            swal({
                    title: "êtes-vous sûr ?",
                    text: "Une fois supprimé, vous ne serez pas en mesure de récupérer ce fichier!",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonText: "Supprimer",
                    cancelButtonText: "Annuler",
                })
                .then((willDelete) => {
                    console.log(willDelete)
                    if (willDelete.value) {

                        document.getElementById('delete-activity-' + activity_id).submit()
                    }
                });
        }
    </script>
@endsection
