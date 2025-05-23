@extends('intranet.layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-12 fcrse_2" style="padding-bottom: 30px;">
            <div class="value_content">
                <h4 class=""> @lang('intranet.Liste des étudiants') : {{ $group_td->designation_fr }}</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 p-0">
            <div class="panel-body" style="">
                <table class="table">
                    <thead style="font-weight: 600;">
                        <tr>
                            <th>@lang('intranet.Ordre')</th>
                            {{-- <th>@lang("intranet.Numéro d'inscription")</th> --}}
                            {{-- <th>@lang('intranet.Cin')</th> --}}
                            <th>@lang('intranet.Nom')</th>
                            <th>@lang('intranet.Prénom')</th>
                            <th>@lang('intranet.Email')</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $order = 0;
                        @endphp
                        @foreach ($group_td->students as $student)
                            @php
                                $order = $order + 1;
                            @endphp
                            <tr>
                                <th>{{ $order }}</th>
                                {{-- <th>{{ $student->numero_inscription }}</th> --}}
                                {{-- <th>{{ $student->cin }}</th> --}}
                                <th>{{ $student->nom }}</th>
                                <th>{{ $student->prenom }}</th>
                                <th>{{ $student->email }}</th>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
