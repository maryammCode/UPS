@extends('intranet.layouts.app')
@section('content')

    @if (Session::has('success'))
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@7"></script>
        <script type="text/javascript">
            var msg = '{{ session('success') }}';
            swal(
                msg,
                'Merci',
                'success'
            )
        </script>
    @endif
    @if (Session::has('error'))
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@7"></script>
        <script type="text/javascript">
            var msg = '{{ session('error') }}';
            swal(
                msg,
                'Merci',
                'danger'
            )
        </script>
    @endif
    <div class="section3125" style="margin-bottom: 30px !important">
        <div class="explore_search">
            <div class="ui search focus">

                <div class="ui left icon input swdh11">
                    <input class="prompt srch_explore" type="text" placeholder="Recherche">
                    <i class="uil uil-search-alt icon icon2"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="press_news mb-50" style="background: #fff;border: 1px solid #efefef; padding: 20px;">
        {{-- <h2>Press Releases</h2>
    <p>For Release from Cursus </p> --}}

        <ul style="margin-top:0;">
            <?php $all_forms = App\NachdFormulaire::all(); ?>
            @foreach ($all_forms as $the_form)
                <?php
                $all_tentatives = App\NachdFormulaireRequest::join('nachd_tentatives', 'nachd_formulaire_requests.nachd_tentative_id', 'nachd_tentatives.id')
                    ->where('nachd_formulaire_requests.nachd_formulaire_id', @$the_form->id)
                    ->select('nachd_tentatives.id', 'nachd_tentatives.tentative', 'nachd_tentatives.author_id', 'nachd_tentatives.confirmation', 'nachd_tentatives.date_acceptation', 'nachd_tentatives.date_reception', 'nachd_formulaire_requests.created_at')
                    ->where('nachd_tentatives.author_id', @Auth::user()->id)
                    ->distinct()
                    ->get()
                    ->toArray();
                ?>
                @if (@$all_tentatives)
                    <?php $form = App\NachdFormulaire::find(@$the_form->id); ?>
                    <h4 style="padding-bottom: 12px;padding-top: 20px; font-size: 18px;">
                        @if (@$lang == 'fr')
                            {{ @$form->name }}
                        @elseif(@$lang == 'en')
                            {{ @$form->name_en }}
                        @else
                            {{ @$form->name_ar }}
                        @endif
                    </h4>
                    {{-- <div class="table-responsive" style="width: 100%;">
                    <table id="dataTable" class="table table-hover">
                        <thead>
                            <tr style="background-color:#455f92;">
                                <th style="color: #fff">&nbsp;&nbsp;&nbsp;#&nbsp;&nbsp;&nbsp;</th>
                                @if ($form->decision == '1')<th style="color: #fff">@lang('intranet.Décision')</th>@endif
                                <th style="color: #fff">@lang('intranet.Date d\'envoi')</th>
                                <th style="color: #fff">@lang('intranet.Date Acceptation')</th>
                                <th style="color: #fff">@lang('intranet.Réception justification')</th>
                            </tr>
                        </thead>
                        <tbody> --}}
                    @foreach ($all_tentatives as $tentative)
                        <?php
                        $all_requests = App\NachdFormulaireRequest::join('nachd_tentatives', 'nachd_formulaire_requests.nachd_tentative_id', 'nachd_tentatives.id')
                            ->join('nachd_inputs', 'nachd_formulaire_requests.nachd_input_id', 'nachd_inputs.id')
                            ->where('nachd_formulaire_requests.nachd_formulaire_id', @$the_form->id)
                            ->where('nachd_tentatives.tentative', @$tentative['tentative'])
                            ->select('nachd_formulaire_requests.id', 'nachd_formulaire_requests.value', 'nachd_inputs.label_fr', 'nachd_inputs.zone', 'nachd_inputs.type')
                            ->get()
                            ->groupBy('nachd_tentatives.tentative')
                            ->toArray();
                        $diff_col = 0;
                        ?>


                        @php
                            $date_acceptation = \Carbon\Carbon::parse(@$tentative['date_acceptation'])->format(
                                'd-m-Y H:i:s',
                            );
                            $date_reception = \Carbon\Carbon::parse(@$tentative['date_reception'])->format(
                                'd-m-Y H:i:s',
                            );
                        @endphp
                        <div class="press_item " style="position:relative">
                            <a target="_blank"
                                href="{{ route('print_form', ['from' => 'simple', 'tentative' => @$tentative['tentative']]) }}"
                                class="press_title"><i class="fa fa-print"></i> Imprimer</a>

                            <div class="vdtopress">Demande enregistrée le
                                {{ \Carbon\Carbon::parse(@$tentative['created_at'])->format('d-m-Y H:i:s') }}</div>
                            <div class="vdtopress">
                                @if (@$form->decision == '1')
                                    @if (@$tentative['confirmation'] == 0)
                                        <span class="text-primary">Demande non encore traitée</span>
                                    @elseif(@$tentative['confirmation'] == 1)
                                        <span class="text-success">Demande traitée @if (@$date_acceptation)
                                            le {{ date('d-m-Y H:i:s', strtotime(@$date_acceptation)) }}
                                        @endif </span>
                                    @endif
                                @endif
                            </div>
                            <div class="vdtopress">
                                @if (@$form->decision == '1')
                                    @if (!@$date_reception)
                                        Justification non encore prise
                                    @elseif(@$date_reception)
                                        Justification reçu le {{ date('d-m-Y H:i:s', strtotime(@$date_reception)) }}
                                    @endif
                                @endif
                            </div>

                                @if ($form->decision == '1')
                                    @if (@$tentative['confirmation'] == 0)
                                    <div class="badge_seller bg-primary">   Non traitée </div>
                                    @elseif(@$tentative['confirmation'] == 1)
                                    <div class="badge_seller bg-success">   Confirmée </div>

                                    @endif
                                @endif
                        </div>
                    @endforeach
                    {{-- </tbody>
                    </table>
                </div> --}}
                @endif
            @endforeach
        </ul>

        {{-- <a href="#" class="allnews_btn">See More Press Releases</a> --}}
    </div>
@endsection
