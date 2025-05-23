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
        <div class="value_content text-center">
            {{-- <h4 class="">{{$absences[0]->subject_designation}}</h4> --}}
            <h2>Détails d'absence - {{ $absence->subject_designation }}</h2>
            <p><span style="font-weight: 600">@lang('intranet.Groupe')</span> : {{ $absence->group_td_designation }} <span
                    style="font-weight: 600"> @lang('intranet.Séance') : </span>
                {{ $absence->seance->designation_fr ?? 'Non défini' }} <span style="font-weight: 600">
                    @lang('intranet.Date') :</span> {{ $absence->date }}</p>
        </div>
    </div>
    <div class="col-lg-12 col-md-12 mt-10 p-0">
        <div class="container">
            <table id="students" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>@lang('intranet.Nom & Prénom')</th>
                        <th>@lang('intranet.CIN')</th>
                        <th>@lang('intranet.Statut')</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($students as $key => $student)
                        <tr>
                            <td style="@if(in_array($student->cin, $absentStudents)) background-color: #f7dfdf; @endif">
                                {{ $key + 1 }}</td>
                            <td style="@if(in_array($student->cin, $absentStudents)) background-color: #f7dfdf; @endif">
                                {{ $student->nom }} {{ $student->prenom }}</td>
                            <td style="@if(in_array($student->cin, $absentStudents)) background-color: #f7dfdf; @endif">
                                {{ $student->cin }}</td>
                            <td>
                                {{-- <form action="{{ route('absences.update') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="absence_id" value="{{ $absence->id }}">
                                    <input type="hidden" name="stuudent_cin" value="{{  $student->cin}}">
                                    <input type="hidden" name="student_name"
                                        value="{{  $student->nom }} {{ $student->prenom }}">
                                    <select name="status" class="absence-status form-control" data-student="{{ $student->cin }}"
                                        data-absence="{{ $absence->id }}" onchange="this.form.submit()">
                                        <option value="present" {{ !in_array($student->cin, $absentStudents) ? 'selected' : ''
                                            }}>Présent</option>
                                        <option value="absent" {{ in_array($student->cin, $absentStudents) ? 'selected' : ''
                                            }}>Absent</option>
                                    </select>
                                </form> --}}
                                @if ($allow_update)
                                <form id="absenceForm{{ $student->cin }}" action="{{ route('absences.update') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="absence_id" value="{{ $absence->id }}">
                                    <input type="hidden" name="student_cin" value="{{ $student->cin }}">
                                    <input type="hidden" name="student_name" value="{{ $student->nom }} {{ $student->prenom }}">
                                    <select name="status" class="absence-status form-control" data-student="{{ $student->cin }}"
                                        data-absence="{{ $absence->id }}">
                                        <option value="present" {{ !in_array($student->cin, $absentStudents) ? 'selected' : '' }}>Présent</option>
                                        <option value="absent" {{ in_array($student->cin, $absentStudents) ? 'selected' : '' }}>
                                            Absent</option>
                                    </select>
                                </form>
                                @else
                                    @if (in_array($student->cin, $absentStudents))
                                        <span class="badge badge-danger">Absent</span>
                                    @else
                                        <span class="badge badge-success">Présent</span>
                                    @endif
                                @endif

                            </td>
                        </tr>

                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
@section('specific_js')
    <script src="{{ asset('public/data_table/jquery.dataTables.min.js') }}"></script>
    <script>
        $(document).ready(function () {
            $('#students').DataTable({
                layout: {
                    topStart: {
                        buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
                    }
                }
            });
        });



        // update absence


            document.querySelectorAll('.absence-status').forEach(function (select) {
                select.addEventListener('change', function () {
                    var studentCin = this.dataset.student;
                    var absenceId = this.dataset.absence;
                    var status = this.value;
                    var form = document.getElementById('absenceForm' + studentCin);

                    Swal.fire({
                        title: "Êtes-vous sûr?",
                        text: "Voulez-vous vraiment mettre à jour le statut d'absence?",
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#d33",
                        cancelButtonColor: "#3085d6",
                        confirmButtonText: "Oui, mettre à jour!",
                        cancelButtonText: "Annuler"
                    }).then((result) => {
                        console.log(result);
                        if (result.value) {
                            console.log('submitting form');
                            form.submit();
                        } else {
                            this.value = this.dataset.previousValue;
                        }
                    });

                    // Store previous value in case user cancels
                    this.dataset.previousValue = status;
                });
            });

    </script>
@endsection
