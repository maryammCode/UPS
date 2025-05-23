<?php

namespace App\Http\Controllers\Intranet\Student;

use App\Coordinate;
use App\Entreprise;
use App\Group;
use App\Http\Controllers\Controller;
use App\Http\Services\GeneratorPdfService;
use App\Models\User;
use App\Rapport;
use App\Stage;
use App\StageActivity;
use App\StudentsPredefinedList;
use App\Teacher;
use App\Offer;
use App\StageType;
use App\Student;
use App\Year;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use TCG\Voyager\Models\Role;

class StageStudentController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'auth_student']);
    }

    public function showStages()
    {
        $current_year_id = Coordinate::first()->current_year_id;
        $teacher_role = Role::where('name', 'Enseignant')->first();
        $teachers = User::where('role_id', $teacher_role->id)->with(['stages' => function($query) use($current_year_id) {
            $query->where('year_id' , $current_year_id)->where('teacher_acceptation' ,1);
        }])->with('teacher')->get();
        // dd($teachers);

        $companies = Entreprise::where('publier', 1)->with('users')->get();
        $active_page = 'stages_students';
        // $stage_types = StageType::where('publier', 1)->get();


        $stages = Stage::where('type_stage', 'stage')
            ->where(function ($q) {
                $q->where('candidat_1_id', Auth::user()->id)
                    ->orWhere('candidat_2_id', Auth::user()->id)
                    ->orWhere('candidat_3_id', Auth::user()->id);
            })
            // ->whereNull('deleted_at')
            ->get();
            $typeIds = $stages->pluck('stage_type_id');

        $student = StudentsPredefinedList::where('cin', Auth::user()->cin)->first();
        $sector_type_id = @$student->group->sector->sector_type_id;
        $stage_types = StageType::where('publier', 1)->where('sector_type_id', $sector_type_id)->where('level','<=', $student->level ?? 3)->whereNotIn('id', $typeIds)->get();

        // $stage_types = StageType::all();
        $group = Group::where('id', $student->groupe_id)->first();
        $group_lists = Group::where('sector_id', @$group->sector_id)->get();
        $students = StudentsPredefinedList::whereIn('groupe_id', $group_lists->pluck('id'))->get();
        $candidats = User::whereIn('cin', $students->pluck('cin'))->whereNot('cin', Auth::user()->cin)->get();
        $years = Year::all();

        // dd($candidats);
        return view('intranet.students.stages', compact('active_page', 'stages', 'teachers', 'companies', 'stage_types', 'candidats' ,'years' , 'companies'));
    }

    public function addVersionRapport(Request $request, $stage_id)
    {

        $fromTab= 'reports';
        if ($request->hasfile('rapport')) {
            $tab = [];
            $path = $request->file('rapport')->store('rapport');
            $tab[] = ['download_link' => $path, 'original_name' => $request->file('rapport')->getClientOriginalName()];
            $rapport = new Rapport();
            $rapport->rapport = json_encode($tab);
            $rapport->stage_id = $stage_id;
            $rapport->stage_rapport_type_id = @$request->stage_rapport_type_id;
            // ask nourhene for this field
            $rapport->etat = 0;
            $rapport->created_by = Auth::user()->name;
            $rapport->save();
            return back()->with(['success'=> 'Votre Rapport a été déposé' , 'fromTab' => $fromTab]);
        } else {

            return back()->with(['error'=> 'Aucun fichier sélectionné' , 'fromTab' => $fromTab ]);
        }

    }

    public function createStage(Request $request)
    {

        $validated = $request->validate([
            'stage_type_id' => 'required',
            'sujet' => 'required',
            // 'domaine' => 'required',
            'start' => 'required',
            'end' => 'required',

        ]);

        // if($validated->fails()){
        //     return redirect()->back()->withErrors($validated)->withInput();

        // }

        if ($request->stage_id) {
            $stage = Stage::find($request->stage_id);
            if (!$stage) {
                $stage = new Stage();
            }
        } else {
            $stage = new Stage();
            $stage->year_id = $request->year_id;
            $stage->stage_type_id = $request->stage_type_id;
        }


        $stage->sujet = $request->sujet;
        $stage->candidat_1_id = Auth::user()->id;
        $stage->candidat_1_name = Auth::user()->name;
        if (@$request->candidat_2_cin) {

            $candidat_2  = User::where('cin' , $request->candidat_2_cin)->first();
            $stage->candidat_2_id = @$candidat_2->id;
            $stage->candidat_2_name = @$candidat_2->name;
        }
        if (@$request->candidat_3_cin) {
            $candidat_3  = User::where('cin' , $request->candidat_3_cin)->first();
            $stage->candidat_3_id = @$candidat_3->id;
            $stage->candidat_3_name = @$candidat_3->name;
        }


        // $stage->candidat_3_id = @$request->candidat_3;
        // $stage->candidat_3_name = @$request->candidat_3_name;
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
        if ($request->encadrant_id) {
            $user = User::find($request->encadrant_id);
            $stage->encadrant_id = @$user->id;
            $stage->encadrant_name = @$user->name;
        }
        $stage->etat = 1;
        if ($request->is_other_company == "1") {
            $test_exist_company = Entreprise::where('email', $request->company_email)->orWhere('designation', 'LIKE', $request->company_designation)->first();
            if ($test_exist_company) {
                $stage->entreprise_id = $test_exist_company->id;
               /*  if (!$test_exist_company->designation) {
                    $test_exist_company->designation = $request->company_designation;
                } */
                if (!$test_exist_company->email) {
                    $test_exist_company->email = $request->company_email;
                }
                if (!$test_exist_company->phone) {
                    $test_exist_company->phone = $request->company_phone;
                }
                if (!$test_exist_company->website) {
                    $test_exist_company->website = $request->company_website;
                }

                $test_exist_company->save();
            } else {
                $entreprise = new Entreprise();
                    $entreprise->designation = $request->company_designation;
                    $entreprise->email = $request->company_email;
                    $entreprise->phone = $request->company_phone;
                    $entreprise->website = $request->company_website;
                    $entreprise->validation = 0;
                    $entreprise->save();

                $responsible = new User();
                    $responsible->name = $request->company_designation;
                    $responsible->email = $request->company_email;
                    $responsible->password = bcrypt($request->company_email);
                    $responsible->entreprise_id = $entreprise->id;
                    $company_role = Role::where('name', 'Entreprise')->first()->id;
                    $responsible->role_id = $company_role;
                    $responsible->save();


                $stage->entreprise_id = $entreprise->id;
            }

            // $test_exist_responsible = User::where('email', $request->company_user_email)->first();
            // if ($test_exist_responsible) {
            //     $stage->responsible_id = $test_exist_responsible->id;
            // } else {
            //     $responsible = new User();
            //     $responsible->name = $request->company_user_name;
            //     $responsible->email = $request->company_user_email;
            //     $responsible->password = bcrypt($request->company_user_email);
            //     $responsible->entreprise_id = $stage->entreprise_id;
            //     $company_role = Role::where('name', 'Entreprise')->first()->id;
            //     $responsible->role_id = $company_role;
            //     $responsible->save();
            //     $stage->responsible_id = $responsible->id;
            // }
        } else {
            $stage->entreprise_id = $request->entreprise_id;
            // if ($request->is_other_company_user == "1") {
            //     $test_exist_responsible = User::where('email', $request->company_user_email)->first();
            //     if ($test_exist_responsible) {
            //         $stage->responsible_id = $test_exist_responsible->id;
            //     } else {
            //         $responsible = new User();
            //         $responsible->name = $request->company_user_name;
            //         $responsible->email = $request->company_user_email;
            //         $responsible->password = bcrypt($request->company_user_email);
            //         $responsible->entreprise_id = $request->entreprise_id;
            //         $company_role = Role::where('name', 'Entreprise')->first()->id;
            //         $responsible->role_id = $company_role;
            //         $responsible->save();
            //         $stage->responsible_id = $responsible->id;
            //     }
            // } else {
            //     $stage->responsible_id = $request->company_responsible_id;
            // }
        }


        $stageType = StageType::find($request->stage_type_id);
        if($stageType && $stageType->company_request_sheet_model && $stageType->company_request_sheet_model != ''){

            $html = (new GeneratorPdfService())->generateHtml($stageType->company_request_sheet_model, $stage, 'stages');
            $folder = 'users/' . Auth::user()->cin . '/stages';
            $data = ['source' => 'html', 'html' => $html, 'title' => 'Fiche de réponse de stage', 'path' => true , 'folder' => $folder];
            $pdf = (new GeneratorPdfService())->generate($data);
            $stage->company_request_sheet = json_encode([['download_link' => $pdf['path'], 'original_name' => 'Fiche de réponse de stage']]);
            $stage->save();
        }
        if($stageType && $stageType->appui_model && $stageType->appui_model != ''){

        //    dd($stageType->appui_model);
            $html2 = (new GeneratorPdfService())->generateHtml($stageType->appui_model, $stage, 'stages');
            // dd($html2);
           // $html2 = '<p>' . $html2 . '</p>';
            $folder = 'users/' . Auth::user()->cin . '/stages';
            $data = ['source' => 'html', 'html' => $html2, 'title' => 'Demande de stage', 'path' => true , 'folder' => $folder];
           // dd($data);
            $pdf = (new GeneratorPdfService())->generate($data);
            $stage->appui_request = json_encode([['download_link' => $pdf['path'], 'original_name' => 'Demande de stage']]);
            $stage->save();
        }

        $stage->save();
        return back();
    }

    public function deleteStageStudent($id){
        $stage_student = Stage::find($id);
        $stage_student->deleted_at = Carbon::now();
        $stage_student->save();
        return back()->with('success','Stage supprimer avec succès');
    }
    public function createActivity(Request $request)
    {
        $fromTab= 'activities';
        $activity = new StageActivity();
        $activity->stage_id = $request->stage_id;
        $activity->candidat_id = Auth::user()->id;
        $activity->activity_date = $request->activity_date;
        $order = array("\r\n", "\n", "\r");
        $replace = '<br>';
        $content = str_replace($order, $replace, $request->input('description'));
        $activity->description = $content;
        $activity->save();

        return redirect()->route('stage_details', ['id' => $request->stage_id])->with('fromTab', $fromTab);
    }

    public function deleteActivity(Request $request)
    {    $fromTab= 'activities';
        $activity_id = $request->activity_id;
        $activity = StageActivity::find($activity_id);
        if ($activity->candidat_id == Auth::user()->id) {
            $activity->delete();
            return redirect()->route('stage_details', ['id' => $activity->stage_id])->with('fromTab', $fromTab);
        } else {

            return back()->with('fromTab', $fromTab);
        }
    }

    public function candidatureStudent()
    {
        $active_page = 'candidatureStudent';
        $stages = Stage::where('type_stage', 'candidature')
            ->where(function ($q) {
                $q->where('candidat_1_id', Auth::user()->id)
                    ->orWhere('candidat_2_id', Auth::user()->id)
                    ->orWhere('candidat_3_id', Auth::user()->id);
            })
            ->get();
        return view('intranet.students.candidature', compact('active_page', 'stages'));
    }

    public function applyOfferFromStudent(Request $request, $id)
    {
        $current_year = Coordinate::first()->current_year_id;
        $offre =  Offer::find($id);
        $new_apply_offer_from_student = new Stage();
        $new_apply_offer_from_student->candidat_1_name = Auth::user()->name;
        $new_apply_offer_from_student->candidat_1_id = Auth::user()->id;
        if($request->source == "offer"){
            $new_apply_offer_from_student->offer_id = $id;
            $new_apply_offer_from_student->entreprise_id = $offre->entreprise_id;
            $new_apply_offer_from_student->sujet = $offre->designation_fr;
            $new_apply_offer_from_student->description = $offre->description_fr;
            $new_apply_offer_from_student->responsible_email = $offre->email;
            $new_apply_offer_from_student->responsible_name = $offre->responsible;
            $new_apply_offer_from_student->year_id = $current_year;
        }else if($request->source == "company"){

            $new_apply_offer_from_student->entreprise_id = $request->company_id;
        }else if($request->company_name){
            $test_exist_company = Entreprise::where('designation', 'LIKE', $request->company_name)->first();
            if($test_exist_company){
            $new_apply_offer_from_student->entreprise_id = $test_exist_company->id;

            }else{
                $company = new Entreprise();
                $company->designation = $request->company_name;
                $company->validation = 0;
                $company->publier = 0;
                $company->save();
                $new_apply_offer_from_student->entreprise_id = $company->id;
            }
        }

        // $new_apply_offer_from_student->motivation_letter = $request->motivation_letter;
        $new_apply_offer_from_student->stage_type_id = $request->stage_type_id;

        $new_apply_offer_from_student->start = $request->start;
        $new_apply_offer_from_student->end = $request->end;
        if ($request->hasfile('other_file')) {
            $tab = [];
            foreach ($request->file('other_file') as $file) {
                $path = $file->store('offre');
                $tab[] = ['download_link' => $path, 'original_name' => $file->getClientOriginalName()];

            }
            $new_apply_offer_from_student->other_file = json_encode($tab);

        }
        $new_apply_offer_from_student->status = 0;
        $new_apply_offer_from_student->type_stage = 'candidature';
        $new_apply_offer_from_student->save();


        $stageType = StageType::find($request->stage_type_id);

        if($stageType && $stageType->appui_model && $stageType->appui_model != ''){

        //    dd($stageType->appui_model);
            $html2 = (new GeneratorPdfService())->generateHtml($stageType->appui_model, $new_apply_offer_from_student, 'stages');
            // dd($html2);
           // $html2 = '<p>' . $html2 . '</p>';
            $folder = 'users/' . Auth::user()->cin . '/stages';
            $data = ['source' => 'html', 'html' => $html2, 'title' => 'Demande de stage', 'path' => true , 'folder' => $folder];
           // dd($data);
            $pdf = (new GeneratorPdfService())->generate($data);
            $new_apply_offer_from_student->appui_request = [['download_link' => $pdf['path'], 'original_name' => 'Demande de stage']];
            $new_apply_offer_from_student->save();
        }

        return back()->with('success', 'Offer postuler avec succès');
    }


    public function CompanyApply(Request $request)
    {
        // A ne pas inserer dans la base : type stage
        $apply = new Stage();
        $apply->candidat_1_name = Auth::user()->name;
        $apply->candidat_1_id = Auth::user()->id;
        $apply->stage_type_id = $request->stage_type_id;
        $apply->start = $request->start;
        $apply->end = $request->end;
        if ($request->is_add_other_company == "1") {
            $apply->company_name =  $request->company_designation;
            $test_exist_company = Entreprise::where('email', $request->company_email)->orWhere('designation', 'LIKE', $request->company_designation)->first();
            if ($test_exist_company) {

                if (!$test_exist_company->email) {
                    $test_exist_company->email = $request->company_email;
                }
                if (!$test_exist_company->phone) {
                    $test_exist_company->phone = $request->company_phone;
                }
                if (!$test_exist_company->address) {
                    $test_exist_company->address = $request->company_address;
                }
                $test_exist_company->save();
            } else {
                $entreprise = new Entreprise();
                    $entreprise->designation = $request->company_designation;
                    $entreprise->email = $request->company_email;
                    $entreprise->phone = $request->company_phone;
                    $entreprise->address = $request->company_address;
                    $entreprise->validation = 0;
                    $entreprise->save();
            }
        }else{
            $apply->company_name = $request->company_name;
        }
        $stageType = StageType::find($request->stage_type_id);
        if($stageType && $stageType->appui_model && $stageType->appui_model != ''){
        //    dd($stageType->appui_model);
            $html2 = (new GeneratorPdfService())->generateHtml($stageType->appui_model,$apply, 'stages');
            // dd($html2);
           // $html2 = '<p>' . $html2 . '</p>';
            $folder = 'users/' . Auth::user()->cin . '/stages';
            $data = ['source' => 'html', 'html' => $html2, 'title' => 'Demande de stage' , 'folder' => $folder];
           // dd($data);
            return(new GeneratorPdfService())->generate($data);
        }
        return back()->with('success', 'Offer postuler avec succès');
    }


    public function sendMail()
    {
    }

    public function generateActivityReport(Request $request)
    {

        $activities = StageActivity::where('stage_id', $request->stage_id)->get();
        // dd( $request->stage_id);
        $html = '';
        $html .= '<table border="1" cellpadding="10"><tr><th>Date</th><th>Description</th></tr>';

        foreach ($activities as $activity) {
            $html .= '<tr><td >' . $activity->activity_date . '</td><td>' . $activity->description . '</td></tr>';
        }
        $html .= '</table>';


        $data = ['source' => 'html', 'html' => $html, 'title' => 'Journal de stage'];
        return (new GeneratorPdfService)->generate($data);

        // return back();
    }
}
