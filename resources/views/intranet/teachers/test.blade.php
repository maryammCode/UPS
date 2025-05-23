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
            var msg = '{{ session('success') }}';
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
            var msg = '{{ session('error') }}';
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
            var msg = '{{ session('warning') }}';
            swal(
                msg,
                'réessayer SVP',
                'danger'
            )
        </script>
    @endif


    <style>
        .coursess>[class*=col-] {

            margin: 3px 0;
        }

        .chapters {
            padding: 12px 8px 11px 20px !important;
        }
    </style>

    {{-- modal add course start --}}
    <div class="modal fade" id="add_section_model" tabindex="-1" aria-labelledby="lectureModalLabel" aria-hidden="true"
        style="background-color:#3e3e3e7d;">
        <div class="modal-dialog modal-lg" style="margin-top: 138px;">
            <form action="{{ route('add_course') }}" method="POST">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="lectureModalLabel">@lang('intranet.Nouveau cours')</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="new-section-block">
                            <div class="row">
                                @if(@$subject_id)
                                    <input type="hidden" name="subject_id" value="{{ @$subject_id }}">
                                @else
                                    <div class="col-lg-12 col-md-12">
                                        <div class="mt-30 lbel25">
                                            <label>@lang('intranet.Choisissez la matière')</label>
                                        </div>
                                        @if (isset($groups))
                                            <select name="subject_id" class="ui hj145 dropdown cntry152 prompt srch_explore">
                                                <option value="">@lang('intranet.Choisissez la matière')</option>
                                                @foreach ($subjects as $subject)
                                                    <option value="{{ $subject->id }}">{{ $subject->$designation }}</option>
                                                @endforeach
                                            </select>
                                        @endif
                                    </div>
                                @endif

                                <div class="col-md-12">
                                    <div class="new-section">
                                        <div class="form_group">
                                            <label class="label25">@lang('intranet.Titre')</label>
                                            <input class="form_input_1" type="text" required name="designation_fr" placeholder="@lang('intranet.Titre')" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="new-section">
                                        <div class="form_group">
                                            <label class="label25">@lang('intranet.Description')</label>
                                            <textarea class="form_input_1" name="description_fr" placeholder="@lang('intranet.Description')" id="" rows="5" style="height: unset;" required></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="new-section">
                                        <div class="form_group">
                                            <label>@lang('intranet.Choisissez la liste des groupes')</label>
                                            @if (isset($groups))
                                                <select name="group[]" class="ui hj145 dropdown cntry152 prompt srch_explore"
                                                    multiple="">
                                                    <option value="">@lang('intranet.Choisissez la liste des groupes')</option>
                                                    @foreach (@$groups as $group)
                                                        <option value="{{ $group->id }}">{{ $group->$designation }}</option>
                                                    @endforeach
                                                </select>
                                            @endif
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
    {{-- modal add course end --}}

    {{--   Modal update course start--}}
    @if (isset($course))
        <div class="modal fade show" id="edit_section_model" tabindex="-1" aria-labelledby="lectureModalLabel" aria-hidden="true" style="background-color:#3e3e3e7d;">
            <div class="modal-dialog modal-lg" style="margin-top: 138px;">
                <form action="{{ route('update_course', ['id' => $course->id]) }}" method="POST">
                    @csrf
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="lectureModalLabel">@lang('intranet.Modification cours')</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <a  href="{{ route('subject', ['subject_id' => $subject_id]) }}">
                                <span aria-hidden="true">&times;</span>
                                </a>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="new-section-block">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="new-section">
                                            <input type="hidden" name="subject_id" value="{{ @$subject_id }}">
                                            <div class="form_group">
                                                <label class="label25">@lang('intranet.Titre')</label>
                                                <input class="form_input_1" type="text" value="{{ $course->designation_fr }}" required name="designation_fr" placeholder="@lang('intranet.Titre')" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="new-section">
                                            <div class="form_group">
                                                <label class="label25">@lang('intranet.Description')</label>
                                                {!! $course->description_fr !!}
                                                <textarea class="form_input_1" name="description_fr" placeholder="@lang('intranet.Description')" id="" rows="5" style="height: unset;" required>{!! $course->description_fr !!}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="new-section">
                                            <div class="form_group">
                                                <label>@lang('intranet.Choisissez la liste des groupes')</label>
                                                @if (isset($groups))
                                                    <select name="group[]" class="ui hj145 dropdown cntry152 prompt srch_explore"
                                                        multiple="">
                                                        <option value="">@lang('intranet.Choisissez la liste des groupes')</option>
                                                        @php
                                                            $selected_groups = App\CoursesGroup::where('course_id', $course->id)
                                                                ->get()
                                                                ->pluck('group_id');
                                                        @endphp
                                                        @foreach (@$groups as $group)
                                                            <option value="{{ $group->id }}"
                                                                @if (strpos($selected_groups, $group->id)) selected @endif>
                                                                {{ $group->$designation }}</option>
                                                        @endforeach
                                                    </select>
                                                @endif
                                            </div>
                                        </div>
                                    </div>


                                    

                                    {{-- <div class="col-lg-12 col-md-12">
                                        <div class="mt-30 lbel25">
                                            <label>@lang('intranet.Choisissez la liste des groupes')</label>
                                        </div>
                                        @if (isset($groups))
                                            <select name="group[]" class="ui hj145 dropdown cntry152 prompt srch_explore"
                                                multiple="">
                                                <option value="">@lang('intranet.Choisissez la liste des groupes')</option>

                                                @php
                                                    $selected_groups = App\CoursesGroup::where('course_id', $course->id)
                                                        ->get()
                                                        ->pluck('group_id');
                                                @endphp
                                                @foreach (@$groups as $group)
                                                    <option value="{{ $group->id }}"
                                                        @if (strpos($selected_groups, $group->id)) selected @endif>
                                                        {{ $group->$designation }}</option>
                                                @endforeach
                                            </select>
                                          
                                        @endif
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button  type="button" class="main-btn cancel" data-dismiss="modal">
                                <a href="{{ route('subject', ['subject_id' => $subject_id]) }}">
                                    @lang('intranet.Fermer')
                                </a>
                            </button>
                            <button type="submit" class="main-btn">@lang('intranet.Modifier')</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    @endif
    {{--   Modal update course end--}}

    {{--modal update chapter start  --}}
    @if (isset($chapter))
        <div class="modal fade show" id="edit_chapter_model" tabindex="-1" aria-labelledby="lectureModalLabel"
            aria-hidden="true" style="background-color:#3e3e3e7d;">
            <div class="modal-dialog modal-lg" style="margin-top: 138px;">
                <form action="{{ route('update_chapter', ['id' => $chapter->id , 'subject_id'=> $subject_id]) }}" method="POST"   enctype="multipart/form-data">
                    @csrf
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="lectureModalLabel">
                                @lang('intranet.Chapitre') <span id="course_title"></span></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <a href="{{ route('subject', ['subject_id' => $subject_id]) }}">
                                    <span aria-hidden="true">&times;</span>
                                </a>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="new-section-block">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="new-section">
                                            <input id="cid" name="course_id" type="hidden">
                                            <div class="form_group">
                                                <label class="label25">@lang('intranet.Titre')</label>
                                                <input class="form_input_1" type="text" required name="designation_fr" value="{{$chapter->designation_fr}}"
                                                    placeholder="@lang('intranet.Titre')" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <a href="{{ Voyager::image($chapter->files) }}"
                                            target="_blank">
                                            <span
                                                class="title">Fichier</span>
                                        </a>
                                    </div>
                                    <div class="col-lg-12 col-md-12">
                                        <label class="label25 text-left mt-30 ">@lang('intranet.Fichier')
                                            &nbsp;<a href="{{ Voyager::image($chapter->files) }}"
                                                target="_blank">
                                                <span
                                                    class="title">@lang('intranet.Cliquer ici pour consulter le document courrant')</span>
                                            </a> </label>
                                        <div class="thumb-item ">
                                            <img src="images/thumbnail-demo.jpg" alt="">
                                            <div class="thumb-dt filerequired p-0">
                                                <div class="upload-btn p-4 ">
                                                    <input class="uploadBtn-main-input" type="file"
                                                        id="ThumbFile__input--source"  name="files">

                                                    <label for="ThumbFile__input--source"
                                                        title="Zip">@lang('intranet.Modifier Votre document')</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="main-btn cancel" data-dismiss="modal">
                                <a href="{{ route('subject', ['subject_id' => $subject_id]) }}"> @lang('intranet.Fermer')</a>
                            </button>
                            <button type="submit" class="main-btn">@lang('intranet.Ajouter')</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    @endif
    {{--modal update chapter end  --}}

    {{-- modal add chapter start --}}
    <div class="modal fade" id="add_chapter_model" tabindex="-1" aria-labelledby="lectureModalLabel"
        aria-hidden="true" style="background-color:#3e3e3e7d;">
        <div class="modal-dialog modal-lg" style="margin-top: 138px;">
            <form action="{{ route('add_chapter') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="lectureModalLabel">
                            @lang('intranet.Chapitre') <span id="course_title"></span></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="new-section-block">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="new-section">

                                        <input id="cid" name="course_id" type="hidden">
                                        <div class="form_group">
                                            <label class="label25">@lang('intranet.Titre')</label>
                                            <input class="form_input_1" type="text" required name="designation_fr"
                                                placeholder="@lang('intranet.Titre')" />
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12">
                                    <label class="label25 text-left mt-30 ">@lang('intranet.Fichier')</label>
                                    <div class="thumb-item ">
                                        <img src="images/thumbnail-demo.jpg" alt="">
                                        <div class="thumb-dt filerequired p-0">
                                            <div class="upload-btn p-4 ">
                                                <input class="uploadBtn-main-input" type="file"
                                                    id="ThumbFile__input--source" required name="files">

                                                <label for="ThumbFile__input--source"
                                                    title="Zip">@lang('intranet.Choisissez Votre document')</label>
                                            </div>
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
    {{-- modal add chapter end --}}

    <div class="sa4d25">
        <div class="container-fluid" style="padding: 0px!important">
            <div class="row">
                <div class="col-md-12 " style="margin-bottom: 0px;">
                    <div class="card_dash1" style="margin-top:0;">
                        <div class="card_dash_left1">
                            <h2 class="st_title"><i class="uil uil-book-open"></i>@lang('intranet.Support de cours')</h2>
                        </div>
                        <div class="card_dash_right1">
                            <button class="create_btn_dash" data-toggle="modal" data-target="#add_section_model">@lang('intranet.Ajouter un nouveau cours') </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-12">
                    <div class="top_countries mt-20">
                        <div class="top_countries_title">
                            <h2>@lang('intranet.Liste de matiéres')</h2>
                        </div>
                        <ul class="country_list">
                            @foreach ($subjects as $subject)
                                <a href="{{ route('subject', ['subject_id' => $subject->id]) }}">
                                    <li>
                                        <div class="country_item pointer" (click)="selectSubject(subject)">
                                            <div class="country_item_left">
                                                <span>{{ $subject->$designation }} </span>
                                            </div>

                                        </div>
                                    </li>
                                </a>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-lg-9 col-md-12">
                    <div class=" mt-20">
                        <div class="fcrse_1" style="padding:0">
                            @if (isset($courses))
                                <div class="crse_content" style="margin-top:0;">
                                    {{-- <h3>Course content</h3>
                                    <div class="_112456">
                                        <ul class="accordion-expand-holder">
                                            <li><span class="accordion-expand-all _d1452">Expand all</span></li>
                                            <li><span class="_fgr123"> 402 lectures</span></li>
                                            <li><span class="_fgr123">47:06:29</span></li>
                                        </ul>
                                    </div> --}}

                                    <div id="accordion" class="ui-accordion ui-widget ui-helper-reset">

                                        @foreach (@$courses as $data)
                                            <a id="www{{ $data->id }}" data-toggle="modal" style="display: none"
                                                data-target="#add_chapter_model">add</a>
                                            <a href="{{ route('edit_course', ['id' => $data->id, 'subject_id' => $subject_id]) }}"id="update{{ $data->id }}"
                                                style="display: none">update</a>

                                            <a href="javascript:void(0)"
                                                class="accordion-header ui-accordion-header ui-helper-reset ui-state-default ui-accordion-icons ui-corner-all">
                                                <div class="row coursess">
                                                    <div class="col-md-7"> <span class="section-title-wrapper">
                                                            <i class='uil uil-books crse_icon'></i>
                                                            <span
                                                                class="section-title-text">{{ $data->designation_fr }}</span>
                                                        </span></div>
                                                    <div class="col-md-2"> <span
                                                            class="num-items-in-section">{{ Carbon\Carbon::parse($data->created_at)->format('d-m-Y') }}</span>
                                                    </div>
                                                    <div class="col-md-1">
                                                        <i class="uil uil-plus"
                                                            onclick="openmodal({{ $data }})"></i>
                                                    </div>

                                                    <div class="col-md-1">
                                                        <button title="add" class="gray-s pointer"
                                                            onclick="document.getElementById('update{{ $data->id }}').click()"
                                                            style="color: orange;border: none;"><i
                                                                class="uil uil-edit-alt"></i>
                                                        </button>
                                                    </div>
                                                    <div class="col-md-1">
                                                        <form id="f{{ $data->id }}"
                                                            action="{{ route('delete_course', [$data->id]) }}"
                                                            method="POST">
                                                            @csrf
                                                            {{ method_field('DELETE') }}
                                                            <button title="Delete" class="gray-s pointer"
                                                                onclick="sureDeleteCourse({{ $data->id }})"
                                                                style="color: crimson;border: none;"><i
                                                                    class="uil uil-trash-alt"></i>
                                                            </button>
                                                        </form>
                                                    </div>
                                                </div>

                                            </a>
                                            <div class="ui-accordion-content ui-helper-reset ui-widget-content ui-corner-bottom"
                                                style="padding:0;">
                                                @foreach (@$data->chapters as $chapter)
                                                <a href="{{ route('edit_chapter', ['id' => $chapter->id, 'subject_id' => $subject_id]) }}"id="update_chapter{{ $chapter->id }}"
                                                    style="display: none">update_chapter</a>
                                                    <div class="lecture-container chapters row coursess">
                                                        <div class="col-md-7">
                                                            <i class='uil uil-download-alt icon_142'></i>
                                                            <span>
                                                                <a href="{{ Voyager::image($chapter->files) }}"
                                                                    target="_blank">
                                                                    <span
                                                                        class="title">{{ $chapter->designation_fr }}</span>
                                                                </a>

                                                            </span>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <span
                                                                class="">{{ Carbon\Carbon::parse($data->created_at)->format('d-m-Y') }}</span>
                                                        </div>
                                                        <div class="col-md-1">
                                                            <button title="add" class="gray-s pointer"
                                                                onclick="document.getElementById('update_chapter{{ $chapter->id }}').click()"
                                                                style="color: orange;border: none;"><i
                                                                    class="uil uil-edit-alt"></i>
                                                            </button>
                                                        </div>
                                                        <div class="col-md-1" style="padding: 0%">
                                                            <span class="section-header-length" style="float: right;">
                                                                <form id="c{{ $chapter->id }}"
                                                                    action="{{ route('delete_chapter', [$chapter->id]) }}"
                                                                    method="POST">
                                                                    @csrf
                                                                    {{ method_field('DELETE') }}

                                                                </form><button title="Delete" class="gray-s pointer"
                                                                    onclick="sureDeleteChapter({{ $chapter->id }})"
                                                                    style="color: crimson;border: none;"><i
                                                                        class="uil uil-trash-alt"></i>
                                                                </button>
                                                            </span>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        @endforeach

                                    </div>
                                    {{ $courses->links('pagination::bootstrap-4') }}
                                </div>

                                {{-- <div>
                               <form [formGroup]="form">
                                    <div class="course__form">
                                        <div class="general_info10">
                                            <div class="row">
                                                <div class="col-lg-12 col-md-12">
                                                    <div class="ui search focus mt-30 lbel25">
                                                        <label> Title </label>
                                                        <div class="ui left icon input swdh19">
                                                            <input class="prompt srch_explore" type="text"
                                                                placeholder="Title"
                                                                formControlName="title">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 col-md-12">
                                                    <div class="mt-30 lbel25">
                                                        <label>Cours Sujet</label>
                                                    </div>
                                                    <select formControlName="subject_id"
                                                    class="ui hj145 dropdown cntry152 prompt srch_explore">
                                                    <option  value="">designation_sujet</option>
                                                </select>
                                                </div>
                                                 <div class="col-lg-12 col-md-12" >
                                                    <div class="ui search focus mt-30 lbel25">
                                                        <label> file</label>
                                                        <div class="ui left icon input swdh19">
                                                            <input class="prompt srch_explore" type="file"
                                                                placeholder="@lang('intranet.File')" (change)="changeFileHandler($event)"
                                                                formControlName="folder">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 col-md-12">
                                                    <div class="mt-30 lbel25">
                                                        <label>@lang('intranet.Groupes')</label>
                                                    </div>
                                                    <select formControlName="groupes"  id="ss"
                                                        class="ui hj145 dropdown cntry152 prompt srch_explore"
                                                        multiple="">

                                                        <option  value="" selected="true" >designation_group</option>

                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="submit" class="Get_btn" (click)="saveCourse()" value="save">
                               </form>
                            </div> --}}
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@7"></script>
    <script>
        function sureDeleteCourse(id) {
            swal({
                    title: "êtes-vous sûr?",
                    text: "Une fois supprimé, vous ne serez pas en mesure de récupérer ce fichier imaginaire!",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonText: "Supprimer",
                    cancelButtonText: "Annuler",
                })
                .then((willDelete) => {
                    console.log(willDelete)
                    if (willDelete.value) {
                        document.getElementById('f' + id).submit()
                    }
                });
        }

        function sureDeleteChapter(id) {
            swal({
                    title: "êtes-vous sûr?",
                    text: "Une fois supprimé, vous ne serez pas en mesure de récupérer ce fichier imaginaire!",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonText: "Supprimer",
                    cancelButtonText: "Annuler",
                })
                .then((willDelete) => {
                    console.log(willDelete)
                    if (willDelete.value) {
                        document.getElementById('c' + id).submit()
                    }
                });
        }

        function openmodal(data) {
            console.log("hez", data)
            var x = 'www' + data.id
            document.getElementById("cid").value = data.id
            document.getElementById("course_title").innerText = data.designation_fr
            document.getElementById(x).click()
        }
    </script>
@endsection
