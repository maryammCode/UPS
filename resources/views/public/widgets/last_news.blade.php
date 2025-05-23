@php
    $last_news = App\News::where('publier', 1)->orderby('created_at', 'desc')
        ->limit(5)
        ->get();
    $default_cover = App\DefaultCover::where('section' , 'last_news')->first();
@endphp

<div class="widget widget-post">
    <h5 class="title">@lang('translate.Dernières actualités')</h5>
    <ul class="widget-post-body">
        @foreach ($last_news as $last_new)
            <li>
                <a href="{{ route('details_news', ['id' => $last_new->id]) }}">
                    <div class="thumb">
                        <img src="@if($last_new->image && Storage::exists($last_new->image)){{ Voyager::image(@$last_new->image) }}@else{{Voyager::image(@$default_cover->cover)}} @endif" alt="blog">
                    </div>
                    <div class="cont">
                        <span class="subtitle d-block">{{ @$last_new->$designation }}</span>
                        <span class="date"><span class="cl-theme"><i class="far fa-calendar-alt"></i></span> {{ @$last_new->created_at->format('d-M-Y') }}</span>
                    </div>
                </a>
            </li>
        @endforeach
    </ul>
</div>