@extends('voyager::master')
<?php
    $dataType = Voyager::model('DataType')->where('slug', '=', "nachd-formulaire-requests")->first();
    $dataTypeContent = (strlen($dataType->model_name) != 0) ? new $dataType->model_name() : false;
    $isModelTranslatable = is_bread_translatable($dataTypeContent);
?>
@section('page_title', @$formulaire_info->name_fr)

@section('page_header')
    <div class="container-fluid">
        <h1 class="page-title">
            <i class="{{ $dataType->icon }}"></i> {{ $dataType->display_name_plural }} : {{ @$formulaire_info->name_fr }}
        </h1>
        @can('delete', app($dataType->model_name))
            @include('voyager::partials.bulk-delete')
        @endcan
        @can('edit', app($dataType->model_name))
            @if(isset($dataType->order_column) && isset($dataType->order_display_column))
                <a href="{{ route('voyager.'.$dataType->slug.'.order') }}" class="btn btn-primary">
                    <i class="voyager-list"></i> <span>{{ __('voyager::bread.order') }}</span>
                </a>
            @endif
        @endcan
        <a href="{{ url('downloadExcel/form_'.@$formulaire_info->name_fr.'/xls') }}"><button class="btn btn-success">Download Excel</button></a>
        @include('voyager::multilingual.language-selector')
    </div>
@stop

