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

        img.rounded-circle {
            border: 2px solid #ddd;
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
                                            <textarea class="form_input_1" id="new_course_description" style="height: unset;" name="description_fr"
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
                                    <div class="col-md-6">
                                        <div class="ui toggle checkbox _1457s2" style="padding-left: 15px;">
                                            <input type="checkbox" name="permission_comment" checked="">
                                            <label>Autorisation des commentaires</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="ui toggle checkbox _1457s2" style="padding-left: 15px;">
                                            <input type="checkbox" name="publier" checked="">
                                            <label>Publier</label>
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

    {{--   Modal update course start --}}

    {{--   Modal update course end --}}


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
                                                <span
                                                    @if (@$subject_id == $subject->id) class="active_2" @endif>{{ $subject->$designation }}
                                                </span>
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
                        @if (isset($courses))
                            @foreach (@$courses as $data)
                                <div class="card mb-4 shadow-sm"
                                    @if ($loop->first) style="margin-top: 20px;" @endif>
                                    <div class="card-body">
                                        <!-- Course Title and Options -->
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div>
                                                <h4 class="card-title">

                                                    <i class='uil uil-books crse_icon'></i><span
                                                        class="section-title-text"
                                                        style="font-size: 16px;">{{ $data->designation_fr }}
                                                    </span>
                                                </h4>


                                                <div class="d-flex align-items-center">
                                                    <img src="{{ Voyager::image(@$data->user->avatar) }}"
                                                        alt="Teacher Avatar" class="rounded-circle mr-2"
                                                        style="width: 35px; height: 35px;">
                                                    <span class="badge badge-secondary p-2"
                                                        style="font-size: 10px">{{ @$data->user->name }}</span>
                                                </div>
                                            </div>



                                            <div>
                                                @foreach ($data->groups as $item)
                                                    <button class="btn btn-light">
                                                        <i class="fas fa-users"></i> {{ @$item->$designation }}
                                                    </button>
                                                @endforeach
                                            </div>
                                            <div>
                                                @php
                                                $mytime = Carbon\Carbon::now();
                                            @endphp
                                            @if ($mytime->diffInDays($data->created_at) < 3)
                                                <img src="{{ asset('theme2/images/ball.gif') }}" alt=""
                                                    style="width: 20px">
                                            @endif
                                            <span class="num-items-in-section">
                                                <i class="uil uil-calendar-alt"></i>
                                                {{ Carbon\Carbon::parse($data->created_at)->format('d-m-Y') }}
                                            </span>
                                            <span class="num-items-in-section ml-2">
                                                <span class="badge badge-info p-2">
                                                    @if ($data->publier == 1)
                                                        <i class="uil uil-check"></i> Publier
                                                    @else
                                                        <i class="uil uil-times"></i> Non publier

                                                    @endif

                                                </span>
                                            </span>
                                            </div>



                                            <div class="d-flex align-items-start flex-column">
                                                <button title="Voir" class="gray-s pointer mb-2"
                                                    style="color: rgb(114, 113, 112);border: none;  border-radius: 10%;">
                                                    <i onclick="view_course({{ $data->id }})" class="uil uil-eye"
                                                        style="font-size: 20px;"></i>
                                                </button>
                                                <button title="Modifier" class="gray-s pointer  mb-2"
                                                onclick="editModalCourse({{ $data->id }})"
                                                    data-toggle="modal"
                                                    data-target="#edit_section_model{{$data->id}}"
                                                    style="color: orange;border: none; border-radius: 10%;">
                                                    <i class="uil uil-edit-alt" style="font-size: 20px;"></i>
                                                </button>

                                                <form id="f{{ $data->id }}"
                                                    action="{{ route('delete_course', [$data->id]) }}" method="POST">
                                                    @csrf
                                                    {{ method_field('DELETE') }}
                                                    <button title="Supprimer" class="gray-s pointer" type="button"
                                                        onclick="sureDeleteCourse({{ $data->id }})"
                                                        style="color: crimson;border: none;  border-radius: 10%;"><i
                                                            class="uil uil-trash-alt" style="font-size: 20px;"></i>
                                                    </button>
                                                </form>
                                            </div>

                                        </div>
                                        <!-- Course Description -->
                                        {{-- <p class="card-text">{{ $data->teacher_cin }}</p> --}}


                                    </div>
                                </div>
                                @php
                                    $course = $data;
                                @endphp
                                @if (isset($course))
                                    <div class="modal fade" id="edit_section_model{{$course->id}}" tabindex="-1" aria-labelledby="lectureModalLabel"
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

                                                                            <textarea class="form_input_1" name="description_fr" id="update_course_description{{$course->id}}" style="height: unset;" required> {{ $course->description_fr }}</textarea>
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
                                                                    <div class="col-md-6">
                                                                        <div class="ui toggle checkbox _1457s2" style="padding-left: 15px;">
                                                                            <input type="checkbox" name="permission_comment"
                                                                                @if ($course->permission_comment) checked="" @endif>
                                                                            <label>Autorisation des commentaires</label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="ui toggle checkbox _1457s2" style="padding-left: 15px;">
                                                                            <input type="checkbox" name="publier"
                                                                                @if ($course->publier) checked="" @endif>
                                                                            <label>Publier</label>
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
                            @endforeach
                            <script>
                                function view_course(id) {
                                    window.location = '../../course_details/' + id;
                                }
                            </script>

                            {{ $courses->links('pagination::bootstrap-4') }}
                        @endif
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

        tinymce.init({
            selector: '#new_course_description',
            license_key: 'gpl'
        });


        function editModalCourse(id){

            tinymce.init({
                selector: '#update_course_description'+id,
                license_key: 'gpl'
            });
        }



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
            if (file.size > 4194304) {
                alert('Fichier trop volumineux (4 Mo max)');
            } else {
                document.getElementById("showFileChapter").innerHTML = file.name + "(" + (file.size / 1024).toFixed('3') +
                    " Ko )";
            }

        }

        function TeacherUploadChapterUpdate() {
            var file = document.getElementById("ThumbFile__input--source-update").files[0];
            if (file.size > 4194304) {
                alert('Fichier trop volumineux (4 Mo max)');
            } else {
                document.getElementById("showFileChapterUpdate").innerHTML = file.name + "(" + (file.size / 1024).toFixed(
                        '3') +
                    " Ko )";
            }

        }
    </script>
@endsection
