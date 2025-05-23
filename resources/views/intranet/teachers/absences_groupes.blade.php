@extends('intranet.layouts.app')
@section('content')
    <style>
        .panel-title>a.collapsed:before {
            display: none
        }

        .panel-title>a:before {
            display: none
        }

        .force_checkbox {
            position: unset !important;
            visibility: visible !important;
            width: unset !important;
            height: unset !important;
        }

        .large_checkbox {

            width: 20px !important;
            height: 20px !important;
        }
    </style>
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
    @include('widgets.sweet_alert')
    <div class="col-md-12 fcrse_2" style="padding-bottom: 30px;">
        <div class="value_content">
            <h4 class="">@lang('intranet.Liste des groupes')</h4>
        </div>
    </div>
    <div class="col-lg-12 col-md-12 mt-10 p-0">
        <div class="sign_form" style="padding: 0px">
            <div class="main-tabs" style="margin-bottom: 0px;">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    @php
                        $j = 0;
                    @endphp
                    @foreach ($groups as $group)
                        @php
                            $j = $j + 1;
                        @endphp
                        <li class="nav-item-w">
                            <a href="#groupe{{ $group->id }}" id="tab{{ $group->id }}"
                                class="nav-link {{ $j == 1 ? 'active' : '' }}" data-toggle="tab">{{ $group->$designation }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="tab-content" id="myTabContent">
                @php
                    $i = 0;
                @endphp
                @foreach ($groups as $group)
                    @php
                        $i = $i + 1;
                    @endphp
                    <div class="tab-pane fade {{ $i == 1 ? 'show active' : '' }} " id="groupe{{ $group->id }}"
                        style="opacity: 1" role="tabpanel" aria-labelledby="tab{{ $group->id }}">

                        <div class="membership__right" style="float: left;">
                            <div class="memmbership_price">{{ $group->groupTd->count() }} @lang('intranet.Groupe(s)') </div>
                        </div>
                        @foreach ($group->groupTd as $group_td)
                            <div class="panel-group accordion" id="accordion0" style="margin-top: 0px;">
                                <div class="panel panel-default">
                                    <div class="panel-heading" id="headingOne">
                                        <div class="panel-title" style="display : flow-root">
                                            <a class="collapsed" data-toggle="collapse"
                                                data-target="#collapse{{ $group_td->id }}" href="#"
                                                aria-expanded="false" aria-controls="collapse{{ $group_td->id }}"
                                                style="padding: 0px;">

                                                <div class="col-md-3" style="display: inline-block;">
                                                    <i class="uil uil-users-alt crse_icon"></i>
                                                    &nbsp;{{ $group_td->$designation }}
                                                </div>
                                                <div class="col-md-3" style="display: inline-block;font-size: 14px;">
                                                    {{ $group_td->students->count() }} @lang('intranet.Etudiants')
                                                </div>

                                                <div class="col-md-3" style="font-size: 14px;">
                                                    <a data-toggle="modal" data-target="#absent{{ $group_td->id }}"
                                                        class="w" style="cursor:pointer;">
                                                        <i class="uil uil-file-check-alt crse_icon"></i> @lang('intranet.Marquer les absents')
                                                    </a>
                                                </div>
                                                   <div class="col-md-3" style="font-size: 16px;">
                                                    <a href="{{ route('print_absences', ['id' => $group_td->id]) }}" target="_blank"
                                                        class="w" style="float:inline-end;">
                                                        <i class="uil uil-print"></i>
                                                    </a>
                                                </div>

                                                {{-- modal of marking absent --}}
                                                <div class="modal fade large" id="absent{{ $group_td->id }}" tabindex="-1"
                                                    role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document" style="max-width: 1000px;">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">
                                                                    {{ $group_td->$designation }}</h5>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <form action="{{ route('mark_absents') }}" method="POST">
                                                                @csrf
                                                                <div class="modal-body">

                                                                    <input type="hidden" name="group_td_id"
                                                                        value="{{ $group_td->id }}">
                                                                    <div class="row">
                                                                        <div class="col-md-4">
                                                                            <label  >@lang('intranet.Matière')</label>
                                                                            <select name="subject_id" class="form-control"
                                                                                required>

                                                                                @foreach ($subjects as $subject)
                                                                                    <option value="{{ $subject->id }}">
                                                                                        {{ $subject->$designation }}
                                                                                    </option>
                                                                                @endforeach
                                                                            </select>
                                                                        </div>

                                                                        <div class="col-md-4">
                                                                            <label  >@lang('intranet.Date')</label>
                                                                            <input type="date" name="date"
                                                                                class="form-control" required
                                                                                value="{{ date('Y-m-d') }}" max="{{ date('Y-m-d') }}" min="{{ $min_date }}" />
                                                                        </div>
                                                                        <div class="col-md-4">
                                                                            <label  >@lang('intranet.Séance')</label>
                                                                            <select name="period_id" class="form-control"
                                                                                required>
                                                                                @foreach ($seances as $seance)
                                                                                    <option value="{{ $seance->id }}">
                                                                                        {{ $seance->$designation }}
                                                                                    </option>
                                                                                @endforeach
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <small class="text-danger" style="font-size: 14px">@lang('intranet.Cochez les absents')</small>

                                                                    <table class="table">
                                                                        <thead style="font-weight: 600;">
                                                                            <tr>
                                                                                <th>@lang('intranet.Ordre')</th>
                                                                                <th>@lang("intranet.Numéro d'inscription")</th>
                                                                                <th>@lang('intranet.Nom')</th>
                                                                                <th>@lang('intranet.Prénom')</th>
                                                                                <th>@lang('intranet.Etat')</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>

                                                                            @foreach ($group_td->students as $student)
                                                                                <tr>
                                                                                    <th>{{ $loop->iteration }}</th>
                                                                                    <th>{{ $student->numero_inscription }}
                                                                                    </th>
                                                                                    <th>{{ $student->nom }}</th>
                                                                                    <th>{{ $student->prenom }}</th>
                                                                                    <th>

                                                                                        <input type="checkbox"
                                                                                            name="absent{{ $student->id }}"
                                                                                            class="force_checkbox large_checkbox"
                                                                                            value="1">
                                                                                    </th>
                                                                                </tr>
                                                                            @endforeach
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-dismiss="modal">@lang('intranet.Annuler')</button>
                                                                    <button type="submit"
                                                                        class="btn btn-primary">@lang('intranet.Enregistrer')</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                {{-- modal of marking absent end --}}

                                            </a>
                                        </div>
                                    </div>
                                    <div id="collapse{{ $group_td->id }}" class="panel-collapse collapse"
                                        role="tabpanel" aria-labelledby="headingOne" data-parent="#accordion0">
                                        <div class="panel-body">
                                            @php
                                                $groupTdId = $group_td->id;
                                                $dateBySubjectId = App\Absence::where('group_td_id', $groupTdId)
                                                    ->where('teacher_cin', Auth::user()->cin)
                                                ->orderBy('date', 'desc')
                                                    ->get()
                                                    ->groupBy('subject_designation');
                                            @endphp

                                            <h5 class="mb-3 mt-3">
                                                @lang('intranet.Historique des absences')
                                                {{-- - {{ $group_td->designation_fr }} --}}
                                            </h5>

                                            @if($dateBySubjectId->isNotEmpty())
                                            {{-- Navigation Tabs --}}
                                            <ul class="nav nav-tabs" id="absenceTabs" role="tablist">
                                                @foreach ($dateBySubjectId as $subject => $dates)
                                                    <li class="nav-item">
                                                        <a class="nav-link {{ $loop->first ? 'active' : '' }}" id="tab-{{ Str::slug($subject) }}" data-toggle="tab"
                                                            href="#content-{{ Str::slug($subject) }}" role="tab">
                                                            {{ $subject }}
                                                        </a>
                                                    </li>
                                                @endforeach
                                            </ul>

                                            {{-- Tab Content --}}
                                            <div class="tab-content mt-3">
                                                @foreach ($dateBySubjectId as $subject => $dates)
                                                    <div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}" id="content-{{ Str::slug($subject) }}" role="tabpanel">
                                                        <div class="table-responsive">
                                                            <table class="table table-bordered table-striped">
                                                                <thead class="thead-dark">
                                                                    <tr>
                                                                        <th>@lang("intranet.Date")</th>
                                                                        <th>@lang("intranet.Séance")</th>
                                                                        <th>@lang("intranet.Action")</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    @foreach ($dates as $date)
                                                                        <tr>
                                                                            <td>{{ $date->date }}</td>
                                                                            <td>{{ @$date->seance->designation_fr }} ({{ @$date->seance->start_hour }} - {{ @$date->seance->end_hour }})</td> <!-- Convert period_id -->
                                                                            <td>
                                                                                <a href="{{ route('absences.details', ['id' => $date->id]) }}"
                                                                                    class="btn btn-primary btn-sm">
                                                                                   @lang('intranet.Détails')
                                                                                </a>
                                                                            </td>
                                                                        </tr>
                                                                    @endforeach
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        @else
                                            <p class="text-center text-muted">Aucune absence enregistrée.</p>
                                        @endif

                                        </div>
                                    </div>
                                </div>
                            </div>

                                 {{-- modal history absence start --}}
                                 {{-- <div class="modal fade" id="history{{ $group_td->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">
                                                    @lang('intranet.Historique des absences') - {{ $group_td->designation_fr }}
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>

                                            @php
                                                $groupTdId = $group_td->id;
                                                $dateBySubjectId = App\Absence::where('group_td_id', $groupTdId)
                                                    ->where('teacher_cin', Auth::user()->cin)
                                                  ->orderBy('date', 'desc')
                                                    ->get()
                                                    ->groupBy('subject_designation');

                                            @endphp

                                            <div class="modal-body">
                                                @if($dateBySubjectId->isNotEmpty())

                                                    <ul class="nav nav-tabs" id="absenceTabs" role="tablist">
                                                        @foreach ($dateBySubjectId as $subject => $dates)
                                                            <li class="nav-item">
                                                                <a class="nav-link {{ $loop->first ? 'active' : '' }}" id="tab-{{ Str::slug($subject) }}" data-toggle="tab"
                                                                    href="#content-{{ Str::slug($subject) }}" role="tab">
                                                                    {{ $subject }}
                                                                </a>
                                                            </li>
                                                        @endforeach
                                                    </ul>


                                                    <div class="tab-content mt-3">
                                                        @foreach ($dateBySubjectId as $subject => $dates)
                                                            <div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}" id="content-{{ Str::slug($subject) }}" role="tabpanel">
                                                                <div class="table-responsive">
                                                                    <table class="table table-bordered table-striped">
                                                                        <thead class="thead-dark">
                                                                            <tr>
                                                                                <th>@lang("intranet.Date")</th>
                                                                                <th>@lang("intranet.Séance")</th>
                                                                                <th>@lang("intranet.Action")</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            @foreach ($dates as $date)
                                                                                <tr>
                                                                                    <td>{{ $date->date }}</td>
                                                                                    <td>{{ @$date->seance->designation_fr }} ({{ @$date->seance->start_hour }} - {{ @$date->seance->end_hour }})</td> <!-- Convert period_id -->
                                                                                    <td>
                                                                                        <a href="{{ route('absences.details', ['id' => $date->id]) }}"
                                                                                            class="btn btn-primary btn-sm">
                                                                                           @lang('intranet.Détails')
                                                                                        </a>
                                                                                    </td>
                                                                                </tr>
                                                                            @endforeach
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                @else
                                                    <p class="text-center text-muted">Aucune absence enregistrée.</p>
                                                @endif
                                            </div>

                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">@lang('intranet.Annuler')</button>
                                            </div>
                                        </div>
                                    </div>
                                </div> --}}
                                {{-- modal of history of absence end --}}
                        @endforeach
                    </div>
                @endforeach
            </div>
            {{-- <p class="mb-0 mt-30">Already have an account? <a href="sign_in.html">Log In</a></p> --}}
        </div>

    </div>
@endsection

