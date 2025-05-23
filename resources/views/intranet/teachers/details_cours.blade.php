@extends('intranet.layouts.app')
@section('content')


<!-- Optional: Bootstrap CSS for styling (if not already included) -->
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
{{-- <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script> --}}



<style>
    .sent_msg {
        float: right;
        width: 46%;

    }

    .input_msg_write {
        margin-top: 20px
    }

    .input_msg_write input {
        background: rgba(227, 227, 227, 0.585) none repeat scroll 0 0;
        border: medium none;
        color: #4c4c4c;
        font-size: 15px;
        min-height: 48px;
        width: 100%;
        padding: 10px;
        border-radius: 5px;
    }

    .input_msg_write textarea {
        border: #bebebe solid 1px;
        color: #4c4c4c;
        font-size: 15px;
        min-height: 48px;
        width: 100%;
        padding: 10px;
        border-radius: 5px;
    }

    .replytextarea {
        background: rgba(227, 227, 227, 0.585) none repeat scroll 0 0;
    }

    .input_msg_write textarea:focus,
    .input_msg_write input:focus {
        border: 1px solid #04488e;

    }

    .type_msg {


        position: relative;
    }

    .msg_send_btn {
        /* background: #05728f none repeat scroll 0 0; */
        background: #04488e;
        border: medium none;
        border-radius: 50%;
        color: #fff;
        cursor: pointer;
        font-size: 17px;
        height: 33px;
        position: absolute;
        right: 0;
        top: 11px;
        width: 33px;

        margin-right: 6px;
    }

    .reviews_left {
        padding: 10px !important;
    }

    body {
        font-family: 'Roboto', sans-serif;
        background-color: #f5f5f5;
    }

    .navbar {
        background-color: white !important;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1) !important;
        padding-bottom: 0px !important;
    }

    .tabs {
        margin-top: 10px !important;
    }

    .tab-content {
        padding-top: 10px !important;
    }

    .card {
        margin-bottom: 10px !important;
        border: none !important;
        border-radius: 8px !important;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    }

    .tab-pane {
        padding: 10px !important;
    }

    /* ***************************** in tab flux ******************************** */
    .sidebar {
        background-color: #f9f9f9;
        padding: 20px;
        border-right: 1px solid #ddd;
        height: 100%;
    }

    .course-code,
    .upcoming {
        margin-bottom: 20px;
    }

    .course-code h4,
    .upcoming p {
        font-weight: bold;
    }

    .main-content {
        padding: 20px;
    }

    .post-box-toggle {
        margin-bottom: 15px;
    }

    .post-box {
        padding: 15px;
        border: 1px solid #ddd;
        border-radius: 5px;
    }

    .post-box textarea {
        width: 100%;
        padding: 10px;
        margin: 10px 0;
        border: 1px solid #ccc;
        border-radius: 5px;
        resize: none;
    }

    .post-options {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .post-options button {
        background-color: #1a73e8;
        color: white;
        border: none;
        padding: 8px 16px;
        border-radius: 5px;
        cursor: pointer;
    }

    .chapitre-section {
        margin-top: 30px;
    }

    .chapitre {
        padding: 15px;
        border: 1px solid #ddd;
        margin-bottom: 10px;
        border-radius: 5px;
    }


    /*  css input file */

    .upload-container {
        background-color: #ffffff;
        border: 2px dashed #4a90e2;
        border-radius: 10px;
        padding: 15px;
        text-align: center;
        width: 400px;
        transition: background-color 0.3s ease;
    }

    .upload-container:hover {
        background-color: #e6f0ff;
    }

    .upload-container h2 {
        color: #4a90e2;
        margin-bottom: 15px;
    }

    .file-input {
        display: none;
    }

    .custom-file-upload {
        display: inline-block;
        padding: 10px 20px;
        color: #fff;
        background-color: #4a90e2;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .custom-file-upload:hover {
        background-color: #357ab7;
    }

    .file-list {
        margin-top: 20px;
        text-align: left;
    }

    .file-list p {
        font-size: 0.9em;
        color: #333;
        margin: 5px 0;
    }

    /* css input file end */

    /* richtext css */
    .cke_notifications_area {
        display: none !important;
    }

    .specific_style {
        padding: 10px !important;
    }

    /* richtext css */
    /* chapitre listes css start  */
    .chapter-box {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 10px;
        border-bottom: 1px solid #ddd;
    }

    .chapter-description {
        flex: 1;
    }

    .chapter-date {
        /* margin-left: 20px; */
        margin-right: 20px;
    }

    .chapter-actions {
        position: relative;
    }

    .action-btn {
        background: none;
        border: none;
        cursor: pointer;
    }

    .action-menu {
        position: absolute;
        top: 20px;
        right: 0;
        background-color: #fff;
        border: 1px solid #ddd;
        display: flex;
        flex-direction: column;
    }

    .action-menu button {
        padding: 5px 10px;
        cursor: pointer;
        border: none;
        background: #fff;
    }

    .action-menu button:hover {
        background-color: #f1f1f1;
    }
    .card .card-body {
        padding: 15px;
    }

    .student_reviews {

    margin-top: 0px;
    }

    .main-content {
    padding:0 20px;
}
.btn_add_chapter{
    margin-top: 0px;
}


    /* chapitre listes css end */
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
@php
    $active_tab =  session('active_tab') ?? '';
@endphp
@if(request()->has('page'))
@php
$active_tab =  'comments';
@endphp
@endif

<!-- Navbar -->
<nav class="navbar navbar-light bg-light shadow-sm">
    <h4 class="navbar-brand">{{ $course->subject->designation_fr }} - {{ $course->designation_fr }} </h4>
</nav>

{{-- <nav class="navbar navbar-light bg-light shadow-sm px-4 d-flex justify-content-between align-items-center">
    <div>
        <a href="@if(Auth::user()->isRole('Etudiant')){{ route('subjects_student' , ['subject_id' =>  @$course->subject->id]) }}@elseif(Auth::user()->isRole('Enseignant')){{ route('subject' , ['subject_id' =>  @$course->subject->id]) }}@endif"
           class="btn btn-light">
            <i class="fas fa-arrow-left"></i> @lang('intranet.Retour à la liste principale')
        </a>
    </div>
    <h4 class="m-0 text-center flex-grow-1">
        {{ $course->subject->designation_fr }} - {{ $course->designation_fr }}
    </h4>
</nav> --}}

<!-- Tabs Navigation -->
<div class="tabs">
    <ul class="nav nav-tabs" id="courseTabs" role="tablist">
        <li class="nav-item">
            <a class="nav-link" style="color: #495057;background-color: #fff;border-color: #dee2e6 #dee2e6 #fff;" href="@if(Auth::user()->isRole('Etudiant')){{ route('subjects_student' , ['subject_id' =>  @$course->subject->id]) }}@elseif(Auth::user()->isRole('Enseignant')){{ route('subject' , ['subject_id' =>  @$course->subject->id]) }}@endif"
                aria-selected="true"> <i class="fas fa-arrow-left"></i> </a>
        </li>
        <li class="nav-item">
            <a class="nav-link @if($active_tab == '' || !$active_tab) active @endif" id="flux-tab" data-toggle="tab" href="#flux" role="tab" aria-controls="flux"
                aria-selected="true">@lang('intranet.Liste des chapitres')</a>
        </li>
        <li class="nav-item">
            <a class="nav-link @if($active_tab == 'comments') active @endif" id="comments-tab" data-toggle="tab" href="#comments" role="tab" aria-controls="flux"
                aria-selected="true">@lang('intranet.Forum') </a>
        </li>
        <li class="nav-item">
            <a class="nav-link @if($active_tab == 'compte_rendu') active @endif" id="compte_rendu-tab" data-toggle="tab" href="#compte_rendu" role="tab"
                aria-controls="compte_rendu" aria-selected="false">@lang('intranet.Comptes rendus')</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="membres-tab" data-toggle="tab" href="#membres" role="tab" aria-controls="membres"
                aria-selected="false">@lang('intranet.Groupes')</a>
        </li>
        {{-- @if ($course->description_fr)
        <li class="nav-item">
            <a class="nav-link" id="description-tab" data-toggle="tab" href="#description" role="tab"
                aria-controls="description" aria-selected="false">Description</a>
        </li>
        @endif --}}
    </ul>


    <!-- Tab Content -->
    <div class="tab-content" id="courseTabContent">
        <!-- Flux Tab -->
        <div class="tab-pane fade @if($active_tab == '' || !$active_tab) show active @endif" id="flux" role="tabpanel" aria-labelledby="flux-tab">
            <div class="card">
                <div class="card-body">
                    {{-- <h5 class="card-title">Recent Activity</h5> --}}
                    <div class="student_reviews">
                        <div class="row">
                            {{-- <div class="col-lg-4">
                                <div class="reviews_left">
                                    <div class="_rate003">
                                        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Accusamus, sed.
                                            Explicabo ut inventore rerum provident tenetur velit facilis cupiditate.
                                            Praesentium, debitis dolorum possimus vel alias deserunt natus voluptatem
                                            recusandae dolorem!</p>
                                    </div>
                                </div>
                            </div> --}}
                            <div class="col-lg-12">
                                <div class="container-fluid">
                                    <div class="row">
                                        <!-- Sidebar -->
                                        <div class="col-md-3 sidebar">
                                            <div class="course-code">
                                                {{-- <p>Code du cours</p> --}}
                                                <h6>@lang('intranet.Description') : </h6>
                                            </div>
                                            <div class="upcoming">
                                                {{-- <p>À venir</p> --}}
                                                <p>{!! $course->$description !!}</p>
                                                {{-- <a href="#">Tout afficher</a> --}}
                                            </div>
                                        </div>

                                        <!-- Main Content -->
                                        <div class="col-md-9 main-content">
                                            <!-- Button to Open Form -->
                                            @if ($course->teacher_cin == Auth::user()->cin)
                                                <div class="post-box-toggle">
                                                    <button onclick="add()" class="btn btn-light btn_add_chapter">
                                                       @lang('intranet.Ajouter un chapitre')
                                                    </button>
                                                </div>
                                            @endif

                                            <form id="chapterForm" action="{{ route('add_chapter') }}" method="POST" enctype="multipart/form-data" @error('type') @else style="display: none" @enderror>
                                                @csrf
                                                <input type="hidden" name="_method" value="POST"> <!-- This will be replaced with PUT for edit -->
                                                <input name="course_id" type="hidden" value="{{ $course->id }}">

                                                <div class="for-section">
                                                    <label for="class-group">@lang('intranet.Type')</label>
                                                    <select name="type" id="class-group" class="form-control @error('type') is-invalid @enderror" required>
                                                        <option disabled >@lang('intranet.Choisir')</option>
                                                        <option value="C">C</option>
                                                        <option value="TD">TD</option>
                                                        <option value="TP">TP</option>
                                                    </select>

                                                    @error('type')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                {{-- CK editor  box start  --}}
                                                {{-- <div class="for-section" style="margin: 15px 0">
                                                    <textarea name="description_fr" rows="4" class="specific_style" id="editor"></textarea>
                                                </div> --}}
                                                {{-- CK editor end --}}
                                                {{-- tiny ritch text box start --}}
                                                <div class="form-group">
                                                    <label for="nachd">@lang('intranet.Description')</label>
                                                    <textarea name="description_fr" id="nachd" class="form-control">{{ old('description_fr') }}</textarea>
                                                </div>
                                                 {{-- tiny ritch text box start --}}
                                                <div class="upload-container" style="margin-bottom: 10px">
                                                    {{-- <label for="file-upload" class="custom-file-upload">Choisir les fichiers</label> --}}
                                                    <input name="files[]" type="file" id="file-upload" class="file-input" multiple >
                                                    <div id="file-list" class="file-list" style="margin-top:0"></div>
                                                </div>
                                                <div class="post-options">
                                                    <button type="submit" class="btn btn-info">@lang('intranet.Ajouter')</button>
                                                </div>
                                            </form>


                                            <!-- Chapitres Section -->
                                            <div class="chapitre-section">
                                                @foreach (@$course->chapters->reverse() as $chapter)
                                                    <div class="chapitre d-flex justify-content-between">
                                                        {{-- <h5>
                                                            <a href="{{ Voyager::image($chapter->files) }}" target="_blank">
                                                                <span class="uil uil-download-alt"></span>
                                                                {{ $chapter->$designation }}
                                                            </a>
                                                        </h5> --}}
                                                        {{-- <p>{!! $chapter->$description !!}</p> --}}
                                                        <div class="chapter-description">
                                                            <p>{!! $chapter->$description !!}</p>
                                                            <!-- Files Section -->
                                                            <ul>
                                                                @php
                                                                    $files = json_decode($chapter->files);
                                                                @endphp
                                                                @if ($files)
                                                                    @foreach ($files as $file)
                                                                        <li>
                                                                            <a href="{{ Voyager::image($chapter->files) }}"
                                                                                target="_blank">
                                                                                <span class="uil uil-download-alt"></span>
                                                                                {{ $file->original_name }}
                                                                            </a>
                                                                        </li>
                                                                    @endforeach
                                                                    {{-- <li>
                                                                        {{ count($files) }} fichiers
                                                                    </li> --}}
                                                                @endif
                                                            </ul>
                                                        </div>
                                                        <!-- Date Section -->
                                                        <div class="chapter-date">
                                                            <span>{{ $chapter->created_at->format('d/m/Y') }}</span>
                                                        </div>
                                                        <!-- Action Button Section -->
                                                        @if ($course->teacher_cin == Auth::user()->cin)
                                                            <div class="chapter-actions">
                                                                <button class="action-btn"
                                                                    onclick="openActionMenu({{ $chapter->id }})">☰</button>
                                                                <div class="action-menu" id="action-menu-{{ $chapter->id }}"
                                                                    style="display: none;">
                                                                    <button class="edit-btn" data-toggle="modal" data-target="#edit_chapter_model{{ $chapter->id }}" onclick="editModal({{ $chapter->id }})">@lang('intranet.Modifier')</button>

                                                                    <form id="c{{ $chapter->id }}"
                                                                        action="{{ route('delete_chapter', [$chapter->id]) }}"
                                                                        method="POST">
                                                                        @csrf
                                                                        {{ method_field('DELETE') }}
                                                                    </form><button title="Supprimer" class="delete-btn"
                                                                        onclick="sureDeleteChapter({{ $chapter->id }})">@lang('intranet.Supprimer')
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        @endif
                                                    </div>
                                                      {{-- modal update chapter start  --}}

                                                    @if (isset($chapter))
                                                        <div class="modal fade " id="edit_chapter_model{{ $chapter->id }}" tabindex="-1" aria-labelledby="lectureModalLabel"
                                                            aria-hidden="true" style="background-color:#3e3e3e7d;">
                                                            <div class="modal-dialog modal-lg" style="margin-top: 212px;">
                                                                <form action="{{ route('update_chapter', ['id' => $chapter->id]) }}"
                                                                    method="POST" enctype="multipart/form-data">
                                                                    @csrf
                                                                    <div class="modal-content">
                                                                        <div class="modal-header" style="padding-bottom: 0px;">
                                                                            <h5 class="modal-title" id="lectureModalLabel">
                                                                                @lang('intranet.Chapitre') <span id="course_title"></span></h5>
                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                                                                            </button>
                                                                        </div>
                                                                        <div class="modal-body" style="padding-top: 0px;">
                                                                            <div class="new-section-block">
                                                                                <div class="row">
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
                                                                                    <div class="col-md-12">
                                                                                        <div class="for-section" style="margin: 15px 0">
                                                                                            <textarea name="description_fr" rows="4" class="specific_style" id="editor{{$chapter->id}}" >{!! old('description_fr', $chapter->description_fr) !!}</textarea>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-lg-12 col-md-12">
                                                                                        <label class="label25 text-left mt-30 ">@lang('intranet.Fichier')
                                                                                            @php
                                                                                            $files = json_decode($chapter->files);
                                                                                            @endphp
                                                                                            @if ($files)
                                                                                                @foreach ($files as $file)
                                                                                                    <li>
                                                                                                        <a href="{{ Voyager::image($chapter->files) }}"
                                                                                                            target="_blank">
                                                                                                            <span class="uil uil-download-alt"></span>
                                                                                                            {{ $file->original_name }}
                                                                                                        </a>
                                                                                                    </li>
                                                                                                @endforeach
                                                                                                {{-- <li>
                                                                                                    {{ count($files) }} fichiers
                                                                                                </li> --}}
                                                                                            @endif
                                                                                            <div class="upload-container">
                                                                                                <label for="file-upload" class="custom-file-upload">Choisir les fichiers</label>
                                                                                                <input name="files[]" type="file" id="file-upload" class="file-input" multiple>
                                                                                                <div id="file-list" class="file-list"></div>
                                                                                            </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="modal-footer">

                                                                                <button type="button" class="main-btn cancel" data-dismiss="modal">
                                                                                    @lang('intranet.Fermer')
                                                                                </button>

                                                                            <button type="submit" class="main-btn">@lang('intranet.Modifier')</button>
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    @endif
                                                {{-- modal update chapter end  --}}
                                                @endforeach
                                            </div>

                                            {{-- @foreach (@$course->chapters as $chapter)
                                            <div class="chapter-box">
                                                <div class="chapter-content">
                                                    <!-- Description Section -->
                                                    <div class="chapter-description">
                                                        <p>{{ $chapter->$description }}</p>
                                                        <!-- Files Section -->
                                                        <ul>
                                                            @php
                                                            $files = json_decode($chapter->files);
                                                            @endphp
                                                            @if ($files)
                                                            <li>
                                                                {{ count($files) }} fichiers
                                                            </li>
                                                            @endif
                                                        </ul>
                                                    </div>
                                                    <!-- Date Section -->
                                                    <div class="chapter-date">
                                                        <span>{{ $chapter->created_at->format('d/m/Y') }}</span>
                                                    </div>
                                                    <!-- Action Button Section -->
                                                    <div class="chapter-actions">
                                                        <button class="action-btn"
                                                            onclick="openActionMenu({{ $chapter->id }})">☰</button>
                                                        <div class="action-menu" id="action-menu-{{ $chapter->id }}"
                                                            style="display: none;">
                                                            <button class="edit-btn"
                                                                onclick="openEditModal({{ $chapter->id }})">Edit</button>
                                                            <button class="delete-btn">Supprimer</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach --}}

                                        </div>
                                    </div>
                                </div>
                                {{-- <h5>Support de cours </h5> --}}
                                {{-- @foreach (@$course->chapters as $chapter)
                                <div class="_rate004" style="    justify-content: space-between;">

                                    <div style="font-size: 16px">
                                        <a href="{{ Voyager::image($chapter->files) }}" target="_blank">
                                            <span class="uil uil-download-alt"></span>

                                            {{ $chapter->designation_fr }}
                                        </a>
                                    </div>
                                    <div class="_rate002" style="float: right">
                                        {{ Carbon\Carbon::parse($chapter->created_at)->format('d-m-Y') }}
                                    </div>
                                </div>
                                @endforeach --}}

                                {{-- <table class="table table-striped">
                                    <thead>
                                        <tr style="font-size:15px;">
                                            <th scope="col">#</th>
                                            <th scope="col">Chapitre</th>
                                            <th scope="col">Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse (@$course->chapters as $chapter)
                                        <tr>
                                            <th scope="row">{{ $loop->iteration }} </th>
                                            <td>
                                                <a href="{{ Voyager::image($chapter->files) }}" target="_blank">
                                                    <span class="uil uil-download-alt"></span>

                                                    {{ $chapter->designation_fr }}
                                                </a>
                                            </td>
                                            <td> {{ Carbon\Carbon::parse($chapter->created_at)->format('d-m-Y') }}
                                            </td>
                                        </tr>
                                        @empty
                                        <p> Aucun support de cours</p>
                                        @endforelse
                                    </tbody>
                                </table> --}}

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- comments Tab -->

        <div class="tab-pane fade @if($active_tab == 'comments') show active @endif" id="comments" role="tabpanel" aria-labelledby="comments-tab">
            <div class="card">
                <div class="card-body">
                    {{-- <h5 class="card-title">Recent Activity</h5> --}}
                    <div class="student_reviews">
                        <div class="row">
                            @if ($course->permission_comment == 'on')
                                <div class="col-lg-12">
                                    <div class="reviews_left">
                                        <div class="_rate003">
                                            {{-- <h3>Support de cours </h3> --}}
                                            <div class="input_msg_write">
                                                <form action="{{ route('send_comment') }}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="course_id" value="{{ $course->id }}">
                                                    <textarea
                                                        rows="4" data-min-rows="4" name="content" id="comment2"
                                                        placeholder="@lang('intranet.Entrez votre commentaire ici')"
                                                        style="height: 69px; width: 100%;" ></textarea><br>
                                                        {{-- <div class="form-group">

                                                            <textarea placeholder="@lang('intranet.Entrez votre commentaire ici')" name="content" id="comment" class="form-control" required></textarea>
                                                        </div> --}}

                                                    <button class="forumPostButton btn btn-default btn_comment"
                                                        type="submit">@lang('intranet.Soumettre')</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    {{-- <div class="review_right">
                                        <div class="review_right_heading">
                                            <h3>@lang('intranet.Commentaires')</h3>
                                        </div>
                                    </div> --}}
                                    <div class="review_all120">
                                        @foreach ($comments as $comment)
                                            <div class="review_item">
                                                <div class="rvds10 my_comment">
                                                    <div class="review_usr_dt">
                                                        <img src="@if ($comment->user->avatar) {{ Voyager::image($comment->user->avatar) }}@else{{ asset('theme2/images/left-imgs/img-1.jpg') }} @endif"
                                                            alt="">
                                                        <div class="rv1458">
                                                            <h4 class="tutor_name1" style="margin-top:7px;">
                                                                {{ $comment->user->name }}
                                                            </h4>
                                                            <span
                                                                class="time_145">{{ Carbon\Carbon::parse($comment->created_at)->format('d-m-Y') }}
                                                                à
                                                                {{ Carbon\Carbon::parse($comment->created_at)->format('H:i') }}</span>
                                                        </div>
                                                        <div class="rv1458" style="position : absolute ; right : 0">
                                                            @if ($comment->user_id == auth()->user()->id)
                                                                <form id="f{{ $comment->id }}"
                                                                    action="{{ route('delete_comment', [$comment->id]) }}"
                                                                    method="POST">
                                                                    @csrf
                                                                    {{ method_field('DELETE') }}
                                                                    <button style="padding: 5px;" type="button"
                                                                        class="btn btn-danger"
                                                                        onclick="sureDeleteComment({{ $comment->id }})">
                                                                        <i class="voyager-trash"></i></button>
                                                                </form>
                                                            @endif
                                                        </div>
                                                    </div>

                                                    <p class="rvds10 my_comment_2">{!! $comment->content !!}</p>
                                                </div>


                                                @foreach ($comment->replies as $reply)
                                                    <div style="margin-left : 40px" class="rvds10 my_comment">
                                                        <div class="review_usr_dt">
                                                            <img src="@if ($reply->user->avatar) {{ Voyager::image($reply->user->avatar) }}@else{{ asset('theme2/images/left-imgs/img-1.jpg') }} @endif"
                                                                alt="">
                                                            <div class="rv1458">
                                                                <h4 class="tutor_name1" style="margin-top:7px;">
                                                                    {{ $reply->user->name }}
                                                                </h4>
                                                                <span


                                                                    class="time_145">{{ Carbon\Carbon::parse($reply->created_at)->format('d-m-Y') }}
                                                                    à
                                                                    {{ Carbon\Carbon::parse($reply->created_at)->format('H:i') }}</span>
                                                            </div>
                                                            <div class="rv1458" style="position : absolute ; right : 0">
                                                                @if (@$reply->user_id == auth()->user()->id)
                                                                    <form id="f{{ $reply->id }}"
                                                                        action="{{ route('delete_comment', [$reply->id]) }}"
                                                                        method="POST">
                                                                        @csrf
                                                                        {{ method_field('DELETE') }}
                                                                        <button style="padding: 5px;" type="button"
                                                                            class="btn btn-danger"
                                                                            onclick="sureDeleteComment({{ $reply->id }})">
                                                                            <i class="voyager-trash"></i></button>
                                                                    </form>
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <p class="rvds10  my_comment_2">{!! $reply->content !!}</p>
                                                    </div>
                                                @endforeach
                                                <div style="margin-left : 40px">
                                                    <form action="{{ route('send_comment') }}" method="POST">
                                                        @csrf
                                                        <input type="hidden" name="parent_id" value="{{ $comment->id }}">

                                                        <input type="hidden" name="course_id" value="{{ $course->id }}">
                                                        <div class="type_msg">
                                                            <div class="input_msg_write">
                                                                <textarea type="text" class="write_msg replytextarea"
                                                                    name="content" required rows="1" data-min-rows="4"
                                                                    placeholder="@lang('intranet.Entrez votre commentaire ici')"></textarea>
                                                                <button class="msg_send_btn" type="submit"><i
                                                                        class="fa fa-paper-plane"
                                                                        aria-hidden="true"></i></button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        @endforeach
                                        <div class="review_item">
                                            {{ $comments->links('pagination::bootstrap-4') }}
                                        </div>
                                    </div>
                                </div>
                            @else
                                <div class="col-md-12 fcrse_2 mt-0">
                                    <div class="col-md-4">
                                        <i class="uil uil-box"
                                            style="text-align: center; font-size: 120px; color: #666;"></i>
                                    </div>
                                    <div class="col-md-8 title589">
                                        <h2 style="margin-top: 82px;float: left;">
                                            @lang('intranet.Commentaires non Autorisés')</h2>
                                    </div>

                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Compte rendu Tab -->
        <div class="tab-pane fade @if($active_tab == 'compte_rendu') show active @endif" id="compte_rendu" role="tabpanel" aria-labelledby="compte_rendu-tab">
            <div class="card">
                <div class="card-body">
                    {{-- <h5 class="card-title">Reports</h5> --}}
            @if ($course->teacher_cin == Auth::user()->cin)
                        <div class="card-title" style="margin-right: 15px;">
                            <button class="create_btn_dash" data-toggle="modal"
                                data-target="#add_compte_rendu">@lang('intranet.Demande de compte rendu') </button>
                        </div>

                @if (isset($renders))

                    {{-- data table comptes rendus start --}}
                        <table id="comptes_rendus_teacher" class="table ucp-table display" style="width:100%">
                            <thead class="thead-s">
                                <tr>
                                    <th class="specific_th">#</th>
                                    <th class="specific_th">@lang('intranet.Titre')</th>
                                    <th class="specific_th">@lang('intranet.Groupe TD')</th>
                                    <th class="specific_th" >
                                        @lang('intranet.Fichier')
                                    </th>
                                    <th class="specific_th"> @lang("intranet.Date d'expiration")</th>
                                    <th class="specific_th"> @lang('intranet.Statut')</th>
                                    <th class="specific_th" >@lang('intranet.Action')</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach (@$renders as $render)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td class="cell-ta">{{ $render->designation }} </td>
                                    <td class="text-center"> {{ @$render->groupTd->designation_fr }}</td>
                                    <td class="text-center">
                                        {{-- {{ $render->file }} --}}

                                        @if ($render->files)
                                            @php
                                                $files = json_decode($render->files);

                                            @endphp
                                            @if (count(@$files) > 0)
                                                @foreach ($files as $file)
                                                    <a href="{{ Voyager::image($file->download_link) }}"
                                                        download="{{ $file->download_link }}" target="_blank"
                                                        style="color:blue;font-size:14px;">{{ $file->original_name }}
                                                        <i class="uil uil-download-alt"></i></a><br>
                                                @endforeach
                                            @endif
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        @if (Carbon\Carbon::parse($render->expiration_date) > Carbon\Carbon::now())
                                            {{ Carbon\Carbon::parse($render->expiration_date)->format('d-m-Y') }} /
                                            {{ Carbon\Carbon::parse($render->expiration_date)->format('H:i') }}
                                        @else
                                            {{ Carbon\Carbon::parse($render->expiration_date)->format('d-m-Y') }} /
                                            {{ Carbon\Carbon::parse($render->expiration_date)->format('H:i') }}
                                            <span class="badge badge-danger">
                                                @lang('intranet.Expiré')
                                            </span>
                                        @endif

                                    </td>
                                    <td class="text-center">
                                        @if ($render->publier == 1)
                                            <span class="badge badge-primary">@lang('intranet.Publié')</span>
                                        @else
                                            <span class="badge badge-secondary">@lang('intranet.Non publié')</span>
                                        @endif
                                    </td>
                                    <td class="d-flex justify-content-center ">
                                        <div>
                                            <a title="Voir" href="{{ route('render_details', ['id' => $render->id]) }}">
                                                <i class="uil uil-eye" style="font-size: 20px;"></i>
                                            </a>
                                        </div>
                                        <div>
                                            <button title="Modifier" class="gray-s pointer" data-toggle="modal"
                                                style="color: orange;border: none; background-color: #f9f9f9;"
                                                data-target="#updateCompteRendu{{ $render->id }}"><i
                                                    class="uil uil-edit-alt" style="font-size:20px;"></i>
                                            </button>
                                        </div>
                                        <div>
                                            <form id="c{{ $render->id }}"
                                                action="{{ route('delete_compte_rendu', ['id' => $render->id]) }}"
                                                method="POST">
                                                @csrf
                                                {{ method_field('DELETE') }}
                                                <button title="Supprimer" type="button" class="gray-s pointer"
                                                    onclick="sureDeleteRender({{ $render->id }})"
                                                    style="color: crimson;border: none;  background-color: #f9f9f9;"><i
                                                        class="uil uil-trash-alt" style="font-size: 20px;"></i>
                                                </button>
                                            </form>
                                        </div>


                                    </td>
                                </tr>
                                {{-- modal update compte rendu start --}}
                                <div class="modal fade" id="updateCompteRendu{{ $render->id }}" tabindex="-1"
                                    aria-labelledby="lectureModalLabel" aria-hidden="true"
                                    style="background-color:#3e3e3e7d;">
                                    <div class="modal-dialog modal-lg" style="margin-top: 212px;">
                                        <form action="{{ route('update_compte_rendu', ['id' => $render->id]) }}"
                                            method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="modal-content">
                                                <div class="modal-header" style="padding-bottom: 0px;">
                                                    <h5 class="modal-title" id="lectureModalLabel">
                                                        @lang('intranet.Modifier')
                                                    </h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
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
                                                                        <input class="form_input_1" type="text"
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
                                                                        <textarea class="form_input_1" id="update_description_compte_rendu"
                                                                            style="height: unset;" name="description"
                                                                            placeholder="@lang('intranet.Description')">{!! $render->description !!}</textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <div class="new-section">
                                                                    <div class="form_group">
                                                                        <label
                                                                            class="label25">@lang("intranet.Date d'expiration")</label>
                                                                        <input class="form_input_1" type="datetime-local"
                                                                            value="{{ $render->expiration_date }}"
                                                                            name="expiration_date" />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <div class="new-section">
                                                                    <div class="form_group">
                                                                        <label
                                                                            class="label25">@lang('intranet.Piece jointe')</label>
                                                                        <input class="form_input_1" type="file"
                                                                            name="files" />

                                                                        @if ($render->files)
                                                                            @php
                                                                                $files = json_decode(
                                                                                    $render->files,
                                                                                );
                                                                            @endphp
                                                                            @if (count(@$files) > 0)
                                                                                @foreach ($files as $file)
                                                                                    <a href="{{ Voyager::image($file->download_link) }}"
                                                                                        download="{{ $file->download_link }}"
                                                                                        target="_blank"
                                                                                        style="color:blue;font-size:14px;">{{ $file->original_name }}
                                                                                    </a><br>
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
                                                                                <select name="group_td_id" class="form_input_1">
                                                                                    <option value="">
                                                                                        @lang('intranet.Choisissez la liste des groupes')
                                                                                    </option>
                                                                                        @foreach (@$groups as $group)
                                                                                            <option @if ($group->id == $render->group_td_id) selected @endif value="{{ $group->id }}">
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
                                                                <input type="checkbox" name="publier" @if ($render->publier == 1) value="1" checked="" @else
                                                                value="0" @endif>
                                                                <label>@lang('intranet.Publier')</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="main-btn cancel" data-dismiss="modal">
                                                        @lang('intranet.Fermer')
                                                    </button>
                                                    <button type="submit"
                                                        class="main-btn">@lang('intranet.Soumettre')</button>
                                                </div>
                                        </form>
                                    </div>
                                </div>
                                {{-- modal update compte rendu end --}}
                                @endforeach
                            </tbody>
                        </table>
                    {{-- data table comptes rendus end --}}
                @endif
            @else
                @if (isset($renders))
                    <table id="comptes_rendus_student" class="table ucp-table">
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

                                                                            <div
                                                                                class="col-lg-12 col-md-12">
                                                                                {{-- <label for="file5">Add Screenshots</label> --}}
                                                                                {{-- <div
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
                                                                                </div> --}}
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
                                        @else
                                        <div>
                                            <span class="badge badge-danger">
                                                @lang('intranet.Vous ne pouvez pas ajouter un compte rendu')
                                            </span>
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
            @endif
                </div>
            </div>
        </div>

        <!-- Membres Tab -->
        <div class="tab-pane fade" id="membres" role="tabpanel" aria-labelledby="membres-tab">
            <div class="card">
                <div class="card-body">

                    @foreach($students as $groupe_td_id => $group)

                        <h5 class="card-title"> {{ @$group->first()->groupTd->designation_fr ?? 'N/A' }}</h5>
                        <table id="students" class="display table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    {{-- <th>@lang('intranet.Groupe')</th> --}}
                                    <th>@lang('intranet.Nom')</th>
                                    <th>@lang('intranet.Prénom')</th>
                                    <th>@lang('intranet.Email')</th>
                                    <th>@lang('intranet.CIN')</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($group as $student)
                                    <tr>
                                        {{-- <td>{{@$student->groupTd->designation_fr}}</td> --}}
                                        <td>{{ $student->prenom }}</td>
                                        <td>{{ $student->nom }}</td>
                                        <td>{{ $student->email }}</td>
                                        <td>{{ $student->cin }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @endforeach
                </div>
            </div>
        </div>
        <!-- description Tab -->
        {{-- @if ($course->description_fr)
        <div class="tab-pane fade" id="description" role="tabpanel" aria-labelledby="description-tab">
            <div class="card">
                <div class="card-body">
                    <p>{!! $course->description_fr !!}</p>
                </div>
            </div>
        </div>
        @endif --}}
    </div>
</div>




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
                            @if (@$course->id)
                                <input type="hidden" name="course_id" value="{{ @$course->id }}">
                            @else
                                <div class="col-lg-12 col-md-12">
                                    <div class="mt-30 lbel25">
                                        <label>@lang('intranet.Choisissez la matière')</label>
                                    </div>
                                    @if (isset($groups))
                                        <select name="subject_id" class="ui hj145 dropdown cntry152 prompt srch_explore" required>
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
                                        <textarea class="form_input_1" id="description_add_compte_rendu" style="height: unset;"
                                            name="description" placeholder="@lang('intranet.Description')"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="new-section">
                                    <div class="form_group">
                                        <label class="label25">@lang("intranet.Date d'expiration")</label>
                                        <input class="form_input_1" type="datetime-local" required
                                            name="expiration_date" />
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
                                        @if (isset($course->groups))
                                            <select name="group[]" class="ui hj145 dropdown cntry152 prompt srch_explore"
                                                multiple="">
                                                <option value="">@lang('intranet.Choisissez la liste des groupes')</option>
                                                @foreach (@$course->groups as $group)
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
                                <label>@lang('intranet.Publier')</label>
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



{{-- ********************** --}}

{{-- ********************** --}}
{{-- richt text script start --}}
{{-- richt text script end --}}

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7"></script>

<script>
    tinymce.init({
        selector: '#nachd',
        license_key: 'gpl'
      });

      tinymce.init({
        selector: '#comment2',
        license_key: 'gpl'
      });

      tinymce.init({
        selector: '#description_add_compte_rendu',
        license_key: 'gpl'
      });

      tinymce.init({
        selector: '#update_description_compte_rendu',
        license_key: 'gpl'
      });
</script>

<script>

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
    // script ritch text start
    // CKEDITOR.replace('editor', {
    //     removePlugins: 'notification,notificationaggregator,uploadwidget',
    //     notificationDuration: 0
    // });
    // script ritch text end

    function TeacherUploadChapter() {
        var file = document.getElementById("ThumbFile__input--source").files[0];
        if (file.size > 4194304) {
            alert('Fichier trop volumineux (4 Mo max)');
        } else {
            document.getElementById("showFileChapter").innerHTML = file.name + "(" + (file.size / 1024).toFixed('3') +
                " Ko )";
        }

    }

    function sureDeleteComment(id) {
        Swal({
            title: "êtes-vous sûr?",
            text: "Une fois supprimé, vous ne serez pas en mesure de récupérer ce fichier imaginaire!",
            icon: "warning",
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

    function  add() {
        var form = document.getElementById('chapterForm');
        console.log(form)
        if (form.style.display === 'none' || form.style.display === '') {
            form.style.display = 'block';
        } else {
            form.style.display = 'none';
        }
    };


    // data table script start
    new DataTable('#students', {
        layout: {
            topStart: {
                buttons: ['copyHtml5', 'excelHtml5', 'csvHtml5', 'pdfHtml5']
            }
        }
    });
    // data table script end

    const fileInput = document.getElementById("file-upload");
    const fileListContainer = document.getElementById("file-list");

    fileInput.addEventListener("change", () => {
        const files = fileInput.files;
        fileListContainer.innerHTML = "";
        for (let i = 0; i < files.length; i++) {
            const fileItem = document.createElement("p");
            fileItem.textContent = `${files[i].name} - ${Math.round(files[i].size / 1024)} KB`;
            fileListContainer.appendChild(fileItem);
        }
    });


    // chiptres liste script start
    function openActionMenu(id) {
        let menu = document.getElementById(`action-menu-${id}`);
        menu.style.display = (menu.style.display === 'none' || menu.style.display === '') ? 'block' : 'none';
    }

    function openEditModal(id) {
        // Open your modal here (Bootstrap or custom modal)
        console.log("Opening modal for chapter: " + id);
        // Example with Bootstrap modal:
        // $('#editChapterModal').modal('show');
    }



    function editModal(id){

    tinymce.init({
        selector: '#editor'+id,
        license_key: 'gpl'
      });
    }

    function StudentUpload(id) {
    let input = document.getElementById("compteRenduStudent" + id);
    let showFile = document.getElementById("showFileStudent" + id);

    if (input.files.length > 0) {
        let file = input.files[0]; // Get the first file
        let fileSize = (file.size / 1024).toFixed(2); // Convert bytes to KB and round to 2 decimals
        showFile.innerHTML = `<strong>${file.name}</strong> (${fileSize} KB)`;
    }
}


</script>
@section('specific_js')
    <script src="{{ asset('public/data_table/jquery.dataTables.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#comptes_rendus_teacher').DataTable({
                layout: {
        topStart: {
            buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
        }
    }
            });
        });

        $(document).ready(function() {
            $('#comptes_rendus_student').DataTable({
                layout: {
                    topStart: {
                        buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
                    }
                }
            });
        });

    </script>
@endsection
@endsection
