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
    @if ($stages -> count() > 0)
    <div class="_215td5 col-md-12" style="padding-top: 10px;">
        <div class="row">
            <div class="table-responsive">
                <table class="table ucp-table" id="company_candidatures" >
                    <thead class="thead-s">
                        <tr>
                            <th class="text-center" scope="col">@lang('intranet.Candidats')</th>
                            <th class="text-center" scope="col">@lang('intranet.Sujet')</th>
                            <th class="text-center" scope="col">@lang('intranet.Dates')</th>
                            <th class="text-center" scope="col">@lang('intranet.Documents')</th>
                            <th class="text-center" scope="col">@lang('intranet.Etat')</th>
                            <th class="text-center" scope="col">@lang('intranet.Action')</th>
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
                                <td class="text-center" style="width: 20%;">{{ $stage->sujet }}</td>
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
                                <td class="text-center">
                                    {{-- <b class="course_active">
                                    </b> --}}
                                    <form action="{{ route('updateStatusStage')}}" method="POST">
                                        @csrf
                                        <div class="input-group">
                                            <input type="hidden" name="stage_id" value="{{ $stage->id }}">
                                            <select name="status" class="form-control">
                                                <option value="0" @if($stage->status == 0) selected @endif>Encours</option>
                                                <option value="1" @if($stage->status == 1) selected @endif>Rejeter</option>
                                                <option value="2" @if($stage->status == 2) selected @endif>Pas d'opportunité</option>
                                                <option value="3" @if($stage->status == 3) selected @endif>Accepter</option>
                                            </select>
                                            <button type="submit" class="btn btn-primary mt-0" >@lang('intranet.Appliquer')</button>
                                        </div>
                                    </form>
                                </td>
                                @php
                                    $request_student_offer = App\OfferRequest::where('user_id', $stage->candidat_1_id)
                                        ->where('publier', 1)
                                        ->where('end_date', '>=', date('Y-m-d') . ' 00:00:00')
                                        ->first();
                                    $cv_setting = App\CvSetting::where('user_id', $stage->candidat_1_id)->first();
                                @endphp
                                <td class="text-center">
                                    <a  @if( @$cv_setting->theme == 1)
                                                href="{{ route('cv_theme_1', $stage->candidat_1_id) }}"
                                            @elseif (@$cv_setting->theme == 2)
                                                href="{{ route('cv_theme_2', $stage->candidat_1_id) }}"
                                            @endif

                                         class="gray-s personal_pointer my_specific_btn" title="Détails" target="_blank">
                                         @lang('intranet.CV')<i class="uil uil-arrow-right"></i>
                                    </a>
                                    {{-- modal update status --}}
                                {{--   <div class="modal fade bd-example-modal-lg" id="exampleModal{{ $stage->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog add_stage" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title text-center" id="exampleModalLabel">@lang('intranet.Déposer Votre Stage')</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>

                                                <div class="modal-body row">
                                                    <!-- form fields : end(date) , encadrant_id(select) , company(select) -->
                                                    <div class="form-group col-12">
                                                        <label for="title">@lang('intranet.Lettre de motivation')</label>
                                                    <p>{!! $stage->motivation_letter !!}</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">@lang('intranet.Annuler')</button>
                                                    <a href="{{ route('cv', $stage->candidat_1_id) }}" class="btn btn-primary " target="_blank">@lang('intranet.Voir CV')</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div> --}}
                                    {{-- modal update status --}}
                                </td>
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

@endsection
@section('specific_js')
    <script src="{{ asset('public/data_table/jquery.dataTables.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#company_candidatures').DataTable({
                layout: {
        topStart: {
            buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
        }
    }
            });
        });

    </script>
@endsection
