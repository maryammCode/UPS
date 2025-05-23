
    <!DOCTYPE html>
    <html>
    <head>
        <title>Impression Demande</title>
    </head>
    <body>
        <center>
            <a href="@if($from == 'super_admin'){{ route('voyager.request_formulaires', ['formulaire_id' => $nachd_formulaire->nachd_formulaire_id]) }}@endif"><h3>Retour à votre espace numérique</h3></a>
            <a href="#" onclick="PrintElem('print_content')" title="Imprimer" class="btn btn-sm btn-default pull-right edit" style="color:#ffffff;">
                <img src="{{ Voyager::image( setting('admin.print_icon') ) }}" style="width: 68px;height: 68px;">
                <h3 style="color: #000000;">Imprimer</h3>
            </a>
        </center>
        <div id="print_content">
            <div class="header">
                <img src="{{ Voyager::image( setting('admin.entete_form') ) }}" style="width: 100%;">
                {{-- @if(@$specific_nachd_formulaire->entete)
                <img src="{{ Voyager::image(@$specific_nachd_formulaire->entete) }}" alt="" style="width: 100%;">
                @else
                <img src="{{ asset('assets/images/entete_form.jpg') }}" style="width: 100%;">
                @endif --}}
                <div style="text-align:center ; width:100% ; float:right;margin-top: -25px;">
                    <h2>
                    <span class="fa fa-caret-right">
                        {{ $specific_nachd_formulaire->name_fr }}
                        <!-- <br>{{ $specific_nachd_formulaire->name_ar }} -->
                    </span>
                    </h2>
                </div>
            </div>
            <div class="panel-body" >
                <div class="table-responsive">
                    <div id="dvContainer">
                    <center>
                        <table width="80%" style="border : 1px solid;padding-bottom: 15px;">
                            <?php $i=0; ?>
                            @foreach(@$all_formulaire_requests as $request)
                                <tr>
                                    <td style="padding: 2% 0% 0% 5%;">
                                        <?php $i++; ?>
                                        <label>{{ @$request['label_fr'] }}</label>
                                        @if( @$request['zone'] == 'input' && (@$request['type'] == 'file' || @$request['type'] == 'image'))
                                            <?php $info = new SplFileInfo($request['value']); ?>
                                            <td style="padding: 2% 0% 0% 0%;">
                                                <a target="_blank" href="@if( $request['value'] && !filter_var($request['value'], FILTER_VALIDATE_URL)){{ Voyager::image($request['value']) }}@else{{ $request['value'] }}@endif">
                                                    @if($info->getExtension() == 'png' || $info->getExtension() == 'jpg' || $info->getExtension() == 'jpeg' || $info->getExtension() == 'svg' || $info->getExtension() == 'gif')
                                                    <img src="{{ Voyager::image($request['value']) }}" style="width: 100px; height: 100px;">
                                                    @else
                                                        Pièce jointe
                                                    @endif
                                                </a>
                                            </td>
                                        @elseif( @$request['zone'] == 'input' && (@$request['type'] == 'multiple_file' || @$request['type'] == 'multiple_image'))
                                            <td style="padding: 2% 0% 0% 0%;">
                                                @if($request['value'])
                                                    @if(json_decode($request['value']) !== null)
                                                        @foreach(json_decode($request['value']) as $file)
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
                                                        <?php $file = $request['value']; ?>
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
                                        @elseif( @$request['zone'] == 'checkbox')
                                            <?php $options = explode(';', @$request['value']); ?>
                                            <td style="padding: 2% 0% 0% 0%;">
                                            @for($i = 0; $i < count($options); $i++)
                                                <label>{{ @$options[$i] }}</label><br>
                                            @endfor
                                            </td>
                                        @elseif(@$request['zone'] == 'relationship_multiple')
                                            <?php $options = explode(',', @$request['value']); ?>
                                            <td style="padding: 2% 0% 0% 0%;">
                                            @if(count($options) > 1)
                                                @for($i = 0; $i < count($options)-1; $i++)
                                                    <?php
                                                        $modele = $request['model_bd'];
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
                                                    <label>{{ @$data->information }}</label>,
                                                @endfor
                                            @else
                                                @if($request['label_fr'] == 'Groupe')
                                                    <?php $groupe_info = App\Groupe::where('id', @$request['value'])->first(); ?>
                                                    {{ @$groupe_info->designation }}
                                                @elseif($request['label_fr'] == 'Groupe (Etudiant 2)')
                                                    <?php $groupe_info = App\Groupe::where('id', @$request['value'])->first(); ?>
                                                    {{ @$groupe_info->designation }}
                                                @elseif($request['label_fr'] == 'Groupe TD')
                                                    <?php $groupe_td_info = App\Sousgroupe::where('id', @$request['value'])->first(); ?>
                                                    {{ @$groupe_td_info->designation }}
                                                @elseif($request['label_fr'] == 'Groupe TP')
                                                    <?php $groupe_td_info = App\Sousgroupetp::where('id', @$request['value'])->first(); ?>
                                                    {{ @$groupe_td_info->designation }}
                                                @elseif($request['label_fr'] == 'Spécialité')
                                                    <?php $specialite_info = App\Specialite::where('id', @$request['value'])->first(); ?>
                                                    {{ @$specialite_info->designation }}
                                                @elseif($request['label_fr'] == 'Spécialité (Etudiant 2)')
                                                    <?php $specialite_info = App\Specialite::where('id', @$request['value'])->first(); ?>
                                                    {{ @$specialite_info->designation }}
                                                @elseif($request['label_fr'] == 'Membre 4' || $request['label_fr'] == 'Membre 3' || $request['label_fr'] == 'Membre 2' || $request['label_fr'] == 'Membre 1' || $request['label_fr'] == 'Encadrant du club')
                                                    <?php $user_info = App\User::where('id', @$request['value'])->first(); ?>
                                                    {{ @$user_info->name }}
                                                @elseif($request['label_fr'] == 'Année Universitaire')
                                                    <?php $year_info = App\Year::where('id', @$request['value'])->first(); ?>
                                                    {{ @$year_info->designation }}
                                                @else
                                                    {{ @$request['value'] }}
                                                @endif
                                            @endif
                                            </td>
                                        @else
                                            <td style="padding: 2% 0% 0% 0%;">
                                                @if($request['label_fr'] == 'Groupe')
                                                    <?php $groupe_info = App\Groupe::where('id', @$request['value'])->first(); ?>
                                                    {{ @$groupe_info->designation }}
                                                @elseif($request['label_fr'] == 'Groupe (Etudiant 2)')
                                                    <?php $groupe_info = App\Groupe::where('id', @$request['value'])->first(); ?>
                                                    {{ @$groupe_info->designation }}
                                                @elseif($request['label_fr'] == 'Groupe TD')
                                                    <?php $groupe_td_info = App\Sousgroupe::where('id', @$request['value'])->first(); ?>
                                                    {{ @$groupe_td_info->designation }}
                                                @elseif($request['label_fr'] == 'Groupe TP')
                                                    <?php $groupe_td_info = App\Sousgroupetp::where('id', @$request['value'])->first(); ?>
                                                    {{ @$groupe_td_info->designation }}
                                                @elseif($request['label_fr'] == 'Spécialité')
                                                    <?php $specialite_info = App\Specialite::where('id', @$request['value'])->first(); ?>
                                                    {{ @$specialite_info->designation }}
                                                @elseif($request['label_fr'] == 'Spécialité (Etudiant 2)')
                                                    <?php $specialite_info = App\Specialite::where('id', @$request['value'])->first(); ?>
                                                    {{ @$specialite_info->designation }}
                                                @elseif($request['label_fr'] == 'Membre 4' || $request['label_fr'] == 'Membre 3' || $request['label_fr'] == 'Membre 2' || $request['label_fr'] == 'Membre 1' || $request['label_fr'] == 'Encadrant du club')
                                                    <?php $user_info = App\User::where('id', @$request['value'])->first(); ?>
                                                    {{ @$user_info->name }}
                                                @elseif($request['label_fr'] == 'Année Universitaire')
                                                    <?php $year_info = App\Year::where('id', @$request['value'])->first(); ?>
                                                    {{ @$year_info->designation }}
                                                @else
                                                    {{ @$request['value'] }}
                                                @endif
                                            </td>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                        <!-- <br><br> -->
                        <!-- <img src="{{ Voyager::image(@$nachd_formulaire->photo_supp_1) }}" style="width: 100%;">
                        <br><br>
                        <img src="{{ Voyager::image(@$nachd_formulaire->photo_supp_2) }}" style="width: 100%;"> -->
                        </center>
                        <br><br>
                        <div style="margin-left: 10%;">Demande enregistrée le {{\Carbon\Carbon::parse(@$date_envoi)->format('d-m-Y H:i:s')}}</div>
                        <br>
                        <div style="margin-left: 10%;">@if($specific_nachd_formulaire->decision == '1')@if(@$confirmation != 1) Demande non encore traitée @elseif(@$confirmation == 1) Demande traitée @if(@$date_acceptation) le {{ date('d-m-Y H:i:s', strtotime(@$date_acceptation)) }} @endif @endif @endif</div>
                        <br>
                        <div style="margin-left: 10%;">@if($specific_nachd_formulaire->decision == '1')@if(!@$date_reception) Document non encore pris @elseif(@$date_reception) Document récupéré le {{ date('d-m-Y H:i:s', strtotime(@$date_reception)) }} @endif @endif</div>
                        <br>
                        <br>
                        <br>
                        @if(@$specific_nachd_formulaire->footer)
                        <img src="{{ Voyager::image(@$specific_nachd_formulaire->footer) }}" alt="" style="width: 100%;">
                        @else
                        <img src="{{ asset('assets/images/footer_form.jpg') }}" style="width: 100%;">
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <script type="text/javascript">
            function PrintElem(elem){
                var printContents = document.getElementById(elem).innerHTML;
                var originalContents = document.body.innerHTML;
                document.body.innerHTML = printContents;
                window.print();
                document.body.innerHTML = originalContents;
            }
        </script>
    </body>
    </html>
