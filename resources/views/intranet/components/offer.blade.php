@php
    $default_cover = App\DefaultCover::where('section', 'offre')->where('publier', 1)->first();
    $lang= Session::get('language');
            if(!$lang){ $lang=App::getLocale();}
                $short_description = 'short_description_' . $lang;
                $description = 'description_' . $lang;
                $designation = 'designation_' . $lang;
                App::setLocale($lang);
@endphp
<style>
    .fcrse_1 {
        padding: 0px !important;
        border: none !important;
    }

   /* Offer Card Container */
.fcrse_1 {
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    width: 100%;
    max-width: 320px; /* Adjust for responsiveness */
    height: 420px; /* Fixed box height */
    border-radius: 12px;
    overflow: hidden;
    background: #fff;
    box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
}

.fcrse_1:hover {
    transform: translateY(-5px);
    box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.15);
}

/* Cover Image */
.fcrse_img img {
    width: 100%;
    height: 180px; /* Fixed height */
    object-fit: cover;
    border-top-left-radius: 12px;
    border-top-right-radius: 12px;
}


/* Expiry Badge */
.badge_seller {
    background: #ac1a1a;
    color: white;
    font-size: 12px;
    padding: 5px 10px;
    border-radius: 4px;
}

/* Offer Type Tag */
.crse_reviews {
    background: #007bff;
    color: white;
    font-size: 12px;
    padding: 5px 10px;
    border-radius: 4px;
}


.crse_timer i {
    margin-right: 5px;
}

/* Content Section */
.fcrse_content {
    padding: 12px;
    display: flex;
    flex-direction: column;
    flex-grow: 1;
}

/* Title Styling */
.crse14s {
    font-size: 16px;
    font-weight: 600;
    margin-bottom: 6px;
    color: #333;
    text-decoration: none;
    transition: color 0.3s;
}

.crse14s:hover {
    color: #007bff;
}

/* Information Section */
.crse-cate {
    font-size: 14px;
    color: #555;
    text-decoration: none;
    display: block;
    margin-top: 4px;
}

.crse-cate span {
    font-weight: 600;
    color: #222;
}

/* Published By Section */
.auth1lnkprce {
    margin-top: auto;
}

.cr1fot {
    font-size: 14px;
    color: #007bff;
    font-weight: 500;
    margin-top: 8px;
}

.cr1fot a {
    text-decoration: none;
    color: #007bff;
    font-weight: bold;
}

.cr1fot a:hover {
    text-decoration: underline;
}
</style>
<div class="fcrse_1" style="margin-top: 0px !important;">
    <a href="{{ route('details_offre', ['id' => $offer->id]) }}" class="fcrse_img">
        <img src="@if ($offer->cover && Storage::exists($offer->cover)) {{ Voyager::image($offer->cover) }}@else{{ Voyager::image(@$default_cover->cover) }} @endif"
            alt="" style="height: 200px;">
        <div class="course-overlay">
            @if (Carbon\Carbon::parse($offer->expiration_date) >= Carbon\Carbon::now())
                <div class="badge_seller">Expire le  <br>{{ Carbon\Carbon::parse($offer->expiration_date)->format('d-m-Y') }}</div>
            @endif
            @if (@$offer->offerType->designation_fr )
                <div class="crse_reviews">
                    {{ @$offer->offerType->designation_fr }}
                </div>
            @endif

            <span class="play_btn1"><i class="uil uil-plus"></i></span>
            @if (Carbon\Carbon::parse($offer->expiration_date) < Carbon\Carbon::now())
                <div class="crse_timer"
                    style="background: #ac1a1a; color: #ffffff;">
                    <span>@lang('intranet.Offre expirée')</span>
                </div>
            @else
                <div class="crse_timer">
                    <i class="uil uil-calender"></i>@lang('intranet.Publiée le')
                    {{ Carbon\Carbon::parse($offer->created_at)->format('d-m-Y') }}
                </div>
            @endif
        </div>
    </a>

    <div class="fcrse_content">
        <a href="{{ route('details_offre', ['id' => $offer->id]) }}"
            class="crse14s">{{ $offer->$designation }}</a>
        @if ($offer->phone)
            <a href="#" class="crse-cate"><span
                    style="font-weight: 600;font-size: 15px;">@lang('intranet.Téléphone'):</span>
                {{ $offer->phone }}</a>
        @endif
        @if ($offer->address)
            <a href="#" class="crse-cate"> <span
                    style="font-weight: 600;font-size: 15px;">@lang('intranet.Adresse'):
                </span>
                {{ $offer->address }}</a>
        @endif

        @if ($offer->responsible)
            <a href="#" class="crse-cate"><span
                    style="font-weight: 600;font-size: 15px;">@lang('intranet.Responsable'):
                </span>
                {{ $offer->responsible }}</a>
        @endif
        @if ($offer->email)
            <a href="mailto:{{ $offer->email }}" class="crse-cate"><span
                    style="font-weight: 600;font-size: 15px;">@lang('intranet.Email'):
                </span>{{ $offer->email }}</a>
        @endif

        @if ($offer->entreprise)
            <div class="auth1lnkprce">

                <p class="cr1fot" style="margin-top:0px;"> <span
                        style="font-weight: 600;font-size: 15px;">@lang('intranet.Publiée par'):</span>
                    <a href="">{{ $offer->entreprise->designation }}</a>
                </p>
                {{-- <div class="prce142">$10</div>
                    <button class="shrt-cart-btn" title="cart"><i
                        class="uil uil-shopping-cart-alt"></i> test</button> --}}
            </div>
        @endif

    </div>
</div>


