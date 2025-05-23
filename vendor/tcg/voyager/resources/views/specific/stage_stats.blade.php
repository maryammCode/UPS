@extends('voyager::master')

@section('page_title', 'Statistiques')

@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        .text-dark{
            color : #000;
        }
        th ,td{
            color : #000
        }
        @media print{
            .hide_print{
                display : none
            }
        }
    </style>
@stop



@section('content')

<div class="container text-dark">
    <div class="panel hide_print" style="text-align: right">
            <button class="btn btn-primary" onclick="window.print()"><i class="icon voyager-file-text"></i></button>

            <div class="col-md-3" style="margin: 5px">
                    @php
                        $years = App\Year::all();
                    @endphp
                    <form>
                    <select name="year_id" id="" class="form-control" onchange="this.form.submit()">
                        @foreach ($years as $y)
                            <option value="{{$y->id}}" @if(@$selectedYear->id == $y->id) selected @endif> {{$y->designation}}</option>
                        @endforeach
                    </select>
                    </form>
                </div>
    </div>
    <div class="panel">  <h3 class="mb-4 text-center text-danger" style="color: rgb(32, 15, 95)">Statistiques des Stages de l'Année universitaire {{@$selectedYear->designation}}</h3> </div>

    @foreach($levelStatistics as $level)
    <div class="panel" style="padding : 10px">
        <h4>Etat des Stages | Niveau {{$level['level']}}</h4>
        <table class="table table-bordered panel-body">
            <thead>
                <tr>
                    <th>Nombre des etudiants</th>
                    <th colspan="2">Les inscrits en STGAE (Affectés à des encadreurs)</th>
                    <th  colspan="2">Affectation à des Sociétés</th>

                </tr>
            </thead>
            <tbody>

                <tr>
                    <td rowspan="3">Base de données : {{ $level['total_students'] }} Etudiants </td>
                    <td>Nombre {{$level['students_affected_teacher']}}</td>
                    <td>Pourcentage {{$level['percentage_affected_teacher']}} %</td>

                    <td rowspan="3">Les affectés aux sociétés <h5>Nombre : {{ $level['students_affected_company'] }}</h5>
                        <h5>Pourcentage ({{ $level['percentage_affected_company'] }}%) </h5></td>
                    <td rowspan="3"> Les NON affectés aux sociétés <h5> Nombre : {{$level['total_students']- $level['students_affected_company'] }} </h5></td>
                </tr>

                <tr>
                    <th colspan="2">Les non inscrits en STGAE (Non affectésaux encadreurs)</th>
                </tr>

                <tr>
                    <td>Nombre {{$level['students_without_stage']}}</td>
                    <td>Pourcentage {{$level['percentage_without_stage']}} %</td>
                </tr>

            </tbody>
        </table>
    </div>


    <div class="panel"  style="padding : 10px">
        <h4>Statistiques par département</h4>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Department</th>
                    <th>Total Students</th>
                    <th>With Stage</th>
                    <th>Without Stage</th>
                </tr>
            </thead>
            <tbody>
                @foreach($level['departments'] as $dept)
                <tr>
                    <td>{{ $dept['department'] }}</td>
                    <td>{{ $dept['total_students'] }}</td>
                    <td>{{ $dept['students_with_stage'] }}</td>
                    <td>{{ $dept['students_without_stage'] }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

   @endforeach
    <!-- إحصائيات حسب المستوى -->


    <!-- إحصائيات حسب القسم -->

    <div class="panel"  style="padding : 10px">
    <!-- إحصائيات المناقشات -->
    <h4>Statistiques des soutenances fr PFEs</h4>
    <table class="table table-bordered">
        @foreach($soutenanceStats as $session)
        <tr> <th>{{ $session->designation_fr }} ({{$session->start_date }} => {{$session->end_date}})</th><th> {{ $session->total ?? 0 }} PFE</th></tr>
        @endforeach
        <tr><th>Nombre de soutenance non planifiées:</th><th>{{ $stagesWithoutSoutenance }} PFE</th></tr>
    </table>

    </div>
    <div class="panel"  style="padding : 10px">

        <h4>Pourcentage des Soutenances PFEs</h4>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Department</th>
                    <th>Total PFE</th>
                    <th>With Soutenance</th>
                    <th>Without Soutenance</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pfeStats as $pfe)
                <tr>
                    <td>{{ $pfe['department'] }}</td>
                    <td>{{ $pfe['total_pfe'] }}</td>
                    <td>{{ $pfe['pfe_with_soutenance'] }}</td>
                    <td>{{ $pfe['pfe_without_soutenance'] }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>


@stop
