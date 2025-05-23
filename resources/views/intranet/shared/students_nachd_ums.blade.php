@extends('intranet.layouts.app')
@section('content')
    <div class="col-md-12 fcrse_2 hidden-print" style="padding-bottom: 30px;">
        <div class="value_content">
            <h4>@lang('intranet.Emploi de temps')</h4>
            <p>@lang('intranet.A partir de') </p>
        </div>
    </div>
    <div class="_14d25">
        <div class="pp" style="padding-top: 15px;">
            <style type="text/css">
                .schedule-table table thead tr {
                    background: #d8d8d8;
                }

                .schedule-table table thead th {
                    padding: 25px 50px;
                    color: #222222;
                    text-align: center;
                    font-size: 18px;
                    font-weight: 600;
                    position: relative;
                    border: 0;

                }

                .schedule-table table thead th:before {
                    content: "";
                    width: 3px;
                    height: 35px;
                    background: rgba(255, 255, 255, 0.2);
                    position: absolute;
                    right: -1px;
                    top: 50%;
                    transform: translateY(-50%);
                }

                .schedule-table table thead th.last:before {
                    content: none;
                }

                .schedule-table table tbody td {
                    vertical-align: middle;
                    border: 1px solid #e2edf8;
                    font-weight: 500;
                    /* padding: 30px; */
                    text-align: center;
                }

                .schedule-table table tbody td.day {
                    font-size: 18px;

                    font-weight: 600;
                    background: #f0f1f3;
                    border: 1px solid #e4e4e4;
                    position: relative;
                    transition: all 0.3s linear 0s;
                    min-width: 100px;
                }

                .schedule-table table tbody td.active {
                    position: relative;
                    z-index: 10;
                    transition: all 0.3s linear 0s;
                    min-width: 165px;
                    padding: 1px;
                }

                .schedule-table table tbody td.active h4 {
                    font-weight: 700;
                    color: #000;
                    font-size: 15px;
                    margin-bottom: 5px;
                }

                .schedule-table table tbody td.active p {
                    font-size: 14px;
                    line-height: normal;
                    margin-bottom: 0;
                    color: #000;
                }

                .schedule-table table tbody td .hover h4 {
                    font-weight: 700;
                    font-size: 20px;
                    color: #ffffff;
                    margin-bottom: 5px;
                }

                .schedule-table table tbody td .hover p {
                    font-size: 16px;
                    margin-bottom: 5px;
                    color: #ffffff;
                    line-height: normal;
                }

                .schedule-table table tbody td .hover span {
                    color: #ffffff;
                    font-weight: 600;
                    font-size: 18px;
                }

                .schedule-table table tbody td.active::before {
                    position: absolute;
                    content: "";
                    min-width: 100%;
                    min-height: 100%;
                    transform: scale(0);
                    top: 0;
                    left: 0;
                    z-index: -1;
                    border-radius: 0.25rem;
                    transition: all 0.3s linear 0s;
                }

                .schedule-table table tbody td .hover {
                    position: absolute;
                    left: 50%;
                    top: 50%;
                    width: 120%;
                    height: 120%;
                    transform: translate(-50%, -50%) scale(0.8);
                    z-index: 99;
                    background: #86d4f5;
                    border-radius: 0.25rem;
                    padding: 25px 0;
                    visibility: hidden;
                    opacity: 0;
                    transition: all 0.3s linear 0s;
                }

                .schedule-table table tbody td.active:hover .hover {
                    transform: translate(-50%, -50%) scale(1);
                    visibility: visible;
                    opacity: 1;
                }

                .schedule-table table tbody td.day:hover {
                    background: #86d4f5;
                    color: #fff;
                    border: 1px solid #86d4f5;
                }

                .td {
                    background: #6EDEC7 !important;
                }

                .tp {
                    background: #DEC76E !important;
                }

                .cours {
                    background: #6ca9de !important;
                }

                @media screen and (max-width: 1199px) {
                    .schedule-table {
                        display: block;
                        width: 100%;
                        overflow-x: auto;
                    }

                    .schedule-table table thead th {
                        padding: 25px 40px;
                    }

                    .schedule-table table tbody td {
                        padding: 20px;
                    }

                    .schedule-table table tbody td.active h4 {
                        font-size: 18px;
                    }

                    .schedule-table table tbody td.active p {
                        font-size: 15px;
                    }

                    .schedule-table table tbody td.day {
                        font-size: 20px;
                    }

                    .schedule-table table tbody td .hover {
                        padding: 15px 0;
                    }

                    .schedule-table table tbody td .hover span {
                        font-size: 17px;
                    }
                }

                @media screen and (max-width: 991px) {
                    .schedule-table table thead th {
                        font-size: 18px;
                        padding: 20px;
                    }

                    .schedule-table table tbody td.day {
                        font-size: 18px;
                    }

                    .schedule-table table tbody td.active h4 {
                        font-size: 17px;
                    }
                }

                @media screen and (max-width: 767px) {
                    .schedule-table table thead th {
                        padding: 15px;
                    }

                    .schedule-table table tbody td {
                        padding: 15px;
                    }

                    .schedule-table table tbody td.active h4 {
                        font-size: 16px;
                    }

                    .schedule-table table tbody td.active p {
                        font-size: 14px;
                    }

                    .schedule-table table tbody td .hover {
                        padding: 10px 0;
                    }

                    .schedule-table table tbody td.day {
                        font-size: 18px;
                    }

                    .schedule-table table tbody td .hover span {
                        font-size: 15px;
                    }
                }

                @media screen and (max-width: 575px) {
                    .schedule-table table tbody td.day {
                        min-width: 135px;
                    }
                }

                .specific {
                    color: #cc2727;
                    font-size: 12pt;
                }


                .div_seance {

                    border-bottom: 1px solid #fff;


                }

                @media print {


                    .wrapper,
                    .container-fluid,
                    .pp,
                    .col-xl-12,
                    .col-lg-12 {
                        padding: 0;
                        margin: 0;
                    }

                    @page {
                        zoom: 0.7;
                    }

                    body {
                        background-color: #fff !important;
                        background: #fff !important
                    }


                    .pp {

                        zoom: 0.7;

                    }


                }

                @page {
                    size: landscape;
                }

                .trhead th {
                    background-color: #8bc34a61 !important;
                    color: #000 !important;
                    font-weight: 600 !important;
                    border-bottom: none !important
                }
            </style>

            {{-- <div class="w-95 w-md-75 w-lg-60 w-xl-55 mx-auto mb-6 text-center">
                <div class="subtitle alt-font"><span class="text-primary">#04</span><span class="title">Timetable</span>
                </div>
                <h2 class="display-18 display-md-16 display-lg-14 mb-0">Committed to fabulous and great <span
                        class="text-primary">#Timetable</span></h2>
            </div> --}}
            <div class="row">
                <div class="col-md-12 ">
                    @if ($role->name == 'Enseignant')
                        <div class="panel p-4">
                            @foreach ($timetable as $table)
                                @php
                                    $not_null_data = array_filter($table['days'], null);

                                @endphp
                                @if (sizeof($not_null_data) != 0)
                                    <h4>{{ $table['abbreviation'] }}</h4>

                                    <table class="table" style="margin-bottom: 15pt">
                                        <thead class="thead-dark">
                                            <tr class="trhead">
                                                <th></th>
                                                <th>Horaire</th>
                                                <th>Matière</th>
                                                <th>Groupe</th>
                                                <th>Salle</th>
                                                <th>Type</th>
                                            </tr>
                                        </thead>

                                        @foreach ($table['days'] as $seance)
                                            @if ($seance)
                                                <tr>
                                                    <td style="width:5% !important">
                                                        <div
                                                            class="@if (@$seance['subject_type']['abbreviation'] == 'C') cours @elseif(@$seance['subject_type']['abbreviation'] == 'TD') td @else tp @endif p-1 text-center">
                                                            <b>{{ $seance['subject_type']['abbreviation'] }}</b>
                                                        </div>
                                                    </td>
                                                    <td style="width:22% !important">
                                                        {{ @$seance['start_hour'] }} - {{ @$seance['end_hour'] }}

                                                    </td>
                                                    <td style="width:35% !important">
                                                        {{ @$seance['subject']['abbreviation'] }}

                                                    </td>
                                                    <td style="width:15% !important">
                                                        {{ @$seance['section']['abbreviation'] }}
                                                        @if (@$seance['group_td'])
                                                            - {{ @$seance['group_td']['abbreviation'] }}
                                                        @endif
                                                        @if (@$seance['group_tp'])
                                                            - {{ @$seance['group_tp']['abbreviation'] }}
                                                        @endif
                                                    </td>
                                                    <td style="width:8% !important">
                                                        {{ @$seance['classroom']['abbreviation'] }}
                                                    </td>


                                                    <td style="width:15% !important">
                                                        {{ @$seance['week_name'] }}
                                                    </td>
                                                </tr>
                                            @endif
                                        @endforeach
                                    </table>
                                @endif
                            @endforeach
                        </div>
                    @elseif($role->name == 'Etudiant')
                        @if (@$error)
                            @include('name')
                        @else
                            <div class="schedule-table" id="emploi">
                                <table class="table bg-white" style="zoom: 0.8;">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            @foreach ($periods as $period)
                                                <th>{{ $period['start_hour'] }} - {{ $period['end_hour'] }}</th>
                                            @endforeach
                                            {{-- <th class="last">07pm</th> --}}
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($lines as $line)
                                            <tr>
                                                <td class="day">{{ $line['abbreviation'] }}</td>
                                                @foreach ($line['days'] as $col)
                                                    <td class="active">
                                                        @foreach ($col['seances'] as $seance)
                                                            <div class="div_seance @if (@$seance['subject_type']['abbreviation'] == 'C') cours @elseif(@$seance['subject_type']['abbreviation'] == 'TD') td @else tp @endif "
                                                                style="position:relative;padding: 15px
                                                                    ">


                                                                <div
                                                                    style="position: absolute;top: 0;right: 0;background: #666 !important;padding: 10px;  color: white; font-weight: 600;">
                                                                    {{ @$seance['subject_type']['abbreviation'] }}
                                                                </div>
                                                                <h4 style="margin-right: 22px;">
                                                                    {{ @$seance['subject']['abbreviation'] }}</h4>
                                                                @if (
                                                                    @$seance['start_hour'] != @$seance['period']['start_hour'] ||
                                                                        @$seance['end_hour'] != @$seance['period']['end_hour']
                                                                )
                                                                    <span class="specific">({{ @$seance['start_hour'] }} -
                                                                        {{ @$seance['end_hour'] }})</span>
                                                                @endif
                                                                <p>{{ @$seance['classroom']['abbreviation'] }} |
                                                                    {{ @$seance['week_name'] }} </p>
                                                                <span>{{ @$seance['teacher']['first_name'] }}</span>
                                                                <span>{{ @$seance['teacher']['last_name'] }}</span>
                                                                @if ($seance['group_tp'])
                                                                    <span>{{ @$seance['group_tp']['abbreviation'] }}</span>
                                                                @endif

                                                                {{-- <div class="hover">
                                                                        <h4>Weight Loss</h4>
                                                                        <p>{{ @$seance['subject']['abbreviation'] }}</p>
                                                                        <span>Wayne Ponce</span>
                                                                    </div> --}}
                                                            </div>
                                                        @endforeach
                                                    </td>
                                                @endforeach
                                                {{-- <td></td>
                                                    <td class="active">
                                                        <h4>Yoga</h4>
                                                        <p>03 pm - 04 pm</p>
                                                        <div class="hover">
                                                            <h4>Yoga</h4>
                                                            <p>03 pm - 04 pm</p>
                                                            <span>Francisco Watt</span>
                                                        </div>
                                                    </td>
                                                    <td class="active">
                                                        <h4>Boxing</h4>
                                                        <p>05 pm - 06 pm</p>
                                                        <div class="hover">
                                                            <h4>Boxing</h4>
                                                            <p>05 pm - 046am</p>
                                                            <span>Charles King</span>
                                                        </div>
                                                    </td>
                                                    <td></td> --}}
                                            </tr>
                                        @endforeach


                                    </tbody>
                                </table>
                            </div>
                        @endif
                    @endif
                </div>
            </div>
            <script type="text/javascript"></script>
        </div>
    </div>
@endsection
