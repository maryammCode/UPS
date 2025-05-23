@extends('intranet.layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-12 fcrse_2" style="padding-bottom: 30px;">
            <div class="value_content">
                <h4 class="">@lang('intranet.Stages')</h4>
            </div>
        </div>
        <div class="_215td5 col-md-12" style="padding-top: 10px;">
            <div class="row col-md-12" style="display: block">
                <div class="my_courses_tabs" style="margin-top:0px !important;" >
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

                                <div class="table-responsive review_all120 pb-3">


                                    @php
                                        $stages = $year->stages;
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
                                        <div class="table-responsive" style="padding: 0 10px">
                                            <table id="stagesTeacher" class="table ucp-table">
                                                <thead class="thead-s">
                                                    <tr>
                                                        <th class="text-center" scope="col">@lang('intranet.Candidats')</th>
                                                        <th class="text-center">@lang('intranet.Entreprise')</th>
                                                        <th class="text-center" scope="col">@lang('intranet.Date de début')</th>
                                                        <th class="text-center" scope="col">@lang('intranet.Date de fin')</th>
                                                        <th class="text-center" scope="col">@lang('intranet.Sujet')</th>
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
                                                            <td class="text-center">{{ @$stage->entreprise->designation }}
                                                            </td>
                                                            <td class="text-center">
                                                                {{ Carbon\Carbon::parse($stage->start)->format('d-m-Y') }}
                                                            </td>
                                                            <td class="text-center">
                                                                {{ Carbon\Carbon::parse($stage->end)->format('d-m-Y') }}
                                                            </td>
                                                            <td class="text-center" style="width: 20%;">{{ $stage->sujet }}
                                                            </td>
                                                            <td class="text-center">
                                                                <b class="course_active"
                                                                    style="display: flex;justify-content: center;">
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
                                                                @elseif ($stage->teacher_validation == 1)
                                                                    <span class="badge badge-danger text-center"
                                                                        style="font-size: 12px">@lang('intranet.Stage validé en attente de soutenance')</span>
                                                                @elseif ($stage->acceptation == 1)
                                                                    <span class="badge badge-success text-center"
                                                                        style="font-size: 12px">@lang('intranet.Stage en cours')</span>
                                                                @elseif ($stage->teacher_acceptation == 1)
                                                                    <span class="badge badge-success text-center"
                                                                        style="font-size: 12px">@lang("intranet.En attente d'affectation par la direction des stages")</span>
                                                                @else
                                                                    @if ($stage_with_acceptation < $max_supervising_nb)
                                                                        <form action="{{ route('teacherAcceptStage') }}"
                                                                            method="POST">
                                                                            @csrf
                                                                            <input type="text" name="stage_id"
                                                                                value="{{ $stage->id }}" hidden>
                                                                            <button
                                                                                class="acceptation-stage">@lang('intranet.Accepter')</button>
                                                                        </form>
                                                                    @else
                                                                        <span class="badge badge-info text-center"
                                                                            style="font-size: 12px">@lang("intranet.Vous avez terminé le nombre maximum d'étudiants")</span>
                                                                    @endif
                                                                @endif

                                                            </td>
                                                            <td class="text-center">
                                                                <a href="{{ route('stage_details', ['id' => $stage->id]) }}"
                                                                    title="Détails" class="gray-s"><i
                                                                        class="uil uil-eye"></i></a>
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
@endsection
@section('specific_js')
<script src="{{ asset('public/data_table/jquery.dataTables.min.js') }}"></script>
<script>
    $(document).ready(function () {
        $('#stagesTeacher').DataTable({
            layout: {
                topStart: {
                    buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
                }
            }
        });
    });
</script>
@endsection
