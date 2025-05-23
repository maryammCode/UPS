<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @include('intranet.layouts.css')
    {{-- <link rel="stylesheet" href="{{ voyager_asset('css/app.css') }}"> --}}
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300,400,600' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Raleway:100' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>

    <style>
        :root {
            --bg-side-color: #f7e0c1;
            --color-text-side: #565656;
            --bg-head-color: #848484;
            ;
            --color-text-head: white;
        }

        .side-bar p {
            color: var(--color-text-side);
        }

        @media print {
            .visible-print-inline-block {
                display: inline-block !important;
            }

            .hidden-print {
                display: none !important;
            }

            body {
                background-color: #ffffff
            }

            .table-responsive {
                width: 100%;
                height: 100%;
                background-color: #ffffff;
                zoom: 1.25;
                border: none !important;

                padding: 0;
                margin: 0;

            }



        }

        .rela-block {
            display: block;
            position: relative;
            margin: auto;

        }

        .rela-inline {
            display: inline-block;
            position: relative;
            margin: auto;

        }

        .floated {
            display: inline-block;
            position: relative;
            margin: false;

            float: left;
        }

        .abs-center {
            display: false;
            position: absolute;
            margin: false;
            top: 50%;
            left: 50%;
            right: false;
            bottom: false;
            transform: translate(-50%, -50%);
            text-align: center;
            width: 88%;
        }


        .caps {
            text-transform: uppercase;
        }

        .justified {
            text-align: justify;
        }

        p.light {
            color: #777;
        }

        h2 {
            font-family: 'Open Sans';
            font-size: 30px;
            letter-spacing: 5px;
            font-weight: 600;
            line-height: 40px;
            color: #000;
        }

        h3 {
            font-family: 'Open Sans';
            font-size: 21px;
            letter-spacing: 1px;
            font-weight: 600;
            line-height: 28px;
            color: #000;
        }

        .page {
            width: 90%;
            max-width: 1200px;
            margin: 80px auto;
            background-color: #fff;
            box-shadow: 6px 10px 28px 0px rgba(0, 0, 0, 0.4);
        }

        .top-bar {
            height: 220px;
            background-color: var(--bg-head-color);
            color: var(--color-text-head);
        }

        .name {
            display: false;
            position: absolute;
            margin: false;
            top: false;
            left: calc(350px + 5%);
            right: 0;
            bottom: 0;
            height: 120px;
            text-align: center;
            font-family: 'Raleway';
            font-size: 58px;
            letter-spacing: 8px;
            font-weight: 100;
            line-height: 60px;
        }

        .name div {
            width: 94%;
        }

        .side-bar {
            display: false;
            position: absolute;
            margin: false;
            top: 60px;
            left: 5%;
            right: false;
            /* bottom: 0; */
            bottom: 31px;
            width: 350px;
            background-color: var(--bg-side-color);
            padding: 320px 30px 50px;
        }

        .mugshot {
            display: false;
            position: absolute;
            margin: false;
            top: 50px;
            left: 70px;
            right: false;
            bottom: false;
            height: 210px;
            width: 210px;
        }

        .mugshot .logo {
            margin: -23px;
        }

        .logo {
            display: false;
            position: absolute;
            margin: false;
            top: 0;
            left: 0;
            right: false;
            bottom: false;
            z-index: 100;
            margin: 0;
            color: #000;
            height: 250px;
            width: 250px;
        }

        .logo .logo-svg {
            height: 100%;
            width: 100%;
            stroke: #000;
            cursor: pointer;
        }

        .logo .logo-text {
            display: false;
            position: absolute;
            margin: false;
            top: 58%;

            right: 16%;

            cursor: pointer;
            font-family: "Montserrat";
            font-size: 55px;
            letter-spacing: 0px;
            font-weight: 400;
            line-height: 58.333333333333336px;
        }

        .social {
            padding-left: 60px;
            margin-bottom: 20px;
            cursor: pointer;
        }

        .social:before {
            content: "";
            display: false;
            position: absolute;
            margin: false;
            top: -4px;
            left: 10px;
            right: false;
            bottom: false;
            height: 35px;
            width: 35px;
            background-size: cover !important;
        }

        .social.twitter:before {
            background: url("https://cdn3.iconfinder.com/data/icons/social-media-2026/60/Socialmedia_icons_Twitter-07-128.png") center no-repeat;
        }

        .social.pinterest:before {
            background: url("https://cdn3.iconfinder.com/data/icons/social-media-2026/60/Socialmedia_icons_Pinterest-23-128.png") center no-repeat;
        }

        .social.linked-in:before {
            background: url("https://cdn3.iconfinder.com/data/icons/social-media-2026/60/Socialmedia_icons_LinkedIn-128.png") center no-repeat;
        }

        .side-header {
            font-family: 'Open Sans';
            font-size: 18px;
            letter-spacing: 4px;
            font-weight: 600;
            line-height: 28px;
            margin: 60px auto 10px;
            padding-bottom: 5px;
            border-bottom: 1px solid #888;
        }

        .list-thing {
            padding-left: 25px;
            margin-bottom: 10px;
        }

        .content-container {
            margin-right: 0;
            width: calc(95% - 350px);
            padding: 25px 40px 50px;
        }

        .content-container>* {
            margin: 0 auto 19px;
        }

        .content-container>h3 {
            margin: 0 auto 5px;
        }

        .content-container>p.long-margin {
            margin: 0 auto 50px;
        }

        .title {
            width: 80%;
            text-align: center;
        }

        .separator {
            width: 240px;
            height: 2px;
            background-color: #999;
        }

        .greyed {
            background-color: #ddd;
            width: 100%;
            max-width: 580px;
            text-align: center;
            font-family: 'Open Sans';
            font-size: 18px;
            letter-spacing: 6px;
            font-weight: 600;
            line-height: 28px;
        }

        @media screen and (max-width: 1150px) {
            .name {
                color: #fff;
                font-family: 'Raleway';
                font-size: 38px;
                letter-spacing: 6px;
                font-weight: 100;
                line-height: 48px;
            }
        }


        .fade {
            opacity: 1;
        }

        .hide_print {
            display: initial;
        }

        .hide_print {
            display: none;
        }

        .table-responsive {
            width: 1300px;
            margin: auto;
            position: relative;
        }
    </style>
    <title>CV</title>