@section('content')
    <div class="page-content browse container-fluid">
        @include('voyager::alerts')
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-bordered">
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table id="dataTable" class="table table-hover">
                                <thead>
                                    <tr>
                                        <th><input type="checkbox" class="select_all"></th>
                                        <th><center>#</center></th>
                                        <th>Date</th>
                                        <?php
                                            $all_form_inputs_array = App\NachdFormulaireInput::
                                            join('nachd_inputs', 'nachd_formulaire_inputs.nachd_input_id', 'nachd_inputs.id')
                                            ->where('nachd_formulaire_inputs.nachd_formulaire_id', @$formulaire_info->id)
                                            ->select('nachd_inputs.label_fr')
                                            ->orderby('nachd_formulaire_inputs.ordre')
                                            ->get()->toArray();
                                            $liste_inputs = array();
                                            $k = 0;
                                            foreach ($all_form_inputs_array as $tab_val) {
                                                $liste_inputs[$k++] = $tab_val['label_fr'];
                                            }
                                        ?>
                                        @foreach($liste_inputs as $input)
                                            <th>{{ $input }}</th>
                                        @endforeach
                                        <th>Auteur</th>
                                        <!--<th>Tentative</th>-->
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $all_nachd_tentatives = App\NachdFormulaireRequest::
                                        join('nachd_tentatives', 'nachd_formulaire_requests.nachd_tentative_id', 'nachd_tentatives.id')
                                        ->where('nachd_formulaire_requests.nachd_formulaire_id', @$formulaire_info->id)
                                        ->select(
                                            'nachd_tentatives.id',
                                            'nachd_tentatives.tentative',
                                            'nachd_tentatives.author_id',
                                            'nachd_tentatives.confirmation',
                                            'nachd_tentatives.created_at',
                                            'nachd_tentatives.date_acceptation',
                                            'nachd_tentatives.date_reception'
                                        )
                                        ->orderBy('nachd_tentatives.created_at', 'desc')->distinct()->get()->toArray();
                                    ?>
                                    @foreach ($all_nachd_tentatives as $tentative)
                                        <?php
                                            $all_requests = App\NachdFormulaireRequest::
                                            join('nachd_tentatives', 'nachd_formulaire_requests.nachd_tentative_id', 'nachd_tentatives.id')
                                            ->join('nachd_inputs', 'nachd_formulaire_requests.nachd_input_id', 'nachd_inputs.id')
                                            ->where('nachd_formulaire_requests.nachd_formulaire_id', @$formulaire_info->id)
                                            ->where('nachd_tentatives.tentative', @$tentative['tentative'])
                                            ->select(
                                                'nachd_formulaire_requests.id',
                                                'nachd_formulaire_requests.value',
                                                'nachd_inputs.label_fr',
                                                'nachd_inputs.zone',
                                                'nachd_inputs.type',
                                                'nachd_inputs.model_bd'
                                            )
                                            ->get()->groupBy('nachd_tentatives.tentative')->toArray();
                                            $diff_col = 0;
                                        ?>
                                        <tr>
                                            <td><input type="checkbox" name="row_id" id="checkbox_{{ @$tentative['tentative'] }}" value="{{ @$tentative['tentative'] }}"></td>
                                            <td><a target="_blank" href="{{ route('voyager.print_request_formulaires', ['from' => 'super_admin', 'formulaire_id' => @$formulaire_info->id, 'tentative' => @$tentative['tentative'] ]) }}"><img src="{{ voyager::image( setting('admin.print_icon') ) }}" style="width: 48px;height: 48px;"></a></td>
                                            <td>
                                                <b>Enregistrée le {{ date('d_m_Y_H:i:s', strtotime(@$tentative['created_at'])) }}</b>
                                                @if($formulaire_info->decision == '1')
                                                    @if(@$tentative['confirmation'] != '1')
                                                        <a href="{{ route('voyager.traitement_formulaire_request', ['tentative' => @$tentative['tentative'], 'action' => 'ok']) }}" title="Confirmer Réponse" class="btn btn-sm btn-success pull-right edit">
                                                            <i class="voyager-edit"></i> <span class="hidden-xs hidden-sm">Traiter</span>
                                                        </a>
                                                    @elseif(@$tentative['confirmation'] == '1')
                                                        <br><b>Traitée le <span style="color: #2caa73;">{{ date('d_m_Y_H:i:s', strtotime(@$tentative['date_acceptation'])) }}</span></b>
                                                        @if(!@$tentative['date_reception'])
                                                            <a href="{{ route('voyager.traitement_formulaire_request', ['tentative' => @$tentative['tentative'], 'action' => 'ko']) }}" title="Réfuser Réponse" class="btn btn-sm btn-danger pull-right edit">
                                                                <i class="voyager-edit"></i> <span class="hidden-xs hidden-sm">Annuler traitement</span>
                                                            </a>
                                                            <a href="{{ route('voyager.reception_formulaire_request', ['tentative' => @$tentative['tentative']]) }}" title="Réception Réponse" class="btn btn-sm btn-success pull-right edit">
                                                                <i class="voyager-receipt"></i> <span class="hidden-xs hidden-sm">à récupérer</span>
                                                            </a>
                                                        @else
                                                            <br><b>Doc. récupéré le <span style="color: #fa2a00;">{{ date('d_m_Y_H:i:s', strtotime(@$tentative['date_reception'])) }}</span></b>
                                                        @endif
                                                    @endif
                                                @endif
                                            </td>
                                            @foreach($liste_inputs as $input)
                                                @foreach($all_requests as $request_info)
                                                    <?php $j = 0; $etat = 0; ?>
                                                    @while($j <= count(@$request_info) -1 )
                                                        @if($input == @$request_info[$j]['label_fr'])
                                                            @if( @$request_info[$j]['zone'] == 'input' && (@$request_info[$j]['type'] == 'file' || @$request_info[$j]['type'] == 'image'))
                                                                <?php $info = new SplFileInfo($request_info[$j]['value']); ?>
                                                                <td>
                                                                    <a target="_blank" href="@if( @$request_info[$j]['value'] && !filter_var(@$request_info[$j]['value'], FILTER_VALIDATE_URL)){{ Voyager::image(@$request_info[$j]['value']) }}@else{{ @$request_info[$j]['value'] }}@endif">
                                                                        @if($info->getExtension() == 'png' || $info->getExtension() == 'jpg' || $info->getExtension() == 'jpeg' || $info->getExtension() == 'svg' || $info->getExtension() == 'gif')
                                                                           <img src="{{ Voyager::image(@$request_info[$j]['value']) }}" style="width: 100px; height: 100px;">
                                                                        @else
                                                                            Pièce jointe
                                                                        @endif
                                                                    </a>
                                                                </td>
                                                            @elseif( @$request_info[$j]['zone'] == 'input' && (@$request_info[$j]['type'] == 'multiple_file' || @$request_info[$j]['type'] == 'multiple_image'))
                                                                <td>
                                                                    @if(@$request_info[$j]['value'])
                                                                        @if(json_decode(@$request_info[$j]['value']) !== null)
                                                                            @foreach(json_decode(@$request_info[$j]['value']) as $file)
                                                                                <?php $ext = pathinfo(@$file->original_name, PATHINFO_EXTENSION); ?>
                                                                                <a class="fileType" target="_blank" href="{{ Storage::disk(config('voyager.storage.disk'))->url(@$file->download_link) ?: '' }}" data-file-name="{{ @$file->original_name }}">
                                                                                    <div class="img_settings_container" style="float:left;padding-right:15px;">
                                                                                        @if($ext == 'ico' || $ext == 'avg' || $ext == 'jpg' || $ext == 'png' || $ext == 'gif' || $ext == 'jpeg')
                                                                                            <img src="{{Voyager::image(@$file->download_link)}}" data-image="{{ @$file->original_name }}" style="width: 65px;height: 65px;clear:both; display:block; padding:2px; border:1px solid #ddd;margin-top: -10px;">
                                                                                        @elseif($ext == 'pdf')
                                                                                            <img src="{{ asset('assets/images/icon_pdf.png') }}" style="width: 65px;height: 65px;clear:both; display:block; padding:2px; border:1px solid #ddd;margin-top: -10px;">
                                                                                        @elseif($ext == 'doc' || $ext == 'docm' || $ext == 'docx')
                                                                                            <img src="{{ asset('assets/images/icon_word.png') }}" style="width: 65px;height: 65px;clear:both; display:block; padding:2px; border:1px solid #ddd;margin-top: -10px;">
                                                                                        @elseif($ext == 'xlt' || $ext == 'xltx' || $ext == 'xls' || $ext == 'xlsx')
                                                                                            <img src="{{ asset('assets/images/icon_excel.png') }}" style="width: 65px;height: 65px;clear:both; display:block; padding:2px; border:1px solid #ddd;margin-top: -10px;">
                                                                                        @elseif($ext == 'ptt' || $ext == 'pptx')
                                                                                            <img src="{{ asset('assets/images/icon_pptx.png') }}" style="width: 65px;height: 65px;clear:both; display:block; padding:2px; border:1px solid #ddd;margin-top: -10px;">
                                                                                        @else
                                                                                            <img src="{{ asset('assets/images/icon_file.png') }}" style="width: 65px;height: 65px;clear:both; display:block; padding:2px; border:1px solid #ddd;margin-top: -10px;">
                                                                                        @endif
                                                                                    </div>
                                                                                </a>
                                                                            @endforeach
                                                                        @else
                                                                            <?php $file = @$request_info[$j]['value']; ?>
                                                                            <div data-field-name="{{ $file }}">
                                                                                <a class="fileType" target="_blank" href="{{ Storage::disk(config('voyager.storage.disk'))->url($file) }}" data-file-name="{{ $file }}">
                                                                                    <div class="img_settings_container" style="float:left;padding-right:15px;">
                                                                                        <?php $ext = pathinfo(@$file, PATHINFO_EXTENSION); ?>
                                                                                        @if($ext == 'ico' || $ext == 'avg' || $ext == 'jpg' || $ext == 'png' || $ext == 'gif' || $ext == 'jpeg')
                                                                                            <img src="{{ Voyager::image(@$file)}}" data-image="{{ @$file }}" style="width: 65px;height: 65px;clear:both; display:block; padding:2px; border:1px solid #ddd;margin-top: -10px;">
                                                                                        @elseif($ext == 'pdf')
                                                                                            <img src="{{ asset('assets/images/icon_pdf.png') }}" style="width: 65px;height: 65px;clear:both; display:block; padding:2px; border:1px solid #ddd;margin-top: -10px;">
                                                                                        @elseif($ext == 'doc' || $ext == 'docm' || $ext == 'docx')
                                                                                            <img src="{{ asset('assets/images/icon_word.png') }}" style="width: 65px;height: 65px;clear:both; display:block; padding:2px; border:1px solid #ddd;margin-top: -10px;">
                                                                                        @elseif($ext == 'xlt' || $ext == 'xltx' || $ext == 'xls' || $ext == 'xlsx')
                                                                                            <img src="{{ asset('assets/images/icon_excel.png') }}" style="width: 65px;height: 65px;clear:both; display:block; padding:2px; border:1px solid #ddd;margin-top: -10px;">
                                                                                        @elseif($ext == 'ptt' || $ext == 'pptx')
                                                                                            <img src="{{ asset('assets/images/icon_pptx.png') }}" style="width: 65px;height: 65px;clear:both; display:block; padding:2px; border:1px solid #ddd;margin-top: -10px;">
                                                                                        @else
                                                                                            <img src="{{ asset('assets/images/icon_file.png') }}" style="width: 65px;height: 65px;clear:both; display:block; padding:2px; border:1px solid #ddd;margin-top: -10px;">
                                                                                        @endif
                                                                                    </div>
                                                                                </a>
                                                                            </div>
                                                                        @endif
                                                                    @endif
                                                                </td>
                                                            @elseif( @$request_info[$j]['zone'] == 'checkbox')
                                                                <?php $options = explode(';', @$request_info[$j]['value']); ?>
                                                                <td>
                                                                @for($i = 0; $i < count($options); $i++)
                                                                    <label>{{ @$options[$i] }}</label><br>
                                                                @endfor
                                                                </td>
                                                            @elseif( @$request_info[$j]['zone'] == 'select_multiple')
                                                                <?php $options = explode(',', @$request_info[$j]['value']); ?>
                                                                <td>
                                                                @for($i = 0; $i < count($options)-1; $i++)
                                                                    <label>{{ @$options[$i] }}</label><br>
                                                                @endfor
                                                                </td>
                                                            @elseif(@$request_info[$j]['zone'] == 'relationship_multiple')
                                                                <?php $options = explode(',', @$request_info[$j]['value']); ?>
                                                                <td>
                                                                @if(count($options) > 1)
                                                                    @for($i = 0; $i < count($options)-1; $i++)
                                                                        <?php
                                                                            $modele = $request_info[$j]['model_bd'];
                                                                            if($modele == 'App\Teacher'){
                                                                                $data = $modele::join('users', 'teachers.id', 'users.id')->where('users.id', @$options[$i])->select('users.name as information')->first();
                                                                            }elseif($modele == 'App\Student'){
                                                                                $data = $modele::join('users', 'students.id', 'users.id')->where('users.id', @$options[$i])->select('users.name as information')->first();
                                                                            }elseif($modele == 'App\Groupe'){
                                                                                $data = $modele::where('id', @$options[$i])->select('designation as information')->first();
                                                                            }elseif($modele == 'App\Sousgroupe'){
                                                                                $data = $modele::where('id', @$options[$i])->select('designation as information')->first();
                                                                            }elseif($modele == 'App\Sousgroupetp'){
                                                                                $data = $modele::where('id', @$options[$i])->select('designation as information')->first();
                                                                            }else{
                                                                                $data = $modele::where('id', @$options[$i])->select('id as information')->first();
                                                                            }
                                                                        ?>
                                                                        <label>{{ @$data->information }}</label><br>
                                                                    @endfor
                                                                @else
                                                                    @if($request_info[$j]['label_fr'] == 'Groupe')
                                                                        <?php $groupe_info = App\Groupe::where('id', @$request_info[$j]['value'])->first(); ?>
                                                                        {{ @$groupe_info->designation }}
                                                                    @elseif($request_info[$j]['label_fr'] == 'Groupe (Etudiant 2)')
                                                                        <?php $groupe_info = App\Groupe::where('id', @$request_info[$j]['value'])->first(); ?>
                                                                        {{ @$groupe_info->designation }}
                                                                    @elseif($request_info[$j]['label_fr'] == 'Groupe TD')
                                                                        <?php $groupe_td_info = App\Sousgroupe::where('id', @$request_info[$j]['value'])->first(); ?>
                                                                        {{ @$groupe_td_info->designation }}
                                                                    @elseif($request_info[$j]['label_fr'] == 'Groupe TP')
                                                                        <?php $groupe_td_info = App\Sousgroupetp::where('id', @$request_info[$j]['value'])->first(); ?>
                                                                        {{ @$groupe_td_info->designation }}
                                                                    @elseif($request_info[$j]['label_fr'] == 'Spécialité')
                                                                        <?php $specialite_info = App\Specialite::where('id', @$request_info[$j]['value'])->first(); ?>
                                                                        {{ @$specialite_info->designation }}
                                                                    @elseif($request_info[$j]['label_fr'] == 'Spécialité (Etudiant 2)')
                                                                        <?php $specialite_info = App\Specialite::where('id', @$request_info[$j]['value'])->first(); ?>
                                                                        {{ @$specialite_info->designation }}
                                                                    @elseif($request_info[$j]['label_fr'] == 'Membre 4' || $request_info[$j]['label_fr'] == 'Membre 3' || $request_info[$j]['label_fr'] == 'Membre 2' || $request_info[$j]['label_fr'] == 'Membre 1' || $request_info[$j]['label_fr'] == 'Encadrant du club')
                                                                        <?php $user_info = TCG\Voyager\Models\User::where('id', @$request_info[$j]['value'])->first(); ?>
                                                                        {{ @$user_info->name }}
                                                                    @elseif($request_info[$j]['label_fr'] == 'Année Universitaire')
                                                                        <?php $year_info = App\Year::where('id', @$request_info[$j]['value'])->first(); ?>
                                                                        {{ @$year_info->designation }}
                                                                    @else
                                                                        {{ @$request_info[$j]['value'] }}
                                                                    @endif
                                                                @endif
                                                                </td>
                                                            @else
                                                                <td>
                                                                    @if($request_info[$j]['label_fr'] == 'Groupe')
                                                                        <?php $groupe_info = App\Groupe::where('id', @$request_info[$j]['value'])->first(); ?>
                                                                        {{ @$groupe_info->designation }}
                                                                    @elseif($request_info[$j]['label_fr'] == 'Groupe (Etudiant 2)')
                                                                        <?php $groupe_info = App\Groupe::where('id', @$request_info[$j]['value'])->first(); ?>
                                                                        {{ @$groupe_info->designation }}
                                                                    @elseif($request_info[$j]['label_fr'] == 'Groupe TD')
                                                                        <?php $groupe_td_info = App\Sousgroupe::where('id', @$request_info[$j]['value'])->first(); ?>
                                                                        {{ @$groupe_td_info->designation }}
                                                                    @elseif($request_info[$j]['label_fr'] == 'Groupe TP')
                                                                        <?php $groupe_td_info = App\Sousgroupetp::where('id', @$request_info[$j]['value'])->first(); ?>
                                                                        {{ @$groupe_td_info->designation }}
                                                                    @elseif($request_info[$j]['label_fr'] == 'Spécialité')
                                                                        <?php $specialite_info = App\Specialite::where('id', @$request_info[$j]['value'])->first(); ?>
                                                                        {{ @$specialite_info->designation }}
                                                                    @elseif($request_info[$j]['label_fr'] == 'Spécialité (Etudiant 2)')
                                                                        <?php $specialite_info = App\Specialite::where('id', @$request_info[$j]['value'])->first(); ?>
                                                                        {{ @$specialite_info->designation }}
                                                                    @elseif($request_info[$j]['label_fr'] == 'Membre 4' || $request_info[$j]['label_fr'] == 'Membre 3' || $request_info[$j]['label_fr'] == 'Membre 2' || $request_info[$j]['label_fr'] == 'Membre 1' || $request_info[$j]['label_fr'] == 'Encadrant du club')
                                                                        <?php $user_info = TCG\Voyager\Models\User::where('id', @$request_info[$j]['value'])->first(); ?>
                                                                        {{ @$user_info->name }}
                                                                    @elseif($request_info[$j]['label_fr'] == 'Année Universitaire')
                                                                        <?php $year_info = App\Year::where('id', @$request_info[$j]['value'])->first(); ?>
                                                                        {{ @$year_info->designation }}
                                                                    @else
                                                                        {{ @$request_info[$j]['value'] }}
                                                                    @endif
                                                                </td>
                                                            @endif
                                                            <?php $etat = 1; ?>
                                                        @endif
                                                        <?php $j++; ?>
                                                    @endwhile
                                                    @if($etat == 0 && $j == count(@$request_info) )
                                                        <td></td>
                                                    @endif
                                                @endforeach
                                            @endforeach
                                            <?php
                                                if(@$tentative['author_id']){
                                                    $author = TCG\Voyager\Models\User::find(@$tentative['author_id']);
                                                }else{
                                                    $author = null;
                                                }
                                            ?>
                                            <td>@if($author){{ @$author->name }}@else{{'-'}}@endif</td>
                                            <!--<td>{{ @$tentative['tentative'] }}</td>-->
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
@stop

