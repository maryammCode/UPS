{{-- @php

    $usefullinks = App\Usefullink::all();

@endphp

<div class="ns-blog-details-widget mb-50">
    <h5 class="ns-footer-widget-title-2 align-items-center">@lang('translate.Liens Utiles')</h5>
    <div class="ns-blog-details-widget-category">
        <ul class="ns-blog-details-category-list">
            @foreach ($usefullinks as $usefullink)
                <li><a href="{{ @$usefullink->link }}">{{ $usefullink->$designation }}<span></span></a></li>
            @endforeach

        </ul>
    </div>
</div> --}}
