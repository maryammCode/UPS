@extends('voyager::master')

@section('page_title', __('voyager::generic.viewing') . ' ' . $dataType->getTranslatedAttribute('display_name_plural'))

@section('page_header')


<style>
    .filter_date{
        padding: 5px;
        border: 1px solid #c5c5c5;
    }
</style>


@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

@if(session('error'))
    <div class="alert alert-danger">
        <strong>Erreur :</strong> {{ session('error') }}
    </div>
@endif

@if($errors->any())
    <div class="alert alert-danger">
        <strong>Erreurs d'importation :</strong>
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if(session('failures') && session('failures')->isNotEmpty())
    <div class="alert alert-danger">
        <strong>Erreurs sur certaines lignes :</strong>
        <ul>
            @foreach(session('failures') as $failure)
                <li>
                    Ligne {{ $failure->row() }} : {{ implode(', ', $failure->errors()) }}
                </li>
            @endforeach
        </ul>
    </div>
@endif





{{-- script for alerts , do not touch the emplacement of the code --}}
<script>
    var importFailedRows = @json(session('failed_rows', 0));
    var imported_rows = @json(session('imported_rows', 0));
    var failed_relationship_rows = @json(session('failed_relationship_rows', 0));
</script>
    @php
        session()->forget('failed_rows');
        session()->forget('imported_rows');
        session()->forget('failed_relationship_rows');
    @endphp
    <link href="{{ asset('kendo/all.css') }}" rel="stylesheet" />

    <div class="container-fluid">
        <h1 class="page-title">
            <i class="{{ $dataType->icon }}"></i> {{ $dataType->getTranslatedAttribute('display_name_plural') }}

        </h1>
        @can('add', app($dataType->model_name))
            <a href="{{ route('voyager.' . $dataType->slug . '.create') }}" class="btn btn-success btn-add-new">
                <i class="voyager-plus"></i> <span>{{ __('voyager::generic.add_new') }}</span>
            </a>
        @endcan

        @can('delete', app($dataType->model_name))
            @include('voyager::partials.bulk-delete')
        @endcan
        @can('edit', app($dataType->model_name))
            @include('voyager::partials.bulk-publish')
        @endcan

        {{-- start modal import Excel --}}
        @can('add', app($dataType->model_name))

                <a href="#" data-toggle="modal" data-target="#modal_importation">
                    <button class="btn btn-warning" style="background-color: #ffc107"><i class="bi bi-pen"></i>Importer</button>
                </a>

        @endcan

        <div id="modal_importation" class="woocommerce xs-modal xs-modal-quick-view xs-quick-view-modal-detail modal fade"
            tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content" style="min-height: 210px; min-width: 665px;">
                    <div class="modal-header" style="background-color: #ffc107; color:#fff; border-radius: 4px;">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">×</span></button>
                        <h4 class="modal-title">
                            <i class="voyager-window-list"></i> <span></span>
                        </h4>
                    </div>
                    <div class="container" style="direction: ltr;">
                        <div class="row" style="flex-wrap: nowrap; margin-top:22px;">
                            <div class="timeline-steps aos-init aos-animate" data-aos="fade-up"
                                style="flex-direction:row-reverse; margin: 10px 30px">


                                <?php
                                if($dataType->required_columns){
                                    $requiredColumns = explode(';',$dataType->required_columns);
                                    if(count($requiredColumns)>0){
                                        echo "<b style='color : red'>Champs Obligatoires : </b>";
                                    }
                                    foreach($requiredColumns as $required_column){
                                        echo $required_column .' ';
                                    }
                                }
                                // $excel_path = json_decode(@$dataType->modele_excel);
                                // $model_excel = @$excel_path[0]->download_link;
                                ?>
                                @if($dataType->modele_excel && Storage::exists($dataType->modele_excel))
                                <a  href="{{ Voyager::image(@$dataType->modele_excel) }}" class="btn btn-primary"><i
                                        class="voyager-download"></i> &nbsp; Télécharger modèle Excel</a>

                                        @endif
                                <div >
                                    <form action=" {{ route('voyager.import', ['slug' => $dataType->slug]) }} "
                                        method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <label for="file">Choisir le fichier</label>
                                            <input type="file" name="file" class="form-control" style="padding-bottom: 40px;" required>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Importer</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{--  end modal import Excel --}}
        {{-- <input type="file" name="file">
        <a href="{{ route('voyager.' . $dataType->slug . '.create') }}" class="btn btn-warning btn-add-new">
            <i class="voyager-forward"></i> <span>Importation</span>
        </a> --}}

        <a href="{{ route('voyager.export', ['slug' => $dataType->slug]) }}" class="btn btn-info btn-add-new"
           >
            <i class="voyager-down-circled"></i> <span>Exporter</span>
        </a>

        @if ($dataType->slug == 'newsletters')
            <a href="#" data-toggle="modal" data-target="#modal_email">
                <button class="btn btn-warning" style="background-color: #353d47"><i class="bi bi-pen"></i>Envoyer un
                    Email</button>
            </a>
        @endif
        <div id="modal_email" class="woocommerce xs-modal xs-modal-quick-view xs-quick-view-modal-detail modal fade"
            tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content" style="min-height: 210px; min-width: 665px;">
                    <div class="modal-header" style="background-color: #353d47; color:#fff; border-radius: 4px;">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">×</span></button>
                        <h4 class="modal-title">
                            <i class="voyager-window-list"></i> <span></span>
                        </h4>
                    </div>
                    <div class="container" style="direction: ltr;">
                        <div class="row" style="flex-wrap: nowrap; margin-top:22px;">
                            <div class="timeline-steps aos-init aos-animate" data-aos="fade-up"
                                style="margin-top:23px; flex-direction:row-reverse;">
                                <div style="margin: 4%">
                                    <form action=" {{ route('voyager.env_newsletter') }} " method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <label for="file">Écrire votre email</label>
                                            <textarea name="message" rows="4" placeholder="Écrire" class="form-control"></textarea>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Envoyer</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @if(($dataType->slug == 'students-predefined-lists'))
            <button class="btn btn-info"  onclick="generateStages()"  >Créer les Stages </button>

        @endif

        @if(Auth::user()->role_id == 1)
            @php
                $bread_slug = str_replace('-' , '_' , $dataType->slug );
        $path_bread = route('voyager.dashboard').'/bread/'.$bread_slug."/edit";
        $path_db = route('voyager.dashboard').'/database/'.$bread_slug."/edit";
            @endphp
            <a href="{{$path_bread}}"> Bread </a>
            <a href="{{$path_db}}"> db </a>
        @endif

        @if($dataType->stats_columns != null && $dataType->stats_columns != '')
            <a href="#" data-toggle="modal" data-target="#modal_chart" style="margin-top: 2px;">
                    <span class="btn btn-dark" style="margin-top: 2px;"><i class="voyager-pie-graph"></i>&nbsp;Statistiques</span>
            </a>
            <div id="modal_chart" class="woocommerce xs-modal xs-modal-quick-view xs-quick-view-modal-detail modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content" style="min-height: 210px; min-width: 665px;">
                        <div class="modal-header" style="background-color: #22a7f0; color:#fff; border-radius: 4px;">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                            <h4 class="modal-title">
                                <i class="voyager-window-list"></i> <span>&emsp;Statistiques</span>
                            </h4>
                        </div>
                        <div class="container" style="direction: ltr;">
                        <div id="demo-output" style="margin-bottom: 1em;" class="chart-display"></div>

                        </div>
                    </div>
                </div>
            </div>

        @endif
        @if($dataType->statistiques_route != null && $dataType->statistiques_route != '')
            <a class="btn btn-warning" href="{{route($dataType->statistiques_route)}}" > Statistiques </a>
        @endif




        <div style="float: right ; margin-top : @if(@$current_year)20px @else 30px @endif" >
            <form action="{{route('voyager.'.$dataType->slug.'.index')}}">
            @if(@$current_year)
            @php
            $years = App\Year::all();
            @endphp

                <label>Année Universitaire</label>
            <select name="year_id" id="" class="form-control mt-4" required onchange="this.form.submit()">
                @foreach ($years as $year)
                    <option value="{{$year->id}}" @if($current_year == $year->id) selected  @endif>{{$year->designation}}</option>
                @endforeach
            </select>
            @elseif($from_filter_date && $to_filter_date)

                <label for="">De</label>
                <input type="date" class="filter_date" name="from_filter_date" value="{{$from_filter_date}}">
                <label for="">A</label>
                <input type="date" class="filter_date" name="to_filter_date" value="{{$to_filter_date}}">
                <button type="submit" class="btn btn-primary">Afficher</button>
            @endif
        </form>

        </div>


    </div>
    {{-- Importation & exportation btns end --}}
    @can('edit', app($dataType->model_name))
        @if (!empty($dataType->order_column) && !empty($dataType->order_display_column))
            <a href="{{ route('voyager.' . $dataType->slug . '.order') }}" class="btn btn-primary btn-add-new">
                <i class="voyager-list"></i> <span>{{ __('voyager::bread.order') }}</span>
            </a>
        @endif
    @endcan
    @can('delete', app($dataType->model_name))
        @if ($usesSoftDeletes)
            <input type="checkbox" @if ($showSoftDeleted) checked @endif id="show_soft_deletes"
                data-toggle="toggle" data-on="{{ __('voyager::bread.soft_deletes_off') }}"
                data-off="{{ __('voyager::bread.soft_deletes_on') }}">
        @endif
    @endcan

    @foreach ($actions as $action)
        @if (method_exists($action, 'massAction'))
            @include('voyager::bread.partials.actions', ['action' => $action, 'data' => null])
        @endif
    @endforeach


    @include('voyager::multilingual.language-selector')
