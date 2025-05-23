@extends('intranet.layouts.app')
@section('content')
    @if (Session::has('success'))
        <script type="text/javascript">
            var msg = '{{ session('success') }}';
            swal({
                title: 'Merci',
                text: msg,

                type: 'success',

                toastr: true,
                timer: 5000,
                showConfirmButton: false
            })
        </script>
    @endif
    @if (Session::has('error'))
        <script type="text/javascript">
            var msg = '{{ session('error') }}';
            swal({
                text: msg,
                title: '',
                type: 'warning',
                toastr: true,
                timer: 5000,
                showConfirmButton: false
            })
        </script>
    @endif
    @if (Session::has('warning'))
        <script type="text/javascript">
            var msg = '{{ session('warning') }}';
            swal(
                msg,
                'réessayer SVP',
                'danger'
            )
        </script>
    @endif
    <style>
        .wiss:hover {
            background-color: #f0f0f0;
            transform: translateY(-10px);
        }
    </style>
     <div class="col-md-12 fcrse_2" style="padding-bottom: 30px;">
        <div class="value_content stage_header">
            <h4 class="">@lang('intranet.Entreprise') : {{ $company->designation }}</h4>
            {{-- <button class="btn btn-primary " data-toggle="modal" data-target="#addStageStudent"> + Ajouter </button>
            <a data-toggle="modal" data-target="#demande" class="btn btn-info" style="position:absolute;right: 90px; top: 0; margin: 0 auto;">
                <div>@lang('intranet.Générer')</div>
            </a> --}}
        </div>

    </div>
    <div class="wrapper _bg4586 _new89 " style="padding-top: 15px !important;">

        <div class="_215zd5 p-b-20 ">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="title484">
                            {{-- <h2>{{ $company->designation }}</h2> --}}
                            <img class="line-title" src="{{ asset('public/theme2/images/line.svg') }}" alt="">
                            <div class="pt-3">
                                <ul>
                                    @if (isset($company->email))
                                        <li class="mb-2"><i class="uil uil-envelope"><a
                                                    href="mailto:{{ $company->email }}"></i> <span
                                                class="font-weight-bold text-dark"> @lang('intranet.Email') :
                                            </span>{{ $company->email }}</a></li>
                                    @endif
                                    @if (isset($company->website))
                                        <li class="mb-2"><i class="uil uil-envelope"><a href="{{ $company->website }}"
                                                    target="_blank"></i> <span class="font-weight-bold text-dark">
                                                @lang('intranet.Site Web') :
                                            </span>{{ $company->website }}</a></li>
                                    @endif
                                    @if (isset($company->responsable_name))
                                        <li class="mb-2"><i class="uil uil-user"></i> <span
                                                class="font-weight-bold text-dark"> @lang('intranet.Responsable') :
                                            </span>{{ $company->responsable_name }}</a></li>
                                    @endif
                                    @if (isset($company->domaine->designation_fr))
                                        <li class="mb-2"><i class="uil uil-bag"></i> <span
                                                class="font-weight-bold text-dark"> @lang('intranet.Domaine') :
                                            </span>{{ @$company->domaine->designation_fr }}</a></li>
                                    @endif

                                    <li class="mb-2"><i class="uil uil-map-marker"></i> <span
                                            class="font-weight-bold text-dark"> @lang('intranet.Adresse') : </span>
                                        {{ $company->address }}</li>
                                    <li class="mb-2"><i class="uil uil-phone"></i> <span
                                            class="font-weight-bold text-dark"> @lang('intranet.Téléphone') : </span>
                                        {{ $company->phone }}</li>
                                </ul>
                            </div>

                            <p>{!! $company->description !!}</p>
                        </div>
                    </div>
                    @if (isset($company->location))
                        <div class="col-md-6">

                            <div class="story125">
                                @if (isset($company->logo))
                                    <div class="title484 p-0">
                                        <img class="text-center" src="{{ Voyager::image($company->logo) }}" alt="logo"
                                            style="height: 80px !important;">

                                    </div>
                                    <img class="line-title" src="{{ asset('public/theme2/images/line.svg') }}"
                                        alt="">
                                @endif

                                @if (isset($company->location))
                                    <div>
                                        <iframe src="{{ $company->location }}" width="600" height="450"
                                            style="border:0;" allowfullscreen="" loading="lazy"
                                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                                    </div>
                                @endif
                            </div>
                        </div>
                    @endif

                </div>
            </div>
        </div>
        {{-- appel d'offres --}}
        @if (count(@$company_offers) > 0)
            <div class="_215td5">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="title589 text-center">
                                <h2>Offres d'Emplois / Stages</h2>
                                {{-- <p>Cursus branches around the world</p> --}}
                                <img class="line-title" src="{{ asset('public/theme2/images/line.svg') }}" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="branches_all">
                        <div class="row">
                            @foreach ($company_offers as $offer)
                                <div class="col-lg-4 col-md-4">
                                    @include('intranet.components.offer', ['offer' => $offer])

                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        @endif
        {{-- -- /appel d'offres --}}
        <div class="_215td5 p-b-20">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="title589 text-center">
                            <h2>@lang('intranet.Stages réalisés')</h2>
                            {{-- <p>Cursus branches around the world</p> --}}
                            <img class="line-title" src="{{ asset('public/theme2/images/line.svg') }}" alt="">
                        </div>
                    </div>
                </div>
                <table id="company" class="table ucp-table display" style="width:100%">
                    <thead class="thead-s">
                        <tr>
                            <th class="specific_th">#</th>
                            <th class="specific_th">@lang('translate.Nom & Prénom')</th>
                            <th class="specific_th">@lang('translate.Sujet')</th>
                            <th class="specific_th">@lang('translate.Domaine')</th>
                            <th class="specific_th">@lang('translate.Type')</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($company->trainers as $trainer)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    <ul>
                                        @if (isset($trainer->candidat_1_name))
                                            <li>{{ $trainer->candidat_1_name }}</li>
                                        @endif
                                        @if (isset($trainer->candidat_2_name))
                                            <li>{{ $trainer->candidat_2_name }}</li>
                                        @endif
                                        @if (isset($trainer->candidat_3_name))
                                            <li>{{ $trainer->candidat_3_name }}</li>
                                        @endif
                                    </ul>
                                </td>
                                <td>{{ $trainer->sujet }}</td>
                                <td>{{ $trainer->domaine }}</td>
                                <td class="text-center">{{ $trainer->type }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot class="thead-s">
                        <tr>
                            <th class="specific_th">#</th>
                            <th class="specific_th">@lang('translate.Nom & Prénom')</th>
                            <th class="specific_th">@lang('translate.Sujet')</th>
                            <th class="specific_th">@lang('translate.Domaine')</th>
                            <th class="specific_th">@lang('translate.Type')</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
@section('specific_js')
    <script src="{{ asset('public/data_table/jquery.dataTables.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#company').DataTable({
                layout: {
        topStart: {
            buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
        }
    }
            });
        });
    </script>
@endsection
@endsection
