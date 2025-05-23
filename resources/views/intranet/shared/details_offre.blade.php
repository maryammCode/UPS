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
    <style>
        .badge_seller {
            background: #ac1a1a;
            color: white;
            font-size: 12px;
            padding: 5px 10px;
            border-radius: 4px;
        }
    </style>
    <div class="col-md-12 fcrse_2">
        <div class="value_content flex justify-content-between" style="margin-top: 5px; border:none !important">
            <h4>@lang('intranet.Détails') {{ @$offer->$designation }}</h4>
            @if (Carbon\Carbon::parse($offer->expiration_date) < Carbon\Carbon::now())
                <h4 class="text-danger">@lang('intranet.Offre expirée')</h4>
            @endif
            @if ($offer_user_existe)
                <span class="text-success">@lang('intranet.Vous avez postulé à cette offre')</span>
            @else
                @if (Carbon\Carbon::parse($offer->expiration_date) >= Carbon\Carbon::now())
                    <div>
                        <a data-toggle="modal" data-target="#postulerOffre{{ $offer->id }}" class="btn btn-info">
                            <div>@lang('intranet.Postuler')</div>
                        </a>
                    </div>
                @endif
            @endif
        </div>
    </div>
    <div class="_14d25 mb-20">
        <div class="row">
            <div class="col-md-12">
                {{-- <h4 class="mhs_title">Saved Courses</h4> --}}
                <div class="fcrse_1">
                    <a href="#" class="hf_img" style="width: 30% !important;">
                        <img src="@if ($offer->cover && Storage::exists($offer->cover)) {{ Voyager::image($offer->cover) }}@else{{ Voyager::image(@$default_cover->cover) }} @endif"
                        alt="" style="height: 200px;">
                        <div class="course-overlay">
                            <div class="badge_seller">@lang('intranet.Expire le') <br>{{ Carbon\Carbon::parse($offer->expiration_date)->format('d-m-Y') }}</div>
                            <div class="crse_reviews">
                                <i class="uil uil-company"></i>{{ @$offer->offerType->designation_fr }}
                            </div>
                            {{-- <span class="play_btn1"><i class="uil uil-play"></i></span> --}}
                            {{-- <div class="crse_timer">
                               <i class="uil uil-calender"></i> expire le :{{ Carbon\Carbon::parse($offer->expiration_date)->format('d-m-Y') }}
                            </div> --}}
                        </div>
                    </a>
                    <div class="hs_content">
                        {{-- <div class="eps_dots eps_dots10 more_dropdown">
                            <a href="#"><i class="uil uil-ellipsis-v"></i></a>
                            <div class="dropdown-content">
                                <span><i class='uil uil-times'></i>Remove</span>
                            </div>
                        </div> --}}
                        <div class="vdtodt">
                            <span class="vdt14"><i class="uil uil-calender"></i>@lang('intranet.Publiée le')
                                {{ Carbon\Carbon::parse($offer->created_at)->format('d-m-Y') }}</span>
                        </div>
                        <a href="{{ route('details_offre', ['id' => $offer->id]) }}"
                            class="crse14s">{{ $offer->$designation }}</a>
                        <a href="#" class="crse-cate"><span
                                style="font-weight: 600;font-size: 15px;">@lang('intranet.Téléphone'):</span> {{ $offer->phone }}</a>
                        <a href="#" class="crse-cate"> <span
                                style="font-weight: 600;font-size: 15px;">@lang('intranet.Adresse'): </span>
                            {{ $offer->address }}</a>
                        <a href="#" class="crse-cate"><span
                                style="font-weight: 600;font-size: 15px;">@lang('intranet.Responsable'): </span>
                            {{ $offer->responsible }}</a>
                        <a href="mailto:{{ $offer->email }}" class="crse-cate"><span
                                style="font-weight: 600;font-size: 15px;">@lang('intranet.Email'): </span>{{ $offer->email }}</a>

                                <a href="#" class="crse-cate"><span
                                    style="font-weight: 600;font-size: 15px;">@lang('intranet.Publiée par'): </span>{{ @$offer->entreprise->designation }}</a>

                    </div>
                </div>
                <div class="fcrse_1 mt-10">
                    <div class="hs_content" style="width: 100% !important;">
                        {{-- <div class="eps_dots eps_dots10 more_dropdown">
                            <a href="#"><i class="uil uil-ellipsis-v"></i></a>
                            <div class="dropdown-content">
                                <span><i class='uil uil-times'></i>Remove</span>
                            </div>
                        </div> --}}
                        {{-- <div class="vdtodt">
                            <span class="vdt14">5M views</span>
                            <span class="vdt14">15 days ago</span>
                        </div> --}}
                        <h3 class="crse14s title900">Description:</h3>
                        {{-- <a href="#" class="crse-cate">Development | JavaScript</a> --}}
                        <div class="auth1lnkprce" style="margin-top: 0px;">
                            <p class="cr1fot">{!! $offer->$description !!}</p>
                            {{-- <div class="prce142">$5</div> --}}
                            {{-- <button class="shrt-cart-btn" title="cart"><i
                                    class="uil uil-shopping-cart-alt"></i></button> --}}

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- modal postuler offre start --}}

    @include('intranet.components.apply_modal', [
        'offer' => $offer,
        'cv_user_existe' => $cv_user_existe,
        'company' => 'nachd',
        'source' => 'offer',
    ])
    {{-- modal postuler offre end --}}
@endsection
