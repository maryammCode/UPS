<?php

namespace App\Http\Services;

use App\Group;
use App\GroupTd;
use App\GroupTp;
use App\Models\User;
use App\NachdFormulaireInput;
use App\NachdFormulaireRequest;
use App\Specialite;
use App\StudentsPredefinedList;
use App\Subject;
use App\Year;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use SplFileInfo;
use TCG\Voyager\Facades\Voyager;
use TCPDF;


class GeneratorPdfService
{

    public function generate($data)
    {





        $foldername = Auth::user()->cin;
        if(@$data['specific_form']){
            $title = @$data['specific_form']['name_ar'];
        }else{
            $title = @$data['title'] ;
        }
        $filename = $this->generateUniqueFilename('pdf', 'pdf' , $title);
        $pathPrefix = "app/public/users/{$foldername}";
        if(@$data['folder']){
            $pathPrefix = "app/public/{$data['folder']}";
        }
        $outputFilePath = storage_path("{$pathPrefix}/{$filename}");

        // Create the directory if it doesn't exist
        if (!File::exists(storage_path($pathPrefix))) {
            File::makeDirectory(storage_path($pathPrefix), 0755, true);
        }

        $this->generatePDF($outputFilePath, $filename, $title , $data);

        // Move the PDF file to the storage directory
        $storagePath = Storage::disk('local')->putFileAs('pdf', $outputFilePath, $filename);

        // Construct an array containing download link and original file name
        $fileDetails = [
            'download_link' => $storagePath,
            'original_name' => $filename,
        ];

        if(@$data['path'] == true){
            $db_path = "{$pathPrefix}/{$filename}";
            $db_path = str_replace('app/public/', '', $db_path);
            return ['path' => $db_path];
        }else{
            return response()->download(storage_path($pathPrefix.'/'.$filename ), $filename);

        }
    }


    private function generateUniqueFilename($directory, $extension, $title)
    {
        $filename = uniqid() . '_'.$title.'_'.date('d_M_Y'). '.' . $extension;
        $path = $directory . '/' . $filename;

        // Check if the filename already exists, if so, regenerate it
        while (Storage::disk('local')->exists($path)) {
            $filename = uniqid() . '.' . $extension;
            $path = $directory . '/' . $filename;
        }

        return $filename;
    }





    private function setHeader($pdf, $title , $html_header)
    {
        $logoPath = public_path('logo.png');
        // $logoPath = storage_path(Voyager::setting('admin.logo_image', ''));


        list($width, $height) = getimagesize($logoPath);

        $maxWidth = 60;
        $maxHeight = 45;

        $scaleWidth = $maxWidth / $width;
        $scaleHeight = $maxHeight / $height;
        $scale = min($scaleWidth, $scaleHeight);

        $scaledWidth = $width * $scale;
        $scaledHeight = $height * $scale;
        $currentPage = $pdf->getPage(); // Use getPage() method
        $html = '<style>

            table,  th,  td {
                border: 1px solid black;
                border-collapse: collapse;
                padding: 5px;
                text-align: center;
            }
            th.logo-cell {
                vertical-align: middle;
                margin: auto;
            }
            img.logo {
                max-width: 100%;
                max-height: 100%;
                display: inline-block;
                vertical-align: middle;
            }
            .row{width : 100%}
            .col-md-6{width : 45% ; padding : 5px ; float : left ; display : unset}
        </style>';
        if(@$html_header){
            $html .= $html_header;
        }else{
            $html .= '

        <table style="width:100%" id="head">
            <tr>
                <th rowspan="2" class="logo-cell">
                    <img
                        src="' . $logoPath . '"
                        width="' . $scaledWidth . '"
                        height="' . $scaledHeight . '"
                        class="logo"
                    >
                </th>
                <th colspan="4">Université de Sfax <br/> Ecole Nationale d’Ingénieurs de Sfax</th>
            </tr>
            <tr>
                <th colspan="4" class="subtitle">' . $title . '</th>

            </tr>
        </table>
        <br />
        <br />';
        }
        // Write HTML content to PDF
        $pdf->writeHTML($html, false, false, true, false, 'center');
    }