@section('css')
    <link rel="stylesheet" href="{{ voyager_asset('lib/css/responsive.dataTables.min.css') }}">
    <!--<style type="text/css">a:link{text-decoration:none}</style>-->
@stop

@section('javascript')
    <!-- DataTables -->
    <script src="{{ voyager_asset('lib/js/dataTables.responsive.min.js') }}"></script>
    <script>
        $(document).ready(function () {
            @if (!$dataType->server_side)
                var table = $('#dataTable').DataTable({!! json_encode(
                    array_merge([
                        "order" => [],
                        "language" => __('voyager::datatable'),
                        "columnDefs" => [['targets' => -1, 'searchable' =>  false, 'orderable' => false]],
                    ],
                    config('voyager.dashboard.data_tables', []))
                , true) !!});
            @else
                $('#search-input select').select2({
                    minimumResultsForSearch: Infinity
                });
            @endif

            @if ($isModelTranslatable)
                $('.side-body').multilingual();
                //Reinitialise the multilingual features when they change tab
                $('#dataTable').on('draw.dt', function(){
                    $('.side-body').data('multilingual').init();
                })
            @endif
            $('.select_all').on('click', function(e) {
                $('input[name="row_id"]').prop('checked', $(this).prop('checked'));
            });
        });


        var deleteFormAction;
        $('td').on('click', '.delete', function (e) {
            $('#delete_form')[0].action = '{{ route('voyager.'.$dataType->slug.'.destroy', ['id' => '__id']) }}'.replace('__id', $(this).data('id'));
            $('#delete_modal').modal('show');
        });
    </script>
@stop
