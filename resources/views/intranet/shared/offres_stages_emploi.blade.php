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
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Material+Icons" media="all">
<style>
    /* body {
                                        background-color: #ffdd40;
                                    }
                                     */

    .wrapperwissem {
        position: relative;
        display: flex;
        width: 100%;
        height: 90vh;
        align-items: center;
        justify-content: center;
        flex-direction: column;
        margin: 0;
        padding: 0;
    }

    .bell .material-icons {
        /* font-size:12rem !important; */
        /* font-size:36px !important; */
        font-size: 30px !important;
        /* color: rgb(161, 15, 15) !important; */
    }

    .bell {
        position: relative;
        display: inline-block;
        /* border:dashed 1px rgba(0,0,0,.25); */
        margin: 0;
        padding: 0;
    }

    .bell .anchor {
        transform-origin: center top;
        display: inline-block;
        margin: 0;
        padding: 0;
    }

    .bell .layer-1 {
        color: #1d1e22;
        z-index: 9;
        animation: animation-layer-1 5000ms infinite;
        opacity: 0;
    }

    .bell .layer-2 {
        color: #1d1e22;
        z-index: 8;
        position: absolute;
        top: 0;
        left: 0;
        animation: animation-layer-2 5000ms infinite;
    }

    .bell .layer-3 {
        color: #333642;
        z-index: 7;
        position: absolute;
        top: 0;
        left: 0;
        animation: animation-layer-3 5000ms infinite;
    }

    @keyframes animation-layer-1 {
        0% {
            transform: rotate(0deg);
            opacity: 0;
        }

        8.0% {
            transform: rotate(0deg);
            opacity: 0;
        }

        12.0% {
            transform: rotate(42deg);
            opacity: .5;
        }

        16.0% {
            transform: rotate(-35deg);
            opacity: .4;
        }

        20.0% {
            transform: rotate(0deg);
            opacity: .1;
        }

        23.0% {
            transform: rotate(28deg);
            opacity: .3;
        }

        26.0% {
            transform: rotate(-20deg);
            opacity: .2;
        }

        29.0% {
            transform: rotate(0deg);
            opacity: .1;
        }

        31.0% {
            transform: rotate(16deg);
            opacity: 0;
        }

        33.0% {
            transform: rotate(-12deg);
            opacity: 0;
        }

        35.0% {
            transform: rotate(0deg);
            opacity: 0;
        }

        37.0% {
            transform: rotate(-6deg);
            opacity: 0;
        }

        39.0% {
            transform: rotate(0deg);
            opacity: 0;
        }
    }

    @keyframes animation-layer-2 {
        0% {
            transform: rotate(0deg);
        }

        8.0% {
            transform: rotate(0deg);
        }

        12.0% {
            transform: rotate(42deg);
        }

        16.0% {
            transform: rotate(-35deg);
        }

        20.0% {
            transform: rotate(0deg);
        }

        23.0% {
            transform: rotate(28deg);
        }

        26.0% {
            transform: rotate(-20deg);
        }

        29.0% {
            transform: rotate(0deg);
        }

        31.0% {
            transform: rotate(16deg);
        }

        33.0% {
            transform: rotate(-12deg);
        }

        35.0% {
            transform: rotate(0deg);
        }

        37.0% {
            transform: rotate(-6deg);
        }

        39.0% {
            transform: rotate(0deg);
        }

        40.0% {
            transform: rotate(6deg);
        }

        44.0% {
            transform: rotate(-3deg);
        }

        49.0% {
            transform: rotate(2deg);
        }

        55.0% {
            transform: rotate(0deg);
        }

        62.0% {
            transform: rotate(1deg);
        }

        70.0% {
            transform: rotate(0deg);
        }
    }

    @keyframes animation-layer-3 {
        0% {
            transform: rotate(0deg);
            opacity: 1;
        }

        8.0% {
            transform: rotate(0deg);
            opacity: 1;
        }

        12.0% {
            transform: rotate(52deg);
            opacity: .5;
        }

        16.0% {
            transform: rotate(-48deg);
            opacity: .4;
        }

        20.0% {
            transform: rotate(0deg);
            opacity: 1;
        }

        23.0% {
            transform: rotate(42deg);
            opacity: .3;
        }

        26.0% {
            transform: rotate(-30deg);
            opacity: .2;
        }

        29.0% {
            transform: rotate(0deg);
            opacity: 1;
        }

        31.0% {
            transform: rotate(26deg);
            opacity: .15;
        }

        33.0% {
            transform: rotate(-18deg);
            opacity: .1;
        }

        35.0% {
            transform: rotate(0deg);
            opacity: 1;
        }

        37.0% {
            transform: rotate(-12deg);
            opacity: .8;
        }

        40.0% {
            transform: rotate(6deg);
            opacity: 1;
        }

        44.0% {
            transform: rotate(-3deg);
            opacity: .8;
        }

        49.0% {
            transform: rotate(2deg);
            opacity: 1;
        }

        55.0% {
            transform: rotate(0deg);
            opacity: 1;
        }

        62.0% {
            transform: rotate(1deg);
            opacity: 1;
        }

        70.0% {
            transform: rotate(0deg);
            opacity: 1;
        }
    }

    /* ************** */

    /* ************** */
