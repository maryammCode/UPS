@if(isset($options->model) && isset($options->type))

    @if(class_exists($options->model))

        @php $relationshipField = $row->field; @endphp

        @if($options->type == 'belongsTo')

            @if(isset($view) && ($view == 'browse' || $view == 'read'))

                @php
                    $relationshipData = (isset($data)) ? $data : $dataTypeContent;
                    $model = app($options->model);
                    $query = $model::where($options->key, $relationshipData->{$options->column})->first();
                @endphp
                @if(isset($query))
                {{ $query->{$options->label} }}@else
                    {{ __('voyager::generic.no_results') }}
                @endif
            @else
                <select class="form-control select2-ajax" name="{{ $options->column }}"
                    data-get-items-route="{{route('voyager.' . $dataType->slug . '.relation')}}" data-get-items-field="{{$row->field}}"
                    @if(!is_null($dataTypeContent->getKey())) data-id="{{$dataTypeContent->getKey()}}" @endif
                    data-method="{{ !is_null($dataTypeContent->getKey()) ? 'edit' : 'add' }}" @if($row->required == 1) required @endif>
                    @php
                        $model = app($options->model);
                        $query = $model::where($options->key, old($options->column, $dataTypeContent->{$options->column}))->get();
                    @endphp

                    @if(!$row->required)
                        <option value="">{{__('voyager::generic.none')}}</option>
                    @endif
                    @foreach($query as $relationshipData)
                        <option value="{{ $relationshipData->{$options->key} }}" @if(old($options->column, $dataTypeContent->{$options->column}) == $relationshipData->{$options->key}) selected="selected" @endif>
                            {{ $relationshipData->{$options->label} }}
                        </option>
                    @endforeach
                </select>
            @endif
        @elseif($options->type == 'hasOne')

            @php
                $relationshipData = (isset($data)) ? $data : $dataTypeContent;

                $model = app($options->model);
                $query = $model::where($options->column, '=', $relationshipData->{$options->key})->first();

            @endphp

            @if(isset($query))
                <p>{{ $query->{$options->label} }}</p>
            @else
                <p>{{ __('voyager::generic.no_results') }}</p>
            @endif

        @elseif($options->type == 'hasMany')


            @if(isset($view) && ($view == 'browse' || $view == 'read'))

                @php
                    $relationshipData = (isset($data)) ? $data : $dataTypeContent;
                    $model = app($options->model);

                    $selected_values = $model::where($options->column, '=', $relationshipData->{$options->key})->get()->map(function ($item, $key) use ($options) {
                        return $item->{$options->label};
                    })->all();
                @endphp

                @if($view == 'browse')
                    {{-- specific code nachd start --}}
                    {{-- add here btn modal --}}
                    @if (@$options->model == "App\Rapport" && @$dataType->slug == "stages")
                        @php
                            $rapports = App\Rapport::where('stage_id', $data->id)
                                ->where('etat', 1)
                                ->get();
                             $type_document = App\StageDocumentType::where('publier', 1)->where('designation_fr','LIKE', '%rapport%stage%')->first();

                             if($type_document){
                                $rapport = App\Rapport::where('stage_id', $data->id)
                                ->where('etat', 1)
                                ->where('stage_rapport_type_id', $type_document->id)
                                ->latest()->first();
                             }



                        @endphp
                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#nachdModal{{$data->id}}">
                            Liste des Documents
                        </button>

                        {{-- Single nachd modal --}}
                        <div class="modal modal-info fade" id="nachdModal{{$data->id}}" tabindex="-1" role="dialog">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <!-- Modal Header -->
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal"
                                            aria-label="{{ __('voyager::generic.close') }}">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        <h4 class="modal-title"><i class="voyager-file-text"></i> Liste des Documents</h4>
                                    </div>

                                    <!-- Modal Body -->
                                    <div class="modal-body">
                                        @if($rapports->count() > 0)
                                            <ul>

                                                @foreach($rapports as $data)
                                                    @php
                                                        $files = json_decode($data->rapport, true); // Decode JSON
                                                    @endphp
                                                    @if(is_array($files))
                                                        @foreach($files as $file)
                                                            <li>
                                                                <a href="{{ Voyager::image($file['download_link']) }}" target="_blank"> <i
                                                                        class="voyager-download"></i> {{ @$data->StageDocumentType->designation_fr }} :
                                                                    {{ $file['original_name'] }}</a>
                                                            </li>
                                                        @endforeach
                                                    @else
                                                        <li>Aucun fichier disponible</li>
                                                    @endif
                                                @endforeach
                                            </ul>
                                        @else
                                            <p>Aucun rapport autorisé trouvé.</p>
                                        @endif

                                        @if($rapport)
                                        <form action="{{ route('voyager.rapport_update', ['rapport_id' => $rapport->id]) }}" id="modal_form" method="POST" enctype="multipart/form-data">
                                            {{ csrf_field() }}

                                            <input type="text" name="rapport_id" value="{{ $rapport->id }}" hidden>
                                            <div class="form-group">
                                                <label>Plagiat File</label>
                                                <input type="file" name="plagiat_rapport" class="form-control">
                                            </div>


                                            <div class="form-group">
                                                <label>Note</label>
                                                <input type="text" name="plagiat_note" class="form-control" placeholder="Enter note...">
                                            </div>

                                            <!-- Authorization Checkbox -->

                                            {{-- <div class="form-group  col-md-12 ">
                                                <label class="control-label" for="name">Autorisation</label>
                                                <br>
                                                <div class="toggle btn btn-primary" data-toggle="toggle"
                                                    style="width: 125.422px; height: 29px;"><input type="checkbox" name="publier"
                                                        class="toggleswitch" data-on="Publier" checked="checked" data-off="Non Publier">
                                                    <div class="toggle-group"><label class="btn btn-primary toggle-on">Autorisé</label><label
                                                            class="btn btn-default active toggle-off">Non autorisé</label><span
                                                            class="toggle-handle btn btn-default"></span></div>
                                                </div>
                                            </div> --}}
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" name="etat" type="checkbox" role="switch" id="flexSwitchCheckDefault">
                                                <label class="form-check-label" for="flexSwitchCheckDefault">Autorisé</label>
                                            </div>
                                            <button type="submit" class="btn btn-info pull-right delete-confirm" form="modal_form">
                                                {{ __('voyager::generic.submit') }}
                                            </button>
                                        </form>
                                        @endif
                                    </div>
                                    <!-- Modal Footer -->
                                    <div class="modal-footer">

                                        <button type="button" class="btn btn-default pull-right" data-dismiss="modal">
                                            {{ __('voyager::generic.close') }}
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- Single nachd modal end --}}
                    @else
                    {{-- specific code nachd end --}}
                        @php
                            $string_values = implode(", ", $selected_values);
                            if (mb_strlen($string_values) > 25) {
                                $string_values = mb_substr($string_values, 0, 25) . '...';
                            }
                        @endphp
                        @if(empty($selected_values))
                            <p>{{ __('voyager::generic.no_results') }}</p>
                        @else
                            <p>{{ $string_values }}</p>
                        @endif

                    @endif
                @else
                    @if(empty($selected_values))
                        <p>{{ __('voyager::generic.no_results') }}</p>
                    @else
                        <ul>
                            @foreach($selected_values as $selected_value)
                                <li>{{ $selected_value }}</li>
                            @endforeach
                        </ul>
                    @endif
                @endif

            @else

                @php
                    $model = app($options->model);
                    $query = $model::where($options->column, '=', $dataTypeContent->{$options->key})->get();
                @endphp

                @if($query->isNotEmpty())
                    <ul>
                        @foreach($query as $query_res)
                            <li>{{ $query_res->{$options->label} }}</li>
                        @endforeach
                    </ul>
                @else
                    <p>{{ __('voyager::generic.no_results') }}</p>
                @endif

            @endif

        @elseif($options->type == 'belongsToMany')

            @if(isset($view) && ($view == 'browse' || $view == 'read'))

                @php
                    $relationshipData = (isset($data)) ? $data : $dataTypeContent;

                    $selected_values = isset($relationshipData) ? $relationshipData->belongsToMany($options->model, $options->pivot_table, $options->foreign_pivot_key ?? null, $options->related_pivot_key ?? null, $options->parent_key ?? null, $options->key)->get()->map(function ($item, $key) use ($options) {
                        return $item->{$options->label};
                    })->all() : array();
                @endphp

                @if($view == 'browse')
                    @php
                        $string_values = implode(", ", $selected_values);
                        if (mb_strlen($string_values) > 25) {
                            $string_values = mb_substr($string_values, 0, 25) . '...';
                        }
                    @endphp
                    @if(empty($selected_values))
                        <p>{{ __('voyager::generic.no_results') }}</p>
                    @else
                        <p>{{ $string_values }}</p>
                    @endif
                @else
                    @if(empty($selected_values))
                        <p>{{ __('voyager::generic.no_results') }}</p>
                    @else
                        <ul>
                            @foreach($selected_values as $selected_value)
                                <li>{{ $selected_value }}</li>
                            @endforeach
                        </ul>
                    @endif
                @endif

            @else
                <select class="form-control select2-ajax @if(isset($options->taggable) && $options->taggable === 'on') taggable @endif"
                    name="{{ $relationshipField }}[]" multiple
                    data-get-items-route="{{route('voyager.' . $dataType->slug . '.relation')}}" data-get-items-field="{{$row->field}}"
                    @if(!is_null($dataTypeContent->getKey())) data-id="{{$dataTypeContent->getKey()}}" @endif
                    data-method="{{ !is_null($dataTypeContent->getKey()) ? 'edit' : 'add' }}" @if(isset($options->taggable) && $options->taggable === 'on')
                        data-route="{{ route('voyager.' . \Illuminate\Support\Str::slug($options->table) . '.store') }}"
                    data-label="{{$options->label}}" data-error-message="{{__('voyager::bread.error_tagging')}}" @endif
                    @if($row->required == 1) required @endif>

                    @php
                        $selected_keys = [];

                        if (!is_null($dataTypeContent->getKey())) {
                            $selected_keys = $dataTypeContent->belongsToMany(
                                $options->model,
                                $options->pivot_table,
                                $options->foreign_pivot_key ?? null,
                                $options->related_pivot_key ?? null,
                                $options->parent_key ?? null,
                                $options->key
                            )->pluck($options->table . '.' . $options->key);
                        }
                        $selected_keys = old($relationshipField, $selected_keys);
                        $selected_values = app($options->model)->whereIn($options->key, $selected_keys)->pluck($options->label, $options->key);
                    @endphp

                    @if(!$row->required)
                        <option value="">{{__('voyager::generic.none')}}</option>
                    @endif

                    @foreach ($selected_values as $key => $value)
                        <option value="{{ $key }}" selected="selected">{{ $value }}</option>
                    @endforeach

                </select>

            @endif

        @endif
    @else
        cannot make relationship because {{ $options->model }} does not exist.
    @endif
@endif
