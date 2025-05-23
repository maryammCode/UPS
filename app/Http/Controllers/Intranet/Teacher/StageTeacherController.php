<?php

namespace App\Http\Controllers\Intranet\Teacher;

use App\Http\Controllers\Controller;
use App\Http\Services\NotificationService;
use App\Rapport;
use App\Stage;
use App\StageDocumentType;
use App\Teacher;
use App\Year;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StageTeacherController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'auth_teacher']);
    }

    public function addRapportEns(Request $request, $rapport_id)
    {
        $fromTab= 'reports';
        if ($request->hasfile('rapport_encadrant')) {
            $tab = [];
            $path = $request->file('rapport_encadrant')->store('rapport_encadrant');
            $tab[] = ['download_link' => $path, 'original_name' => $request->file('rapport_encadrant')->getClientOriginalName()];
            $rapport = Rapport::find($rapport_id);
            $rapport->rapport_encadrant = json_encode($tab);
            $rapport->rapport_encadrant_created_at = date('Y-m-d H:i:s');
            $rapport->save();
            return back()->with(['success'=> 'Votre Rapport a été déposé avec succès', 'fromTab' => $fromTab]);
        } else {

            return back()->with(['error'=> 'Aucun fichier sélectionné' , 'fromTab' => $fromTab]);
        }
    }

    public function showStagesEns()
    {
        $active_page = 'satges_encadrant';
        $years = Year::orderBy('designation' , 'desc')->get();
        //$stages = Stage::where('encadrant_id', Auth::user()->id)->groupBy('year_id , stages.*')->get();


        return view('intranet.teachers.stages', compact('active_page', 'years' ));
    }
    public function addAvisEncadrant(Request $request, $id)
    {


        $stage = Stage::find($id);
        if($request->avis_encadrant != null){
            $stage->avis_encadrant = 2;
        }

        $order = array("\r\n", "\n", "\r");
        $replace = '<br>';
        $content = str_replace($order, $replace, $request->input('remarque_encadrant'));
        $stage->remarque_encadrant = $content;
        $stage->save();

        return back()->with('success', 'Votre Avis a été déposé');
    }

    public function updateRapport(Request $request, $rapport_id)
    {
        $fromTab= 'reports';
        $rapport = Rapport::find($rapport_id);
      //  $rapport->avis_encadrant = $request->avis_encadrant;
        //test_confidentialité

        $order = array("\r\n", "\n", "\r");
        $replace = '<br>';
        $content = str_replace($order, $replace, $request->input('avis_encadrant'));
        $rapport->avis_encadrant = $content;

        $rapport->save();
        return back()->with(['success' => 'Avis déposé avec succès', 'fromTab' => $fromTab]);

    }

    public function autoriseRapport(Request $request, $id){
        $fromTab= 'reports';
        $rapport = Rapport::find($id);

        $rapport->etat = 1;
        $rapport->save();
        $types = StageDocumentType::where('publier', 1)->where('is_required' , 1)
        ->whereNotExists(function ($query) use ($rapport) {
            $query->selectRaw(1)
                ->from('rapports')
                ->whereColumn('rapports.stage_rapport_type_id', 'stage_document_types.id')
                ->where('rapports.stage_id', $rapport->stage_id)
                ->where('rapports.etat', 1);
        })
        ->get();

        // tous les type de rapports (document: resume, rapport , poster ,,,) sont autorisés
        if($types->count() == 0){
            $stage= Stage::find($rapport->stage_id);
            $stage->etat = 3;
            $stage->save();
        }

        return back()->with(['success'=> 'Rapport autorisé avec succès' , 'fromTab' => $fromTab]);
    }

    public function deleteRapport($id){
        $fromTab= 'reports';
        $rapport = Rapport::find($id);
        $rapport->rapport_encadrant = null;
        $rapport->save();
        return back()->with(['success' => 'Rapport supprimé avec succès', 'fromTab' => $fromTab]);
    }

    public function updateStageStatus(Request $request){
        $stage_id = $request->stage_id;

        $stage = Stage::find($stage_id);
        $stage->etat = $request->status;
        $stage->save();

        return back()->with('success', 'Merci');

    }

    public function teacherAcceptStage(Request $request)
    {
        $stage = Stage::find($request->stage_id);
        if (!$stage) {
            return redirect()->back()->with('error', 'Stage introuvable');
        }

        if ($stage->encadrant_id != Auth::user()->id) {
            return redirect()->back()->with('error', "Vous n'etes pas autorisé à accepter ce stage");
        }
        $stage->teacher_acceptation = 1;
        $stage->save();
        $max_supervising_nb = Teacher::where('cin' , Auth::user()->cin )->first();
        $nb_acceptation = Stage::where('teacher_acceptation', 1)->where('year_id' , $stage->year_id)->where('encadrant_id' , $stage->encadrant_id)->get()->count();
        // dd($nb_acceptation , $max_supervising_nb->max_supervising_nb);
        if($nb_acceptation >= $max_supervising_nb->max_supervising_nb){

            $stages_without_acceptation = Stage::where('year_id' , $stage->year_id)->where('encadrant_id' , $stage->encadrant_id)->where('teacher_acceptation' ,'<>' , 1)->get();
            foreach($stages_without_acceptation as $stage){
                (new NotificationService)->send($stage->candidat_1_id, "L'encadrant(e) ".Auth::user()->name." a atteint le nombre maximum d'acceptation, veuillez modifier votre demande", '/intranet/stages_students');
            }

        }



        return redirect()->back()->with('success', 'Stage accepté');
    }





}
