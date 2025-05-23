@php
    $inai = App\Inai::first();
    $inai = TCG\Voyager\Models\Page::where('slug', 'inai')->first();
@endphp

<div class="widget widget-search">
    <a href="{{ route('pages', ['slug' => 'inai']) }}">
       
        <div class="blog-search">
            @if ($inai->image)
                @php
                    $exists = Storage::disk('local')->has($inai->image);  
                @endphp
            @endif
            <img @if($inai->image && $exists) src="{{ Voyager::image(@$inai->image) }}" @else src="{{asset('theme1/images/inai.png')}}" @endif alt="inai">
        </div>
    </a>
</div>
