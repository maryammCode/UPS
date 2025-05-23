@extends('intranet.layouts.app')
@section('content')

 <!-- Button -->
 <a href="{{ route('intranet.stat') }}" 
 class="btn btn-primary" 
 style="text-decoration: none; padding: 8px 16px; background-color: #007bff; color: white; border-radius: 4px;">
 Voir les statistiques
</a>
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

        @if ( @Auth::user()->role->name == 'Entreprise' && @$company_conected->publier == 0  )
            <div class="col-lg-12 col-md-12" style="margin-top: 15px">
                <div class="alert alert-success" role="alert">@lang("intranet.Merci pour votre inscription , Votre compte est en cours de vérification par l'administration")</div>
            </div>
        @else
            <div class="blogbg_1 mt-50  fcrse_2" style="margin-top:0px;">
                <div class="">
                    <h4 class="item_title">@lang('intranet.Restez à la une')</h4>
                </div>
            </div>
            @if (@$events)
                @foreach (@$events as $data)
                    <div class="blogbg_1 mt-50 col-xl-12 col-lg-12 col-md-12 col-sm-6 col-12"
                        style="margin-top:18px; position:relative">
                        <div class="col-md-2">
                            <a href="{{ route('details_actualite', ['id' => $data->id]) }}" class="hf_img"
                                style="width: 100% !important; height: 68px;">
                                {{-- <img src="{{ asset('theme2/images/blog/news.jpg') }}" alt="" style="height:68px;"> --}}
                                <img src="@if (@$data->cover && Storage::exists(@$data->cover)) {{ Voyager::image(@$data->cover) }}@else {{ Voyager::image($default_cover->cover) }} @endif"
                                    alt="news" style="height:68px;">
                                <div class="course-overlay"></div>
                            </a>
                        </div>

                        <div class="hs_content width_120 col-md-7">
                            <div class="vdtodt">
                                <span>@lang('intranet.Publiée le') {{ Carbon\Carbon::parse($data->created_at)->format('d-m-Y') }}</span>
                                &nbsp;&nbsp;<span class="text-white bg-dark p-1"> <i class="uil uil-calendar-alt"></i> {{ Carbon\Carbon::parse($data->date_start)->format('d-m-Y') }} à {{ Carbon\Carbon::parse($data->date_end)->format('d-m-Y') }} </span>
                                <br>
                                @if ($data->category)
                                    <span class="bg-forth">
                                        <b class="my_font"> {{ $data->category->$designation }}</b>
                                    </span>
                                @endif
                            </div>
                            <a href="{{ route('events.details', ['slug' => $data->slug]) }}"
                                class="crse14s title900">{{ $data->$designation }}</a>
                            {{-- <p class="blog_des">Donec eget arcu vel mauris lacinia vestibulum id eu elit. Nam metus
                        odio, iaculis eu nunc et, interdum mollis arcu. Pellentesque viverra faucibus diam.
                        In sit amet laoreet dolor, vitae fringilla quam interdum mollis arcu.</p> --}}

                        </div>
                        <div class="col-md-3" style="position:initial;">
                            <a href="{{ route('events.details', ['slug' => $data->slug]) }}"
                                class="view-blog-link nachd_news zoom">@lang('intranet.Voir plus')<i class="uil uil-arrow-right"></i></a>
                        </div>
                    </div>
                @endforeach
            @endif


            @foreach ($news as $data)
                <div class="blogbg_1 mt-50 col-xl-12 col-lg-12 col-md-12 col-sm-6 col-12"
                    style="margin-top:18px; position:relative">
                    <div class="col-md-2">
                        <a href="{{ route('details_actualite', ['id' => $data->id]) }}" class="hf_img"
                            style="width: 100% !important; height: 68px;">
                            {{-- <img src="{{ asset('theme2/images/blog/news.jpg') }}" alt="" style="height:68px;"> --}}
                            <img src="@if (@$data->cover && Storage::exists(@$data->cover)) {{ Voyager::image(@$data->cover) }}@else {{ Voyager::image($default_cover->cover) }} @endif"
                                alt="news" style="height:68px;">
                            <div class="course-overlay"></div>
                        </a>
                    </div>

                    <div class="hs_content width_120 col-md-7">
                        <div class="vdtodt">
                            <span>@lang('intranet.Publiée le') {{ Carbon\Carbon::parse($data->created_at)->format('d-m-Y') }}</span>
                            <br>
                            @if ($data->newsCategories)
                                @foreach ($data->newsCategories as $category)
                                    <span class="bg-forth">
                                        <b class="my_font"> {{ $category->$designation }}</b>
                                    </span> &nbsp;&nbsp;
                                @endforeach
                            @endif
                        </div>
                        <a href="{{ route('details_actualite', ['id' => $data->id]) }}"
                            class="crse14s title900">{{ $data->$designation }}</a>
                        {{-- <p class="blog_des">Donec eget arcu vel mauris lacinia vestibulum id eu elit. Nam metus
                            odio, iaculis eu nunc et, interdum mollis arcu. Pellentesque viverra faucibus diam.
                            In sit amet laoreet dolor, vitae fringilla quam interdum mollis arcu.</p> --}}

                    </div>
                    <div class="col-md-3" style="position:initial;">
                        <a href="{{ route('details_actualite', ['id' => $data->id]) }}"
                            class="view-blog-link nachd_news zoom">@lang('intranet.Voir plus')<i class="uil uil-arrow-right"></i></a>
                    </div>
                </div>
            @endforeach
    {{-- {{$news->links('pagination::bootstrap-4')}} --}}
        @endif

@endsection
