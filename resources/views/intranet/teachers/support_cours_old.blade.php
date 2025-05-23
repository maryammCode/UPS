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
        .tox-notification {
            display: none !important;
        }

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
        <div class="modal-dialog modal-lg" style="margin-top: 212px;">
            <form action="{{ route('add_course') }}" method="POST">
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
                                @if (@$subject_id)
                                    <input type="hidden" name="subject_id" value="{{ @$subject_id }}">
                                @else
                                    <div class="col-lg-12 col-md-12">
                                        <div class="mt-30 lbel25">
                                            <label>@lang('intranet.Choisissez la matière')</label>
                                        </div>
                                        @if (isset($groups))
                                            <select name="subject_id"
                                                class="ui hj145 dropdown cntry152 prompt srch_explore">
                                                <option value="">@lang('intranet.Choisissez la matière')</option>
                                                @foreach ($subjects as $subject)
                                                    <option value="{{ $subject->id }}">{{ $subject->$designation }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        @endif
                                    </div>
                                @endif

                                <div class="col-md-12">
                                    <div class="new-section">
                                        <div class="form_group">
                                            <label class="label25">@lang('intranet.Titre')</label>
                                            <input class="form_input_1" type="text" required name="designation_fr"
                                                placeholder="@lang('intranet.Titre')" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="new-section">
                                        <div class="form_group">
                                            <label class="label25">@lang('intranet.Description')</label>
                                            <textarea class="form_input_1" rows="5" style="height: unset;" name="description_fr"
                                                placeholder="@lang('intranet.Description')"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="new-section">
                                        <div class="form_group">
                                            <label>@lang('intranet.Choisissez la liste des groupes')</label>
                                            @if (isset($groups))
                                                <select name="group[]"
                                                    class="ui hj145 dropdown cntry152 prompt srch_explore" multiple="">
                                                    <option value="">@lang('intranet.Choisissez la liste des groupes')</option>
                                                    @foreach (@$groups as $group)
                                                        <option value="{{ $group->id }}">{{ $group->$designation }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="row col-md-12">
                                    <div class="col-md-6"> <div class="ui toggle checkbox _1457s2" style="padding-left: 15px;">
                                        <input type="checkbox" name="permission_comment" checked="">
                                        <label>Autorisation des commentaires</label>
                                    </div></div>
                                    <div class="col-md-6"><div class="ui toggle checkbox _1457s2" style="padding-left: 15px;">
                                        <input type="checkbox" name="publier" checked="">
                                        <label>Publier</label>
                                    </div></div>
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
    {{-- modal add compte rendu start --}}
    <div class="modal fade" id="add_compte_rendu" tabindex="-1" aria-labelledby="lectureModalLabel" aria-hidden="true"
        style="background-color:#3e3e3e7d;">
        <div class="modal-dialog modal-lg" style="margin-top: 212px;">
            <form action="{{ route('add_rendu') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-content">
                    <div class="modal-header" style="padding-bottom: 0px;">
                        <h5 class="modal-title" id="lectureModalLabel">@lang('intranet.Nouveau compte rendu')</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" style="padding-top: 0px;">
                        <div class="new-section-block">
                            <div class="row">
                                @if (@$subject_id)
                                    <input type="hidden" name="subject_id" value="{{ @$subject_id }}">
                                @else
                                    <div class="col-lg-12 col-md-12">
                                        <div class="mt-30 lbel25">
                                            <label>@lang('intranet.Choisissez la matière')</label>
                                        </div>
                                        @if (isset($groups))
                                            <select name="subject_id"
                                                class="ui hj145 dropdown cntry152 prompt srch_explore">
                                                <option value="">@lang('intranet.Choisissez la matière')</option>
                                                @foreach ($subjects as $subject)
                                                    <option value="{{ $subject->id }}">{{ $subject->$designation }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        @endif
                                    </div>
                                @endif

                                <div class="col-md-12">
                                    <div class="new-section">
                                        <div class="form_group">
                                            <label class="label25">@lang('intranet.Titre')</label>
                                            <input class="form_input_1" type="text" required name="designation"
                                                placeholder="@lang('intranet.Titre')" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="new-section">
                                        <div class="form_group">
                                            <label class="label25">@lang('intranet.Description')</label>
                                            <textarea class="form_input_1" rows="5" style="height: unset;" name="description"
                                                placeholder="@lang('intranet.Description')"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="new-section">
                                        <div class="form_group">
                                            <label class="label25">@lang("intranet.Date d'expiration")</label>
                                            <input class="form_input_1" type="datetime-local" required name="expiration_date" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="new-section">
                                        <div class="form_group">
                                            <label class="label25">@lang('intranet.Piece jointe')</label>
                                            <input class="form_input_1" type="file" required name="files" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="new-section">
                                        <div class="form_group">
                                            <label>@lang('intranet.Choisissez la liste des groupes')</label>
                                            @if (isset($groups))
                                                <select name="group[]"
                                                    class="ui hj145 dropdown cntry152 prompt srch_explore" multiple="">
                                                    <option value="">@lang('intranet.Choisissez la liste des groupes')</option>
                                                    @foreach (@$groups as $group)
                                                        <option value="{{ $group->id }}">{{ $group->$designation }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="ui toggle checkbox _1457s2" style="padding-left: 15px;">
                                    <input type="checkbox" name="publier" checked="" value="1">
                                    <label>Publier</label>
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
    {{-- modal add compte rendu end --}}

    {{--   Modal update course start --}}
    @if (isset($course))
        <div class="modal fade show" id="edit_section_model" tabindex="-1" aria-labelledby="lectureModalLabel"
            aria-hidden="true" style="background-color:#3e3e3e7d;">
            <div class="modal-dialog modal-lg" style="margin-top: 212px;">
                <form action="{{ route('update_course', ['id' => $course->id]) }}" method="POST">
                    @csrf
                    <div class="modal-content">
                        <div class="modal-header" style="padding-bottom: 0px;">
                            <h5 class="modal-title" id="lectureModalLabel">@lang('intranet.Modification cours')</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <a href="{{ route('subject', ['subject_id' => $subject_id]) }}">
                                    <span aria-hidden="true">&times;</span>
                                </a>
                            </button>
                        </div>
                        <div class="modal-body" style="padding-top: 0px;">
                            <div class="new-section-block">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="new-section">
                                            <input type="hidden" name="subject_id" value="{{ @$subject_id }}">
                                            <div class="form_group">
                                                <label class="label25">@lang('intranet.Titre')</label>
                                                <input class="form_input_1" type="text"
                                                    value="{{ $course->designation_fr }}" required name="designation_fr"
                                                    placeholder="@lang('intranet.Titre')" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="new-section">
                                            <div class="form_group">
                                                <label class="label25">@lang('intranet.Description')</label>

                                                <textarea class="form_input_1" name="description_fr" id="" rows="5" style="height: unset;" required> {{ $course->description_fr }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="new-section">
                                            <div class="form_group">
                                                <label>@lang('intranet.Choisissez la liste des groupes')</label>
                                                @if (isset($groups))
                                                    <select name="group[]"
                                                        class="ui hj145 dropdown cntry152 prompt srch_explore"
                                                        multiple="">
                                                        <option value="">@lang('intranet.Choisissez la liste des groupes')</option>
                                                        @php
                                                            $selected_groups = App\CoursesGroupTd::where(
                                                                'course_id',
                                                                $course->id,
                                                            )
                                                                ->get()
                                                                ->pluck('group_td_id');
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
                                    <div class="row col-md-12">
                                        <div class="col-md-6"> <div class="ui toggle checkbox _1457s2" style="padding-left: 15px;">
                                            <input type="checkbox" name="permission_comment" @if($course->permission_comment) checked=""  @endif>
                                            <label>Autorisation des commentaires</label>
                                        </div></div>
                                        <div class="col-md-6"><div class="ui toggle checkbox _1457s2" style="padding-left: 15px;">
                                            <input type="checkbox" name="publier" @if($course->publier) checked="" @endif>
                                            <label>Publier</label>
                                        </div></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <a href="{{ route('subject', ['subject_id' => $subject_id]) }}">
                                <button type="button" class="main-btn cancel" data-dismiss="modal">
                                    @lang('intranet.Fermer')
                                </button>
                            </a>
                            <button type="submit" class="main-btn">@lang('intranet.Modifier')</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    @endif
    {{--   Modal update course end --}}

    {{-- modal update chapter start  --}}

    @if (isset($chapter))
        <div class="modal fade show" id="edit_chapter_model" tabindex="-1" aria-labelledby="lectureModalLabel"
            aria-hidden="true" style="background-color:#3e3e3e7d;">
            <div class="modal-dialog modal-lg" style="margin-top: 212px;">
                <form action="{{ route('update_chapter', ['id' => $chapter->id, 'subject_id' => $subject_id]) }}"
                    method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-content">
                        <div class="modal-header" style="padding-bottom: 0px;">
                            <h5 class="modal-title" id="lectureModalLabel">
                                @lang('intranet.Chapitre') <span id="course_title"></span></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <a href="{{ route('subject', ['subject_id' => $subject_id]) }}">
                                    <span aria-hidden="true">&times;</span>
                                </a>
                            </button>
                        </div>
                        <div class="modal-body" style="padding-top: 0px;">
                            <div class="new-section-block">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="new-section">
                                            <input id="cid" name="course_id" type="hidden">
                                            <div class="form_group">
                                                <label class="label25">@lang('intranet.Titre')</label>
                                                <input class="form_input_1" type="text" required name="designation_fr"
                                                    value="{{ $chapter->designation_fr }}"
                                                    placeholder="@lang('intranet.Titre')" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="new-section">
                                            <div class="form_group">
                                                <label class="label25">@lang('intranet.Type')</label>
                                                <select name="type" class="form_input_1">
                                                    <option disabled @if($chapter->type == '') selected @endif >@lang('intranet.Choisir')</option>
                                                    <option value="C" @if($chapter->type == 'C') selected @endif>C</option>
                                                    <option value="TD" @if($chapter->type == 'TD') selected @endif>TD</option>
                                                    <option value="TP" @if($chapter->type == 'TP') selected @endif>TP</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- <div class="col-md-12">
                                        <a href="{{ Voyager::image($chapter->files) }}"
                                            target="_blank">
                                            <span
                                                class="title">Fichier</span>
                                        </a>
                                    </div> --}}
                                    <div class="col-lg-12 col-md-12">
                                        <label class="label25 text-left mt-30 ">@lang('intranet.Fichier')
                                            &nbsp;<a href="{{ Voyager::image($chapter->files) }}" target="_blank">
                                                <span class="title">@lang('intranet.Cliquer ici pour consulter le document courrant')</span>
                                            </a> </label>
                                        <div class="thumb-item ">
                                            <img src="images/thumbnail-demo.jpg" alt="">
                                            <div class="thumb-dt filerequired p-0">
                                                <div class="upload-btn p-4 ">
                                                    <input class="uploadBtn-main-input" type="file"
                                                        id="ThumbFile__input--source-update" name="files" onchange="TeacherUploadChapterUpdate()">

                                                    <label for="ThumbFile__input--source-update"
                                                        title="Zip">@lang('intranet.Modifier Votre document')</label>
                                                        <p id="showFileChapterUpdate"></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <a href="{{ route('subject', ['subject_id' => $subject_id]) }}">
                                <button type="button" class="main-btn cancel" data-dismiss="modal">
                                    @lang('intranet.Fermer')
                                </button>
                            </a>
                            <button type="submit" class="main-btn">@lang('intranet.Modifier')</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    @endif
    {{-- modal update chapter end  --}}

    {{-- modal add chapter start --}}
    <div class="modal fade" id="add_chapter_model" tabindex="-1" aria-labelledby="lectureModalLabel"
        aria-hidden="true" style="background-color:#3e3e3e7d;">
        <div class="modal-dialog modal-lg" style="margin-top: 212px;">
            <form action="{{ route('add_chapter') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-content">
                    <div class="modal-header" style="padding-bottom:0px;">
                        <h5 class="modal-title" id="lectureModalLabel">
                            @lang('intranet.Chapitre') <span id="course_title"></span></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" style="padding-top:0 px;">
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
                                <div class="col-md-12">
                                    <div class="new-section">
                                        <div class="form_group">
                                            <label class="label25">@lang('intranet.Type')</label>
                                            <select name="type" class="form_input_1">
                                                <option disabled selected >@lang('intranet.Choisir')</option>
                                                <option value="C">C</option>
                                                <option value="TD">TD</option>
                                                <option value="TP">TP</option>
                                            </select>
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
                                                    id="ThumbFile__input--source" required name="files" onchange="TeacherUploadChapter()">

                                                <label for="ThumbFile__input--source"
                                                    title="Zip">@lang('intranet.Choisissez Votre document')</label>
                                                    <p id="showFileChapter"></p>
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
                            <button class="create_btn_dash" data-toggle="modal"
                                data-target="#add_section_model">@lang('intranet.Ajouter un nouveau cours') </button>
                        </div>
                        <div class="card_dash_right1" style="margin-right: 15px;">
                            <button class="create_btn_dash" data-toggle="modal"
                                data-target="#add_compte_rendu">@lang('intranet.Ajouter un Compte rendu') </button>
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
                                                <span @if (@$subject_id == $subject->id) class="active_2"@endif>{{ $subject->$designation }} </span>
                                            </div>
                                        </div>
                                    </li>
                                </a>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-lg-9 col-md-12">

                    {{-- tab start --}}

                    @if (isset($subject_id))
                        <div class="my_courses_tabs" style="margin-top:20px !important;">
                            <ul class="nav nav-pills my_crse_nav" id="pills-tab" role="tablist">
                                <li class="nav-item" style="width: 49%;">
                                    <a class="nav-link active" id="pills-my-courses-tab" data-toggle="pill"
                                        href="#pills-my-courses" role="tab" aria-controls="pills-my-courses"
                                        aria-selected="true" style="font-size: 20px; font-weight: 600;"><i
                                            class="uil uil-book-alt"></i>@lang('intranet.Support de cours')</a>
                                </li>
                                <li class="nav-item" style="width: 50%;">
                                    <a class="nav-link" id="pills-my-purchases-tab" data-toggle="pill"
                                        href="#pills-my-purchases" role="tab" aria-controls="pills-my-purchases"
                                        aria-selected="false" style="font-size: 20px; font-weight: 600;"><i
                                            class="uil uil-download-alt"></i>@lang('intranet.Compte rendu')</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="pills-tabContent">
                                <div class="tab-pane fade show active" id="pills-my-courses" role="tabpanel"
                                    style="padding:0 !important;">
                                    <div class="table-responsive review_all120 mt-3  pb-3">
                                        <div class=" mt-20">
                                            <div class="fcrse_1" style="padding:0">
                                                @if (isset($courses))
                                                    <div class="crse_content" style="margin-top:0;">
                                                        <div id="accordion"
                                                            class="ui-accordion ui-widget ui-helper-reset">
                                                            @foreach (@$courses as $data)
                                                                <a id="www{{ $data->id }}" data-toggle="modal"
                                                                    style="display: none"
                                                                    data-target="#add_chapter_model">add</a>
                                                                <a href="{{ route('edit_course', ['id' => $data->id, 'subject_id' => $subject_id]) }}"
                                                                    id="update{{ $data->id }}"
                                                                    style="display: none">update</a>
                                                                <a href="javascript:void(0)"
                                                                    class="accordion-header ui-accordion-header ui-helper-reset ui-state-default ui-accordion-icons ui-corner-all">
                                                                    <div class="row coursess">
                                                                        <div class="col-md-6 col-12"> <span
                                                                                class="section-title-wrapper">
                                                                                @php
                                                                                    $mytime = Carbon\Carbon::now();
                                                                                @endphp

                                                                                <i
                                                                                    class='uil uil-books crse_icon'></i><span
                                                                                    class="section-title-text">{{ $data->designation_fr }}
                                                                                </span>
                                                                                @if ($mytime->diffInDays($data->created_at) < 3)
                                                                                    <img src="{{ asset('theme2/images/ball.gif') }}"
                                                                                        alt=""
                                                                                        style="width: 20px">
                                                                                @endif
                                                                        </div>
                                                                        <div class="col-md-2 col-7">
                                                                            <span
                                                                                class="num-items-in-section">{{ Carbon\Carbon::parse($data->created_at)->format('d-m-Y') }}</span>
                                                                        </div>
                                                                        <div class="col-md-1 col-1">
                                                                            {{-- <a href="{{route('course_details', ['id' => $data->id])}}"> --}}
                                                                            <i onclick="view_course({{ $data->id }})"
                                                                                class="uil uil-eye"
                                                                                style="font-size: 20px;"></i>
                                                                        </div>
                                                                        <div class="col-md-1 col-1">
                                                                            <i class="uil uil-plus"
                                                                                style="font-size: 20px;"
                                                                                onclick="openmodal({{ $data }})"></i>
                                                                        </div>
                                                                        <div class="col-md-1 col-1">
                                                                            <button title="add" class="gray-s pointer"
                                                                                onclick="document.getElementById('update{{ $data->id }}').click()"
                                                                                style="color: orange;border: none;">
                                                                                <i class="uil uil-edit-alt"
                                                                                    style="font-size: 20px;"></i>
                                                                            </button>
                                                                        </div>
                                                                        <div class="col-md-1 col-1">
                                                                            <form id="f{{ $data->id }}"
                                                                                action="{{ route('delete_course', [$data->id]) }}"
                                                                                method="POST">
                                                                                @csrf
                                                                                {{ method_field('DELETE') }}
                                                                                <button title="Delete"
                                                                                    class="gray-s pointer"
                                                                                    onclick="sureDeleteCourse({{ $data->id }})"
                                                                                    style="color: crimson;border: none;"><i
                                                                                        class="uil uil-trash-alt"
                                                                                        style="font-size: 20px;"></i>
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
                                                                        <div class=" chapters row coursess"
                                                                            style="width: 100%"><!--lecture-container-->
                                                                            <div class="col-md-1 col-2">
                                                                                <button title="add"
                                                                                    class="gray-s pointer"
                                                                                    onclick="document.getElementById('update_chapter{{ $chapter->id }}').click()"
                                                                                    style="color: orange;border: none;"><i
                                                                                        class="uil uil-edit-alt"
                                                                                        style="font-size:20px;"></i>
                                                                                </button>
                                                                            </div>
                                                                            <div class="col-md-1 col-1">
                                                                                <span class="section-header-length"
                                                                                    style="float: right;">
                                                                                    <form id="c{{ $chapter->id }}"
                                                                                        action="{{ route('delete_chapter', [$chapter->id]) }}"
                                                                                        method="POST">
                                                                                        @csrf
                                                                                        {{ method_field('DELETE') }}
                                                                                    </form><button title="Delete"
                                                                                        class="gray-s pointer"
                                                                                        onclick="sureDeleteChapter({{ $chapter->id }})"
                                                                                        style="color: crimson;border: none;"><i
                                                                                            class="uil uil-trash-alt"
                                                                                            style="font-size:20px;"></i>
                                                                                    </button>
                                                                                </span>
                                                                            </div>
                                                                            <div class="only_m col-9">
                                                                                <span class=""
                                                                                    style="font-size:16px;">@lang('intranet.Publié le')
                                                                                    {{ Carbon\Carbon::parse($data->created_at)->format('d-m-Y') }}</span>
                                                                            </div>
                                                                            <div class="col-md-8 col-9">
                                                                                <i
                                                                                    class='uil uil-download-alt icon_142'></i>
                                                                                <span>
                                                                                    <a href="{{ Voyager::image($chapter->files) }}"
                                                                                        target="_blank">
                                                                                        <span
                                                                                            class="title">{{ $chapter->designation_fr }} @if($chapter->type) ({{ $chapter->type }}) @endif</span>
                                                                                        @if ($mytime->diffInDays($chapter->created_at) < 3)
                                                                                            <img src="{{ asset('theme2/images/ball.gif') }}"
                                                                                                alt=""
                                                                                                style="width: 20px">
                                                                                        @endif
                                                                                    </a>
                                                                                </span>
                                                                            </div>
                                                                            <div class="only_s col-md-2 col-12">
                                                                                <span class=""
                                                                                    style="font-size:16px;">Publié le
                                                                                    {{ Carbon\Carbon::parse($data->created_at)->format('d-m-Y') }}</span>
                                                                            </div>
                                                                            {{-- <div class="col-md-1"></div> --}}
                                                                        </div>
                                                                    @endforeach
                                                                </div>
                                                            @endforeach
                                                            <script>
                                                                function view_course(id) {
                                                                    window.location = '../../course_details/' + id;
                                                                }
                                                            </script>
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
                                <div class="tab-pane fade" id="pills-my-purchases" role="tabpanel"
                                    style="padding:0 !important;">
                                    <div class="table-responsive mt-30 review_all120">
                                        @if (isset($renders))
                                            <table class="table ucp-table">
                                                <thead class="thead-s">
                                                    <tr>
                                                        <th class="text-center specific_th" scope="col">#</th>
                                                        <th class="cell-ta specific_th" scope="col">@lang('intranet.Titre')
                                                        </th>
                                                        <th class="cell-ta specific_th" scope="col">@lang('intranet.Groupe TD')
                                                        </th>
                                                        <th class="cell-ta specific_th" scope="col">@lang('intranet.Fichier')
                                                        </th>
                                                        <th class="text-center specific_th" scope="col">
                                                            @lang("intranet.Date d'expiration")</th>
                                                        <th class="text-center specific_th" scope="col">
                                                            @lang('intranet.Statut')</th>
                                                            <th class="text-center specific_th" scope="col">
                                                                @lang('intranet.Action')</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach (@$renders as $render)
                                                        <tr>
                                                            <td class="text-center">{{ $loop->iteration }}</td>
                                                            <td class="cell-ta">{{ $render->designation }} </td>
                                                            <td class="text-center"> {{ @$render->groupTd->designation_fr }} </td>
                                                            <td class="text-center">
                                                                 {{-- {{ $render->file }} --}}

                                                                 @if ($render->files)
                                                                    @php
                                                                        $files = json_decode($render->files);

                                                                    @endphp
                                                                    @if (count(@$files) > 0)
                                                                        @foreach ($files as $file )
                                                                            <a href="{{ Voyager::image($file->download_link) }}"
                                                                                download="{{ $file->download_link }}"
                                                                                target="_blank" style="color:blue;font-size:14px;">{{ $file->original_name }}  <i class="uil uil-download-alt"></i></a><br>
                                                                        @endforeach
                                                                    @endif
                                                                @endif
                                                            </td>
                                                            <td class="text-center">
                                                                @if (Carbon\Carbon::parse($render->expiration_date) > Carbon\Carbon::now() )
                                                                    {{ Carbon\Carbon::parse($render->expiration_date)->format('d-m-Y') }} / {{ Carbon\Carbon::parse($render->expiration_date)->format('H:i') }}
                                                                @else
                                                                {{ Carbon\Carbon::parse($render->expiration_date)->format('d-m-Y') }} / {{ Carbon\Carbon::parse($render->expiration_date)->format('H:i') }}
                                                                    <span class="badge badge-danger">
                                                                        @lang('intranet.Expiré')
                                                                    </span>
                                                                @endif

                                                            </td>
                                                            <td class="text-center">
                                                                @if ($render->publier == 1)
                                                                    <span
                                                                        class="badge badge-primary">@lang('intranet.Publier')</span>
                                                                @else
                                                                    <span
                                                                        class="badge badge-secondary">@lang('intranet.Non publier')</span>
                                                                @endif
                                                            </td>
                                                            <td class="d-flex justify-content-center ">
                                                                <div>
                                                                     <a title="Voir" href="{{route('render_details', ['id' => $render->id])}}">
                                                                        <i class="uil uil-eye" style="font-size: 20px;"></i>
                                                                    </a>
                                                                </div>
                                                                <div>
                                                                    <button title="Modifier" class="gray-s pointer"  data-toggle="modal" style="color: orange;border: none; background-color: #fff;"
                                                                        data-target="#updateCompteRendu{{ $render->id }}"><i class="uil uil-edit-alt" style="font-size:20px;"></i>
                                                                    </button>
                                                                </div>
                                                                 <div>
                                                                    <form id="c{{ $render->id }}"
                                                                        action="{{ route('delete_compte_rendu', ['id' => $render->id]) }}"
                                                                        method="POST">
                                                                        @csrf
                                                                        {{ method_field('DELETE') }}
                                                                        <button title="Supprimer" type="button"
                                                                            class="gray-s pointer"
                                                                            onclick="sureDeleteRender({{ $render->id }})"
                                                                            style="color: crimson;border: none;  background-color: #fff;"><i
                                                                                class="uil uil-trash-alt"
                                                                                style="font-size: 20px;"></i>
                                                                        </button>
                                                                    </form>
                                                                </div>


                                                            </td>
                                                        </tr>
                                                        {{-- modal update compte rendu start --}}
                                                            <div class="modal fade" id="updateCompteRendu{{ $render->id }}"
                                                                tabindex="-1" aria-labelledby="lectureModalLabel"
                                                                aria-hidden="true" style="background-color:#3e3e3e7d;">
                                                                <div class="modal-dialog modal-lg" style="margin-top: 212px;">
                                                                    <form action="{{ route('update_compte_rendu', ['id' => $render->id]) }}" method="POST"
                                                                        enctype="multipart/form-data">
                                                                        @csrf
                                                                        <div class="modal-content">
                                                                            <div class="modal-header"
                                                                                style="padding-bottom: 0px;">
                                                                                <h5 class="modal-title"
                                                                                    id="lectureModalLabel">@lang('intranet.Modifier')
                                                                                </h5>
                                                                                <button type="button" class="close"
                                                                                    data-dismiss="modal" aria-label="Close">
                                                                                    <span aria-hidden="true">&times;</span>
                                                                                </button>
                                                                            </div>
                                                                            <div class="modal-body" style="padding-top: 0px;">
                                                                                <div class="new-section-block">
                                                                                    <div class="row">


                                                                                        <div class="col-md-12">
                                                                                            <div class="new-section">
                                                                                                <div class="form_group">
                                                                                                    <label
                                                                                                        class="label25">@lang('intranet.Titre')</label>
                                                                                                    <input class="form_input_1"
                                                                                                        type="text"
                                                                                                        name="designation"
                                                                                                        value="{{ $render->designation }}"
                                                                                                        placeholder="@lang('intranet.Titre')" />
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-md-12">
                                                                                            <div class="new-section">
                                                                                                <div class="form_group">
                                                                                                    <label
                                                                                                        class="label25">@lang('intranet.Description')</label>
                                                                                                    <textarea class="form_input_1" rows="5" style="height: unset;" name="description"
                                                                                                        placeholder="@lang('intranet.Description')">{{ $render->description }}</textarea>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-md-12">
                                                                                            <div class="new-section">
                                                                                                <div class="form_group">
                                                                                                    <label
                                                                                                        class="label25">@lang("intranet.Date d'expiration")</label>
                                                                                                    <input class="form_input_1"
                                                                                                        type="datetime-local"  value="{{ $render->expiration_date }}"
                                                                                                        name="expiration_date" />
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-md-12">
                                                                                            <div class="new-section">
                                                                                                <div class="form_group">
                                                                                                    <label
                                                                                                        class="label25">@lang('intranet.Piece jointe')</label>
                                                                                                    <input class="form_input_1"
                                                                                                        type="file"
                                                                                                        name="files" />

                                                                                                        @if ($render->files)
                                                                                                            @php
                                                                                                                $files = json_decode($render->files);
                                                                                                            @endphp
                                                                                                            @if (count(@$files) > 0)
                                                                                                                @foreach ($files as $file )
                                                                                                                    <a href="{{ Voyager::image($file->download_link) }}"
                                                                                                                        download="{{ $file->download_link }}"
                                                                                                                        target="_blank" style="color:blue;font-size:14px;">{{ $file->original_name }} </a><br>
                                                                                                                @endforeach
                                                                                                            @endif
                                                                                                        @endif
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-md-12">
                                                                                            <div class="new-section">
                                                                                                <div class="form_group">
                                                                                                    <label>@lang('intranet.Choisissez la liste des groupes')</label>
                                                                                                    @if (isset($groups))
                                                                                                        <select name="group_td_id"
                                                                                                            class="form_input_1"
                                                                                                            >
                                                                                                            <option
                                                                                                                value="">
                                                                                                                @lang('intranet.Choisissez la liste des groupes')
                                                                                                            </option>
                                                                                                            @foreach (@$groups as $group)

                                                                                                                <option  @if  ($group->id == $render->group_td_id) selected @endif
                                                                                                                    value="{{ $group->id }}"  >
                                                                                                                    {{ $group->$designation }}
                                                                                                                </option>
                                                                                                            @endforeach
                                                                                                        </select>
                                                                                                    @endif
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="ui toggle checkbox _1457s2"
                                                                                            style="padding-left: 15px;">
                                                                                            <input type="checkbox"
                                                                                                name="publier" @if ($render->publier == 1)
                                                                                                value="1" checked=""
                                                                                                @else
                                                                                                value="0"
                                                                                                @endif >
                                                                                            <label>Publier</label>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button type="button" class="main-btn cancel"
                                                                                    data-dismiss="modal">
                                                                                    @lang('intranet.Fermer')
                                                                                </button>
                                                                                <button type="submit"
                                                                                    class="main-btn">@lang('intranet.Soumettre')</button>
                                                                            </div>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        {{-- modal update compte rendu end --}}
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- tab end --}}
                    @else
                        @include('intranet.layouts.empty_status', [
                            'message' => 'Veuillez sélectionner une matière',
                        ])
                    @endif

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


        function sureDeleteRender(id) {
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

        function TeacherUploadChapter() {
            var file = document.getElementById("ThumbFile__input--source").files[0];
            if(file.size >  4194304 ){
                alert('Fichier trop volumineux (4 Mo max)');
            }else{
                document.getElementById("showFileChapter").innerHTML = file.name + "(" + (file.size / 1024).toFixed('3') +
                " Ko )";
            }

        }
        function TeacherUploadChapterUpdate() {
            var file = document.getElementById("ThumbFile__input--source-update").files[0];
            if(file.size >  4194304 ){
                alert('Fichier trop volumineux (4 Mo max)');
            }else{
                document.getElementById("showFileChapterUpdate").innerHTML = file.name + "(" + (file.size / 1024).toFixed('3') +
                " Ko )";
            }

        }
    </script>
@endsection
