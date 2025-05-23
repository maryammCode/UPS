<?php

namespace App\Http\Controllers\Intranet\Company;

use App\Http\Controllers\Controller;
use App\Http\Services\GeneratorPdfService;
use App\Rapport;
use App\Stage;
use App\StageType;
use App\Year;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class StageCompanyController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'auth_company']);
    }



    public function showStages()
    {
        $active_page = 'satges_company';
        $stages = Stage::where('entreprise_id', Auth::user()->entreprise_id)->where('type_stage', 'stage')->get();
        // dd($stages);
        $years = Year::orderBy('designation' , 'desc')->get();
        $stage_types = StageType::where('publier',1)->get();
        return view('intranet.companies.stages', compact('active_page', 'years' , 'stages' ,'stage_types'));
    }

    public function candidatureCompany(){

        $active_page = 'candidatureCompany';

        $stages = Stage::where('type_stage', 'candidature')
            ->where('entreprise_id', Auth::user()->entreprise_id)
            ->get();

        return view('intranet.companies.candidatures', compact('active_page' , 'stages'));
    }

    public function updateStatusStage(Request $request){

        $stage = Stage::find($request->stage_id);
        $stage->status = $request->status;
        $stage->etat = 1;
        $stage->company_acceptation = 1;
        // status 3 = accepter
        if($stage->status == 3){
            $stage->type_stage = 'stage';
        }
        $stage->save();
        return  redirect()->back()->with('success', 'Le stage a été mis à jour');
    }

    // public function stagesCompany(){

    //     $active_page = 'stagesCompany';
    //     $stages = Stage::where('type_stage', 'stage')
    //         ->where('entreprise_id', Auth::user()->entreprise_id)
    //         ->get();
    //     return view('intranet.companies.stages', compact('active_page', 'stages'));
    // }

    //create accept stage function

public function CompanyAcceptStage(Request $request)
{

    $stage = Stage::find($request->stage_id);
    if (!$stage) {
        return redirect()->back()->with('error', 'Stage introuvable');
    }

    if ($stage->entreprise_id != Auth::user()->entreprise_id) {
        return redirect()->back()->with('error', "Vous n'êtes pas autorisé à accepter ce stage");
    }




    $stage->start = $request->start;
    $stage->type_stage = 'stage';
    $stage->end = $request->end;
    $stage->sujet = $request->sujet;
    $stage->domaine = $request->domaine;
    $stage->responsible_name = $request->responsible_name;
    $stage->responsible_email = $request->responsible_email;
    $order = array("\r\n", "\n", "\r");
    $replace = '<br>';
    $content = str_replace($order, $replace, $request->input('description'));

    $stage->description = $content;
    $stage->company_acceptation = 1;

    $stage->save();

    $base64 ='';
    if ($request->hasFile('signature')) {
        $image = $request->file('signature');
        // Redimensionner l'image (exemple : 300x300 pixels)
        $resizedImage = Image::make($image)->resize(100, 100);

        // Convertir en base64
        $base64 = (string) $resizedImage->encode('data-url');
    }
    $stageType = StageType::find($stage->stage_type_id);
        if($stageType && $stageType->company_request_sheet_model && $stageType->company_request_sheet_model != ''){
 if(@$base64 && $base64 != ''){

                $sig = '<img src="'.$base64.'">';
                $html = str_replace("{*CompanySignature*}", @$sig, $stageType->company_request_sheet_model);

            }else{
                $html=$stageType->company_request_sheet_model;
            }
            $html = (new GeneratorPdfService())->generateHtml($html, $stage, 'stages');


            $folder = 'users/' . Auth::user()->cin . '/stages';
            $data = ['source' => 'html', 'html' => $html, 'title' => 'Fiche de réponse de stage', 'path' => true , 'folder' => $folder];
            $pdf = (new GeneratorPdfService())->generate($data);
            $stage->company_request_sheet = json_encode([['download_link' => $pdf['path'], 'original_name' => 'Fiche de réponse de stage']]);
            $stage->save();
        }

    return redirect()->back()->with('success', 'Stage accepté');
}

public function uploadFileCompany(Request $request){
    $stage = Stage::find($request->stage_id);


    if ($request->hasFile('internship_certificate')) {
        if ($request->hasfile('internship_certificate')) {
            $folder = 'users/' . Auth::user()->cin.'/stages';
            $path = $request->file('internship_certificate')->store($folder);
            $stage->internship_certificate = [['download_link' => $path, 'original_name' => $request->file('internship_certificate')->getClientOriginalName()]];
        }
        $stage->company_validation = 1;
        $stage->save();
    }
    $fromTab ='soutenances';
    return redirect()->back()->with(['success' => 'Fichier mis à jour' , 'fromTab' => $fromTab]);
}




}
