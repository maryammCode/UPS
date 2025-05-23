@php
    $lang = session('lang', config('app.locale'));
    app()->setLocale($lang);
    $short_description = 'short_description_' . $lang;
    $description = 'description_' . $lang;
    $designation = 'designation_' . $lang;
    $news = App\News::where('publier', 1)->latest()->take(3)->get();
    if ($lang === 'fr') {
        $view = 'layouts.right_sidebar';
    } elseif ($lang === 'en') {
        $view = 'layouts.right_sidebar';
    } else {
        $view = 'layouts.left_sidebar';
    }
    $lastNewsDefaultCover = App\DefaultCover::where('section', 'last_news')->first();

@endphp


<div class="ns-blog-details-widget mb-50">
    <h5 class="ns-footer-widget-title-2"><a href="{{ route('actualites') }}"> @lang('translate.Latest News') </a></h5>
    @foreach ($news as $new)
        <div class="ns-blog-details-widget-post">
            <div class="ns-blog-details-post-img">
                <a href="{{ route('news.details', ['slug' => $new->slug]) }}">
                    @if ($new->cover && Storage::exists($new->cover))
                        <img src=" {{ Voyager::image($new->cover) }}">
                    @else
                        <img src=" {{ Voyager::image($lastNewsDefaultCover->cover) }}">
                    @endif
                </a>
            </div>
            <div class="ns-blog-details-post-content">
                <h5 class="ns-blog-details-post-content-title">
                    <a href="{{ route('news.details', ['slug' => $new->slug]) }}">
                        @include('public.layouts.includes.langs', [
                            'field' => $new,
                            'param' => 'designation',
                        ])</a>

                </h5>
                @if ($new->created_at)
                    <span><i class="icofont-calendar"></i>
                        @lang('translate.Published on') {{ \Carbon\Carbon::parse($new->created_at)->format('d/m/Y') }}</span>
                @endif
            </div>
        </div>
    @endforeach

</div>