    private function setBody($pdf, $data)
    {


        if (@$data['specific_form']) {



            $date_envoi = $data['date_envoi'];
            $confirmation = $data['confirmation'];
            $date_acceptation = $data['date_acceptation'];
            $date_reception = $data['date_reception'];
            $specific_form = $data['specific_form'];
            $all_requests = $data['all_requests'];

            $tab_info = array();
            $tab_order = array();
            $html = '<div class="container" style="margin-top : 10px">
        <table class="table" style="border : 1px solid;padding-bottom: 15px; width : 100%">';

        $ii=0;
            foreach (@$all_requests as $request) {

                $the_form_request_info = NachdFormulaireRequest::find($request->id);
                $the_form_input_info = NachdFormulaireInput::find($the_form_request_info->nachd_formulaire_input_id);
                $the_order = (float) (@$the_form_input_info->ordre ?? $ii);
                $tab_order[] = @$the_order;
                $tab_info['' . @$the_order . ''] = array(
                    "form_id" => $request->nachd_formulaire_id,
                    "id" => $request->id,
                    "value" => $request->value,
                    "label" => $request->label_fr,
                    "zone" => $request->zone,
                    "type" => $request->type,
                    "model_bd" => $request->model_bd
                );
                $ii++;
            }



            ksort($tab_info);
            $i = 0;

            foreach (@$tab_info as $request) {
                $i++;
                $html = $html . '
            <tr>
            <td style="padding: 10px 10px 10px 10px !important;border-bottom: 1px solid #e4e4e4; ">
            <label><b> ' . @$request['label'] . '</b></label> </td>';


                if (@$request['zone'] == 'input' && (@$request['type'] == 'file' || @$request['type'] == 'image')) {
                    $info = new SplFileInfo($request['value']);

                    $href1 =  $request['value'] && !filter_var($request['value'], FILTER_VALIDATE_URL) ?  Voyager::image($request['value']) :  $request['value'];
                    $html .= '<td style="padding: 10px 10px 10px 10px !important ">
                        <a target="_blank" href="' . $href1 . '">';

                    if ($info->getExtension() == 'png' || $info->getExtension() == 'jpg' || $info->getExtension() == 'jpeg' || $info->getExtension() == 'svg' || $info->getExtension() == 'gif') {
                        $src = Voyager::image($request['value']);
                        $html .= '<img src="' . $src . '" style="width: 100px; height: 100px;">';
                    } else {
                        $html .= 'Pièce jointe';
                    }
                    $html .= '</a></td>';
                } elseif (@$request['zone'] == 'input' && (@$request['type'] == 'multiple_file' || @$request['type'] == 'multiple_image')) {

                    $html .= '<td style="padding: 10px 10px 10px 10px !important ">';

                    if ($request['value']) {


                        if (json_decode($request['value']) !== null) {
                            foreach (json_decode($request['value']) as $file) {
                                $ext = pathinfo(@$file->original_name, PATHINFO_EXTENSION);
                                $href2 = Storage::disk(config('voyager.storage.disk'))->url(@$file->download_link) ?: '';
                                $html .= '<a class="fileType" target="_blank" href="' . $href2 . '" data-file-name="' . @$file->original_name . '">
                            <div class="img_settings_container" style="float:left;padding-right:15px;">';

                                if ($ext == 'ico' || $ext == 'avg' || $ext == 'jpg' || $ext == 'png' || $ext == 'gif' || $ext == 'jpeg')
                                    $html .= '<img src="' . Voyager::image(@$file->download_link) . '" data-image="' . @$file->original_name . '" style="width: 65px;height: 65px;clear:both; display:block; padding:2px; border:1px solid #ddd;margin-top: -10px;">';
                                elseif ($ext == 'pdf')
                                    $html .= `<img src="{{ asset('assets/images/icon_pdf.png') }}" style="width: 65px;height: 65px;clear:both; display:block; padding:2px; border:1px solid #ddd;margin-top: -10px;">`;
                                elseif ($ext == 'doc' || $ext == 'docm' || $ext == 'docx')
                                    $html .= `<img src="{{ asset('assets/images/icon_word.png') }}" style="width: 65px;height: 65px;clear:both; display:block; padding:2px; border:1px solid #ddd;margin-top: -10px;">`;
                                elseif ($ext == 'xlt' || $ext == 'xltx' || $ext == 'xls' || $ext == 'xlsx')
                                    $html .= `<img src="{{ asset('assets/images/icon_excel.png') }}" style="width: 65px;height: 65px;clear:both; display:block; padding:2px; border:1px solid #ddd;margin-top: -10px;">`;
                                elseif ($ext == 'ptt' || $ext == 'pptx')
                                    $html .= `<img src="{{ asset('assets/images/icon_pptx.png') }}" style="width: 65px;height: 65px;clear:both; display:block; padding:2px; border:1px solid #ddd;margin-top: -10px;">`;
                                else
                                    $html .= ` <img src="{{ asset('assets/images/icon_file.png') }}" style="width: 65px;height: 65px;clear:both; display:block; padding:2px; border:1px solid #ddd;margin-top: -10px;">`;

                                $html .= '</div></a>';
                            }
                        } else {
                            $file = $request['value'];
                            $href3 = Storage::disk(config('voyager.storage.disk'))->url($file);
                            $html .= '<div data-field-name="' . $file . '">
                                    <a class="fileType" target="_blank" href="' . $href3 . '" data-file-name="' . $file . '">
                                        <div class="img_settings_container" style="float:left;padding-right:15px;"> ';
                            $ext = pathinfo(@$file, PATHINFO_EXTENSION);
                            if ($ext == 'ico' || $ext == 'avg' || $ext == 'jpg' || $ext == 'png' || $ext == 'gif' || $ext == 'jpeg')
                                $html .= '<img src="' . Voyager::image(@$file) . '" data-image="' . @$file . '" style="width: 65px;height: 65px;clear:both; display:block; padding:2px; border:1px solid #ddd;margin-top: -10px;">';
                            elseif ($ext == 'pdf')
                                $html .= `<img src="{{ asset('assets/images/icon_pdf.png') }}" style="width: 65px;height: 65px;clear:both; display:block; padding:2px; border:1px solid #ddd;margin-top: -10px;">`;
                            elseif ($ext == 'doc' || $ext == 'docm' || $ext == 'docx')
                                $html .= `<img src="{{ asset('assets/images/icon_word.png') }}" style="width: 65px;height: 65px;clear:both; display:block; padding:2px; border:1px solid #ddd;margin-top: -10px;">`;
                            elseif ($ext == 'xlt' || $ext == 'xltx' || $ext == 'xls' || $ext == 'xlsx')
                                $html .= `<img src="{{ asset('assets/images/icon_excel.png') }}" style="width: 65px;height: 65px;clear:both; display:block; padding:2px; border:1px solid #ddd;margin-top: -10px;">`;
                            elseif ($ext == 'ptt' || $ext == 'pptx')
                                $html .= `<img src="{{ asset('assets/images/icon_pptx.png') }}" style="width: 65px;height: 65px;clear:both; display:block; padding:2px; border:1px solid #ddd;margin-top: -10px;">`;
                            else
                                $html .= `<img src="{{ asset('assets/images/icon_file.png') }}" style="width: 65px;height: 65px;clear:both; display:block; padding:2px; border:1px solid #ddd;margin-top: -10px;">`;


                            $html .= '</div></a></div>';
                        }
                    }
                    $html .= '</td>';
                } elseif (@$request['zone'] == 'checkbox') {
                    $options = explode(';', @$request['value']);
                    $html .= '<td style="border-bottom: 1px solid #e4e4e4;padding : 10px 10px 10px 10px !important ">';
                    for ($i = 0; $i < count($options); $i++) {
                        $html .= ' <label>' . @$options[$i] . '</label><br>';
                    }
                    $html .= '</td>';
                } elseif (@$request['zone'] == 'relationship_multiple') {
                    $options = explode(',', @$request['value']);
                    $html .= '<td style="border-bottom: 1px solid #e4e4e4; padding:10px 10px 10px 10px !important">';
                    if (count($options) > 1) {
                        for ($i = 0; $i < count($options) - 1; $i++) {

                            $modele = $request['model_bd'];
                            if ($modele == 'App\Teacher') {
                                $data = $modele::join('users', 'teachers.id', 'users.id')->where('users.id', @$options[$i])->select('users.name as information')->first();
                            } elseif ($modele == 'App\Student') {
                                $data = $modele::join('users', 'students.id', 'users.id')->where('users.id', @$options[$i])->select('users.name as information')->first();
                            } elseif ($modele == 'App\Groupe') {
                                $data = $modele::where('id', @$options[$i])->select('designation as information')->first();
                            } elseif ($modele == 'App\Sousgroupe') {
                                $data = $modele::where('id', @$options[$i])->select('designation as information')->first();
                            } elseif ($modele == 'App\Sousgroupetp') {
                                $data = $modele::where('id', @$options[$i])->select('designation as information')->first();
                            } else {
                                $data = $modele::where('id', @$options[$i])->select('id as information')->first();
                            }

                            $html .= '<label>' . @$data->information . '</label>';
                        }
                    } else {
                        if ($request['label'] == 'Groupe') {
                            $groupe_info = Group::where('id', @$request['value'])->first();
                            $html .= @$groupe_info->designation;
                        } elseif ($request['label'] == 'Groupe (Etudiant 2)') {
                            $groupe_info = Group::where('id', @$request['value'])->first();
                            $html .= @$groupe_info->designation;
                        } elseif ($request['label'] == 'Groupe TD') {
                            $groupe_td_info = GroupTd::where('id', @$request['value'])->first();
                            $html .= @$groupe_td_info->designation;
                        } elseif ($request['label'] == 'Groupe TP') {
                            $groupe_td_info = GroupTp::where('id', @$request['value'])->first();
                            $html .= @$groupe_td_info->designation;
                        } elseif ($request['label'] == 'Spécialité') {
                            $specialite_info = Specialite::where('id', @$request['value'])->first();
                            $html .= @$specialite_info->designation;
                        } elseif ($request['label'] == 'Spécialité (Etudiant 2)') {
                            $specialite_info = Specialite::where('id', @$request['value'])->first();
                            $html .= @$specialite_info->designation;
                        } elseif ($request['label'] == 'Membre 4' || $request['label'] == 'Membre 3' || $request['label'] == 'Membre 2' || $request['label'] == 'Membre 1' || $request['label'] == 'Encadrant du club') {
                            $user_info = User::where('id', @$request['value'])->first();
                            $html .= @$user_info->name;
                        } elseif ($request['label'] == 'Année Universitaire') {
                            $year_info = Year::where('id', @$request['value'])->first();
                            $html .= @$year_info->designation;
                        } else {
                            $html .= @$request['value'];
                        }
                    }
                    $html .= '</td>';
                } else {
                    $html .= '<td style="border-bottom: 1px solid #e4e4e4; padding: 10px 10px 10px 10px !important ">';
                    if ($request['label'] == 'Groupe') {
                        $groupe_info = Group::where('id', @$request['value'])->first();
                        $html .= @$groupe_info->designation;
                    } elseif ($request['label'] == 'Groupe (Etudiant 2)') {
                        $groupe_info = Group::where('id', @$request['value'])->first();
                        $html .= @$groupe_info->designation;
                    } elseif ($request['label'] == 'Groupe TD') {
                        $groupe_td_info = GroupTd::where('id', @$request['value'])->first();
                        $html .= @$groupe_td_info->designation;
                    } elseif ($request['label'] == 'Groupe TP') {
                        $groupe_td_info = GroupTp::where('id', @$request['value'])->first();
                        $html .= @$groupe_td_info->designation;
                    } elseif ($request['label'] == 'Spécialité') {
                        $specialite_info = Specialite::where('id', @$request['value'])->first();
                        $html .= @$specialite_info->designation;
                    } elseif ($request['label'] == 'Spécialité (Etudiant 2)') {
                        $specialite_info = Specialite::where('id', @$request['value'])->first();
                        $html .= @$specialite_info->designation;
                    } elseif ($request['label'] == 'Membre 4' || $request['label'] == 'Membre 3' || $request['label'] == 'Membre 2' || $request['label'] == 'Membre 1' || $request['label'] == 'Encadrant du club') {
                        $user_info = User::where('id', @$request['value'])->first();
                        $html .= @$user_info->name;
                    } elseif ($request['label'] == 'Année Universitaire') {
                        $year_info = Year::where('id', @$request['value'])->first();
                        $html .= @$year_info->designation;
                    } elseif ($request['label'] == 'Matière') {
                        $matiere_info = Subject::where('id', @$request['value'])->first();
                        $html .= @$matiere_info->designation;
                    } else {
                        $html .= @$request['value'];
                    }
                    $html .= '</td>';
                }




                $html = $html . '</tr>';
            }
            $html .= '</table>';

            $html .= `<br><br>
            <div style="margin-left: 10%;">Demande enregistrée le ` . \Carbon\Carbon::parse(@$date_envoi)->format('d-m-Y H:i:s') . `</div>
            <br>
            <div style="margin-left: 10%;">`;

            if (@$specific_form->decision == '1') {
                if (@$confirmation == 0) {
                    $html .= ' Demande non encore traitée';
                } elseif (@$confirmation == 1) {
                    $html .= 'Demande traitée';
                }
                if (@$date_acceptation) {
                    $html .= `le  ` . date('d-m-Y H:i:s', strtotime(@$date_acceptation));
                }
            }
            $html .= `</div> <br><div style="margin-left: 10%;">`;
            if (@$specific_form->decision == '1')
                if (!@$date_reception)
                    $html .= `Justification non encore prise`;
                elseif (@$date_reception)
                    $html .= `Justification reçu le ` . date('d-m-Y H:i:s', strtotime(@$date_reception));

            $html .= `    </div>
            <br><br> <br><br>
            <img src="` . Voyager::image(@$specific_form->photo_supp_2) . `" style="width: 100%;">`;
        }else if($data['html']){
            $html = $data['html'];
        }



        else {
            $html = 'test';
        }





        $startY = $pdf->getY();
        if (ob_get_contents()) ob_end_clean();
        $pdf->writeHTML($html, false, false, true, false, 'center');
        $endY = $pdf->getY();
        $bodyHeight = $endY - $startY;
        $remainingSpace = $pdf->getPageHeight() - $endY;
        $signatureY = $endY + 20;
        //$this->setSignatures($pdf, $signatureY);
    }

