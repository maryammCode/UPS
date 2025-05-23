@extends('intranet.layouts.app')
@section('content')
    @if ($page)
        <div class="col-md-12 fcrse_2">
            <div class="value_content">
                @php
                    $title = 'intranet.' . @$page->type;
                @endphp
                <h4>@lang('intranet.' . @$page->type)</h4>
                <p> @lang('intranet.A partir de') {{ @$page->from }}
                </p>
            </div>
        </div>
    @endif
    @if (isset($page))
        <div class="col-md-12 fcrse_2 mt-30">
            @php
                $data = json_decode($page->link);
            @endphp
            <iframe src="{{ Voyager::image(@$data[0]->download_link) }}" width="100%" height="500px"> </iframe>
        </div>
        @if ($page->note)
            <div class="col-md-12 fcrse_2 mt-30">
                {{ @$page->note }}
            </div>
        @endif
    @else
        @include('intranet.layouts.empty_status', ['message' => 'Données non disponibles pour le moment'])
    @endif
@endsection
