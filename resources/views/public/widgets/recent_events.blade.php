@php
    $lang = session('lang', config('app.locale'));
    app()->setLocale($lang);
    $last_events = App\Event::where('publier', 1)->latest()->take(3)->get();
    $lastEventsDefaultCover = App\DefaultCover::where('section', 'Event')->first();
@endphp

@if (@$last_events && count($last_events) > 0)
    <div class="ns-blog-details-widget mb-50">
        <h5 class="ns-footer-widget-title-2"><a href="{{ route('events') }}"> @lang('translate.Latest Events') </a></h5>

        @foreach ($last_events as $event)
            <div class="ns-blog-details-widget-post">
                <div class="ns-blog-details-post-img">
                    <a href="{{ route('events.details', ['slug' => $event->slug]) }}">
                        @if ($event->cover && Storage::exists($event->cover))
                            <img src=" {{ Voyager::image($event->cover) }}">
                        @else
                            <img src=" {{ Voyager::image($lastEventsDefaultCover->cover) }}">
                        @endif
                    </a>
                </div>

                <div class="ns-blog-details-post-content">
                    <h5 class="ns-blog-details-post-content-title">                       
                        <a href="{{ route('news.details', ['slug' => $event->slug]) }}">
                        @include('public.layouts.includes.langs', [
                            'field' => $event,
                            'param' => 'designation',
                        ])</a>  
                    </h5>


                    <div class="d-flex">
                        @if ($event->date_start)
                            <span><i class="icofont-calendar"></i>
                                @lang('translate.date_start')&nbsp;
                                {{ \Carbon\Carbon::parse($event->date_start)->format('d/m  ') }}</span>
                            @if ($event->date_end)
                                <span>
                                    &nbsp; @lang('translate.date_end')
                                    {{ \Carbon\Carbon::parse($event->date_end)->format('d/m/Y ') }}</span>
                            @endif
                        @endif

                    </div>
                </div>
            </div>
        @endforeach

    </div>
@endif
