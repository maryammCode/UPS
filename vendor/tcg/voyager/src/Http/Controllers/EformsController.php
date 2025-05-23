<?php

namespace TCG\Voyager\Http\Controllers;

use App\Coordinate;
use App\FormFicheRenseignement;
use App\Group;
use App\GroupTd;
use App\GroupTp;
use App\Http\Services\GeneratorPdfService;
use App\Mail\NewsletterMail;
use App\Models\User;
use App\Newsletter;
use App\StudentsPredefinedList;
use Exception;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Request;
use TCG\Voyager\Http\Controllers\Traits\BreadRelationshipParser;
use App\NachdFormulaireRequest;
use App\NachdFormulaire;
use App\NachdTentative;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class EformsController extends Controller
{

    public function request_formulaires($formulaire_id){
        $formulaire_info = NachdFormulaire::find(@$formulaire_id);
        return view('voyager::eforms.requests_formulaires', [ 'formulaire_info' => $formulaire_info ]);
    }
    public function print_request_formulaires($from, $formulaire_id, $tentative){
        $all_formulaire_requests = NachdFormulaireRequest::
        join('nachd_tentatives', 'nachd_formulaire_requests.nachd_tentative_id', 'nachd_tentatives.id')
        ->join('nachd_inputs', 'nachd_formulaire_requests.nachd_input_id', 'nachd_inputs.id')
        //->join('formulairesinputs', 'nachd_inputs.id', 'formulairesinputs.input_id')
        ->where('nachd_tentatives.tentative', @$tentative)
        ->select(
            'nachd_formulaire_requests.nachd_formulaire_id',
            'nachd_formulaire_requests.id',
            'nachd_formulaire_requests.value',
            'nachd_inputs.label_fr',
            'nachd_inputs.zone',
            'nachd_inputs.type',
            'nachd_inputs.model_bd'
        )
        //->orderby('formulairesinputs.ordre')
        ->get();
        $nachd_formulaire = NachdFormulaireRequest::
        join('nachd_tentatives', 'nachd_formulaire_requests.nachd_tentative_id', 'nachd_tentatives.id')
        ->join('nachd_inputs', 'nachd_formulaire_requests.nachd_input_id', 'nachd_inputs.id')
        ->where('nachd_tentatives.tentative', @$tentative)
        ->select(
            'nachd_formulaire_requests.created_at',
            'nachd_tentatives.confirmation',
            'nachd_tentatives.date_acceptation',
            'nachd_tentatives.date_reception',
            'nachd_formulaire_requests.nachd_formulaire_id'
        )
        ->first();
        $specific_nachd_formulaire = NachdFormulaire::find(@$nachd_formulaire->nachd_formulaire_id);
        $confirmation = @$nachd_formulaire->confirmation;
        $date_acceptation = @$nachd_formulaire->date_acceptation;
        $date_reception = @$nachd_formulaire->date_reception;
        $date_envoi = @$nachd_formulaire->created_at;
        if(!empty($all_formulaire_requests)){
            return view ('voyager::eforms.print_request_formulaires' , [
                'from'=> 'super_admin',
                'nachd_formulaire'=>@$nachd_formulaire,
                'date_envoi'=>@$date_envoi,
                'confirmation'=>@$confirmation,
                'date_reception'=>@$date_reception,
                'date_acceptation'=>@$date_acceptation,
                'specific_nachd_formulaire'=>@$specific_nachd_formulaire,
                'all_formulaire_requests'=>$all_formulaire_requests
            ]);
        }else{
            return back();
        }
    }
    public function traitement_formulaire_request($tentative, $action){
        $tentative_info = NachdTentative::where('tentative', $tentative)->first();
        $specific_nachd_formulaire_request = NachdFormulaireRequest::where('nachd_tentative_id', @$tentative_info->id)->first();
        if($action == 'ok'){
            $tentative_info->confirmation = '1';
            $tentative_info->date_acceptation = date('Y-m-d H:i:s');
            $this->generateFormulaireHtml($specific_nachd_formulaire_request->nachd_formulaire_id , $tentative_info->id);

        }else{
            if(!$tentative_info->date_reception){
                $tentative_info->confirmation = '0';
                $tentative_info->date_acceptation = null;
            }else{
                return redirect()
                ->route('voyager.request_formulaires', ['formulaire_id' => @$specific_nachd_formulaire_request->nachd_formulaire_id])
                ->with([
                    'message'    => 'Demande déjà reçu par le demandeur',
                    'alert-type' => 'error',
                ]);
            }
        }
        $tentative_info->save();
        return redirect()
        ->route('voyager.request_formulaires', ['formulaire_id' => @$specific_nachd_formulaire_request->nachd_formulaire_id])
        ->with([
            'message'    => 'Décision prise avec succès',
            'alert-type' => 'success',
        ]);
    }
    public function reception_formulaire_request($tentative){
        $tentative_info = NachdTentative::where('tentative', $tentative)->first();
        $specific_nachd_formulaire_request = NachdFormulaireRequest::where('nachd_tentative_id', @$tentative_info->id)->first();
        if($tentative_info->confirmation == 1){
            $tentative_info->date_reception = date('Y-m-d H:i:s');
            $tentative_info->save();
            return redirect()
            ->route('voyager.request_formulaires', ['formulaire_id' => @$specific_nachd_formulaire_request->nachd_formulaire_id])
            ->with([
                'message'    => 'Demande marquée comme reçue par l\'étudiant',
                'alert-type' => 'success',
            ]);
        }else{
            return redirect()
            ->route('voyager.request_formulaires', ['formulaire_id' => @$specific_nachd_formulaire_request->nachd_formulaire_id])
            ->with([
                'message'    => 'Demande non confirmée',
                'alert-type' => 'error',
            ]);
        }
    }




    public function generateFormulaireHtml($formulaire_id , $tentative){
        $nachd_formulaire = NachdFormulaire::find($formulaire_id);
        if(@$nachd_formulaire && @$nachd_formulaire->response_model && @$nachd_formulaire->response_model != ''){
            $specific_nachd_formulaire_request = NachdFormulaireRequest::where('nachd_tentative_id', @$tentative)->get();
            $nachd_tentative = NachdTentative::find($tentative);
            $html = $nachd_formulaire->response_model;
            foreach($specific_nachd_formulaire_request as $request){
                $keyword = '{*'.@$request->nachdInput->name.'*}';


                if(is_array(value: json_decode(@$request->value)) ){
                        $tab = json_decode(@$request->value);
                       foreach($tab as $file_data){
                        $file = $file_data->download_link;
                        $html_data ='';
                        // if (str_ends_with(strtolower($file), '.png') || str_ends_with(strtolower($file), '.jpg')  || str_ends_with(strtolower($file), '.jpeg')) {

                        //     //get .env('APP_URL')

                        //     $html_data .= '<img src="' . env('APP_URL') . Storage::url($file) . '" alt="image" width="auto" height="100">';

                        //     // dd($html_data);
                        // }else{
                            $html_data.= $file_data->original_name.', ';
                        //}
                       }


                       $html = str_replace($keyword, @$html_data, $html);
                    //    $html = str_replace($keyword, @$html_data, $html);

                }else{
                    $html = str_replace($keyword, @$request->value, $html);
                }



            }
            $html = str_replace('{*CurrentDate*}', Carbon::now()->format('d/m/Y'), $html);
            $html = str_replace('{*CurrentTime*}', Carbon::now()->format('H:i'), $html);
            //$tentative->created_at
            $html = str_replace('{*CreatedAt*}' ,Carbon::parse($nachd_tentative->created_at)->format('d/m/Y H:i') , $html);
            $html = str_replace('{*UpdatedAt*}' ,Carbon::parse($nachd_tentative->updated_at)->format('d/m/Y H:i') , $html);
            $html = str_replace( '{*CreatedBy*}' , $nachd_tentative->created_by || ''  , $html);
            $html = str_replace( '{*UpdatedBy*}' , $nachd_tentative->updated_by || ''  , $html);

            $folder = 'users/' . Auth::user()->cin . '/requests';
            $data = ['source' => 'html', 'html' => $html, 'title' => $nachd_formulaire->name_fr, 'path' => true , 'folder' => $folder , 'response_header'=>$nachd_formulaire->response_header , 'response_footer'=>$nachd_formulaire->response_footer];

            $result = (new GeneratorPdfService)->generate($data);
            if($result['path']){

                $nachd_tentative->response_paper = json_encode([['original_name' => $nachd_formulaire->name_fr, 'download_link' => $result['path']]]);
                $nachd_tentative->save();
            }

        }

    }
}
