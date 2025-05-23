@php
    $stage_types = App\StageType::where('publier', 1)->get();
@endphp
<div class="modal fade bd-example-modal-lg" id="postulerOffre{{ $offer->id }}" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog add_stage" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-center" id="exampleModalLabel">
                    @lang('intranet.Demander de stage')</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @if ((@Auth::user()->role->name == 'Etudiant' || @Auth::user()->role->name == 'Alumni') && $cv_user_existe != null)
                <form method="POST" action="{{ route('applyOfferFromStudent', ['id' => $offer->id]) }}" enctype="multipart/form-data">
                    @csrf
                    {{-- <div class="modal-body row">
                        <div class="form-group col-12">
                            <label for="title">@lang('intranet.Lettre de motivation')</label>
                            <textarea class="form-control" name="motivation_letter" placeholder="@lang('intranet.Lettre de motivation')" rows="10" cols="20"></textarea>
                        </div>
                    </div> --}}

                    <input type="hidden" name="source" value="{{ $source }}">

                    <div class="form-group col-12">
                        <label class="control-label  mt-3"> @lang('intranet.Type de stage') </label>
                        <div class="input-group mb-3 col-12 col-md-12">
                            <select class="form-control" name="stage_type_id" id="type_stage" required >
                                <option disabled selected>@lang('intranet.Choisir')</option>
                                @foreach ($stage_types as $type)
                                    <option value="{{ $type->id }}">{{ $type->designation_fr }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group col-6 col-md-6">
                            <label class="control-label" for="startDate">@lang('intranet.Date de début')</label>
                            <input type="date" class="form-control" name="start" placeholder="@lang('intranet.Date de début')"
                                id="startDate" required onchange="validateDates()">
                        </div>

                        <div class="form-group col-6 col-md-6">
                            <label class="control-label" for="endDate">@lang('intranet.Date de fin')</label>
                            <input type="date" id="endDate" class="form-control" name="end"
                                placeholder="@lang('intranet.Date de fin')" required onchange="validateDates()">
                        </div>
                        <div class="form-group col-12 col-md-12">
                            <p id="messageValidationDate"></p>
                        </div>
                        <div class="form-group col-12 col-md-12">
                            <label for="other_file"> @lang('intranet.Piece jointe') :</label>
                            <input type="file" id="other_file" name="other_file[]"  multiple />
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">@lang('intranet.Annuler')</button>
                        <button type="submit" class="btn btn-primary">@lang('intranet.Postuler')</button>
                    </div>
                </form>
            @else
                <h4 class="text-center mt-5 mb-5 text-danger">@lang('intranet.Commencez à poster votre CV pour profiter des offres')</h4>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">@lang('intranet.Annuler')</button>
                    <a href="{{ route('customize_cv') }}"><button type="submit" class="btn btn-primary">@lang('intranet.Créer votre CV')</button></a>
                </div>
            @endif
        </div>
    </div>
</div>
<script>
       function validateDates() {
            const startDate = document.getElementById('startDate').value;
            let endDate = document.getElementById('endDate');
            const message = document.getElementById('messageValidationDate');

            // Check if both dates are provided
            if (!startDate || !endDate.value) {
                message.textContent = 'Veuillez sélectionner les dates de début et de fin.';
                message.style.color = 'red';
                return;
            }

            // Convert to Date objects
            const start = new Date(startDate);
            const end = new Date(endDate.value);

            // Validate the dates
            if (end >= start) {
                message.textContent = '';
                message.style.color = '';
            } else {
                message.textContent = 'La date de fin doit être supérieure à la date de début';
                message.style.color = 'red';
                endDate.value = ''
            }
        }
</script>
