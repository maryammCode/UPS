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
        <script type="text/javascript">
            var msg = '{{ session('success') }}';
            swal({
                title: 'Merci',
                text: msg,

                type: 'success',

                toastr: true,
                timer: 5000,
                showConfirmButton: false
            })
        </script>
    @endif
    @if (Session::has('error'))
        <script type="text/javascript">
            var msg = '{{ session('error') }}';
            swal({
                text: msg,
                title: '',
                type: 'warning',
                toastr: true,
                timer: 5000,
                showConfirmButton: false
            })
        </script>
    @endif
    @if (Session::has('warning'))
        <script type="text/javascript">
            var msg = '{{ session('warning') }}';
            swal(
                msg,
                'réessayer SVP',
                'danger'
            )
        </script>
    @endif
    {{-- css filter --}}
    <style>
        .container {
            overflow: hidden;
        }

        .myFilterDiv {
            display: none;
        }

        /* The "show" class is added to the filtered elements */
        .show {
            display: block;
        }

        /* Style the buttons */
        .btn {
            border: none;
            outline: none;
            padding: 12px 16px;
            background-color: #f1f1f1;
            cursor: pointer;
        }

        /* Add a light grey background on mouse-over */
        .btn:hover {
            background-color: #ddd;
        }

        /* Add a dark background to the active button */
        .btn.active {
            background-color: #666;
            color: white;
        }

        .show2 {
            display: flex;
        }
    </style>
    {{-- /css filter --}}

    <div>
        <div class="sa4d25">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-12 col-lg-8">
                        <div class="section3125">
                            <div class="explore_search">
                                <div class="ui search focus">
                                    <div class="ui left icon input swdh11">
                                        <input class="prompt srch_explore" type="text" placeholder="Recherche"
                                            id="myInput">
                                        <i class="uil uil-search-alt icon icon2"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="_14d25">
                            <div class="row">
                                <div id="myBtnContainer">
                                    <h3>Filtre par :</h3>
                                    <button class="btn active" onclick="filterSelection('all')"> Afficher tous</button>
                                    <button class="btn" onclick="filterSelection('Etudiant')"> Etudiants</button>
                                    {{-- <button class="btn" onclick="filterSelection('Enseignant')"> Enseignants</button> --}}
                                    <button class="btn" onclick="filterSelection('Alumnis')">Alumnis</button>
                                    {{-- <button class="btn" onclick="filterSelection('colors')"> Colors</button> --}}
                                </div>
                            </div>
                            <div class="row ">

                                <style>
                                    .tutor_img {
                                        position: relative;
                                    }

                                    .avatar_img {}

                                    .avatar_status {
                                        position: absolute;
                                        z-index: 9;
                                        left: 0
                                    }
                                </style>
                                <div id="myList" style="width: 100% !important">
                                    @foreach ($users as $student)
                                        @php
                                            $request_student_offer = App\OfferRequest::where('user_id', $student->id)
                                                ->where('publier', 1)
                                                ->where('end_date', '>=', date('Y-m-d') . ' 00:00:00')
                                                ->first();
                                            $cv_setting = App\CvSetting::where('user_id', $student->id)->first();

                                            // dd($request_student_offer);

                                        @endphp
                                        @if (@$student->role->name == 'Etudiant' || @$student->role->name == 'Alumnis')
                                            <div
                                                class="{{ @$student->role->name }} col-xl-2 col-lg-2 col-md-3 col-sm-3 col-6 myPagination myFilterDiv  ">
                                                <div class="fcrse_1 mt-30 item">
                                                    {{-- @if (@$request_student_offer)
                                                        <span
                                                            class="badge rounded-pill bg-info text-dark">@lang('intranet.A la recherche de stage')</span>
                                                    @endif --}}
                                                    <div class="tutor_img p-3">
                                                        <a @if (@$request_student_offer) data-toggle="modal" data-target="#ifoOffer{{ $student->id }}"
                                                            @else
                                                                @if( @$cv_setting->theme == 1)
                                                                    href="{{ route('cv_theme_1', $student->id) }}"
                                                                @elseif (@$cv_setting->theme == 2)
                                                                    href="{{ route('cv_theme_2', $student->id) }}"
                                                                @endif
                                                             @endif
                                                            target="_blank" style="position:relative ; width:80%">

                                                            <img src="@if($student->avatar && Storage::exists($student->avatar)){{ Voyager::image($student->avatar) }}@else{{ asset('theme2/images/avatar.png') }}@endif"
                                                                style="width: 100% !important;height: auto !important; aspect-ratio: 1 / 1"
                                                                class="avatar_img" alt="">

                                                            @if (@$request_student_offer)
                                                                <img src="{{ Voyager::image($request_student_offer->offerType->cover_fr) }}"
                                                                    class="avatar_status"
                                                                    style=" width : 100% !important; height:auto !important ;box-shadow:none;padding-top: 5px">
                                                            @endif
                                                        </a>

                                                    </div>
                                                    <div class="tutor_content_dt">
                                                        <div class="tutor150">
                                                            <a @if (@$request_student_offer && @$request_student_offer->end_date > date('Y-m-d')) data-toggle="modal" data-target="#ifoOffer"
                                                            @else
                                                                @if (@$cv_setting->theme == 1)
                                                                     href="{{ route('cv_theme_1', $student->id) }}"
                                                                @elseif(@$cv_setting->theme == 2)
                                                                     href="{{ route('cv_theme_2', $student->id) }}"
                                                                @endif

                                                            @endif
                                                                class="tutor_name personal_pointer" target="_blank">
                                                                {{ $student->name }}
                                                            </a>
                                                            {{-- <div class="mef78" title="Verify">
                                                            <i class="uil uil-check-circle"></i>
                                                        </div> --}}
                                                        </div>
                                                        <div class="tutor_cate">Email: {{ $student->email }}</div>
                                                        {{-- <ul class="tutor_social_links">
                                                        <li><a href="#" class="fb"><i class="fab fa-facebook-f"></i></a></li>
                                                        <li><a href="#" class="tw"><i class="fab fa-twitter"></i></a></li>
                                                        <li><a href="#" class="ln"><i class="fab fa-linkedin-in"></i></a></li>
                                                        <li><a href="#" class="yu"><i class="fab fa-youtube"></i></a></li>
                                                    </ul> --}}
                                                        {{-- <div class="tut1250">
                                                        <span class="vdt15">100K Students</span>
                                                        <span class="vdt15">15 Courses</span>
                                                    </div> --}}
                                                    </div>
                                                </div>
                                            </div>
                                        @endif

                                        {{-- modal   offer start --}}

                                        <div class="modal fade bd-example-modal-lg" id="ifoOffer{{ $student->id }}"
                                            tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                            aria-hidden="true">
                                            <div class="modal-dialog add_stage" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title text-center" id="exampleModalLabel"><i
                                                                class="uil uil-info"></i>
                                                            @lang('intranet.Informations Offre')</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>

                                                    <div class="modal-body row">
                                                        <div class="form-group col-12">
                                                            <h5 for="title">@lang('intranet.Type')</h5>
                                                            <li>{{ @$request_student_offer->offerType->$designation }}</li>
                                                        </div>
                                                        <div class="form-group col-12">
                                                            <h5 for="title">@lang('intranet.Domaine')</h5>
                                                            <li>{{ @$request_student_offer->domaine }}</li>
                                                        </div>
                                                        <div class="form-group col-12">
                                                            <h5 for="title">@lang('intranet.Description')</h5>
                                                            <li>{!! @$request_student_offer->description !!}</li>
                                                        </div>
                                                        <div class="form-group col-6">
                                                            <h5 for="title">@lang('intranet.Date de début')</h5>
                                                            <li>{{ @$request_student_offer->start_date }}</li>
                                                        </div>
                                                        <div class="form-group col-6">
                                                            <label for="title">@lang('intranet.Date de fin')</label>
                                                            <li>{{ @$request_student_offer->end_date }}</li>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">@lang('intranet.Annuler')</button>
                                                        @if ($cv_setting->theme == 1)
                                                            <a href="{{ route('cv_theme_1', $student->id) }}"
                                                                class="btn btn-primary"
                                                                target="_blank">@lang('intranet.Consulter CV')</a>
                                                        @elseif($cv_setting->theme == 2)
                                                            <a href="{{ route('cv_theme_2', $student->id) }}"
                                                                class="btn btn-primary"
                                                                target="_blank">@lang('intranet.Consulter CV')</a>
                                                        @endif
                                                    </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- modal  offer end --}}
                                    @endforeach
                                </div>


                                <div class="col-md-12">

                                    <div id="pagination"></div>
                                    {{-- <div class="main-loader mt-50">
                                        {{ $students->links('pagination::bootstrap-5') }}
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    {{-- script filter  --}}
    <script>
        filterSelection("all")

        function filterSelection(c) {
            var x, i;
            x = document.getElementsByClassName("myFilterDiv");
            if (c == "all") c = "";
            // Add the "show" class (display:block) to the filtered elements, and remove the "show" class from the elements that are not selected
            for (i = 0; i < x.length; i++) {
                w3RemoveClass(x[i], "show2");
                if (x[i].className.indexOf(c) > -1) w3AddClass(x[i], "show2");
            }
        }

        // Show filtered elements
        function w3AddClass(element, name) {
            var i, arr1, arr2;
            arr1 = element.className.split(" ");
            arr2 = name.split(" ");
            for (i = 0; i < arr2.length; i++) {
                if (arr1.indexOf(arr2[i]) == -1) {
                    element.className += " " + arr2[i];
                }
            }
        }

        // Hide elements that are not selected
        function w3RemoveClass(element, name) {
            var i, arr1, arr2;
            arr1 = element.className.split(" ");
            arr2 = name.split(" ");
            for (i = 0; i < arr2.length; i++) {
                while (arr1.indexOf(arr2[i]) > -1) {
                    arr1.splice(arr1.indexOf(arr2[i]), 1);
                }
            }
            element.className = arr1.join(" ");
        }

        // Add active class to the current control button (highlight it)
        var btnContainer = document.getElementById("myBtnContainer");
        var btns = btnContainer.getElementsByClassName("btn");
        for (var i = 0; i < btns.length; i++) {
            btns[i].addEventListener("click", function() {
                var current = document.getElementsByClassName("active");
                current[0].className = current[0].className.replace(" active", "");
                this.className += " active";
            });
        }

        $(document).ready(function() {
            $("#myInput").on("keyup", function() {

                var value = $(this).val().toLowerCase();
                $(".myFilterDiv").filter(function() {

                    let x = $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)

                    console.log($(this).text().toLowerCase());
                });
            });
        });
    </script>

    {{-- /script filter  --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/simplePagination.js/1.6/jquery.simplePagination.min.js"></script>
    <script>
        // $(".myPagination .item").slice(2).hide();
        // $('#pagination').pagination({

        //     // Total number of items present
        //     // in wrapper class
        //     items: {{ $users->count() }},

        //     // Items allowed on a single page
        //     itemsOnPage: 2,
        //     onPageClick: function(noofele) {
        //         $(".myPagination .item").hide()
        //             .slice(itemsOnPage * (noofele - 1),
        //                 itemsOnPage + itemsOnPage * (noofele - 1)).show();
        //     }
        // });
    </script>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
@endsection
