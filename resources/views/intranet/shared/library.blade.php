@extends('intranet.layouts.app')
@section('content')

<link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/3.0.2/css/buttons.dataTables.css">
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

    @if (Session::has('success'))
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@7"></script>
        <script type="text/javascript">
            var msg = '{{ session('success') }}';
            swal({
                text: msg,
                title: 'Merci',
                type: 'success',
                toastr: true,
                timer: 3000,
                showConfirmButton: false
            })
        </script>
    @endif
    @if (Session::has('error'))
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@7"></script>
        <script type="text/javascript">
            var msg = '{{ session('error') }}';
            swal({
                text: msg,
                title: 'réessayer SVP',
                type: 'warning',
                toastr: true,
                timer: 3000,
                showConfirmButton: false
            })
        </script>
    @endif
    @if (Session::has('warning'))
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@7"></script>
        <script type="text/javascript">
            var msg = '{{ session('warning') }}';
            swal(
                msg,
                'réessayer SVP',
                'danger'
            )
        </script>
    @endif
    <div class="col-md-12 fcrse_2" style="padding-bottom: 30px;">
        <div class="value_content">
            <h4>@lang('intranet.Bibliothèque')</h4>
        </div>
    </div>
    <div class="_14d25">
        <div class="row">
            <div class="col-md-12">
                <div class="my_courses_tabs">
                    <ul class="nav nav-pills my_crse_nav" id="pills-tab" role="tablist">
                        <li class="nav-item" style="width: 49%;">
                            <a class="nav-link active" id="pills-my-courses-tab" data-toggle="pill" href="#pills-my-courses"
                                role="tab" aria-controls="pills-my-courses" aria-selected="true"
                                style="font-size: 20px; font-weight: 600;"><i
                                    class="uil uil-book-alt"></i>@lang('intranet.Livres')</a>
                        </li>
                        <li class="nav-item" style="width: 50%;">
                            <a class="nav-link" id="pills-my-purchases-tab" data-toggle="pill" href="#pills-my-purchases"
                                role="tab" aria-controls="pills-my-purchases" aria-selected="false"
                                style="font-size: 20px; font-weight: 600;"><i
                                    class="uil uil-download-alt"></i>@lang('intranet.Mes Réservations')</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-my-courses" role="tabpanel"
                            style="padding:0 !important;">

                            <div class="table-responsive review_all120 mt-30 pt-3 pb-3">
                                <div class="myspecificselect">
                                    <div>
                                        <h3>Filtre par thémes :</h3>
                                        <form action="{{route('filterByTheme')}}" method="POST">
                                            @csrf
                                            <select class="form-control" name="theme" id="">
                                                {{-- <option value="" disabled selected>@lang('intranet.Choisir')</option> --}}
                                                @foreach ($themes as $theme)
                                                    <option value="{{ $theme->id }}" @if($last_theme->id == $theme->id) selected @endif>{{ $theme->$designation }}</option>
                                                @endforeach
                                            </select>
                                            <button class="btn btn-primary" type="submit">@lang('intranet.Filtrer')</button>
                                        </form>
                                    </div>
                                </div>

                                    <table id="books" class="table ucp-table display" style="width:100%">
                                        <thead class="thead-s">
                                            <tr>
                                                <th class="specific_th text-left">@lang('intranet.Thème')</th>
                                                <th class="specific_th text-left">@lang('translate.Ouvrage')</th>
                                                <th class="specific_th text-left">ISBN</th>
                                                <th class="specific_th text-left">@lang('translate.Auteur')</th>
                                                <th class="specific_th text-left">@lang('translate.Réservations')</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($ouvrages as $ouvrage)
                                                <tr>
                                                    <td>{{ $ouvrage->theme->$designation }}</td>
                                                    <td>{{ $ouvrage->$designation }}</td>
                                                    <td>{{ $ouvrage->isbn }}</td>
                                                    <td>{{ $ouvrage->author }}</td>
                                                    <td class="text-center">

                                                        @if (in_array($ouvrage->id, $current->pluck('book_id')->toArray()))
                                                            @php
                                                                $bookings = array_filter($current->toArray(), function (
                                                                    $booking,
                                                                ) use ($ouvrage) {
                                                                    return $booking['book_id'] == $ouvrage->id;
                                                                });
                                                            @endphp

                                                            @foreach ($bookings as $booking)
                                                                @switch($booking['etat'])
                                                                    @case(0)
                                                                        <span class="badge badge-primary">@lang('intranet.Demande en cours')</span>
                                                                    @break

                                                                    @case(1)
                                                                        <span class="badge badge-secondary"> @lang('intranet.Prêt à emprunter')</span>
                                                                    @break

                                                                    @case(2)
                                                                        <span class="badge badge-danger">@lang('intranet.Non disponible') </span>
                                                                    @break

                                                                    @case(3)
                                                                        <span class="badge badge-warning"> @lang('intranet.Emprunté') </span>
                                                                    @break

                                                                    @case(4)
                                                                        <span class="badge badge-success"> @lang('intranet.Retourné') </span>
                                                                    @break

                                                                    @default
                                                                        <span class="badge badge-primary">@lang('intranet.Demande en cours')</span>
                                                                @endswitch
                                                            @endforeach
                                                        @elseif(@$config && $current->count() < $config->max_reservation)
                                                            <form action="{{ route('booking', ['book_id' => $ouvrage->id]) }}"
                                                                method="POST">
                                                                @csrf
                                                                <button
                                                                    class="custom-button theme-one rounded btn-sm btn btn-primary">@lang('translate.Réserver')</button>
                                                            </form>
                                                        @else
                                                            @lang('translate.Non disponible')
                                                        @endif

                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot class="thead-s">
                                            <tr>
                                                <th class="specific_th">@lang('translate.Ouvrage')</th>
                                                <th class="specific_th">ISBN</th>
                                                <th class="specific_th">@lang('translate.Auteur')</th>
                                                <th class="specific_th">@lang('translate.Réservation')</th>
                                                <th></th>
                                            </tr>
                                        </tfoot>
                                    </table>


                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-my-purchases" role="tabpanel" style="padding:0 !important;">
                            <div class="table-responsive mt-30 review_all120">
                                <table class="table ucp-table">
                                    <thead class="thead-s">
                                        <tr>
                                            <th class="text-center specific_th" scope="col">#</th>
                                            <th class="cell-ta specific_th" scope="col">@lang('intranet.Titre')</th>
                                            <th class="cell-ta specific_th" scope="col">@lang('intranet.Date de réservations')</th>
                                            <th class="cell-ta specific_th" scope="col">@lang('intranet.Date de pris')</th>
                                            <th class="text-center specific_th" scope="col">@lang('intranet.Date de retour')</th>
                                            <th class="text-center specific_th" scope="col">@lang('intranet.Etat')</th>
                                            <th class="text-center specific_th" scope="col">@lang('intranet.Date limite')</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($reservations as $reservation)
                                            <tr>
                                                <td class="text-center">{{ $loop->iteration }}</td>
                                                <td class="cell-ta">{{ $reservation->book }}</td>
                                                <td class="text-center">
                                                    {{ Carbon\Carbon::parse($reservation->created_at)->format('d-m-Y') }}
                                                </td>
                                                <td class="text-center">
                                                    {{ Carbon\Carbon::parse($reservation->date_pris)->format('d-m-Y') }}
                                                </td>
                                                <td class="text-center">
                                                    {{ Carbon\Carbon::parse($reservation->date_retour)->format('d-m-Y') }}
                                                </td>
                                                <td class="text-center">

                                                    @switch($reservation['etat'])
                                                        @case(0)
                                                            <span class="badge badge-primary">@lang('intranet.Demande en cours')</span>
                                                        @break

                                                        @case(1)
                                                            <span class="badge badge-secondary"> @lang('intranet.Prêt à emprunter')</span>
                                                        @break

                                                        @case(2)
                                                            <span class="badge badge-danger">@lang('intranet.Non disponible') </span>
                                                        @break

                                                        @case(3)
                                                            <span class="badge badge-warning"> @lang('intranet.Emprunté') </span>
                                                        @break

                                                        @case(4)
                                                            <span class="badge badge-success"> @lang('intranet.Retourné') </span>
                                                        @break

                                                        @default
                                                            <span class="badge badge-primary">@lang('intranet.Demande en cours')</span>
                                                    @endswitch
                                                </td>
                                                <td class="text-center">
                                                    {{ Carbon\Carbon::parse($reservation->date_limite)->format('d-m-Y') }}
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @section('specific_js')
    {{-- <script src="//cdn.datatables.net/2.0.7/js/dataTables.min.js"></script> --}}


<script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/buttons/3.0.2/js/dataTables.buttons.js"></script>
<script src="https://cdn.datatables.net/buttons/3.0.2/js/buttons.dataTables.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/3.0.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/3.0.2/js/buttons.print.min.js"></script>
        {{-- <script src="{{ asset('public/data_table/jquery.dataTables.min.js') }}"></script> --}}
        <script>
            $(document).ready(function() {
                $('#books').DataTable(
                    {
    layout: {
        topStart: {
            buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
        }
    }
}


                );
            });

            $(document).ready(function() {
                $('#booksFilter').DataTable();
            });
        </script>
    @endsection

@endsection
