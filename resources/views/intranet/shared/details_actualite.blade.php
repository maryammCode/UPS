@extends('intranet.layouts.app')
@section('content')
    @php
    $lang= Session::get('language');
    if(!$lang){ $lang=App::getLocale();}
        $short_description = 'short_description_' . $lang;
        $description = 'description_' . $lang;
        $designation = 'designation_' . $lang;
        App::setLocale($lang);
        $default_cover = App\DefaultCover::where('section' , 'news')->where('publier' , 1)->first();
    @endphp
    <div class="col-md-12 fcrse_2">
        <div class="value_content" style="margin-top: 5px;">
            <h4>{{ $actualite->$designation }}</h4>
            <h4 style="font-size: smaller;"><i class="uil uil-calender"></i> @lang('intranet.Publiée le') {{ Carbon\Carbon::parse($actualite->created_at)->format('d-m-Y') }} </h4>
        </div>
    </div>
    <div class="col-md-12 fcrse_2">
        <div class="post-thumb">
            <img src="@if (@$actualite->cover && Storage::exists(@$actualite->cover)) {{ Voyager::image(@$actualite->cover) }}@else {{ Voyager::image($default_cover->cover)}} @endif" alt="actualite" style="width:100%;">
        </div>
    </div>
    <div class="_14d25 mb-20">
        <div class="row">
            <div class="col-md-12">
                @if (@$actualite->$description)
                    <div class="fcrse_1 mt-10">
                        <div class="hs_content" style="width: 100% !important;">
                            <div class=" mt-10" >
                                <p class="cr1fot">{!!  @$actualite->$description !!}</p>
                            </div>
                        </div>
                    </div>
                @endif
               
            </div>
        </div>
    </div>
@endsection