@stop

@section('content')
    <style>
       /*  .sticky-col {
            position: -webkit-sticky;
            position: sticky;
            background: #fff;
        }

        .first-col {
            width: auto;

            right: 0px;
        } */
    </style>
    <div class="page-content browse container-fluid">
        @if($dataType->description && $dataType->description != '')
        <div class="card" style="padding:10px">
            <p style="color : #10235f">{!! $dataType->description !!}</p>
        </div>

        @endif
        @include('voyager::alerts')
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-bordered">
                    <div class="panel-body">

                        @if ($isServerSide)
                            <form method="get" class="form-search">
                                <div id="search-input">
                                    <div class="col-2">
                                        <select id="search_key" name="key">
                                            @foreach ($searchNames as $key => $name)
                                                <option value="{{ $key }}"
                                                    @if ($search->key == $key || (empty($search->key) && $key == $defaultSearchKey)) selected @endif>{{ $name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-2">
                                        <select id="filter" name="filter">
                                            <option value="contains" @if ($search->filter == 'contains') selected @endif>
                                                {{ __('voyager::generic.contains') }}</option>
                                            <option value="equals" @if ($search->filter == 'equals') selected @endif>=
                                            </option>
                                        </select>
                                    </div>
                                    <div class="input-group col-md-12">
                                        <input type="text" class="form-control"
                                            placeholder="{{ __('voyager::generic.search') }}" name="s"
                                            value="{{ $search->value }}">
                                        <span class="input-group-btn">
                                            <button class="btn btn-info btn-lg" type="submit">
                                                <i class="voyager-search"></i>
                                            </button>
                                        </span>
                                    </div>
                                </div>
                                @if (Request::has('sort_order') && Request::has('order_by'))
                                    <input type="hidden" name="sort_order" value="{{ Request::get('sort_order') }}">
                                    <input type="hidden" name="order_by" value="{{ Request::get('order_by') }}">
                                @endif
                            </form>
                        @endif
                        <div class="table-responsive" style="position: relative;" id="{{$dataType->slug}}">

                            <table id="grid" class="table table-hover">
                                <colgroup>
                                    <col />
                                    <col />
                                    <col style="width:110px" />
                                    <col style="width:120px" />
                                    <col style="width:130px" />
                                    <col style="width:130px" />
                                    <col style="width:130px" />
                                    <col style="width:130px" />
                                </colgroup>
                                <thead>
                                    <tr>


                                        @if ($showCheckboxColumn)

                                            <th class="dt-not-orderable" data-field="id" id="checkAll">
                                                <label for="check_all" style="color: transparent">select</label><br>
                                            </th>
                                        @endif
                                        <th class="actions  dt-not-orderable  k-table-th k-header k-filterable k-sticky" data-field="actions" data-title="actions" style="left: 0px;right: 0px;">
                                            {{ __('voyager::generic.actions') }} </th>
                                        @foreach ($dataType->browseRows as $row)


                                            <th data-field="{{ $row->getTranslatedAttribute('display_name') }}">
                                                @if ($isServerSide && in_array($row->field, $sortableColumns))
                                                    <a href="{{ $row->sortByUrl($orderBy, $sortOrder) }}">
                                                @endif
                                                {{ $row->getTranslatedAttribute('display_name') }}
                                                @if ($isServerSide)
                                                    @if ($row->isCurrentSortField($orderBy))
                                                        @if ($sortOrder == 'asc')
                                                            <i class="voyager-angle-up pull-right"></i>
                                                        @else
                                                            <i class="voyager-angle-down pull-right"></i>
                                                        @endif
                                                    @endif
                                                    </a>
                                                @endif
                                            </th>
                                        @endforeach


                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($dataTypeContent as $data)
                                        <tr>

                                            @if ($showCheckboxColumn)
                                                <td>
                                                    <input type="checkbox" name="row_id"
                                                        id="checkbox_{{ $data->getKey() }}"
                                                        value="{{ $data->getKey() }}">
                                                </td>
                                            @endif

                                            <td class="no-sort no-click bread-actions">
                                                @foreach ($actions as $action)
                                                    @if (!method_exists($action, 'massAction'))
                                                        @include('voyager::bread.partials.actions', [
                                                            'action' => $action,
                                                        ])
                                                    @endif
                                                @endforeach
                                            </td>

                                            @foreach ($dataType->browseRows as $row)
                                                @php
                                                    if ($data->{$row->field . '_browse'}) {
                                                        $data->{$row->field} = $data->{$row->field . '_browse'};
                                                    }
                                                @endphp

                                                @if($row->field == 'acceptation')
                                                <td><form action="{{ route('voyager.stage_acceptation') }}" method="POST">@csrf
                                                    <input name="stage_id" value="{{ $data->getKey() }}" type="hidden">
                                                    @if($data->{$row->field} == 1)
                                                    <button class="btn btn-primary" type="submit" name="acceptation" value="0">Rejeter</button>
                                                    @else
                                                    <button class="btn btn-success" type="submit" name="acceptation" value="1">Accepter</button>
                                                 @endif </form></td>
                                                @elseif($row->field == 'convention_file')
                                                    <td>
                                                        @if($data->{$row->field})

                                                                @if (json_decode($data->{$row->field}) !== null)
                                                                    @foreach (json_decode($data->{$row->field}) as $file)
                                                                        <a href="{{ Storage::disk(config('voyager.storage.disk'))->url($file->download_link) ?: '' }}"
                                                                            target="_blank" style="color: #0a547c ; font-weight: 600; text-decoration: underline;;">
                                                                            {{ $file->original_name ?: '' }}
                                                                        </a>
                                                                        <br />
                                                                    @endforeach

                                                                @endif

                                                           @else
                                                        <form action="{{ route('voyager.generate_convention') }}" method="POST">
                                                            @csrf
                                                            <input name="stage_id" value="{{ $data->getKey() }}" type="hidden">


                                                                <button class="btn btn-success" type="submit">Générer</button>

                                                        </form>
                                                        @endif
                                                    </td>
                                                @else

                                                @if (isset($row->details->view_browse))
                                                    <td>@include($row->details->view_browse, [
                                                            'row' => $row,
                                                            'dataType' => $dataType,
                                                            'dataTypeContent' => $dataTypeContent,
                                                            'content' => $data->{$row->field},
                                                            'view' => 'browse',
                                                            'options' => $row->details,
                                                    ])</td>
                                                    @elseif (isset($row->details->view))
                                                    <td>@include($row->details->view, [
                                                            'row' => $row,
                                                            'dataType' => $dataType,
                                                            'dataTypeContent' => $dataTypeContent,
                                                            'content' => $data->{$row->field},
                                                            'action' => 'browse',
                                                            'view' => 'browse',
                                                            'options' => $row->details,
                                                        ])</td>
                                                    @elseif($row->type == 'image')
                                                    <td><img src="@if (!filter_var($data->{$row->field}, FILTER_VALIDATE_URL)) {{ Voyager::image($data->{$row->field}) }}@else{{ $data->{$row->field} }} @endif"
                                                            style="width:100px"></td>
                                                    @elseif($row->type == 'relationship')
                                                    <td>@include('voyager::formfields.relationship', [
                                                            'view' => 'browse',
                                                            'options' => $row->details,
                                                        ])</td>
                                                    @elseif($row->type == 'select_multiple')
                                                        @if (property_exists($row->details, 'relationship'))
                                                        <td>@foreach ($data->{$row->field} as $item)
                                                                {{ $item->{$row->field} }}
                                                            @endforeach</td>
                                                        @elseif(property_exists($row->details, 'options'))
                                                            @if (!empty(json_decode($data->{$row->field})))
                                                            <td>@foreach (json_decode($data->{$row->field}) as $item)
                                                                    @if (@$row->details->options->{$item})
                                                                        {{ $row->details->options->{$item} . (!$loop->last ? ', ' : '') }}
                                                                    @endif
                                                                @endforeach</td>
                                                            @else
                                                            <td>{{ __('voyager::generic.none') }}</td>
                                                            @endif
                                                        @endif
                                                        {{-- problem multiple chekbox "$row->type == 'multiple_checkbox' &&" --}}
                                                    @elseif($row->type == 'multiple_checkbox' && property_exists($row->details, 'options'))
                                                        @if (is_array(json_decode($data->{$row->field}, true)) && @count(json_decode($data->{$row->field}, true)) > 0)
                                                        <td>@foreach (json_decode($data->{$row->field}) as $item)
                                                                @if (@$row->details->options->{$item})
                                                                    {{ $row->details->options->{$item} . (!$loop->last ? ', ' : '') }}
                                                                @endif</td>
                                                            @endforeach
                                                        @else
                                                        <td>{{ __('voyager::generic.none') }}</td>
                                                        @endif
                                                    @elseif(($row->type == 'select_dropdown' || $row->type == 'radio_btn') && property_exists($row->details, 'options'))
                                                    <td>{!! $row->details->options->{$data->{$row->field}} ?? '' !!}</td>
                                                    @elseif($row->type == 'date' || $row->type == 'timestamp')
                                                        @if (property_exists($row->details, 'format') && !is_null($data->{$row->field}))
                                                        <td>{{ \Carbon\Carbon::parse($data->{$row->field})->formatLocalized($row->details->format) }}</td>
                                                        @else
                                                        <td>{{ $data->{$row->field} }}</td>
                                                        @endif
                                                    @elseif($row->type == 'checkbox')
                                                        @if (property_exists($row->details, 'on') && property_exists($row->details, 'off'))
                                                            @if ($data->{$row->field})
                                                            <td><span
                                                                    class="label label-info">{{ $row->details->on }}</span></td>
                                                            @else
                                                                <td><span
                                                                    class="label label-primary">{{ $row->details->off }}</span></td>
                                                            @endif
                                                        @else
                                                            <td>{{ $data->{$row->field} }}</td>
                                                        @endif
                                                    @elseif($row->type == 'color')
                                                    <td><span class="badge badge-lg"
                                                            style="background-color: {{ $data->{$row->field} }}">{{ $data->{$row->field} }}</span></td>
                                                    @elseif($row->type == 'text')
                                                    <td>@include('voyager::multilingual.input-hidden-bread-browse'){{ mb_strlen($data->{$row->field}) > 200 ? mb_substr($data->{$row->field}, 0, 200) . ' ...' : $data->{$row->field} }}</td>
                                                    @elseif($row->type == 'text_area')
                                                        <td>@include('voyager::multilingual.input-hidden-bread-browse'){{ mb_strlen($data->{$row->field}) > 200 ? mb_substr($data->{$row->field}, 0, 200) . ' ...' : $data->{$row->field} }}</td>

                                                    @elseif($row->type == 'file' && !empty($data->{$row->field}))
                                                        @include('voyager::multilingual.input-hidden-bread-browse')
                                                        @if (json_decode($data->{$row->field}) !== null)
                                                            <td>@foreach (json_decode($data->{$row->field}) as $file)
                                                                <a href="{{ Storage::disk(config('voyager.storage.disk'))->url($file->download_link) ?: '' }}"
                                                                    target="_blank">
                                                                    {{ $file->original_name ?: '' }}
                                                                </a>
                                                                <br />
                                                            @endforeach</td>
                                                        @else
                                                            <td><a href="{{ Storage::disk(config('voyager.storage.disk'))->url($data->{$row->field}) }}"
                                                                target="_blank">
                                                                {{ __('voyager::generic.download') }}
                                                            </a></td>
                                                        @endif
                                                    @elseif($row->type == 'rich_text_box')
                                                        @include('voyager::multilingual.input-hidden-bread-browse')
                                                        <td>{{ mb_strlen(strip_tags($data->{$row->field}, '<b><i><u>')) > 200 ? mb_substr(strip_tags($data->{$row->field}, '<b><i><u>'), 0, 200) . ' ...' : strip_tags($data->{$row->field}, '<b><i><u>') }}</td>

                                                    @elseif($row->type == 'coordinates')
                                                        <td>@include('voyager::partials.coordinates-static-image')</td>
                                                    @elseif($row->type == 'multiple_images')
                                                    <td>
                                                        @php $images = json_decode($data->{$row->field}); @endphp
                                                        @if ($images)
                                                            @php $images = array_slice($images, 0, 3); @endphp
                                                            @foreach ($images as $image)
                                                                <img src="@if (!filter_var($image, FILTER_VALIDATE_URL)) {{ Voyager::image($image) }}@else{{ $image }} @endif"
                                                                    style="width:50px">
                                                            @endforeach
                                                        @endif
                                                    </td>
                                                    @elseif($row->type == 'media_picker')
                                                    <td>
                                                        @php
                                                            if (is_array($data->{$row->field})) {
                                                                $files = $data->{$row->field};
                                                            } else {
                                                                $files = json_decode($data->{$row->field});
                                                            }
                                                        @endphp
                                                        @if ($files)
                                                            @if (property_exists($row->details, 'show_as_images') && $row->details->show_as_images)
                                                                @foreach (array_slice($files, 0, 3) as $file)
                                                                    <img src="@if (!filter_var($file, FILTER_VALIDATE_URL)) {{ Voyager::image($file) }}@else{{ $file }} @endif"
                                                                        style="width:50px">
                                                                @endforeach
                                                            @else
                                                                <ul>
                                                                    @foreach (array_slice($files, 0, 3) as $file)
                                                                        <li>{{ $file }}</li>
                                                                    @endforeach
                                                                </ul>
                                                            @endif
                                                            @if (count($files) > 3)
                                                                {{ __('voyager::media.files_more', ['count' => count($files) - 3]) }}
                                                            @endif
                                                        @elseif (is_array($files) && count($files) == 0)
                                                            {{ trans_choice('voyager::media.files', 0) }}
                                                        @elseif ($data->{$row->field} != '')
                                                            @if (property_exists($row->details, 'show_as_images') && $row->details->show_as_images)
                                                                <img src="@if (!filter_var($data->{$row->field}, FILTER_VALIDATE_URL)) {{ Voyager::image($data->{$row->field}) }}@else{{ $data->{$row->field} }} @endif"
                                                                    style="width:50px">
                                                            @else
                                                                {{ $data->{$row->field} }}
                                                            @endif
                                                        @else
                                                            {{ trans_choice('voyager::media.files', 0) }}
                                                        @endif
                                                    </td>
                                                    @else
                                                        @include('voyager::multilingual.input-hidden-bread-browse')
                                                        <td>{{ $data->{$row->field} }}</td>
                                                    @endif
                                                    @endif
                                            @endforeach

                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        @if ($isServerSide)
                            <div class="pull-left">
                                <div role="status" class="show-res" aria-live="polite">
                                    {{ trans_choice('voyager::generic.showing_entries', $dataTypeContent->total(), [
                                        'from' => $dataTypeContent->firstItem(),
                                        'to' => $dataTypeContent->lastItem(),
                                        'all' => $dataTypeContent->total(),
                                    ]) }}
                                </div>
                            </div>
                            <div class="pull-right">
                                {{ $dataTypeContent->appends([
                                        's' => $search->value,
                                        'filter' => $search->filter,
                                        'key' => $search->key,
                                        'order_by' => $orderBy,
                                        'sort_order' => $sortOrder,
                                        'showSoftDeleted' => $showSoftDeleted,
                                    ])->links() }}
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

    </div>

    {{-- Single delete modal --}}
    <div class="modal modal-danger fade" tabindex="-1" id="delete_modal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"
                        aria-label="{{ __('voyager::generic.close') }}"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title"><i class="voyager-trash"></i> {{ __('voyager::generic.delete_question') }}
                        {{ strtolower($dataType->getTranslatedAttribute('display_name_singular')) }}?</h4>
                </div>
                <div class="modal-footer">
                    <form action="#" id="delete_form" method="POST">
                        {{ method_field('DELETE') }}
                        {{ csrf_field() }}
                        <input type="submit" class="btn btn-danger pull-right delete-confirm"
                            value="{{ __('voyager::generic.delete_confirm') }}">
                    </form>
                    <button type="button" class="btn btn-default pull-right"
                        data-dismiss="modal">{{ __('voyager::generic.cancel') }}</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
@stop

@section('css')
    @if (!$dataType->server_side && config('dashboard.data_tables.responsive'))
        <link rel="stylesheet" href="{{ voyager_asset('lib/css/responsive.dataTables.min.css') }}">
    @endif
@stop

@section('javascript')

    <!-- DataTables -->
    {{-- @if (!$dataType->server_side && config('dashboard.data_tables.responsive'))
        <script src="{{ voyager_asset('lib/js/dataTables.responsive.min.js') }}"></script>
        @endif
        --}}
    <script>
        $(document).ready(function() {


           /*  @if (!$dataType->server_side)
                var table = $('#dataTable').DataTable({!! json_encode(
                    array_merge(
                        [
                            'order' => $orderColumn,
                            'language' => __('voyager::datatable'),
                            'columnDefs' => [['targets' => 'dt-not-orderable', 'searchable' => false, 'orderable' => false]],
                        ],
                        config('voyager.dashboard.data_tables', []),
                    ),
                    true,
                ) !!});
            @else
                $('#search-input select').select2({
                    minimumResultsForSearch: Infinity
                });
            @endif */


        });



    </script>


    <script src="{{ asset('kendo/all.js') }}"></script>

<script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/buttons/3.1.2/js/dataTables.buttons.js"></script>
<script src="https://cdn.datatables.net/buttons/3.1.2/js/buttons.bootstrap5.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/3.1.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/3.1.2/js/buttons.print.min.js"></script>

<style>
    .dt-layout-row{
        display: flex;
        justify-content: space-between;
    }

    .dt-input{
        border: 1px solid #ddd;
    }
    .dt-buttons button{
        margin-right : 5px
    }

</style>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script>
         var dataType = {!! json_encode($dataType) !!};
         var dataTypeContentCount = {!! $dataTypeContent->count() !!}
        var groups = []
        var slug = '{{$dataType->slug}}'
        if(slug == 'absences'){
            groups = [{ field: "Date", dir: "desc"} , { field: "Group Td Designation", dir: "asc"} , { field: "Subject Designation", dir: "asc"}, { field: "Status", dir: "desc"}]
            $('.k-grid .k-grid-header .k-table').css('table-layout' , 'auto')
        }/* else{
            groups = [{ field: "Publier", dir: "desc"} ]
            $('.k-grid .k-grid-header .k-table').css('table-layout' , 'auto')
        } */
        $(document).ready(function() {
            if(dataTypeContentCount >0){
                var table = $('#grid').DataTable({
            paging: false,
            info: false,
            layout: {
                topStart: {
                    buttons: ['copy', 'csv', 'excel', 'pdf', 'print' ,   {
                    extend: 'pdfHtml5',
                    orientation: 'landscape',
                    pageSize: 'LEGAL' , text :'PDF H'
                 } ]
                }
            }
        });
            }

            const headerCells = document.querySelectorAll("#grid thead tr th");
            $("#grid").kendoGrid({

              columnMenu: {
                    filterable: true
                },
                            toolbar: ["excel" , "pdf"],
            excel: {
                fileName: "Kendo UI Grid Export.xlsx"
            },pdf: {
                allPages: true
            },

                dataSource: {
                    pageSize: 20,
                    group:groups,


                },
                pageable: {
                    refresh: true,
                    pageSizes: true,
                    buttonCount: 5
                },
                sortable: true,
                reordable : true,
                resizable : true,
                groupable: true,
                width: 'auto',

                filterable: {
                    mode: "row",
                    operators: {
                        string: {
                            contains: 'Contient',
                            eq: 'Egal'
                        }
                    }
                }

            });


            var grid = $("#grid").data("kendoGrid");
            console.log(grid)

                var newOptions = $.extend({}, grid.getOptions());
                newOptions.columns[0].width = "30px";
                newOptions.columns[1].width = "120px";
                // grid.setOptions(newOptions);


                    $('.k-filter-row td:first-child').html('<input type="checkbox" class="select_all" id="check_all">')
                    $('.k-filter-row td:nth-child(2)').html('')

            // $('#check_all').on('change', function(e) {
            //     console.log('heyyy')
            //     $('input[name="row_id"]').prop('checked', $(this).prop('checked')).trigger('change');
            // });

            @if ($isModelTranslatable)
                $('.side-body').multilingual();
                //Reinitialise the multilingual features when they change tab
                $('#dataTable').on('draw.dt', function(){
                    $('.side-body').data('multilingual').init();
                })
            @endif
            $('.select_all').on('click', function(e) {
                console.log('heyyy')
                $('input[name="row_id"]').prop('checked', $(this).prop('checked')).trigger('change');
            });

            var deleteFormAction;
        $('td').on('click', '.delete', function (e) {
            $('#delete_form')[0].action = '{{ route('voyager.'.$dataType->slug.'.destroy', '__id') }}'.replace('__id', $(this).data('id'));
            $('#delete_modal').modal('show');
        });

        @if($usesSoftDeletes)
            @php
                $params = [
                    's' => $search->value,
                    'filter' => $search->filter,
                    'key' => $search->key,
                    'order_by' => $orderBy,
                    'sort_order' => $sortOrder,
                ];
            @endphp
            $(function() {
                $('#show_soft_deletes').change(function() {
                    if ($(this).prop('checked')) {
                        $('#dataTable').before('<a id="redir" href="{{ (route('voyager.'.$dataType->slug.'.index', array_merge($params, ['showSoftDeleted' => 1]), true)) }}"></a>');
                    }else{
                        $('#dataTable').before('<a id="redir" href="{{ (route('voyager.'.$dataType->slug.'.index', array_merge($params, ['showSoftDeleted' => 0]), true)) }}"></a>');
                    }

                    $('#redir')[0].click();
                })
            })
        @endif
        $('input[name="row_id"]').on('change', function () {
            var ids = [];
            $('input[name="row_id"]').each(function() {
                if ($(this).is(':checked')) {
                    ids.push($(this).val());
                }
            });
            $('.selected_ids').val(ids);
        });



        if(dataType.stats_columns && dataType.stats_columns != ""){
                    chart_data  = dataType.stats_columns.split(',');
                    console.log(chart_data);
                    chart_desc = chart_data[0];
                    chart_type = chart_data.length > 1 ? chart_data[1] : 'pie';


                    const columnIndex = Array.from(headerCells).findIndex(cell => cell.textContent.trim() === chart_desc);
                    if(columnIndex && columnIndex != -1){


                var chart = Highcharts.chart('demo-output', {
                    chart: {
                        type: chart_type,

                    },
                    title: {
                        text: dataType.display_name_plural + ' par '+ chart_desc
                    },

                    series: [
                        {
                            name: chart_desc,
                            data: chartData(table , columnIndex)
                        }
                    ],
                    accessibility: {
                        enabled: false
                    }
                });
            }
        }

    });

    function chartData(table , columnIndex) {

        var counts = {};
        table
            .column(columnIndex, { search: 'applied' })
            .data()
            .each(function (val) {
                if (counts[val]) {
                    counts[val] += 1;
                }
                else {
                    counts[val] = 1;
                }
            });

        // And map it to the format highcharts uses
            return $.map(counts, function (val, key) {
                return {
                    name: key + ' (' + val + ')',
                    y: val
                };
            });
    }
    // call route with ajax
    //codium : get ajax

    function generateStages(){
        var appURL = '{{env('APP_URL')}}'
    var generateStagesEndPoint= appURL+'/admin/predefined-generate-stages';
    console.log(appURL)
    $.ajax({
    type: 'POST',
    url: generateStagesEndPoint,
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    success: function(response) {
        console.log(response);
        var msgsuccess = response.inserted_rows + ' Stage(s) crée(s) <br> ';
        if(response.exist_count >0) msgsuccess+= response.exist_count+' stage(s) existe(s)';
        toastr.success(msgsuccess);

        if(response.failed_rows >0) toastr.error('Echec : '+response.failed_rows);
        if(response.user_not_found >0) toastr.info(response.user_not_found+' compte()s etudiants non trouvé(s)');
        if(response.stage_type_notfound >0) toastr.warning(response.stage_type_notfound+' avec un type de stage non définie');

    },
    error : function(err){
        toastr.warning('Année universitaire non trouvée');
    }

});
    }


   
    if(importFailedRows>0){

        toastr.error(importFailedRows +' Ligne(s) non insérée(s)')
    }
    if(failed_relationship_rows>0){
        toastr.warning(failed_relationship_rows +' Affectation(s) non insérée(s)')
    }
    if(imported_rows>0){
        toastr.success(imported_rows +' ligne(s) insérée(s) avec succées')
    }


</script>
{{-- <style>
        #grid td:first-child , .k-filter-row td:first-child , .k-table-thead th:first-child {
                position: sticky;
                right: 0;
                background-color: white;
                z-index: 2;
                left: 0;
                width : 30px
            }

        </style> --}}

@stop