</head>

<body>
    <div class="col-md-12 fcrse_2 hidden-print w_div_btn_print">
        <div class="col-md-3 row">

            <div class="col-md-4">
                <a href="{{ route('intranet.home') }}">
                    <button class=" save_address_btn" style="margin-top: 10px;">@lang("intranet.Retour à l'accueil")</button>
                </a>
            </div>
            <div class="col-md-4">
                <a href="{{ route('customize_cv') }}" style="margin-right: 6px;">
                    <button class=" save_address_btn" style="margin-top: 10px;">@lang('intranet.Personnaliser votre CV')</button>
                </a>
            </div>
            <div class="col-md-4">
                <button class=" save_address_btn" style="margin-top:10px" onclick="print()"> <i class="uil uil-print"
                        style="font-size: 20px"></i> </button>
            </div>
        </div>
        <form action="{{ route('update_cv_settings') }}" class="col-md-9 " style="float: left" method="POST">
            @csrf
            <div class="row">
                <div class="form-group col-md-2">
                    <label for="">arrière-plan sidebar</label>
                    <input class="form-control" type="color" id="bg_sidebar" onchange="changeBgSideColor()"
                        name="cv_side_bg">
                </div>
                <div class="form-group col-md-2">
                    <label for="">Couleur de police</label>
                    <input class="form-control" type="color" id="text_sidebar" onchange="changeTextSideColor()"
                        name="cv_side_color_text">
                </div>
                <div class="form-group col-md-2">
                    <label for="">arrière-plan de l'entête</label>
                    <input class="form-control" type="color" id="bg_head" onchange="changeBgHeadColor()"
                        name="cv_head_bg">
                </div>
                <div class="form-group col-md-2">
                    <label for="">Couleur de police</label>
                    <input class="form-control" type="color" id="text_head" onchange="changeTextHeadColor()"
                        name="cv_head_color_text">
                </div>
                <div class="form-group col-md-2">
                    <div class="preview-dt ">
                        <span class="title-875">Publier</span>
                        <label class="switch">
                            <input type="checkbox" name="publier" value="1" @if ( @$cv_setting->publier == 1)
                                checked
                            @endif>
                            <span></span>
                        </label>
                    </div>
                </div>
                <input type="text" name="theme" value="1" hidden>

                <div class="form-group col-md-2">
                    <button class=" save_address_btn"
                        style="margin-top: 10px;background-color: #007bff;width: 100%">@lang('intranet.Sauvegarder')</button>
                </div>
                <div class="form-group col-md-2"></div>
            </div>
        </form>
    </div>

    <div class="table-responsive">

        <div class="rela-block top-bar">
            <div class="caps name">
                <div class="abs-center">{{ Auth::user()->name }}</div>
            </div>
        </div>
        <div class="side-bar" @style('min-height:28cm')>
            <div class="mugshot">
                <div class="logo">
                    <img src="{{ Voyager::image(Auth::user()->avatar) }}" alt="photo" style="width: 140pt;">
                    <p class="logo-text"></p>
                </div>
            </div>

            <p>Télèphone : {{ Auth::user()->phone }}</p>
            <p>Adresse : {{ Auth::user()->address }}</p>
            <p>Email : {{ Auth::user()->email }} </p><br>
            {{--
                                                        <p class="rela-block social twitter">Twitter stuff</p> --}}
            <p class="rela-block social pinterest">{{ Auth::user()->email }}
            </p>
            <p class="rela-block social linked-in">
                {{ Auth::user()->linkedin }}</p>
            <p class="rela-block social github">{{ Auth::user()->github }}
            </p>

            {{--  skills start --}}
            <p class="rela-block caps side-header">Skills</p>
            @foreach ($comps as $comp)
                <p class="rela-block list-thing">
                    {{ $comp->designation_fr }}</p>
            @endforeach
            {{--  skills end --}}
            {{--  languages start --}}
            <p class="rela-block caps side-header">Langues</p>
            @foreach ($langs as $lang)
                <p class="rela-block list-thing">{{ $lang->designation }}
                </p>
            @endforeach
            {{-- languages end --}}
        </div>

        <div class="rela-block content-container">
            <h2 class="rela-block caps title">{{ Auth::user()->cv_job_title }}</h2>
            <div class="rela-block separator"></div>
            <div class="rela-block caps greyed">Profile</div>
                 <p class="long-margin">{{ Auth::user()->cv_profile	 }} </p>

            {{-- experiences start --}}
            @if (count($exps) > 0)
                <div class="rela-block caps greyed">Experience</div>
            @endif

            @foreach ($exps as $exp)
                <h3>({{ Carbon\Carbon::parse(@$exp->start)->format('M-Y') }}
                    - @if (@$exp->is_current)
                        En cours
                    @else
                        {{ Carbon\Carbon::parse(@$exp->end)->format('M-Y') }})
                    @endif {{ @$exp->designation }}
                </h3>
                <p class="light" style="font-size: 13pt; font-weight: 600;">
                    {{ $exp->designation_fr }}</p>
                <p class="justified">{{ $exp->description }}</p>
            @endforeach
            {{-- Educations end --}}
            {{-- Educations start --}}
            @if (count($formation_pers) > 0)
                <div class="rela-block caps greyed">Education</div>
            @endif

            @foreach ($formation_pers as $formation_per)
                <h3><span style="font-size: 14pt; font-weight: 600;">
                        {{ Carbon\Carbon::parse(@$formation_per->start)->format('M y') }}
                        - @if (@$formation_per->is_current)
                            Actuellement
                        @else
                            {{ Carbon\Carbon::parse(@$formation_per->end)->format('M-Y') }}
                        @endif
                    </span>| {{ $formation_per->designation_fr }}</h3>

                <p class="justified" style="font-size: 13pt; font-weight: 600;">
                    {{ $formation_per->description }}</p>
            @endforeach
            {{-- Educations end --}}
        </div>


    </div>

    <script>
        var user = {!! App\CvSetting::where('user_id', auth()->user()->id)->first() !!};
        console.log(user)
        if (user) {


            if (user.cv_head_bg) {
                document.documentElement.style.setProperty('--bg-head-color', user.cv_head_bg);
                document.getElementById("bg_head").value = user.cv_head_bg;
            }

            if (user.cv_head_color_text) {
                document.documentElement.style.setProperty('--color-text-head', user.cv_head_color_text);
                document.getElementById("text_head").value = user.cv_head_color_text;
            }

            if (user.cv_side_color_text) {
                document.documentElement.style.setProperty('--color-text-side', user.cv_side_color_text);
                document.getElementById("text_sidebar").value = user.cv_side_color_text;
            }
            if (user.cv_side_bg) {
                document.documentElement.style.setProperty('--bg-side-color', user.cv_side_bg);
                document.getElementById("bg_sidebar").value = user.cv_side_bg;
            }
        }

        function changeBgSideColor() {
            var color = document.getElementById("bg_sidebar").value;
            console.log(color);
            document.documentElement.style.setProperty('--bg-side-color', color);
        }

        function changeTextSideColor() {
            var color = document.getElementById("text_sidebar").value;
            console.log(color);
            document.documentElement.style.setProperty('--color-text-side', color);
        }

        function changeBgHeadColor() {
            var color = document.getElementById("bg_head").value;
            console.log(color);
            document.documentElement.style.setProperty('--bg-head-color', color);
        }

        function changeTextHeadColor() {
            var color = document.getElementById("text_head").value;
            console.log(color);
            document.documentElement.style.setProperty('--color-text-head', color);
        }
    </script>

</body>

</html>
