<!DOCTYPE html>
<html lang="en">

<head>

    {{-- for voyager icons --}}
    <link rel="stylesheet" href="{{ voyager_asset('css/app.css') }}">
    @include('intranet.layouts.css')
    @include('intranet.dataTable.data_table_css')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@7"></script>
    <style>
        .fade {
            opacity: 1;
        }

        .swal2-container {
            zoom: 120% !important
        }
    </style>
  <script src="{{asset('tinymce/tinymce.min.js')}}"></script>
</head>

<body>

    @php
        $notification_not_seen = App\Notification::where('user_id', Auth::user()->id)
            ->where('seen', 0)
            ->latest('created_at')
            ->get();

        $all_notifications = App\Notification::where('user_id', Auth::user()->id)
            ->latest('created_at')
            ->limit(20)
            ->get();

    @endphp
    @include('widgets.sweet_alert')
    <header class="header clearfix hidden-print ">
        <button type="button" id="toggleMenu" class="toggle_menu">
            <i class='uil uil-bars'></i>
        </button>
        <button id="collapse_menu" class="collapse_menu">
            <i class="uil uil-bars collapse_menu--icon "></i>
            <span class="collapse_menu--label"></span>
        </button>
        <!--  <div class="main_logo" id="logo">
            <a href="{{ route('index') }}"><img src="{{ asset('theme2/images/logo_ups.png') }}" alt=""
                    style="height: 57px; ;"></a>
            <a href="{{ route('index') }}"><img class="logo-inverse" src="{{ asset('theme2/images/logo_ups.png') }}"
                    alt="logo"></a>
        </div> -->
        <div class="header_right">

            <ul>
                {{-- <select class="form-select lang_btn" onchange="changer_langue(event.target.value)" aria-label="Default select example">
                    <option value="fr" @if (App::getLocale() == 'fr') selected @endif>Français
                    </option>
                    <option value="en" @if (App::getLocale() == 'en') selected @endif> English
                    </option>
                    <option value="ar" @if (App::getLocale() == 'ar') selected @endif> عربي
                    </option>
                </select>
                <script>
                    function changer_langue(lang) {
                        window.location = '/public/change_lang/' + lang
                    }
                </script> --}}
                <li class="ui dropdown">
                    <a href="#" class="option_links" title="Notifications"><i class='uil uil-bell'></i>

                        <span class="noti_count" id="notif_count">{{ count($notification_not_seen) }}</span>

                    </a>
                    <div class="menu dropdown_mn specific_scroll" id="notif_list">
                        @foreach ($all_notifications as $notification)
                            <a href="{{ env('APP_URL') }}{{ $notification->link }}" class="channel_my item">
                                <div class="profile_link ">
                                    <img src="{{ $notification->sender->entreprise_id ? Voyager::image(@$notification->sender->company->logo) : Voyager::image(@$notification->sender->avatar) }}"
                                        alt="avatar">
                                    <div class="pd_content">
                                        <h6>{{ $notification->sender->entreprise_id ? $notification->sender->company->designation : $notification->sender->name }}
                                            @if ($notification->seen == 0)
                                                {{-- <i class="uil uil-circle"></i> --}}
                                                <span style="color:red"> <i class="uil uil-bell"></i></span>
                                            @endif
                                        </h6>
                                        <p
                                            style="overflow: hidden;display: -webkit-box; -webkit-line-clamp: 1;line-clamp: 2; -webkit-box-orient: vertical;">
                                            {{ $notification->text }}
                                        </p>
                                        <span class="nm_time">{{ $notification->created_at->diffForHumans() }}</span>
                                    </div>
                                </div>
                            </a>
                        @endforeach

                        {{-- <a href="#" class="channel_my item">
                            <div class="profile_link">
                                <img src="images/left-imgs/img-2.jpg" alt="">
                                <div class="pd_content">
                                    <h6>Jassica Smith</h6>
                                    <p>Added New Review In Video <strong>Full Stack PHP Developer</strong>.</p>
                                    <span class="nm_time">12 min ago</span>
                                </div>
                            </div>
                        </a>
                        <a href="#" class="channel_my item">
                            <div class="profile_link">
                                <img src="images/left-imgs/img-9.jpg" alt="">
                                <div class="pd_content">
                                    <p> Your Membership Approved <strong>Upload Video</strong>.</p>
                                    <span class="nm_time">20 min ago</span>
                                </div>
                            </div>
                        </a> --}}
                        <a class="vbm_btn" href="{{ route('all_notifications') }}">@lang('intranet.Voir tous les notifications') <i
                                class='uil uil-arrow-right'></i></a>
                    </div>

                </li>
                <li class="ui dropdown">
                    <a href="#" class="opts_account" title="Account">
                        <img src="{{ Voyager::image(@Auth::user()->avatar) }}" alt="avatar"
                            style="width: 48px;height: 48px;">
                    </a>
                    <div class="menu dropdown_account">
                        <div class="channel_my">
                            <div class="profile_link">
                                <img src="{{ Voyager::image(@Auth::user()->avatar) }}" alt="">
                                <div class="pd_content">
                                    <div class="rhte85">
                                        <h6>{{ @Auth::user()->name }}</h6>
                                        <div class="mef78" title="Verify">
                                            <i class='uil uil-check-circle'></i>
                                        </div>
                                    </div>
                                    <span><a href="/cdn-cgi/l/email-protection" class="__cf_email__"
                                            data-cfemail="1b7c7a76797477222f285b7c767a727735787476">{{ @Auth::user()->email }}</a></span>
                                </div>
                            </div>
                        </div>

                        <a href="{{ route('profile') }}" class="item channel_item">@lang('intranet.Profil')</a>
                        @if (@Auth::user()->role->name != 'Entreprise')
                            <a href="{{ route('customize_cv') }}" class="item channel_item">@lang('intranet.Personnaliser votre CV')</a>
                        @else
                            <a href="{{ route('edit_info_company') }}" class="item channel_item">@lang("intranet.Modifer votre informations d'etnreprise")</a>
                        @endif
                        <a href="{{ route('logout') }}" class="item channel_item"
                            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">@lang('intranet.Se déconnecter')</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
            </ul>
        </div>
    </header>
    @php
        $lang = Session::get('language');
        if (!$lang) {
            $lang = App::getLocale();
        }
        $short_description = 'short_description_' . $lang;
        $description = 'description_' . $lang;
        $designation = 'designation_' . $lang;
        App::setLocale($lang);

        $coordonne = App\Coordinate::first();
        $cv_user_existe = App\CvSetting::where('publier', 1)
            ->where('user_id', @Auth::user()->id)
            ->first();
        $offer_types = App\OfferType::all();
        $user_offer_request_exist = App\OfferRequest::where('publier', 1)
            ->where('user_id', @Auth::user()->id)
            ->where('end_date', '>=', date('Y-m-d') . ' 00:00:00')
            ->first();
        $company_conected = App\Entreprise::where('id', @Auth::user()->entreprise_id)->first();

        if (@Auth::user()->role->name == 'Enseignant') {
            $menu_id = TCG\Voyager\Models\Menu::where('name', 'intranet_teacher')->first();
        } elseif (@Auth::user()->role->name == 'Etudiant') {
            $menu_id = TCG\Voyager\Models\Menu::where('name', 'intranet_student')->first();

            $student = App\StudentsPredefinedList::where('cin', Auth::user()->cin)
                ->where('year_id', $coordonne->current_year_id)
                ->first();
        } elseif (@Auth::user()->role->name == 'Alumni') {
            $menu_id = TCG\Voyager\Models\Menu::where('name', 'intranet_alumni')->first();
        } elseif (@Auth::user()->role->name == 'Entreprise') {
            if (@$company_conected->publier == 1) {
                $menu_id = TCG\Voyager\Models\Menu::where('name', 'intranet_company')->first();
            }
        } elseif (@Auth::user()->role->name == 'gestionnaire du magasin') {
                 $menu_id = TCG\Voyager\Models\Menu::where('name', 'intranet_gestionnaire')->first();
        } else {
            $menu_id = TCG\Voyager\Models\Menu::where('name', 'intranet_personal')->first();
        }

        $menu = TCG\Voyager\Models\MenuItem::where('menu_id', @$menu_id->id)
        ->whereNull('parent_id')
            ->orderBy('order')
            ->get();

    @endphp
    <style>
        .iconplus{
            float: right;
    margin-right: 13px;
    font-size: 20px;
        }
        .menu--item__has_sub_menu .menu--link:after{
            display: none
        }
    </style>
    {{--  right sidebar start --}}
    <nav class="vertical_nav hidden-print">
        <div class="left_section menu_left" id="js-menu">
            <div class="left_section">
                <ul>
                    {{-- || @$active_page == @$data->parameters->type --}}
                    @foreach ($menu as $data)
                        @php
                            $children = TCG\Voyager\Models\MenuItem::where('parent_id', $data->id)
                                ->orderBy('order')
                                ->get();
                        @endphp
                        <li
                            @if (@$active_page == $data->route || @$active_page == @$data->parameters->type) class="menu--item active_menu {{ @$children->count() > 0 ? 'menu--item__has_sub_menu' :'' }}"   @else class="menu--item {{ @$children->count() > 0 ? 'menu--item__has_sub_menu' :'' }}" @endif>
                            <a @if ($data->route) @if ($data->route == 'emploi')
                                        href="{{ route($data->route, ['type' => $data->parameters->type]) }}"
                                    @else
                                        href="{{ route($data->route) }}" @endif
                                @endif
                                class="menu--link {{ $data->title }} {{ @$page }} {{ @$page == $data->title ? 'active' : '' }} "
                                title="{{ $data->title }}">
                                @if ($data->route == 'liste_groupes_stud')

                                    <i class='{{ $data->icon_class }} menu--icon'></i>
                                    <span class="menu--label">
                                        @if (isset($student))
                                            {{ @$student->groupTd->designation_fr }}
                                        @else
                                            @lang('intranet.Emploi du temps') @endif
                                    </span>
                                @else
                                    <i class='{{ $data->icon_class }} menu--icon'></i>
                                    <span class="menu--label">@lang('intranet.' . $data->title)

                                        @if(@$children->count() > 0)
                                        <span class="iconplus"> + </span>
                                        @endif
                                    </span>

                                @endif
                            </a>
                            @if (@$children->count() > 0)
                                <ul class="sub_menu">
                                    @foreach ($children as $submenu)
                                        <li class="sub_menu--item">
                                            <a @if ($submenu->route) @if ($submenu->route == 'emploi')
                                        href="{{ route($submenu->route, ['type' => $submenu->parameters->type]) }}"
                                    @else
                                        href="{{ route($submenu->route) }}" @endif
                                                @endif
                                                class="sub_menu--link  {{ @$page == $submenu->title ? 'active' : '' }}"
                                                style="    padding-left: 10px;
    padding-right: 10px;
    font-size: 13px;">
                                                @if ($submenu->route == 'liste_groupes_stud')

                                                    <i class='{{ $submenu->icon_class }} menu--icon'></i>
                                                    <span class="menu--label">
                                                        @if (isset($student))
                                                            {{ @$student->groupTd->designation_fr }}
                                                        @else
                                                            @lang('intranet.Emploi du temps') @endif
                                                    </span>
                                                @else
                                                    <i class='{{ $submenu->icon_class }} menu--icon'></i>
                                                    <span class="menu--label">@lang('intranet.' . $submenu->title)</span>
                                                @endif
                                            </a>
                                        </li>
                                    @endforeach

                                </ul>
                            @endif

                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="left_section pt-2">
                <ul>
                    <li
                        @if (@$active_page == 'votre_avis') class="menu--item active_menu" @else class="menu--item" @endif>
                        <a href="{{ route('claims') }}" class="menu--link" title="@lang('intranet.Réclamation')">
                            <i class='uil uil-comment-alt-exclamation menu--icon'></i>
                            <span class="menu--label">@lang('intranet.Réclamation')</span>
                        </a>
                    </li>
                    <li class="menu--item">
                        <a href="{{ route('logout') }}" class="menu--link" title="Déconnecter"
                            onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();"><i
                                class='uil uil-arrow-left menu--icon'></i><span
                                class="menu--label">@lang('intranet.Se déconnecter')</span></a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                </ul>
            </div>

        </div>
    </nav>
    {{-- sidebar end --}}


    <div class="wrapper">
        <div class="sa4d25"
            style="background: url({{ asset('back.png') }}) ; background-repeat: no-repeat;
        background-size: auto;">
            <div class="container-fluid">
                <div class="row">

                    {{-- ********* --}}

                    {{--
                        @if (@$page == 'profile') class="col-xl-12" @else class="col-xl-9" @endif

                        --}}
                    <div
                        class="{{ @$page == 'profile' || @$page == 'cour' || @$page == 'details_course' || @$page == 'cv' || @$page == 'ums' || @$page == 'listOfGroupsForTeacher' || @$page == 'detailsAbsences' ? 'col-xl-12 col-lg-12' : 'col-xl-9 col-lg-8' }} ">
                        @yield('content')
                        {{-- <div id="demo">
                        </div> --}}
                    </div>

                    {{-- ******** --}}
                    @if (
                        !isset($page) ||
                            ($page != 'profile' &&
                                $page != 'cour' &&
                                $page != 'details_course' &&
                                $page != 'cv' &&
                                @$page != 'ums' &&
                                @$page != 'listOfGroupsForTeacher' &&
                                @$page != 'detailsAbsences'))
                        {{-- left sidebar start --}}
                        <div class="col-xl-3 col-lg-4">
                            <div class="right_side">
                                <div class="fcrse_2 mb-30"
                                    @if (@Auth::user()->date_naissance == date('Y-m-d')) style="background: url({{ asset('source.gif') }}) @endif">
                                    <div class="tutor_img">
                                        <a href="{{ route('profile') }}">
                                            <img src="{{ Voyager::image(@Auth::user()->avatar) }}" alt="avatar">
                                        </a>
                                    </div>
                                    <div class="tutor_content_dt" style="background : #fff">
                                        @if (@Auth::user()->date_naissance == date('Y-m-d'))
                                            <h2 style="color: #961616">Happy Birthday !</h2>
                                        @endif
                                        <div class="tutor150">
                                            <a href="{{ route('profile') }}"
                                                class="tutor_name">{{ @Auth::user()->name }}</a>
                                            <div class="mef78" title="Verify">
                                                <i class="uil uil-check-circle"></i>
                                            </div>
                                        </div>
                                        <div class="tutor_cate">{{ @Auth::user()->role->display_name }}</div>
                                        <ul class="tutor_social_links">
                                            <li><a href="#" class="ln"><i
                                                        class="fab fa-linkedin-in"></i></a>
                                            </li>
                                        </ul>
                                        {{-- <a href="{{ route('profile') }}" class="prfle12link">@lang('intranet.Personnaliser votre profil') </a> --}}
                                        @if (@Auth::user()->role->name == 'Etudiant' || @Auth::user()->role->name == 'Alumni')


                                            @if ($cv_user_existe == null)
                                                <a href="{{ route('customize_cv') }}" class="prfle12link">
                                                    @lang('intranet.Commencez à poster votre CV pour profiter des offres')
                                                    <i class="uil uil-arrow-right"></i>
                                                </a>
                                            @elseif ($user_offer_request_exist)
                                                <a data-toggle="modal" data-target="#updateOfferStudent"
                                                    class=" btn btn-primary btn_stage">
                                                    @lang('intranet.Modifier votre offre')
                                                </a>
                                            @else
                                                <a data-toggle="modal" data-target="#searchOfferStudent"
                                                    class=" btn btn-primary btn_stage">
                                                    @lang('intranet.Chercher un stage')
                                                </a>
                                            @endif
                                        @endif
                                    </div>
                                </div>
                                @if (@Auth::user()->role->name != 'Entreprise')
                                    <div class="fcrse_3" style="margin-top:10%;">
                                        @include('public.widgets.donnees_universitaire')
                                    </div>
                                @endif
                                <div class="fcrse_3">
                                    <div class="cater_ttle">
                                        <h4>@lang('intranet.Liens Utiles')</h4>
                                    </div>
                                    <ul class="allcate15">
                                        @php
                                            $links = App\Usefullink::all();
                                        @endphp
                                        @foreach ($links as $link)
                                            <li>
                                                <a href="{{ @$link->link }}" class="ct_item"><i
                                                        class='uil uil-link'></i> {{ @$link->designation_fr }}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>

                        {{-- left sidebar end --}}
                    @endif
                </div>
            </div>
        </div>
    </div>
    @if (@Auth::user()->role->name == 'Etudiant' || @Auth::user()->role->name == 'Alumni')
        {{-- modal checher un offerstage start --}}
        <div class="modal fade bd-example-modal-lg" id="searchOfferStudent" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog add_stage" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-center" id="exampleModalLabel">@lang('intranet.Demander de stage')</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ route('applyOfferStageStudent') }}" method="POST">
                        @csrf
                        <div class="modal-body row">
                            <input type="text" name="user_id" value="{{ @Auth::user()->id }}" hidden>
                            <div class="form-group col-12">
                                <label for="title">@lang('intranet.Type')</label>
                                <select class="form-control" name="type_id">
                                    <option disabled selected>@lang('intranet.Choisir')</option>
                                    @foreach ($offer_types as $type)
                                        <option value="{{ $type->id }}">{{ $type->$designation }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-12">
                                <label for="title">@lang('intranet.Domaine')</label>
                                <input type="text" class="form-control" name="domaine"
                                    placeholder="@lang('intranet.Domaine')">
                            </div>
                            <div class="form-group col-12">
                                <label for="title">@lang('intranet.Description')</label>
                                <textarea class="form-control" name="description" placeholder="@lang('intranet.Description')" rows="4"></textarea>
                            </div>
                            <div class="form-group col-6">
                                <label for="title">@lang('intranet.Date de début')</label>
                                <input type="date" class="form-control" name="start_date"
                                    placeholder="@lang('intranet.Date de début')">
                            </div>
                            <div class="form-group col-6">
                                <label for="title">@lang('intranet.Date de fin')</label>
                                <input type="date" class="form-control" name="end_date"
                                    placeholder="@lang('intranet.Date de fin')">
                            </div>


                            {{-- <div class="form-group col-12">

                                <label class="switch">
                                    <input type="checkbox" id="other_company_checkbox" value="1" name="publier">
                                    <span></span>
                                    <label for="other_company_checkbox" class="lbl-quiz"> @lang('intranet.Publier ?')</label>
                                </label>
                            </div> --}}
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary"
                                data-dismiss="modal">@lang('intranet.Annuler')</button>
                            <button type="submit" class="btn btn-primary">@lang('intranet.Enregistrer')</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        {{-- modal checher un offer stage end --}}
        {{-- modal  update offer start --}}
        @if ($user_offer_request_exist != null && $user_offer_request_exist->end_date > date('Y-m-d'))
            <div class="modal fade bd-example-modal-lg" id="updateOfferStudent" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog add_stage" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title text-center" id="exampleModalLabel">@lang('intranet.Demander de stage')</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form
                            action="{{ route('updateApplyOfferStageStudent', ['id' => $user_offer_request_exist->id]) }}"
                            method="POST">
                            @csrf

                            <div class="modal-body row">
                                <input type="text" name="user_id" value="{{ @Auth::user()->id }}" hidden>
                                <div class="form-group col-12">
                                    <label for="title">@lang('intranet.Type')</label>
                                    <select class="form-control" name="type_id">
                                        <option disabled selected>@lang('intranet.Choisir')</option>
                                        @foreach ($offer_types as $type)
                                            <option value="{{ $type->id }}"
                                                {{ $type->id == $user_offer_request_exist->type_id ? 'selected' : '' }}>
                                                {{ $type->$designation }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-12">
                                    <label for="title">@lang('intranet.Domaine')</label>
                                    <input type="text" class="form-control" name="domaine"
                                        value="{{ $user_offer_request_exist->domaine }}"
                                        placeholder="@lang('intranet.Domaine')">
                                </div>
                                <div class="form-group col-12">
                                    <label for="title">@lang('intranet.Description')</label>
                                    <textarea class="form-control" name="description" placeholder="@lang('intranet.Description')" rows="4"> {{ $user_offer_request_exist->description }}</textarea>
                                </div>
                                <div class="form-group col-6">
                                    <label for="title">@lang('intranet.Date de début')</label>
                                    <input type="date" class="form-control" name="start_date"
                                        value="{{ $user_offer_request_exist->start_date }}"
                                        placeholder="@lang('intranet.Date de début')">
                                </div>
                                <div class="form-group col-6">
                                    <label for="title">@lang('intranet.Date de fin')</label>
                                    <input type="date" class="form-control" name="end_date"
                                        value="{{ $user_offer_request_exist->end_date }}"
                                        placeholder="@lang('intranet.Date de fin')">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary"
                                    data-dismiss="modal">@lang('intranet.Annuler')</button>
                                <button type="submit" class="btn btn-primary">@lang('intranet.Enregistrer')</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @endif
        {{-- modal update offer end --}}
    @endif

    @include('intranet.layouts.script')



    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@7"></script>


    <script>
        let now = new Date();
        console.log(now);
        setInterval(() => {





            //ajax post call last_notifications
            $.ajax({
                type: "POST",
                url: "{{ route('last_notifications') }}",
                data: {
                    _token: "{{ csrf_token() }}",
                    last_date: now.toISOString()
                },
                success: function(response) {


                    $('#notif_count').text(response.nb_notifications);
                    console.log('response.nb_notifications')
                    if (response.notifications.length > 0) {
                        response.notifications.forEach(notif => {
                            console.log(notif)
                            let txt = `
                                <a href="{{ env('APP_URL') }}${notif.link}" class="channel_my item">
                                    <div class="profile_link ">
                                        <img src="${notif.user.avatar}" alt="avatar">
                                        <div class="pd_content">
                                            <h6>${ notif.user.name }
                                                <span style="color:red"> <i class="uil uil-bell"></i></span>
                                            </h6>
                                            <p
                                                style="overflow: hidden;display: -webkit-box; -webkit-line-clamp: 1;line-clamp: 2; -webkit-box-orient: vertical;">
                                                ${ notif.text }
                                            </p>
                                            <span class="nm_time">${ notif.date}</span>
                                        </div>
                                    </div>
                                </a>
                            `

                            $('#notif_list').prepend(txt);
                            const Toast = Swal.mixin({
                                toast: true,
                                position: "bottom-end",
                                showConfirmButton: false,
                                timer: 3000,
                                timerProgressBar: true,
                                didOpen: (toast) => {
                                    toast.onmouseenter = Swal.stopTimer;
                                    toast.onmouseleave = Swal.resumeTimer;
                                }
                            });
                            Toast.fire({
                                type: "info",
                                title: notif.text
                            });
                        });
                    }

                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            })
        }, 10000);
    </script>

    @yield('specific_js')
    @include('intranet.dataTable.data_table_js')
</body>

</html>
