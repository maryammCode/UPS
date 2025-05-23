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
            width: 55%;
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
                <h4 class="">@lang('intranet.Réclamations')</h4>
                <button class="btn btn-primary " data-toggle="modal" data-target="#exampleModal"> @lang('intranet.Ajouter') </button>
            </div>
        </div>
        @if ($claims->count() > 0)
            <div class="_215td5 col-md-12" style="padding-top: 10px;">
                <div class="row">
                    <div class="table-responsive">
                        <table id="listClaims" class="table ucp-table">
                            <thead class="thead-s">
                                <tr>
                                    <th class="text-center" scope="col">@lang('intranet.N Ticket')</th>
                                    <th class="text-center" scope="col">@lang('intranet.Sujet')</th>
                                    {{-- <th class="text-center" scope="col">Date</th> --}}
                                    <th class="text-center" scope="col">@lang('intranet.Date')</th>
                                    <th class="text-center" scope="col">@lang('intranet.Destination')</th>
                                    <th class="text-center" scope="col">@lang('intranet.Support')</th>
                                    <th class="text-center" scope="col">@lang('intranet.Status')</th>
                                    <th class="text-center" scope="col">@lang('intranet.Priorité')</th>
                                    <th class="text-center" scope="col">@lang('intranet.Action')</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($claims as $claim)
                                    <tr>
                                        <td class="text-center">#{{ $loop->iteration }}</td>
                                        <td class="text-center">{{ $claim->subject }}</td>
                                        <td class="text-center">
                                            {{ Carbon\Carbon::parse($claim->created_at)->format('Y/m/d - H:i') }}</td>
                                        <td class="text-center" style="width: 20%;">
                                            {{ @$claim->destination->designation_fr }}
                                        </td>
                                        <td class="text-center" style="width: 20%;">
                                            {{ @$claim->responsable->name }}
                                        </td>
                                        <td class="text-center" style="width: 10%;">
                                            @switch( $claim['status'])
                                                @case(0)
                                                    <span class="badge badge-primary">@lang('intranet.En cours')</span>
                                                @break
                                                @case(1)
                                                    <span class="badge badge-secondary"> @lang('intranet.Cloturer')</span>
                                                @break
                                            @endswitch
                                        </td>
                                        <td class="text-center" style="width: 10%;">

                                            @switch( $claim['priority'])
                                                @case(0)
                                                    <span class="badge badge-primary">@lang('intranet.Normal') </span>
                                                @break
                                                @case(1)
                                                    <span class="badge badge-warning"> @lang('intranet.Urgent')</span>
                                                @break
                                                @case(2)
                                                    <span class="badge badge-danger"> @lang('intranet.Très urgent')</span>
                                                @break
                                            @endswitch
                                        </td>

                                        <td class="text-center">
                                            <a href="{{ route('claimDetails', $claim->id) }}" title="Détails"
                                                class="gray-s"><i class="uil uil-eye"></i></a>
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


    <div class="modal fade bd-example-modal-lg" id="exampleModal" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog add_stage" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-center" id="exampleModalLabel">@lang('intranet.Tapez votre réclamation')</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('send_feedback') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body ">
                        <div class="ui search focus">
                            <label for="">@lang('intranet.Types')</label>
                            <div class="ui left icon input swdh11 swdh19">
                                <select class="ui hj145 dropdown cntry152 prompt srch_explore mt-10" name="claim_type_id">
                                    @foreach ($claim_types as $claim_type)
                                        <option value="{{ $claim_type->id }}">{{ $claim_type->designation_fr }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="ui search focus mt-10">
                            <label for="">@lang('intranet.Services')</label>
                            <div class="ui left icon input swdh11 swdh19">
                                <select class="ui hj145 dropdown cntry152 prompt srch_explore mt-10"
                                    name="destination_id">
                                    @foreach ($claim_destinations as $claim_destination)
                                        <option value="{{ $claim_destination->id }}">
                                            {{ $claim_destination->designation_fr }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="ui search focus mt-10">
                            <label for="">@lang('intranet.Sujet')</label>
                            <div class="ui left icon input swdh11 swdh19">
                                <input type="text" name="subject" placeholder="@lang('intranet.Sujet')" class="form-control">
                            </div>
                        </div>
                        <div class="ui search focus mt-30">
                            <label for="">@lang('intranet.Message')</label>
                            <div class="ui form swdh30">
                                <div class="field">
                                    <textarea   name="message"  placeholder="@lang('intranet.Décrivez votre problème ou partagez vos idées')"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="form-group1 mt-30">
                            <label for="file5">@lang("intranet.Ajouter une capture d'écran (facultative)")</label>
                            <div class="image-upload-wrap">
                                <input class="file-upload-input" id="file5" type="file" name="file"
                                    onchange="readURL(this);" accept="image/*">
                                <div class="drag-text">
                                    <i class="fas fa-cloud-upload-alt"></i>
                                    <h4>@lang("intranet.Sélectionnez les captures d'écran à télécharger")</h4>
                                    {{-- <p>@lang('intranet.or drag and drop screenshots')</p> --}}
                                </div>
                            </div>
                        </div>
                        {{-- <button class="save_btn color-btn-ups" type="submit">@lang('intranet.Envoyer vos avis')</button> --}}
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">@lang('intranet.Annuler')</button>
                        <button type="submit" class="btn btn-primary">@lang('intranet.Envoyer')</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
@section('specific_js')
    <script src="{{ asset('public/data_table/jquery.dataTables.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#listClaims').DataTable({
                layout: {
                    topStart: {
                        buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
                    }},order: []
            });
        });

    </script>
@endsection

