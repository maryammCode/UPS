@extends('intranet.layouts.app')
@section('content')
    <style>
        .file-card {
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 10px;
            margin: 10px;
            text-align: center;
            transition: transform 0.2s;
        }

        .file-card:hover {
            transform: scale(1.05);
        }

        .file-icon {
            font-size: 50px;
        }

        .file-name {
            word-wrap: break-word;
            margin-top: 10px;
        }
    </style>
    <div class="row">
        <div class="col-md-12 fcrse_2" style="padding-bottom: 25px;">
            <div class="value_content stage_header">
                <h4 class="">@lang('intranet.Dossiers')</h4>
            </div>
        </div>

        {{-- tabilation --}}
        <div class="fcrse_2 col-md-12" style="padding-top: 1px;">
            <div class="my_courses_tabs" style="margin-top:20px !important;">
                <ul class="nav nav-pills my_crse_nav" id="pills-tab" role="tablist">
                    <li class="nav-item" style="width:15%;">
                        <a class="nav-link active" id="pills-my-courses-tab" data-toggle="pill" href="#pills-my-courses"
                            role="tab" aria-controls="pills-my-courses" aria-selected="true" style="font-size: 16px;">
                            {{-- <i class="uil uil-book-alt"></i> --}}
                            @lang('intranet.Stages')</a>
                    </li>
                    <li class="nav-item" style="width: 15%;">
                        <a class="nav-link" id="pills-my-purchases-tab" data-toggle="pill" href="#pills-my-purchases"
                            role="tab" aria-controls="pills-my-purchases" aria-selected="false"
                            style="font-size: 16px;">
                            {{-- <i class="uil uil-download-alt"></i> --}}
                            @lang('intranet.Demandes')</a>
                    </li>
                    <li class="nav-item" style="width: 15%;">
                        <a class="nav-link" id="tickets-tab" data-toggle="pill" href="#tickets" role="tab"
                            aria-controls="tickets" aria-selected="false" style="font-size: 16px;">
                            {{-- <i class="uil uil-download-alt"></i> --}}
                            @lang('intranet.Tickets')</a>
                    </li>
                    <li class="nav-item" style="width: 20%;">
                        <a class="nav-link" id="donnees_personnels-tab" data-toggle="pill" href="#donnees_personnels"
                            role="tab" aria-controls="donnees_personnels" aria-selected="false"
                            style="font-size: 16px;">
                            {{-- <i class="uil uil-download-alt"></i> --}}
                            @lang('intranet.Données Personnels')</a>
                    </li>
                    <li class="nav-item" style="width: 20%;">
                        <a class="nav-link" id="document_administratifs-tab" data-toggle="pill"
                            href="#document_administratifs" role="tab" aria-controls="document_administratifs"
                            aria-selected="false" style="font-size: 16px;">
                            {{-- <i class="uil uil-download-alt"></i> --}}
                            @lang('intranet.Documents Administratifs')</a>
                    </li>
                    <li class="nav-item" style="width: 14%;">
                        <a class="nav-link" id="autres-tab" data-toggle="pill" href="#autres" role="tab"
                            aria-controls="autres" aria-selected="false" style="font-size: 16px;">
                            {{-- <i class="uil uil-download-alt"></i> --}}
                            @lang('intranet.Autres')</a>
                    </li>
                </ul>
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-my-courses" role="tabpanel"
                        style="padding:0 !important;">
                        <div class="table-responsive review_all120 mt-3  pb-3">
                            <div class=" mt-20">
                                <div class="fcrse_1" style="padding:0">
                                    <div class="crse_content" style="margin-top:0;">
                                        <div class="fcrse_2 col-md-12" style="padding-top: 1px;">
                                            {{-- <div id="accordion" class="ui-accordion ui-widget ui-helper-reset"> --}}
                                            @if (count($stages) > 0)
                                                <div class="row" id="file-grid">
                                                    @foreach ($stages as $file)
                                                        @php
                                                            $fileName = basename($file);
                                                            $fileUrl = Voyager::image($file);
                                                        @endphp
                                                        <div class="col-md-3 col-sm-4">
                                                            <div class="file-card">
                                                                <div class="file-icon">
                                                                    <i class="far fa-file"></i>
                                                                </div>
                                                                <div class="file-name">{{ $fileName }}</div>
                                                                <a href="{{ $fileUrl }}"
                                                                    class="btn btn-primary btn-sm mt-2"
                                                                    download>Download</a>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            @else
                                                <div class="col-md-12 ">
                                                    @include('intranet.layouts.empty_status', [
                                                        'message' => 'Aucun fichier',
                                                    ])
                                                </div>
                                            @endif


                                            {{-- </div> --}}

                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-my-purchases" role="tabpanel" style="padding:0 !important;">
                        <div class="table-responsive mt-30 review_all120">
                            <div class="fcrse_2 col-md-12" style="padding-top: 1px;">
                                @if (count($requests) > 0)
                                    <div class="row" id="file-grid">
                                        @foreach ($requests as $file)
                                            @php
                                                $fileName = basename($file);
                                                $fileUrl = Voyager::image($file);
                                            @endphp
                                            <div class="col-md-3 col-sm-4">
                                                <div class="file-card">
                                                    <div class="file-icon">
                                                        <i class="far fa-file"></i>
                                                    </div>
                                                    <div class="file-name">{{ $fileName }}</div>
                                                    <a href="{{ $fileUrl }}" class="btn btn-primary btn-sm mt-2"
                                                        download>Download</a>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                @else
                                    <div class="col-md-12 ">
                                        @include('intranet.layouts.empty_status', [
                                            'message' => 'Aucun fichier',
                                        ])
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="tickets" role="tabpanel" style="padding:0 !important;">
                        <div class="table-responsive mt-30 review_all120">
                            @if (count($claims) > 0)
                                <div class="row" id="file-grid">
                                    @foreach ($claims as $file)
                                        @php
                                            $fileName = basename($file);
                                            $fileUrl = Voyager::image($file);
                                        @endphp
                                        <div class="col-md-3 col-sm-4">
                                            <div class="file-card">
                                                <div class="file-icon">
                                                    <i class="far fa-file"></i>
                                                </div>
                                                <div class="file-name">{{ $fileName }}</div>
                                                <a href="{{ $fileUrl }}" class="btn btn-primary btn-sm mt-2"
                                                    download>Download</a>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @else
                                <div class="col-md-12 ">
                                    @include('intranet.layouts.empty_status', [
                                        'message' => 'Aucun fichier',
                                    ])
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="tab-pane fade" id="donnees_personnels" role="tabpanel" style="padding:0 !important;">
                        <div class="table-responsive mt-30 review_all120">
                            @if (count($personnals) > 0)
                                <div class="row" id="file-grid">
                                    @foreach ($personnals as $file)
                                        @php
                                            $fileName = basename($file);
                                            $fileUrl = Voyager::image($file);
                                        @endphp
                                        <div class="col-md-3 col-sm-4">
                                            <div class="file-card">
                                                <div class="file-icon">
                                                    <i class="far fa-file"></i>
                                                </div>
                                                <div class="file-name">{{ $fileName }}</div>
                                                <a href="{{ $fileUrl }}" class="btn btn-primary btn-sm mt-2"
                                                    download>Download</a>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @else
                                <div class="col-md-12 ">
                                    @include('intranet.layouts.empty_status', [
                                        'message' => 'Aucun fichier',
                                    ])
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="tab-pane fade" id="document_administratifs" role="tabpanel"
                        style="padding:0 !important;">
                        <div class="table-responsive mt-30 review_all120">
                            @if (count($documents) > 0)
                                <div class="row" id="file-grid">
                                    @foreach ($documents as $file)
                                        @php
                                            $fileName = basename($file);
                                            $fileUrl = Voyager::image($file);
                                        @endphp
                                        <div class="col-md-3 col-sm-4">
                                            <div class="file-card">
                                                <div class="file-icon">
                                                    <i class="far fa-file"></i>
                                                </div>
                                                <div class="file-name">{{ $fileName }}</div>
                                                <a href="{{ $fileUrl }}" class="btn btn-primary btn-sm mt-2"
                                                    download>Download</a>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @else
                                <div class="col-md-12 ">
                                    @include('intranet.layouts.empty_status', [
                                        'message' => 'Aucun fichier',
                                    ])
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="tab-pane fade" id="autres" role="tabpanel" style="padding:0 !important;">
                        <div class="table-responsive mt-30 review_all120">
                            @if (count($others) > 0)
                                <div class="row" id="file-grid">
                                    @foreach ($others as $file)
                                        @php
                                            $fileName = basename($file);
                                            $fileUrl = Voyager::image($file);
                                        @endphp
                                        <div class="col-md-3 col-sm-4">
                                            <div class="file-card">
                                                <div class="file-icon">
                                                    <i class="far fa-file"></i>
                                                </div>
                                                <div class="file-name">{{ $fileName }}</div>
                                                <a href="{{ $fileUrl }}" class="btn btn-primary btn-sm mt-2"
                                                    download>Download</a>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @else
                                <div class="col-md-12 ">
                                    @include('intranet.layouts.empty_status', [
                                        'message' => 'Aucun fichier',
                                    ])
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            {{-- /tabilation --}}


        </div>
    @endsection
