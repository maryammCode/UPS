@extends('intranet.layouts.app')
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <style>
        .panel-title>a.collapsed:before {
            display: none
        }

        .panel-title>a:before {
            display: none
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
    <div class="row">
        <div class="col-md-12 fcrse_2" style="padding-bottom: 30px;">
            <div class="value_content d-flex justify-content-between">
                <h4 class="">{{@$group_td->designation_fr}}</h4>
                <div class="card_dash_right1">
                    <button class="create_btn_dash" data-toggle="modal"
                        data-target="#add_section_model">@lang('intranet.Réclamer') </button>
                </div>
            </div>

        </div>
    </div>
    <div class="row">
        <div class="sign_form">
            <div class="my_courses_tabs" style="margin-bottom: 10px;">
                <ul class="nav nav-pills my_crse_nav" id="myTab" role="tablist">
                    <li class="nav-item"  style="width: 33%;">
                        <a href="#semestre_1-signup-tab" id="semestre_1-tab" class="nav-link active"
                            data-toggle="tab" style="font-size: 20px;font-weight: 600;">@lang('intranet.Semestre 1')</a>
                    </li>
                    <li class="nav-item" style="width: 33%;">
                        <a href="#semestre_2-signup-tab" id="semestre_2-tab" class="nav-link" data-toggle="tab" style="font-size: 20px;font-weight: 600;">@lang('intranet.Semestre 2')</a>
                    </li>
                    <li class="nav-item" style="width: 33%;">
                        <a href="#rattrapage-signup-tab" id="rattrapage-tab" class="nav-link" data-toggle="tab" style="font-size: 20px;font-weight: 600;">@lang('intranet.Rattrapage')</a>
                    </li>
                </ul>
            </div>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active p-0 pt-3" id="semestre_1-signup-tab" role="tabpanel"
                    aria-labelledby="semestre_1-tab">
                    <table class="table" style="border: 1px solid !important; ">
                        <thead style="font-weight: 600;!important;">
                            <tr style="border-bottom: 1px solid !important;">
                                <th>@lang('intranet.Matière')</th>
                                <th>@lang('intranet.Note')</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($notes_s1 as $note_student)
                                <tr>
                                    <th>{{ $note_student->subject }}</th>
                                    <th>{{ $note_student->note }}</th>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="tab-pane fade p-0 pt-3" id="semestre_2-signup-tab" role="tabpanel" aria-labelledby="semestre_2-tab">
                    <table class="table" style="border: 1px solid !important;">
                        <thead style="font-weight: 600;!important;">
                            <tr style="border-bottom: 1px solid !important;">
                                <th>@lang('intranet.Matière')</th>
                                <th>@lang('intranet.Note')</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($notes_s2 as $note_student)
                                <tr>
                                    @php
                                        $reclamationStatuses = [
                                            0 => 'Aucune réclamation',
                                            1 => 'Réclamation envoyée',
                                            2 => 'Traitée',
                                            3 => 'Rejetée'
                                        ];
                                    @endphp
                                    <th>{{ $note_student->subject }}
                                        @if(isset($reclamationStatuses[$note_student->reclamation]) && $note_student->reclamation != 0)
                                            <span class="text-danger">({{ $reclamationStatuses[$note_student->reclamation] }})</span>
                                        @endif
                                    </th>
                                    <th>{{ $note_student->note }}</th>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="tab-pane fade p-0 pt-3" id="rattrapage-signup-tab" role="tabpanel" aria-labelledby="rattrapage-tab">
                    <table class="table" style="border: 1px solid !important;">
                        <thead style="font-weight: 600;!important;">
                            <tr style="border-bottom: 1px solid !important;">
                                <th>@lang('intranet.Matière')</th>
                                <th>@lang('intranet.Note')</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($rattrapages as $note_student)
                                <tr>
                                    <th>{{ $note_student->subject }}  </th>
                                    <th>{{ $note_student->note }}</th>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
        {{-- modal add reclamation start --}}
        <div class="modal fade" id="add_section_model" tabindex="-1" aria-labelledby="lectureModalLabel" aria-hidden="true"
        style="background-color:#3e3e3e7d;">
        <div class="modal-dialog modal-lg" style="margin-top: 212px;">
            <form action="{{ route('storeMarks') }}" method="POST">
                @csrf
                <div class="modal-content">
                    <div class="modal-header" style="padding-bottom: 0px;">
                        <h5 class="modal-title" id="lectureModalLabel">@lang('intranet.Nouveau cours')</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" style="padding-top: 0px;">
                        <div class="new-section-block">
                            <div class="row">
                                <div class="form-group col-12">
                                    <label  for="semester"> @lang('intranet.Semestre') </label>
                                    <div class="input-group mb-3 col-12">
                                        <select class="form-control" id="semester" name="semester">
                                            <option disabled selected>choisir</option>
                                            <option value="S1">Semestre 1</option>
                                            <option value="S2">Semestre 2</option>
                                            <option value="rattrapage">Rattrapage</option>

                                        </select>
                                    </div>
                                </div>
                                <div class="form-group col-12">
                                    <label for="marks"> @lang('intranet.Matière') </label>
                                    <div class="input-group mb-3 col-12">
                                        <select id="marks" name="note_id" class="form-control">
                                            <option value="">--Choisir--</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="new-section">
                                        <div class="form_group">
                                            <label class="label25">@lang('intranet.Description')</label>
                                            <textarea id="claim_note" class="form_input_1" rows="5" style="height: unset;" name="description"
                                                placeholder="@lang('intranet.Description')"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="main-btn cancel" data-dismiss="modal">
                            @lang('intranet.Fermer')
                        </button>
                        <button type="submit" class="main-btn">@lang('intranet.Ajouter')</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    {{-- modal add reclamation end --}}

    <script>

    tinymce.init({
            selector: '#claim_note',
            license_key: 'gpl'
        });


        $(document).ready(function() {
            // Marks data from Blade with sujet and note
            var notes_s1 = @json($notes_s1);
            var notes_s2 = @json($notes_s2);
            var rattrapages = @json($rattrapages);

            $('#semester').on('change', function() {
                var semester = $(this).val();
                var marksDropdown = $('#marks');
                marksDropdown.empty(); // Clear previous options

                if (semester === 'S1') {
                    populateMarks(marksDropdown, notes_s1);
                } else if (semester === 'S2') {
                    populateMarks(marksDropdown, notes_s2);
                } else if (semester === 'rattrapage') {
                    populateMarks(marksDropdown, rattrapages);
                } else {
                    marksDropdown.append('<option value="">--Choisir--</option>'); // Default
                }
            });

            // Function to populate marks dropdown
            function populateMarks(dropdown, marksArray) {
                dropdown.append('<option value="">--Choisir--</option>');
                $.each(marksArray, function(index, value) {
                    if(value.reclamation == 0){
                        dropdown.append('<option  value="'+ value.id +'">'+ value.subject + ' ('+ value.note +')  </option>');
                    }else{
                        dropdown.append('<option disabled  value="'+ value.id +'">'+ value.subject + ' ('+ value.note +')  (Réclamation envoyée)</option>');
                    }
                });
            }
        });
        
    </script>
@endsection