    private function setSignatures($pdf, $signatureY)
    {
        // Define your footer HTML content
        $footerHtml = '
        <style>
        table2, th, td {
            border: none;
            border-collapse: collapse;
            padding: 5px;
            text-align: center;
        }
        </style>
    <table class="table2" style="width:100%">
        <tr>
            <th>
                Signature de l’étudiant
            </th>
            <th>
                Signature  du chef centre de calcul
            </th>

        </tr>
        <tr>
            <th>&nbsp;</th>
            <th>&nbsp;</th>
        </tr>
    </table>';

        // Set footer position at bottom of every page
        $pdf->SetY($signatureY); // Adjust -45 for desired distance from bottom


        // Write HTML content to footer
        $pdf->writeHTML($footerHtml, false, false, true, false, 'center');
    }
    private function setFooter($pdf , $html_footer)
    {
        // Set default footer data
        $pdf->setFooterData($html_footer);

        // Set default footer font and margin
        $pdf->setFooterFont(array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
        $pdf->SetFooterMargin(10);

        // Enable auto page break with a margin of 10 mm
        $pdf->SetAutoPageBreak(TRUE, 10);
        //set footer html content

        //define write html function

        // $pdf->writeHTML($html_footer, true, false, true, false, 'center');
    }



    public function generatePDF($outputFilePath, $filename = 'sample_output.pdf', $title , $data)
    {
        $pdf = new TCPDF();
        $pdf->AddPage();


        if(@$data['response_header'] != null){
            $this->setHeader($pdf, $title , $data['response_header']);
        }else{
            $this->setHeader($pdf, $title , null);
        }




        $this->setBody($pdf, $data);
        // $this->setSignatures($pdf);
        if(@$data['response_footer'] != null){
            $this->setFooter($pdf , $data['response_footer']);
        }else{
            $this->setFooter($pdf , null);
        }


        // Output PDF

        $pdf->Output($outputFilePath, 'F');
        // $pdf->Output($outputFilePath, 'I');
    }






    public function generateHtml($html, $data, $slug)
    {
        /* $data has $stage instance  */
        if ($slug == 'stages') {

            if(@$data->entreprise){
                $html = str_replace("{*CompanyName*}", @$data->entreprise->designation, $html);
                $html = str_replace("{*CompanyPhone*}", @$data->entreprise->phone, $html);
                $html = str_replace("{*CompanyEmail*}", @$data->entreprise->email, $html);
                $html = str_replace("{*CompanyAddress*}", @$data->entreprise->address, $html);
                $html = str_replace("{*CompanyFax*}", @$data->entreprise->fax, $html);

            }
            if(@$data->company_name){

                $html = str_replace("{*CompanyName*}", @$data->company_name, $html);

            }
            $html = str_replace("{*ResponsibleName*}", @$data->responsible_name, $html);
            $html = str_replace("{*ResponsibleEmail*}", @$data->responsible_email, $html);

            $html = str_replace("{*CandidatName*}", $data->candidat_1_name, $html);
            $html = str_replace("{*SupervisorName*}", $data->encadrant_name, $html);
            if($data->start) $html = str_replace("{*StartDate*}", Carbon::parse($data->start)->format('d/m/Y'), $html);
            if($data->end) $html = str_replace("{*EndDate*}", Carbon::parse($data->end)->format('d/m/Y'), $html);

            $levels = ['', 'Premiére année', 'Deuxième année', 'Troisième année'];
            if ($data->level) {
                $html = str_replace("{*Level*}", $levels[$data->level], $html);
            }

            $student = StudentsPredefinedList::where('cin', @$data->candidat_1->cin)->first();
            if ($student && $student->group) {
                    $html = str_replace('{*Group*}', $student->group->designation_fr, $html);
                if( $student->group->sector){
                    $html = str_replace('{*Sector*}', $student->group->sector->designation_fr, $html);
                }
            }

            $html = str_replace('{*CurrentDate*}', Carbon::now()->format('d/m/Y'), $html);


            // search all strings in $html that start with {* and end with *}
            $html = preg_replace('/\{\*(.*?)\*\}/', '....................', $html);


            return $html;
        }
    }
}
