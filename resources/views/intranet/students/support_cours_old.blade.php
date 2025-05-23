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

    <div class="sa4d25">
        <div class="container-fluid" style="padding: 0px!important">
            <div class="row">
                <div class="col-md-12 " style="margin-bottom: 0px;">
                    <div class="card_dash1" style="margin-top:0;">
                        <div class="card_dash_left1">
                            <h2 class="st_title"><i class="uil uil-book-open"></i>@lang('intranet.Support de cours')</h2>
                        </div>
                        {{--   <div class="card_dash_right1">
                            <button class="create_btn_dash" data-toggle="modal"
                                data-target="#add_section_model">@lang('intranet.Ajouter un nouveau cours') </button>
                        </div> --}}
                    </div>
                </div>
            </div>
            <div class="row">
                @if ($subjects->count() > 0)


                    <div class="col-lg-3 col-md-12">
                        <div class="top_countries mt-20">
                            <div class="top_countries_title">
                                <h2>@lang('intranet.Liste de matiéres')</h2>
                            </div>
                            <ul class="country_list">
                                @foreach ($subjects as $subject)
                                    <a href="{{ route('subjects_student', ['subject_id' => $subject->id]) }}">
                                        <li>
                                            <div class="country_item pointer" (click)="selectSubject(subject)">
                                                <div class="country_item_left">
                                                    <span
                                                        @if (@$subject_id == $subject->id) class="active_2" @endif>{{ $subject->$designation }}</span>
                                                </div>
                                            </div>
                                        </li>
                                    </a>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-12">
                        @if (!isset($subject_id))
                            @include('intranet.layouts.empty_status', [
                                'message' => 'Veuillez sélectionner une matière',
                            ])
                        @else
                            <div class="my_courses_tabs" style="margin-top:20px !important;">
                                <ul class="nav nav-pills my_crse_nav" id="pills-tab" role="tablist">
                                    <li class="nav-item" style="width: 49%;">
                                        <a class="nav-link active" id="pills-my-courses-tab" data-toggle="pill"
                                            href="#pills-my-courses" role="tab" aria-controls="pills-my-courses"
                                            aria-selected="true" style="font-size: 20px; font-weight: 600;"><i
                                                class="uil uil-book-alt"></i>@lang('intranet.Documents')</a>
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

                                                    @if (!isset($subject_id))
                                                        @include('intranet.layouts.empty_status', [
                                                            'message' => 'Veuillez sélectionner une matière',
                                                        ])
                                                    @else
                                                        @if (isset($courses) && count($courses) > 0)
                                                            <div class="crse_content" style="margin-top:0;">
                                                                {{-- <h3>Course content</h3>
                                                                        <div class="_112456">
                                                                            <ul class="accordion-expand-holder">
                                                                                <li><span class="accordion-expand-all _d1452">Expand all</span></li>
                                                                                <li><span class="_fgr123"> 402 lectures</span></li>
                                                                                <li><span class="_fgr123">47:06:29</span></li>
                                                                            </ul>
                                                                        </div> --}}
                                                                <div id="accordion"
                                                                    class="ui-accordion ui-widget ui-helper-reset">

                                                                    @foreach (@$courses as $data)
                                                                        <a href="javascript:void(0)"
                                                                            class="accordion-header ui-accordion-header ui-helper-reset ui-state-default ui-accordion-icons ui-corner-all">
                                                                            <div class="row coursess m-0">
                                                                                <div class="col-md-5"> <span
                                                                                        class="section-title-wrapper">
                                                                                        @php
                                                                                            $mytime = Carbon\Carbon::now();
                                                                                        @endphp

                                                                                        <i class='uil uil-books crse_icon'></i>
                                                                                        <span  class="section-title-text">{{ $data->designation_fr }}
                                                                                        </span>
                                                                                        @if ($mytime->diffInDays($data->created_at) < 3)
                                                                                            <img src="{{ asset('theme2/images/ball.gif') }}"
                                                                                                alt=""
                                                                                                style="width: 20px">
                                                                                        @endif
                                                                                </div>
                                                                                <div class="col-md-3">
                                                                                    {{ @$data->user->name }}
                                                                                </div>
                                                                                <div class="col-md-1">
                                                                                    <i onclick="view_course({{ $data->id }})"
                                                                                        class="uil uil-eye"></i>
                                                                                </div>
                                                                                <div class="col-md-3"> <span
                                                                                        class="">{{ Carbon\Carbon::parse($data->created_at)->format('d-m-Y H:i') }}</span>
                                                                                </div>
                                                                            </div>
                                                                        </a>
                                                                        <div class="ui-accordion-content ui-helper-reset ui-widget-content ui-corner-bottom"
                                                                            style="padding:0;">
                                                                            @foreach (@$data->chapters as $chapter)
                                                                                <div
                                                                                    class="lecture-container chapters row coursess">
                                                                                    <div class="col-md-9">
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
                                                                                    <div class="col-md-3">
                                                                                        <span
                                                                                            class="">{{ Carbon\Carbon::parse($data->created_at)->format('d-m-Y H:i') }}</span>
                                                                                    </div>

                                                                                </div>
                                                                            @endforeach
                                                                        </div>
                                                                    @endforeach
                                                                    <script>
                                                                        function view_course(id) {
                                                                            window.location = '../course_details/' + id;
                                                                        }
                                                                    </script>
                                                                </div>
                                                                {{ $courses->links('pagination::bootstrap-4') }}
                                                            </div>
                                                        @else
                                                            @include('intranet.layouts.empty_status', [
                                                                'message' =>
                                                                    "Aucun cours n'est actuellement disponible dans cet espace.",
                                                            ])
                                                        @endif

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
                                                            {{--     <th class="cell-ta specific_th" scope="col">@lang('intranet.Groupe TD')
                                                            </th> --}}
                                                            <th class="cell-ta specific_th" scope="col">
                                                                @lang('intranet.Fichier')
                                                            </th>
                                                            <th class="text-center specific_th" scope="col">
                                                                @lang("intranet.Date d'expiration")</th>
                                                            {{-- <th class="text-center specific_th" scope="col">
                                                                @lang('intranet.Statut')</th> --}}
                                                            <th class="text-center specific_th" scope="col">
                                                                @lang('intranet.Action')</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach (@$renders as $render)
                                                            <tr>
                                                                <td class="text-center">{{ $loop->iteration }}</td>
                                                                <td class="cell-ta">{{ $render->designation }}</td>
                                                                {{--  <td class="text-center"> {{ $render->group_td_id }} </td> --}}
                                                                <td class="text-center">
                                                                    {{-- {{ $render->file }} --}}

                                                                    @if ($render->files)
                                                                        @php
                                                                            $files = json_decode($render->files);
                                                                        @endphp
                                                                        @if (count(@$files) > 0)
                                                                            @foreach ($files as $file)
                                                                                <a href="{{ Voyager::image($file->download_link) }}"
                                                                                    download="{{ $file->download_link }}"
                                                                                    target="_blank"
                                                                                    style="color:blue;font-size:14px;">{{ $file->original_name }}
                                                                                    <i
                                                                                        class="uil uil-download-alt"></i></a><br>
                                                                            @endforeach
                                                                        @endif
                                                                    @endif
                                                                </td>
                                                                <td class="text-center">
                                                                    @if (Carbon\Carbon::parse($render->expiration_date) > Carbon\Carbon::now())
                                                                        {{ Carbon\Carbon::parse($render->expiration_date) }}
                                                                    @else
                                                                        {{ Carbon\Carbon::parse($render->expiration_date)->format('d-m-Y') }}
                                                                        <span class="badge badge-danger">
                                                                            @lang('intranet.Expiré')</span>
                                                                    @endif

                                                                </td>
                                                                {{--  <td class="text-center">
                                                                    @if ($render->publier == 1)
                                                                        <span
                                                                            class="badge badge-primary">@lang('intranet.Publier')</span>
                                                                    @else
                                                                        <span
                                                                            class="badge badge-secondary">@lang('intranet.Non publier')</span>
                                                                    @endif
                                                                </td> --}}
                                                                <td class="d-flex justify-content-center ">
                                                                    @if ($render->expiration_date > Carbon\Carbon::now())
                                                                        @php

                                                                            $render_existe = App\CourseRenderUser::where(
                                                                                'course_render_id',
                                                                                $render->id,
                                                                            )
                                                                                ->where('user_id', Auth::user()->id)
                                                                                ->first();
                                                                            // dd($render_existe);
                                                                        @endphp
                                                                        <div>
                                                                            @if ($render_existe)
                                                                                @php
                                                                                    $files = json_decode(
                                                                                        $render_existe->files,
                                                                                    );
                                                                                @endphp
                                                                                <span>{{ $files[0]->original_name }}
                                                                                </span>
                                                                            @else
                                                                                <a data-target="#add_compte_rendu_modal{{ $render->id }}"
                                                                                    data-toggle="modal">
                                                                                    <i class="uil uil-plus-circle"
                                                                                        style="font-size: 20px;"></i>
                                                                                </a>
                                                                            @endif
                                                                        </div>

                                                                        <div class="modal fade"
                                                                            id="add_compte_rendu_modal{{ $render->id }}"
                                                                            tabindex="-1"
                                                                            aria-labelledby="lectureModalLabel"
                                                                            aria-hidden="true"
                                                                            style="background-color:#3e3e3e7d;">
                                                                            <div class="modal-dialog modal-lg"
                                                                                style="margin-top: 212px;">
                                                                                <form
                                                                                    action="{{ route('add_compte_rendu_student') }}"
                                                                                    method="POST"
                                                                                    enctype="multipart/form-data">
                                                                                    @csrf
                                                                                    <div class="modal-content">
                                                                                        <div class="modal-header"
                                                                                            style="padding-bottom:0px;">
                                                                                            <h5 class="modal-title"
                                                                                                id="lectureModalLabel">
                                                                                                @lang('intranet.Uploader un compte rendu')
                                                                                                {{ $render->designation }}<span
                                                                                                    id="course_title"></span>
                                                                                            </h5>
                                                                                            <button type="button"
                                                                                                class="close"
                                                                                                data-dismiss="modal"
                                                                                                aria-label="Close">
                                                                                                <span
                                                                                                    aria-hidden="true">&times;</span>
                                                                                            </button>
                                                                                        </div>
                                                                                        <div class="modal-body"
                                                                                            style="padding-top:0 px;">
                                                                                            <div class="new-section-block">
                                                                                                <div class="row">
                                                                                                    <span class="text-danger">@lang('intranet.NB : Une fois que votre réponse est envoyée , vous ne pouvez pas la modifier')</span>
                                                                                                    <input type="text"
                                                                                                        name="course_render_id"
                                                                                                        value="{{ $render->id }}"
                                                                                                        hidden>
                                                                                                    <div
                                                                                                        class="col-lg-12 col-md-12">
                                                                                                        <label
                                                                                                            class="label25 text-left mt-30 ">@lang('intranet.Fichier')</label>
                                                                                                        {{-- <div
                                                                                                            class="thumb-item ">
                                                                                                            <img src="images/thumbnail-demo.jpg"
                                                                                                                alt="">
                                                                                                            <div
                                                                                                                class="thumb-dt filerequired p-0">
                                                                                                                <div
                                                                                                                    class="upload-btn p-4 ">
                                                                                                                    <input
                                                                                                                        class="uploadBtn-main-input"
                                                                                                                        type="file"
                                                                                                                        id="ThumbFile__input--source"
                                                                                                                        required
                                                                                                                        name="files"
                                                                                                                        onchange="StudentUpload()">
                                                                                                                    <label
                                                                                                                        for="ThumbFile__input--source"
                                                                                                                        title="Zip">@lang('intranet.Choisissez Votre document')
                                                                                                                    </label>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div> --}}
                                                                                                        <div
                                                                                                            class="col-lg-12 col-md-12">
                                                                                                            {{-- <label for="file5">Add Screenshots</label> --}}
                                                                                                            <div
                                                                                                                class="image-upload-wrap">
                                                                                                                <input
                                                                                                                    class="file-upload-input"
                                                                                                                    id="compteRenduStudent{{ $render->id }}"
                                                                                                                    multiple
                                                                                                                    type="file"
                                                                                                                    name="files"
                                                                                                                    onchange="StudentUpload({{ $render->id }})">
                                                                                                                <div
                                                                                                                    class="drag-text">
                                                                                                                    <i
                                                                                                                        class="fas fa-cloud-upload-alt"></i>
                                                                                                                    <h4>@lang('intranet.Sélectionner votre fichier')
                                                                                                                    </h4>
                                                                                                                    <p
                                                                                                                        id="showFileStudent{{ $render->id }}">
                                                                                                                    </p>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>

                                                                                                    </div>

                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="modal-footer">
                                                                                            <button type="button"
                                                                                                class="main-btn cancel"
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
                                                                    @endif
                                                                    {{-- modal add compte rendu for student start --}}

                                                                    {{-- modal add compte rendu for student end --}}
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                @else
                    <div class="col-lg-12 col-md-12" style="margin-top: 15px">
                        @include('intranet.layouts.empty_status', [
                            'message' => 'Aucun contenu à afficher!',
                        ])
                    </div>
                @endif
            </div>
        </div>
    </div>
    <script>
        function StudentUpload(id) {
            var file = document.getElementById("compteRenduStudent" + id).files[0];
            if(file.size > 4194304){
                alert('Fichier trop volumineux (4 Mo max)');
            }else{
                document.getElementById("showFileStudent" + id).innerHTML = file.name + "(" + (file.size / 1024).toFixed('3') +
                " Ko )";
            }
        }

        function view_course(id) {
            window.location = '../course_details/' + id;
        }
    </script>
@endsection
