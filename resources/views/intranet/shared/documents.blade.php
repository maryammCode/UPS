@extends('intranet.layouts.app')
@section('content')
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
    <div class="col-md-12 fcrse_2">
        <div class="value_content" style="margin-top: 5px;">
            <h4>@lang('intranet.Documents')</h4>
        </div>
    </div>
    <div class="col-md-12 fcrse_2 mt-30">

        <div class="panel-group mt-4 accordion" id="accordion2">
            @foreach ($docs as $sujet)
                <div class="panel panel-default">
                    @if (count($sujet->documents) > 0)
                        <div class="panel-heading" id="headingOne{{ $loop->index }}">
                            <div class="panel-title">
                                <a class="collapsed p-0" data-toggle="collapse"
                                    data-target="#collapseOne{{ $loop->index }}" href="#" aria-expanded="false"
                                    aria-controls="collapseOne{{ $loop->index }}">
                                    {{ $sujet->$designation }}
                                </a>
                            </div>
                        </div>
                        <div id="collapseOne{{ $loop->index }}" class="panel-collapse collapse"
                            aria-labelledby="headingOne{{ $loop->index }}" data-parent="#accordion2">
                            <div class="panel-body pt-5">
                                <table>
                                    @foreach ($sujet->documents as $document)
                                        <tr>
                                            <td style="width: 70%">
                                                <a
                                                    href="{{ Voyager::image(json_decode($document->files)[0]->download_link) }}"><i
                                                        class="fa fa-file"></i> {{ json_decode($document->files)[0]->original_name }}</a>
                                            </td>
                                            
                                            <td style="width: 30%">
                                                <a href="{{ Voyager::image(json_decode($document->files)[0]->download_link) }}" download
                                                    target="_blank"> <i class="fa fa-download"></i> @lang('translate.Télécharger')</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    @endif

                </div>
            @endforeach
        </div>

    </div>

    {{-- {{$news->links('pagination::bootstrap-4')}} --}}
@endsection
