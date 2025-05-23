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

    /* ************** */
    .title484 h2 {
        font-size: 24px;
        font-weight: bold;
        color: #333;
    }

    .line-title {
        width: 100%;
        max-width: 200px;
        height: auto;
    }

    .story125 iframe {
        border-radius: 8px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .list-unstyled li {
        font-size: 16px;
        color: #555;
    }

    .list-unstyled li i {
        color: #007bff;
        /* Match with your theme's primary color */
    }
    .empty-state {
    background-color: #f8f9fa;
    border-radius: 8px;
    padding: 20px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

    .empty-state i {
        color: #6c757d; /* Muted color for the icon */
    }

    .empty-state h4 {
        font-size: 20px;
        color: #343a40; /* Dark color for the heading */
    }

    .empty-state p {
        font-size: 14px;
        color: #6c757d; /* Muted color for the description */
    }
    /* Center Pagination Links */
.text-center {
    display: flex;
    justify-content: center;
    align-items: center;
    margin-top: 20px;
}

.pagination {
    display: flex;
    justify-content: center;
    list-style: none;
    padding: 0;
}

.pagination a,
.pagination .page-item {
    margin: 0 5px;
}

.pagination .active {
    background-color: #007bff;
    color: white;
}

.pagination a {
    color: #007bff;
    text-decoration: none;
}

.pagination a:hover {
    background-color: #f1f1f1;
}
</style>
<div class="col-md-12 fcrse_2" style="padding-bottom: 30px;">
    <div class="value_content stage_header">
        <h4 class="">@lang('intranet.Entreprise') : {{ $company->designation }}</h4>
        {{-- <button class="btn btn-primary " data-toggle="modal" data-target="#addStageStudent"> + Ajouter </button>
        <a data-toggle="modal" data-target="#demande" class="btn btn-info"
            style="position:absolute;right: 90px; top: 0; margin: 0 auto;">
            <div>@lang('intranet.Générer')</div>
        </a> --}}
    </div>

</div>
<div class="wrapper _bg4586 _new89 " style="padding-top: 15px !important;">

    <div class="_215zd5 p-0">
        <div class="container my-4">
            <div class="row">
                <!-- Left Column: Company Details -->
                <div class="col-md-6">
                    <div class="title484">
                        <img class="line-title mb-3" src="{{ asset('public/theme2/images/line.svg') }}" alt="">
                        <div class="pt-3">
                            <ul class="list-unstyled">
                                @if (isset($company->email))
                                    <li class="mb-3">
                                        <i class="uil uil-envelope mr-2"></i>
                                        <span class="font-weight-bold text-dark">@lang('intranet.Email') :</span>
                                        <a href="mailto:{{ $company->email }}"
                                            class="text-primary">{{ $company->email }}</a>
                                    </li>
                                @endif
                                @if (isset($company->website))
                                    <li class="mb-3">
                                        <i class="uil uil-globe mr-2"></i>
                                        <span class="font-weight-bold text-dark">@lang('intranet.Site Web') :</span>
                                        <a href="{{ $company->website }}" target="_blank"
                                            class="text-primary">{{ $company->website }}</a>
                                    </li>
                                @endif
                                @if (isset($company->responsable_name))
                                    <li class="mb-3">
                                        <i class="uil uil-user mr-2"></i>
                                        <span class="font-weight-bold text-dark">@lang('intranet.Responsable') :</span>
                                        {{ $company->responsable_name }}
                                    </li>
                                @endif
                                @if (isset($company->domaine->designation_fr))
                                    <li class="mb-3">
                                        <i class="uil uil-bag mr-2"></i>
                                        <span class="font-weight-bold text-dark">@lang('intranet.Domaine') :</span>
                                        {{ $company->domaine->designation_fr }}
                                    </li>
                                @endif
                                <li class="mb-3">
                                    <i class="uil uil-map-marker mr-2"></i>
                                    <span class="font-weight-bold text-dark">@lang('intranet.Adresse') :</span>
                                    {{ $company->address }}
                                </li>
                                <li class="mb-3">
                                    <i class="uil uil-phone mr-2"></i>
                                    <span class="font-weight-bold text-dark">@lang('intranet.Téléphone') :</span>
                                    {{ $company->phone }}
                                </li>
                            </ul>
                        </div>
                        <p class="mt-3">{!! $company->description !!}</p>
                    </div>
                </div>

                <!-- Right Column: Company Logo and Location -->
                <div class="col-md-6">
                    <div class="story125">
                        <!-- Company Logo -->
                        @if (isset($company->logo) && $company->logo)
                            <div class="title484 p-0 text-center">
                                <img src="{{ Voyager::image($company->logo) }}" alt="logo" class="img-fluid mb-3"
                                    style="max-height: 80px;">
                            </div>
                            <img class="line-title mb-3" src="{{ asset('public/theme2/images/line.svg') }}" alt="">
                        @else
                            <div class="text-center text-muted mb-3">
                                <i class="uil uil-image-slash" style="font-size: 50px;"></i>
                                <p class="mt-2">@lang('intranet.Aucun logo disponible.')</p>
                            </div>
                        @endif
                        <!-- Company Location -->
                        @if (isset($company->location) && $company->location)
                            {{-- <div class="embed-responsive embed-responsive-16by9">
                                <iframe class="embed-responsive-item" src="{{ $company->location }}" allowfullscreen
                                    loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                            </div> --}}
                                {{-- {!!$company->location!!} --}}
                                {!! strip_tags(html_entity_decode($company->location), '<iframe>') !!}

                        @else
                            <div class="empty-state text-center py-4">
                                <i class="uil uil-map-marker-slash" style="font-size: 50px; color: #6c757d;"></i>
                                <h4 class="mt-3">@lang('intranet.Aucune localisation disponible')</h4>
                                <p class="text-muted">
                                    @lang('intranet.La localisation de l\'entreprise n\'est pas disponible pour le moment.')
                                </p>
                            </div>
                        @endif
                    </div>
                </div>
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
                            <h2 >@lang("intranet.Offres d'Emplois / Stages")</h2>
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
            <div class="text-center mt-4">
                {{ $company_offers->links('pagination::bootstrap-4') }}
            </div>
        </div>
    @endif
    {{-- -- /appel d'offres --}}
    <div class="_215td5 p-b-20">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="title589 text-center">
                        <h2 style="margin-bottom: 0px;">@lang('intranet.Stages réalisés')</h2>
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
    $(document).ready(function () {
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