</style>
<div class="col-md-12 fcrse_2" style="padding-bottom: 0px;">
    <div class="value_content">
        <h4>@lang("intranet.Offres de Stages et Offres d'emploi") </h4>
    </div>
    <div class="value_content">
        {{-- Filters start --}}
        <form method="GET" action="{{ route('offers_filter') }}" class="mb-0">
            <div class="row">
                <!-- Expiration Date Filter -->
                <div class="col-md-3">
                    <label for="expiration_date">@lang('intranet.Date d\'expiration')</label>
                    <input type="date" id="expiration_date" name="expiration_date" class="form-control"
                        value="{{ request('expiration_date') }}">
                </div>

                <!-- Type Filter -->
               <!-- Type Filter -->
                <div class="col-md-3">
                    <label for="type">@lang('intranet.Type')</label>
                    <select id="type" name="type" class="form-control">
                        <option value="">@lang('intranet.Tous les types')</option>
                        @foreach ($offer_types as $type)
                            <option value="{{$type->id }}">
                                {{ $type->designation_fr }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Company Designation Filter -->
                <div class="col-md-3">
                    <label for="company">@lang('intranet.Entreprise')</label>
                    <input type="text" id="company" name="company" class="form-control" value="{{ request('company') }}"
                        placeholder="@lang('intranet.désignation de l\'entreprise')">
                </div>

                <!-- Offer Designation Filter -->
                <div class="col-md-3">
                    <label for="designation">@lang('intranet.Désignation de l\'offre')</label>
                    <input type="text" id="designation" name="designation" class="form-control"
                        value="{{ request('designation') }}" placeholder="@lang('intranet.Désignation de l\'offre')">
                </div>
            </div>

            <!-- Submit Button -->
            <div class="row" >
                <div class="col-md-12 text-right" style="margin-bottom: 10px;">
                    <button type="submit" class="btn btn-info">@lang('intranet.Filtrer')</button>
                    <a href="{{ route('offers_filter') }}" class="btn btn-secondary">@lang('intranet.Réinitialiser')</a>
                </div>
            </div>
        </form>
    </div>
    {{-- filtre end --}}
</div>

<div class="sa4d25">
    <div class="container-fluid" style="padding: 0px!important">
        <div class="row">
            <div class="col-lg-12 col-md-12">

                {{-- tab start --}}
                <div class="my_courses_tabs" style="margin-top:20px !important;">
                    <ul class="nav nav-pills my_crse_nav" id="pills-tab" role="tablist">
                        <li class="nav-item" style="width: 49%;">
                            <a class="nav-link active" id="pills-my-courses-tab" data-toggle="pill"
                                href="#pills-my-courses" role="tab" aria-controls="pills-my-courses"
                                aria-selected="true" style="font-size: 20px; font-weight: 600;">
                                <i class="uil uil-megaphone"></i> @lang('intranet.Offres')
                            </a>
                        </li>
                        <li class="nav-item" style="width: 50%;">
                            <a class="nav-link" id="pills-my-purchases-tab" data-toggle="pill"
                                href="#pills-my-purchases" role="tab" aria-controls="pills-my-purchases"
                                aria-selected="false" style="font-size: 20px; font-weight: 600;">
                                @if (@$nb_unseen_offers > 0)
                                    <span class="badge" style="background: #ac1a1a; color: #ffffff;">New
                                        ({{ $nb_unseen_offers }})</span>
                                @endif
                                <i class="uil uil-megaphone"></i> @lang('intranet.Offres dédiées')
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-my-courses" role="tabpanel"
                            style="padding:0 !important;margin-top:10px;">

                            <div class="row">
                                @foreach ($offers as $offer)
                                    <div class="col-lg-4 col-md-4 d-flex">
                                            @include('intranet.components.offer', ['offer' => $offer])
                                    </div>

                                @endforeach
                            </div>

                        </div>
                        <div class="tab-pane fade" id="pills-my-purchases" role="tabpanel"
                            style="padding:0 !important; margin-top: 10px;">
                            @if ($my_offers->count() == 0)
                                                        @include('intranet.layouts.empty_status', [
                                    'message' =>
                                        'Aucune offre n\'est actuellement disponible dans cet espace.',
                                ])
                            @else
                                <div class="row">
                                    @foreach ($my_offers as $x)
                                        <div class="col-lg-4 col-md-4 d-flex">

                                                @include('intranet.components.offer', ['offer' => $x->offer])

                                        </div>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                {{-- tab end --}}

            </div>
        </div>
    </div>
</div>

@endsection
