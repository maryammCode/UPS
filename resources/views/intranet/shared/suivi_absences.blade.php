@extends('intranet.layouts.app')
@section('content')
@include('widgets.sweet_alert')
<style>
    .card {
        border-radius: 3px;
        transition: box-shadow 0.2s ease-in-out;
    }

    .card:hover {
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .card-header {
        border-bottom: none;
    }

    .mb_5 {
        margin-bottom: 5px !important;
    }

    .strong {
        font-weight: 600 !important;
    }

    .title_font_size {
        font-size: 15px;
    }
    .span_font_size{
        font-size: 11px !important;
    }
</style>
<div class="row">
    <div class="col-md-12 fcrse_2" style="padding-bottom: 25px;">
        <div class="value_content stage_header">
            <h4 class="">@lang("intranet.Liste d'absences")</h4>
            {{-- <button class="btn btn-primary " data-toggle="modal" data-target="#exampleModal"> + Ajouter </button>
            --}}
        </div>
    </div>
    <div class="col-lg-12 col-md-12">

        @foreach($absences as $subject => $absenceList)
                @php
                    $firstAbsence = $absenceList->first()->absence;
                    $maxAbsences = $firstAbsence->subject->max_absence_nb ?? 4;
                    // $totalAbsences = count($absenceList);
                    $totalAbsences = $absenceList->where('reclamation', '!=', 2)->count();

                    // styling class
                    $statusClass = '#fff !important';
                    if ($totalAbsences == $maxAbsences) {
                        $statusClass = '#ffe5cf !important';

                    } elseif ($totalAbsences > $maxAbsences) {
                        $statusClass = '#ffd0cf !important';

                    }
                @endphp

                <div class="card mb-4 shadow-sm border-2 ">
                    <div class="card-header bg-light  d-flex justify-content-between align-items-center"
                        style="background:{{ $statusClass }};">
                        <h4 class="strong mb_5 title_font_size">{{ $subject }} ({{ $totalAbsences }} / {{ $maxAbsences }})</h4>
                        {{-- <span class="badge badge-primary">Vous êtes éliminé</span> --}}
                    </div>
                    <div class="card-body pt-2">
                        <ul class="list-group">
                            @foreach($absenceList as $absenceStudent)
                                <li class="list-group-item d-flex justify-content-between">
                                    <div>
                                        <span>
                                            <span class="strong"> <i class="uil uil-calender"></i> @lang('intranet.Le')</span> {{ @$absenceStudent->absence->date }}
                                        </span>
                                        <span class="strong">
                                         <i class="uil uil-book-open"></i>   {{ @$absenceStudent->absence->seance->designation_fr ?? 'Unknown' }}
                                        </span>
                                        <span class="strong">
                                          &nbsp;  - <i class="uil uil-user"></i> @lang('intranet.Enseignant(e)') : {{ @$absenceStudent->absence->teacher_name}}
                                        </span>
                                    </div>
                                    <div>
                                        @if ($absenceStudent->reclamation == 0)
                                            <form action="{{ route('reclamationAbsence', $absenceStudent->id) }}" method="POST">
                                                @csrf
                                                {{-- <input type="text" name=""> --}}
                                                <button type="submit"
                                                    class="btn btn-secondary btn-sm">@lang('intranet.Réclamer')</button>
                                            </form>

                                        @else
                                            @switch($absenceStudent['reclamation'])
                                                @case(1)
                                                    <span class="badge badge-info span_font_size">@lang('intranet.Réclamation envoyée')</span>
                                                @break
                                                @case(2)
                                                    <span class="badge badge-success span_font_size">@lang('intranet.Traitée')</span>
                                                @break
                                                @case(3)
                                                    <span class="badge badge-danger span_font_size">@lang('intranet.Rejetée')</span>
                                                @break
                                            @endswitch

                                        @endif
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                        {{-- <div class="alert alert-danger text-center fw-bold" role="alert">
                            <p>Vous êtes éliminé pour cette matière</p>
                        </div> --}}
                    </div>
                </div>
        @endforeach

        {{-- @foreach($absences as $subject => $absenceList)
        <div class="card mb-3">
            <div class="card-header">
                <h5>{{ $subject }} ({{count($absenceList)}} / {{@$subject->max_absence_nb ?? 3}})</h5>
            </div>
            <div class="card-body">
                <ul class="list-group">
                    @foreach($absenceList as $absenceStudent)
                    <li class="list-group-item">
                        Date: {{ @$absenceStudent->absence->date }} | Séance: {{ @$absenceStudent->absence->period_id }}
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
        @endforeach --}}
    </div>
</div>
@endsection
