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
                    {{-- <div class="card_dash_right1">
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
                                                    <span @if (@$subject_id == $subject->id) class="active_2"
                                                    @endif>{{ $subject->$designation }}</span>
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
                            @if (isset($courses))
                                @foreach (@$courses as $data)
                                    <div class="card mb-4 shadow-sm" @if ($loop->first) style="margin-top: 20px;" @endif>
                                        <div class="card-body">
                                            <!-- Course Title and Options -->
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div>
                                                    <h4 class="card-title">

                                                        <i class='uil uil-books crse_icon'></i><span class="section-title-text"
                                                            style="font-size: 16px;">{{ $data->designation_fr }}
                                                        </span>
                                                    </h4>


                                                    <div class="d-flex align-items-center">
                                                        <img src="{{ Voyager::image(@$data->user->avatar) }}" alt="Teacher Avatar"
                                                            class="rounded-circle mr-2" style="width: 35px; height: 35px;">
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
                                                        <img src="{{ asset('theme2/images/ball.gif') }}" alt="" style="width: 20px">
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
                                                </div>

                                            </div>
                                            <!-- Course Description -->
                                            {{-- <p class="card-text">{{ $data->teacher_cin }}</p> --}}


                                        </div>
                                    </div>

                                @endforeach
                                <script>
                                    function view_course(id) {
                                        window.location = '../../course_details/' + id;
                                    }
                                </script>

                                {{ $courses->links('pagination::bootstrap-4') }}
                            @endif
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
        if (file.size > 4194304) {
            alert('Fichier trop volumineux (4 Mo max)');
        } else {
            document.getElementById("showFileStudent" + id).innerHTML = file.name + "(" + (file.size / 1024).toFixed('3') +
                " Ko )";
        }
    }

    function view_course(id) {
        window.location = '../course_details/' + id;
    }
</script>
@endsection
