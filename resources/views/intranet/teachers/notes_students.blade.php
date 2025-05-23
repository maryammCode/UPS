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

        .subject-section {
            margin-bottom: 20px;
            padding: 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            background-color: #f9f9f9;
        }

        .subject-section h4 {
            margin-bottom: 15px;
            color: #333;
        }

        .notes-table {
            width: 100%;
            margin-bottom: 0;
        }

        .notes-table th, .notes-table td {
            padding: 10px;
            text-align: center;
        }

        .notes-table thead {
            background-color: #f1f1f1;
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
            <h4 class="">@lang('intranet.Notes')</h4>
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
                                                    <a data-toggle="modal" data-target="#note{{ $group_td->id }}"
                                                        class="w" style="cursor:pointer;">
                                                        <i class="uil uil-file-check-alt crse_icon"></i> @lang('intranet.Marquer les notes')
                                                    </a>
                                                </div>

                                                <div class="col-md-3" style="display: inline-block;font-size: 14px;">
                                                    <a href="{{ route('print_notes', ['id' => $group_td->id]) }}" target="_blank"
                                                        class="w" style="float:inline-end;">
                                                        <i class="uil uil-print"></i>
                                                    </a>
                                                </div>
                                                {{-- modal of marking notes students --}}
                                                <div class="modal fade large" id="note{{ $group_td->id }}" tabindex="-1"
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
                                                            <form id="markNotesForm" action="{{ route('mark_notes') }}" method="POST">
                                                                @csrf
                                                                <div class="modal-body">

                                                                    <input type="hidden" name="group_td_id"
                                                                        value="{{ $group_td->id }}">
                                                                    <div class="row">
                                                                        <div class="col-md-6">
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
                                                                        <div class="col-md-6">
                                                                            <label  >@lang('intranet.Type')</label>
                                                                            <select name="type_subject" class="form-control"
                                                                                required>
                                                                                <option value="CC">CC</option>
                                                                                <option value="DS">DS</option>
                                                                                <option value="TP">TP</option>
                                                                                <option value="EX">EX</option>
                                                                            </select>
                                                                        </div>

                                                                    </div>


                                                                    <table class="table">
                                                                        <thead style="font-weight: 600;">
                                                                            <tr>
                                                                                <th>@lang('intranet.Ordre')</th>
                                                                                <th>@lang("intranet.Numéro d'inscription")</th>
                                                                                <th>@lang('intranet.Nom & Prénom')</th>
                                                                                <th>@lang('intranet.Note')</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>

                                                                            @foreach ($group_td->students as $student)
                                                                                <tr>
                                                                                    <th>{{ $loop->iteration }}</th>
                                                                                    <th>{{ $student->numero_inscription }}
                                                                                    </th>
                                                                                    <th> {{ $student->prenom }} {{ $student->nom }}</th>
                                                                                    <th>

                                                                                        <input type="number" name="note{{ $student->id }}"
                                                                                            class="form-control" required
                                                                                            min="0" max="20" step="0.25" />
                                                                                    </th>
                                                                                </tr>
                                                                            @endforeach
                                                                        </tbody>
                                                                    </table>
                                                                </div>

                                                                <small class="text-danger" style="font-size: 14px;padding-left:15px;">
                                                                    @lang('intranet.Merci de bien vérifier les notes avant de les soumettre. Une fois enregistrées, elles ne pourront plus être changées')
                                                                </small>

                                                                <div class="form-group mt-3">
                                                                    <div class="custom-control custom-checkbox" style="padding-left: 33px;">
                                                                        <input type="checkbox" class="custom-control-input" id="confirmCheckbox" name="confirmCheckbox">
                                                                        <label class="custom-control-label" for="confirmCheckbox">
                                                                            @lang('intranet.Je confirme que les notes sont vérifiées et correctes')
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                                <div id="checkboxMessage" class="text-danger" style="display: none; margin-left: 15px;">
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


                                                {{-- modal of marking notes students end --}}

                                            </a>
                                        </div>
                                    </div>
                                    <div id="collapse{{ $group_td->id }}" class="panel-collapse collapse"
                                        role="tabpanel" aria-labelledby="headingOne" data-parent="#accordion0">
                                       <div class="panel-body">
                                           <!-- Historical Notes Section -->
                                           <div class="historical-notes">
                                               @php
                                                   // Fetch all subjects for this group
                                                   $current_semester =  App\Coordinate::first()->current_semester;
                                                   $current_year_id =  App\Coordinate::first()->current_year_id;

                                                   $subject_designations = App\Note::where('teacher_cin' , Auth::user()->cin)
                                                   ->where('group_td_id' ,$group_td->id)
                                                   ->where('semestre' , $current_semester)
                                                    ->where('year_id' , $current_year_id)
                                                   ->select('subject')->distinct()->get()->pluck('subject');


                                               @endphp

                                               <!-- Navigation Tabs -->
                                               <ul class="nav nav-tabs" id="historicalNotesTabs" role="tablist">
                                                   @foreach ($subject_designations as $subject)
                                                       <li class="nav-item">
                                                           <a class="nav-link {{ $loop->first ? 'active' : '' }}" id="tab-{{ Str::slug($subject) }}" data-toggle="tab" href="#content-{{ Str::slug($subject) }}" role="tab">
                                                               {{ $subject }}
                                                           </a>
                                                       </li>
                                                   @endforeach
                                               </ul>

                                               <!-- Tab Content -->
                                               <div class="tab-content mt-3">
                                                   @foreach ($subject_designations as $subject)
                                                       <div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}" id="content-{{ Str::slug($subject) }}" role="tabpanel">
                                                           <div class="table-responsive">
                                                               <table class="table table-bordered table-striped" id="notesTable{{ Str::slug($subject) }}_{{ $group_td->id }}">
                                                                   <thead>
                                                                       <tr>
                                                                           <th>@lang('intranet.Ordre')</th>
                                                                           <th>@lang("intranet.Numéro d'inscription")</th>
                                                                           <th>@lang('intranet.Nom & Prénom')</th>
                                                                           <th>@lang('intranet.Note')</th>
                                                                           <th>@lang('intranet.Date')</th>
                                                                       </tr>
                                                                   </thead>
                                                                   <tbody>

                                                                       @php
                                                                        $current_semester =  App\Coordinate::first()->current_semester;
                                                                        $current_year_id =  App\Coordinate::first()->current_year_id;
                                                                           // Fetch notes for this subject and group
                                                                           $notes = App\Note::where('teacher_cin' , Auth::user()->cin)
                                                                            ->where('group_td_id' ,$group_td->id)
                                                                            ->where('semestre' , $current_semester)
                                                                            ->where('year_id' , $current_year_id)
                                                                            ->where('subject', $subject)->get();
                                                                       @endphp

                                                                       @foreach ($notes as $note)
                                                                           <tr>
                                                                               <td>{{ $loop->iteration }}</td>
                                                                               <td>{{ $note->student_cin }}</td>
                                                                               <td>{{ $note->student_name }}</td>
                                                                               <td>{{ $note->note }}</td>
                                                                               <td>{{ $note->created_at->format('d/m/Y H:i') }}</td>
                                                                           </tr>
                                                                       @endforeach
                                                                   </tbody>
                                                               </table>
                                                           </div>
                                                       </div>
                                                   @endforeach
                                               </div>
                                           </div>
                                       </div>
                                   </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endforeach
            </div>
            {{-- <p class="mb-0 mt-30">Already have an account? <a href="sign_in.html">Log In</a></p> --}}
        </div>

    </div>
@endsection

@section('specific_js')
<script src="{{ asset('public/data_table/jquery.dataTables.min.js') }}"></script>

<script>
    $(document).ready(function() {
        // Initialize DataTables for each subject tab
        @foreach ($subjects as $subject)
            $('#notesTable{{ $subject->id }}_{{ $group_td->id }}').DataTable({
                dom: 'Bfrtip',
                buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
            });
        @endforeach
    });

    document.addEventListener("DOMContentLoaded", function () {
    document.getElementById("markNotesForm").addEventListener("submit", function (event) {
        var checkbox = document.getElementById("confirmCheckbox");
        var messageDiv = document.getElementById("checkboxMessage");

        if (!checkbox.checked) {
            event.preventDefault(); // Prevent form submission
            messageDiv.style.display = "block";
            messageDiv.textContent = "⚠️ Merci de confirmer que vous avez vérifié les notes avant de les soumettre.";
        } else {
            // Hide the message if checkbox is checked (optional)
            messageDiv.style.display = "none";
        }
    });
});
</script>
@endsection
