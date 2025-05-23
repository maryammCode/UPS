@extends('intranet.layouts.app')
@section('content')

    <style>
        .row>[class*="col-"] {
            margin-bottom: 15px
        }

        hr {
            width: 100%;
        }

        .add_stage {
            max-width: 100%;
            width: 70%;
        }

        .deep_row {
            margin-left: 0px;
            padding-left: 0;
            padding-right: 0;
        }

        @media (max-width: 768px) {
            .add_stage {
                width: 100%;
            }
        }
    </style>
    <div class="row">
        <div class="col-md-12 fcrse_2" style="padding-bottom: 30px;">
            <div class="value_content stage_header">
                <h4 class="">@lang('intranet.Candidatures')</h4>
                {{-- <button class="btn btn-primary " data-toggle="modal" data-target="#exampleModal"> + Ajouter </button> --}}
            </div>
        </div>
        @if ($stages->count() > 0)
            <div class="_215td5 col-md-12" style="padding-top: 10px;">
                <div class="row">
                    <div class="table-responsive">
                        <table class="table ucp-table">
                            <thead class="thead-s">
                                <tr>
                                    <th class="text-center" scope="col">Candidats</th>
                                    <th class="text-center" scope="col">Entreprise</th>
                                    {{-- <th class="text-center" scope="col">Encadrant(e)</th> --}}
                                    <th class="text-center" scope="col">Dates</th>
                                    <th class="text-center" scope="col">Documents</th>
                                    <th class="text-center" scope="col">Sujet</th>
                                    <th class="text-center" scope="col">Etat</th>
                                    {{-- <th class="text-center" scope="col">Action</th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($stages as $stage)
                                    <tr>
                                        <td class="text-center">
                                            <ul>
                                                <li>
                                                    - {{ $stage->candidat_1_name }}
                                                    @if (auth()->user()->id == $stage->candidat_1_id)
                                                        <span style="color: red">(Vous)</span>
                                                    @endif
                                                </li>
                                                @if ($stage->candidat_2_name)
                                                    <li>- {{ $stage->candidat_2_name }}</li>
                                                    @if (auth()->user()->id == $stage->candidat_2_id)
                                                        <span style="color: red">(Vous)</span>
                                                    @endif
                                                @endif
                                                @if ($stage->candidat_3_name)
                                                    <li>- {{ $stage->candidat_3_name }}</li>
                                                    @if (auth()->user()->id == $stage->candidat_3_id)
                                                        <span style="color: red">(Vous)</span>
                                                    @endif
                                                @endif
                                            </ul>
                                        </td>
                                        <td class="text-center">{{ @$stage->entreprise->designation }}</td>
                                        {{-- <td class="text-center">{{ @$stage->encadrant->name }}</td> --}}
                                        {{-- <td class="text-center">{{ Carbon\Carbon::parse($stage->start)->format('d-m-Y') }}</td> --}}
                                        <td class="text-center">
                                            {{ Carbon\Carbon::parse($stage->start)->format('d-m-Y') }} /
                                            {{ Carbon\Carbon::parse($stage->end)->format('d-m-Y') }}
                                        </td>
                                        <td class="text-center">
                                            @if ($stage->appui_request && count(json_decode($stage->appui_request)) > 0)
                                                            @php
                                                                $file = json_decode($stage->appui_request)[0];
                                                            @endphp
                                                            <p><a href="{{ Voyager::image($file->download_link) }}" target="_blank"
                                                                noreferrer rel="noopener" title="Détails"><i
                                                                    class="uil uil-download-alt"></i>@lang('intranet.Demande de stage')</a></p>
                                                        @endif
                                                        @if ($stage->other_file && count(json_decode($stage->other_file)) > 0)
                                                        @php
                                                            $file = json_decode($stage->other_file)[0];
                                                        @endphp
                                                        <p><a href="{{ Voyager::image($file->download_link) }}" target="_blank"
                                                            noreferrer rel="noopener" title="Détails"><i
                                                                class="uil uil-download-alt"></i>@lang('intranet.Autres')</a></p>
                                                    @endif

                                        </td>
                                        <td class="text-center" style="width: 20%;">{{ $stage->sujet }}</td>

                                        <td class="text-center">
                                            <b class="course_active">
                                                @switch($stage->status)
                                                    @case(0)
                                                        <span class="badge badge-pill badge-info">@lang('intranet.status_0')</span>
                                                    @break

                                                    @case(1)
                                                        <span class="badge badge-pill badge-danger">@lang('intranet.status_1')</span>
                                                    @break

                                                    @case(3)
                                                        <span class="badge badge-pill badge-secondary">@lang('intranet.status_2')</span>
                                                    @break

                                                    @case(4)
                                                        <span class="badge badge-pill badge-success"> @lang('intranet.status_3')</span>
                                                    @break
                                                @endswitch
                                            </b>
                                        </td>
                                        {{-- <td class="text-center">
                                            <a href="{{ route('stage_details', ['id' => $stage->id]) }}" title="Détails"
                                                class="gray-s"><i class="uil uil-eye"></i></a>
                                        </td> --}}
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        @else
            @include('intranet.layouts.empty_status', [
                'message' => 'Aucune données trouvées',
            ])
        @endif

    </div>



    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    {{--
<script>
    var teachers = {!!$teachers!!}
    var companies = {!!$companies!!}

    $(document).ready(function() {
        $('#search_user').on('input', function() {
            var searchText = $(this).val().trim();
            if (searchText.length >= 2) {
                fetchUsers(searchText);
            }
        });

        function fetchUsers(searchText) {
            teacher_result = teachers.filter(function(user) {
                return user.name.toLowerCase().includes(searchText.toLowerCase());
            })
            var options = '<option value="">Sélectionner votre encadrant (' + teacher_result.length + ' résultat(s) )</option>';
            teacher_result.forEach(function(user) {
                options += '<option value="' + user.id + '">' + user.name + '</option>';
            });
            $('#encadrant').html(options);
        }
        $('#search_company').on('input', function() {
            var searchText = $(this).val().trim();
            if (searchText.length >= 2) {
                fetchCompanies(searchText);
            }
        });

        function fetchCompanies(searchText) {
            companies_result = companies.filter(function(company) {
                return company.designation.toLowerCase().includes(searchText.toLowerCase());
            })
            var options = '<option value="">Sélectionner votre entreprise d\'accueil (' + companies_result.length + ' résultat(s) )</option>';
            companies_result.forEach(function(company) {
                options += '<option value="' + company.id + '">' + company.designation + '</option>';
            });
            $('#company').html(options);
        }

        $('#other_company_checkbox').on('change', function() {
            if ($(this).is(':checked')) {

                $('#company_search_zone').hide();
                $('#company_new_zone').show();
                $('#company_new_responsible_zone').show();



            } else {
                $('#company_search_zone').show();
                $('#company_new_zone').hide();
                $('#company_new_responsible_zone').hide();


            }
        })

        $('#other_company_user_checkbox').on('change', function() {
            if ($(this).is(':checked')) {
                $('#company_new_responsible_zone').show();
                $('#company_users').hide()
            } else {
                $('#company_new_responsible_zone').hide();
                $('#company_users').show()
            }
        })


        $('#company').on('change', function(event) {
            let company_id = event.target.value
            let responsibles = companies.find(company => company.id == company_id).users || []


            var options = '<option value="">Sélectionner votre encadrant professionnel </option>';
            responsibles.forEach(function(user) {
                options += '<option value="' + user.id + '">' + user.name + '</option>';
            });
            $('#company_users').html(options);
        });


    });
</script> --}}
@endsection
