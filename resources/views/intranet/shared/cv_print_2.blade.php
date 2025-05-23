<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- @include('intranet.layouts.css') --}}
    {{-- <link rel="stylesheet" href="{{ voyager_asset('css/app.css') }}"> --}}

    {{-- <link href='https://fonts.googleapis.com/css?family=Open+Sans:300,400,600' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Raleway:100' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'> --}}
    <link href='{{ asset('theme2/vendor/bootstrap/css/bootstrap.min.css') }}' rel='stylesheet' type='text/css'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>{{ Auth::user()->name }}'s CV</title>
    <!-- <link rel="stylesheet" href="styles.css"> -->
    <style>
        body {
            font-family: 'Helvetica Neue', Arial, sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 0;
            color: #000;
            background: #f9f9f9;
        }

        .cv-container {
            width: 90%;
            max-width: 900px;
            margin: 20px auto;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .cv-header {
            text-align: center;
            border-bottom: 2px solid #000;
            padding-bottom: 20px;
            margin-bottom: 20px;
        }

        .cv-header h1 {
            margin: 0;
            font-size: 2.5em;
            color: #000;
        }

        .cv-header p {
            margin: 5px 0;
            font-size: 1.1em;
            color: #555;
        }

        .cv-section {
            margin-bottom: 20px;
        }

        .cv-section h2 {
            border-bottom: 2px solid #000;
            padding-bottom: 5px;
            margin: 0 0 15px 0;
            font-size: 1.5em;
            color: #000;
        }



        ul {
            list-style-type: disc;
            margin: 10px 0 0 20px;
        }

        .cv-footer {
            text-align: center;
            font-size: 0.9em;
            border-top: 2px solid #000;
            padding-top: 10px;
            margin-top: 20px;
            color: #666;
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

        .fcrse_2 {
            background: #fff;
            width: 100%;
            float: left;
            padding: 10px;
            border-radius: 3px;
            border: 1px solid #efefef;
            transition: all .2s ease-in-out;
        }

        .save_address_btn {
            height: 40px;
            padding: 0 20px;
            border: 0;
            margin-top: 30px;
            color: #fff;
            border-radius: 3px;
            font-family: 'Roboto', sans-serif;
            font-weight: 500;
            background: #ed2a26;
            display: block;
            font-size: 12px
        }

        .w_div_btn_print {
            margin-bottom: 10px;
            margin-bottom: 10px;
            display: flex;
            flex-direction: row-reverse;
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

        /* .preview-dt {
            display: flex;
            margin-top: 20px;
        }
        .title-875 {
            margin-top: 4px;
            margin-right: 15px;
        }
        label.switch {
            position: relative;
            cursor: pointer;
            margin: 0;
        }
        label.switch input[type="checkbox"] {
            display: none;
        }
        input[type="checkbox"], input[type="radio"] {
            box-sizing: border-box;
            padding: 0;
        }
        label.switch input[type="checkbox"]:checked + span:before {
            border-color: red;
            background:blue;
        }
        label.switch input[type="checkbox"]:checked + span:after {
            left: 17px;
        } */

        .form-check {
    display: block;
    min-height: 1.5rem;
    padding-left: 1.5em;
    margin-bottom: 0.125rem;
}
.form-check {
    position: relative;
    display: block;
    padding-left: 1.25rem;
}
.form-switch .form-check-input:checked {
    background-position: right center;
    --bs-form-switch-bg: url(data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='-4 -4 8 8'%3e%3ccircle r='3' fill='%23fff'/%3e%3c/svg%3e);
}
.form-switch .form-check-input {
    --bs-form-switch-bg: url(data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='-4 -4 8 8'%3e%3ccircle r='3' fill='rgba%280, 0, 0, 0.25%29'/%3e%3c/svg%3e);
    width: 2em;
    margin-left: -2.5em;
    background-image: var(--bs-form-switch-bg);
    background-position: left center;
    border-radius: 2em;
    transition: background-position .15s ease-in-out;
}
.form-check-input:checked {
    background-color: #0d6efd;
    border-color: #0d6efd;
}
    </style>
</head>

<body>
    <div class="col-md-12 fcrse_2 hidden-print w_div_btn_print row">
        <div class="col-md-3 offset-md-6 row">
            <form action="{{ route('update_cv_settings') }}" class="col-md-9 " style="float: left" method="POST">
                @csrf
                <div class="row">
                    <div class="form-group col-md-5">
                        {{-- <div class="preview-dt ">
                            <span class="title-875">Publier</span>
                            <label class="switch">
                                <input type="checkbox" name="publier" value="1"
                                    @if (@$cv_setting->publier == 1) checked @endif>
                                <span></span>
                            </label>
                        </div> --}}
                        <input type="text" name="theme" value="2" hidden>
                        <div class="form-check form-switch" style="margin-top: 19px;">
                            <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" name="publier"
                                value="1" @if (@$cv_setting->publier == 1) checked @endif>
                            <label class="form-check-label" for="flexSwitchCheckDefault">Publier</label>
                        </div>
                    </div>

                    <div class="form-group col-md-5">
                        <button class=" save_address_btn"
                            style="margin-top: 10px;background-color: #007bff;width: 100%">@lang('intranet.Sauvegarder')</button>
                    </div>
                    <div class="form-group col-md-2"></div>
                </div>
            </form>
        </div>
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
                <button class=" save_address_btn" style="margin-top:10px" onclick="print()"> <img
                        src="{{ asset('theme2/images/icon_print-removebg-preview.png') }}" alt="" style="height: 25px"> </button>
            </div>
        </div>

    </div>
    &nbsp;
    &nbsp;
    <div class="cv-container">
        <header class="cv-header">
            <h1>{{ Auth::user()->name }}</h1>
            <p>{{ Auth::user()->cv_job_title }}</p>
            <p>{{ Auth::user()->email }} | {{ Auth::user()->phone }} | {{ Auth::user()->address }}</p>
        </header>

        <section class="cv-section">
            <h2>Profile</h2>
            <p>{{ Auth::user()->cv_profile }}</p>
        </section>
        @if (count($exps) > 0)
            <section class="cv-section">
                <h2>Experience</h2>
                <ul>
                    @foreach ($exps as $exp)
                        <span>
                            ({{ Carbon\Carbon::parse(@$exp->start)->format('M-Y') }}
                            - @if (@$exp->is_current)
                                En cours
                            @else
                                {{ Carbon\Carbon::parse(@$exp->end)->format('M-Y') }})
                            @endif {{ @$exp->designation }}
                        </span>
                        <li> {{ $exp->designation_fr }}</li>
                        <span>
                            {{ $exp->description }}
                        </span>
                    @endforeach
                </ul>
            </section>
        @endif
        @if (count($formation_pers) > 0)
            <section class="cv-section">
                <h2>Education</h2>
                <ul>
                    @foreach ($formation_pers as $formation_per)
                        <span>{{ Carbon\Carbon::parse(@$formation_per->start)->format('M y') }} - - @if (@$formation_per->is_current)
                                Actuellement
                            @else
                                {{ Carbon\Carbon::parse(@$formation_per->end)->format('M-Y') }}
                            @endif
                        </span>
                        <li> {{ $formation_per->designation_fr }}</li>
                    @endforeach
                </ul>
            </section>
        @endif

        <section class="cv-section">
            <h2>Skills</h2>
            <ul>
                @foreach ($comps as $comp)
                    <li>{{ $comp->designation_fr }}</li>
                @endforeach
            </ul>
        </section>
        <section class="cv-section">
            <h2>Langues</h2>
            <ul>
                @foreach ($langs as $lang)
                    <li>{{ $lang->designation }}</li>
                @endforeach
            </ul>
        </section>

        <footer class="cv-footer">
            <p>
                @if (Auth::user()->linkedin)
                    Linkedin: {{ Auth::user()->linkedin }}
                    @endif @if (Auth::user()->github)
                        | Github: {{ Auth::user()->github }}
                    @endif
            </p>
        </footer>
    </div>
</body>

</html>
