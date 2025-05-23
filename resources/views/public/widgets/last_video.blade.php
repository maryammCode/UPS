 @php
     $last_albums = App\Album::latest()->where('publier', '=', 1)->where('type', 'video')->limit(1)->get();
 @endphp

 <div class="ns-blog-details-widget mb-50">
     <h5 class="ns-footer-widget-title-2"> <a
             href="{{ route('videos', ['slug' => $last_albums[0]->slug]) }}">@lang('translate.Derniers album video')</a></h5>

     <ul class="widget-post-body">
         @foreach ($last_albums as $last_album)
             <a href="{{ route('videos', ['slug' => $last_album->slug]) }}">
                 <div class="thumb">
                     <img src="@if ($last_album->cover) {{ Voyager::image($last_album->cover) }}@else {{ asset('theme1/images/blog/recent-work-01.jpg') }} @endif"
                         alt="cover">
                 </div>
                 <div class="ns-blog-details-post-content">
                     <h5 class="ns-blog-details-post-content-title my-2">
                         @include('public.layouts.includes.langs', [
                             'field' => $last_album,
                             'param' => 'designation',
                         ])
                     </h5>

                     @if ($last_album->created_at)
                         <span><i class="icofont-calendar"></i>
                             @lang('translate.Publiée le')&nbsp;
                             {{ \Carbon\Carbon::parse($last_album->created_at)->format('d/m H:i A') }}</span><br>
                     @endif

             </a>
             </li>
         @endforeach
     </ul>
 </div>
