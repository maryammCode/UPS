<?php

namespace TCG\Voyager\Http\Controllers;

use App\Coordinate;
use App\Department;
use App\FormFicheRenseignement;
use App\Group;
use App\GroupTd;
use App\GroupTp;
use App\Http\Services\GeneratorPdfService;
use App\Http\Services\NotificationService;
use App\Mail\NewsletterMail;
use App\Models\User;
use App\Newsletter;
use App\Rapport;
use App\Soutenance;
use App\SoutenanceSession;
use App\Stage;
use App\StageType;
use App\StudentsPredefinedList;
use App\Year;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use TCG\Voyager\Http\Controllers\Traits\BreadRelationshipParser;

class SpecificController extends Controller
{
    function maj_info_confidentielles()
    {
        $coordonnee = Coordinate::first();
        $current_year_id = $coordonnee->current_year_id;
        $all_students_predefined = StudentsPredefinedList::where('year_id', $current_year_id)->get();
        foreach ($all_students_predefined as $key => $student_predefined) {
            $specific_user = User::where('cin', $student_predefined->cin)
                ->first();
            if ($specific_user) {
                $specific_fiche_renseignements = FormFicheRenseignement::where('student_id', $specific_user->id)
                    ->where('year_id', $current_year_id)
                    ->first();
                if ($specific_fiche_renseignements) {
                    $specific_fiche_renseignements->numero_inscription = @$student_predefined->numero_inscription;
                    $specific_fiche_renseignements->group_id = @$student_predefined->groupe_id;
                    $specific_fiche_renseignements->group_td_id = @$student_predefined->groupe_td_id;
                    $specific_fiche_renseignements->group_tp_id = @$student_predefined->groupe_tp_id;
                    $groupe_designation = Group::find(@$student_predefined->groupe_id);
                    $specific_fiche_renseignements->group_designation = @$groupe_designation->designation_fr;
                    $groupe_td_designation = GroupTd::find(@$student_predefined->groupe_td_id);
                    $specific_fiche_renseignements->group_td_designation = @$groupe_td_designation->designation_fr;
                    $groupe_tp_designation = GroupTp::find(@$student_predefined->groupe_tp_id);
                    $specific_fiche_renseignements->group_tp_designation = @$groupe_tp_designation->designation_fr;
                    $specific_fiche_renseignements->save();
                }
            }
        }
        return redirect()->back()->with([
            'message'    => 'Mise à jour des informations confidentielles est terminée avec succès',
            'alert-type' => 'success',
        ]);
    }

    public function envNewsletter(Request $request)
    {
        $all_newsletters = Newsletter::all();
        foreach ($all_newsletters as $newsletter) {
            Mail::to($newsletter->email)->send(new NewsletterMail($request));
            return [
                'alert-type' => 'success',
            ];
        }
    }

    public function stageAcceptation(Request $request)
    {
        $stage_id = $request['stage_id'];
        $acceptation = $request['acceptation'];

        $stage = Stage::find($stage_id);
        if (!$stage) {
            return [
                'alert-type' => 'error',
                'message' => 'Le stage n\'existe pas'
            ];
        } else {
            $stage->acceptation = $acceptation;
            if($stage->acceptation == 1){
                $stage->etat = 2; // rapoport en cours
            }else{
                $stage->etat = 1; // Non affecté
            }
            $stage->save();
            if ($stage->stage_type_id && $stage->acceptation == 1) {
                $stage_type = StageType::find($stage->stage_type_id);
                if ($stage_type && $stage_type->assignment_model && $stage_type->assignment_model != '') {
                    $stage_type->assignment_model;


                    $html = (new GeneratorPdfService())->generateHtml($stage_type->assignment_model, $stage, 'stages');


                    $folder = 'users/' . $stage->candidat_1->cin . '/stages';
                    $data = ['source' => 'html', 'html' => $html, 'title' => 'Lettre d affectation', 'folder' => $folder, 'path' => true];
                    $response = (new GeneratorPdfService())->generate($data);

                    if ($response['path']) {
                        $tab = [];
                        $tab[] = ['original_name' => "Lettre d'affectation", 'download_link' => $response['path']];
                        $stage->assignment_file = json_encode($tab);
                        $stage->save();
                    }
                }
            }

            return back()->with([
                'alert-type' => 'success',
                'message' => 'Mise à jours avec succés'
            ]);
        }
    }

    public function generateConvention(Request $request)
    {
        $stage_id = $request['stage_id'];
        $acceptation = $request['acceptation'];

        $stage = Stage::find($stage_id);
        if (!$stage) {
            return [
                'alert-type' => 'error',
                'message' => 'Le stage n\'existe pas'
            ];
        } else {
            $stage->acceptation = $acceptation;
            $stage->save();
            if ($stage->stage_type_id) {

                $stage_type = StageType::find($stage->stage_type_id);
                if ($stage_type && $stage_type->convention_model && $stage_type->convention_model != '') {

                    $stage_type->convention_model;
                    $html = (new GeneratorPdfService())->generateHtml($stage_type->convention_model, $stage, 'stages');

                    $folder = 'users/' . $stage->candidat_1->cin . '/stages';
                    $data = ['source' => 'html', 'html' => $html, 'title' => 'Convention de stage', 'folder' => $folder, 'path' => true];
                    $response = (new GeneratorPdfService())->generate($data);

                    if ($response['path']) {
                        $tab = [];
                        $tab[] = ['original_name' => "Convention de stage", 'download_link' => $response['path']];
                        $stage->convention_file = json_encode($tab);
                        $stage->save();
                    }
                }
            }

            return back()->with([
                'alert-type' => 'success',
                'message' => 'Mise à jours avec succés'
            ]);
        }
    }
    // function update data rappot
    public function rapportUpdate(Request $request, $rapport_id)
    {

        $request->validate([
            'plagiat_rapport' => 'required|file|mimes:pdf,doc,docx',
            'plagiat_note' => 'required|string|max:255',
        ]);
        $rapport = Rapport::find($rapport_id);
        if ($request->hasfile('plagiat_rapport')) {
            $tab = [];
            $path = $request->file('plagiat_rapport')->store('plagiat_rapport');
            $tab[] = ['download_link' => $path, 'original_name' => $request->file('plagiat_rapport')->getClientOriginalName()];
            $rapport->plagiat_rapport = json_encode($tab);
        };
        $rapport->plagiat_note = $request->plagiat_note;
        $rapport->etat  = $request->has('etat') ? 1 : 0;
        $rapport->save();


        $stage = Stage::find($rapport->stage_id)->first();
        if($rapport->etat != 1){
            $stage->etat = 2;
            $stage->save();
        }
        if($stage->candidat_1_id){
            (new NotificationService)->send($stage->candidat_1_id, "L'administration a deposé un rapport plagiat", '/intranet/stage_details/'.$stage->id);
        }
        if($stage->candidat_2_id ){
            (new NotificationService)->send($stage->candidat_2_id, "L'administration a deposé un rapport plagiat", '/intranet/stage_details/'.$stage->id);
        }
        if($stage->candidat_3_id ){
            (new NotificationService)->send($stage->candidat_3_id, "L'administration a deposé un rapport plagiat", '/intranet/stage_details/'.$stage->id);
        }
        if($stage->encadrant_id){
            (new NotificationService)->send($stage->encadrant_id, "L'administration a deposé un rapport plagiat", '/intranet/stage_details/'.$stage->id);
        }


        return back()->with('success' , 'Avis déposé avec succès');
    }


    public function statistiquesStage(Request $request){
        $year_id = $request->get('year_id') ?? Coordinate::first()->current_year_id;
        $selectedYear = $year_id ? Year::find($year_id) : null;

        // 🔹 استرجاع جميع المستويات الموجودة في StageType
        $levels = StageType::distinct()->orderBy('level')->pluck('level');

        $levelStatistics = $levels->map(function ($level) use ($year_id) {
            // 1️⃣ العدد الإجمالي للطلاب في هذا المستوى
            $totalStudents = StudentsPredefinedList::whereHas('group', function ($query) use ($level, $year_id) {
                $query->where('level', $level);
                if ($year_id) {
                    $query->where('year_id', $year_id);
                }
            })->count();

            // 2️⃣ الطلاب الذين لديهم تدريب (Stage)
            $studentsWithStage = StudentsPredefinedList::whereHas('group', function ($query) use ($level, $year_id) {
                $query->where('level', $level);
                if ($year_id) {
                    $query->where('year_id', $year_id);
                }
            })->whereHas('user.student_stages')->count();

            // 3️⃣ الطلاب بدون تدريب
            $studentsWithoutStage = $totalStudents - $studentsWithStage;

            // 4️⃣ الطلاب المعينون إلى مشرف (encadrant)
            $studentsAffectedTeacher = StudentsPredefinedList::whereHas('group', function ($query) use ($level, $year_id) {
                $query->where('level', $level);
                if ($year_id) {
                    $query->where('year_id', $year_id);
                }
            })->whereHas('user.student_stages', function ($q) {
                $q->whereNotNull('encadrant_id');
            })->count();

            // 5️⃣ الطلاب المعينون إلى شركة (entreprise)
            $studentsAffectedCompany = StudentsPredefinedList::whereHas('group', function ($query) use ($level, $year_id) {
                $query->where('level', $level);
                if ($year_id) {
                    $query->where('year_id', $year_id);
                }
            })->whereHas('user.student_stages', function ($q) {
                $q->whereNotNull('entreprise_id');
            })->count();

            // 6️⃣ إحصائيات الأقسام (Departments) لهذا المستوى
            $departments = Department::all()->map(function ($department) use ($level, $year_id) {
                $totalStudents = StudentsPredefinedList::whereHas('group', function ($query) use ($department, $level, $year_id) {
                    $query->whereHas('sector', function ($subQuery) use ($department) {
                        $subQuery->where('department_id', $department->id);
                    })->where('level', $level);
                    if ($year_id) {
                        $query->where('year_id', $year_id);
                    }
                })->count();

                $studentsWithStage = Stage::where('department_id', $department->id)
                    ->whereHas('stageType', function ($query) use ($level) {
                        $query->where('level', $level);
                    })->count();

                return [
                    'department' => $department->designation_fr,
                    'total_students' => $totalStudents,
                    'students_with_stage' => $studentsWithStage,
                    'students_without_stage' => $totalStudents - $studentsWithStage,
                ];
            });

            return [
                'level' => $level,
                'total_students' => $totalStudents,
                'students_with_stage' => $studentsWithStage,
                'percentage_with_stage' => $totalStudents ? round(($studentsWithStage / $totalStudents) * 100, 2) : 0,
                'students_without_stage' => $studentsWithoutStage,
                'percentage_without_stage' => $totalStudents ? round(($studentsWithoutStage / $totalStudents) * 100, 2) : 0,
                'students_affected_teacher' => $studentsAffectedTeacher,
                'percentage_affected_teacher' => $totalStudents ? round(($studentsAffectedTeacher / $totalStudents) * 100, 2) : 0,
                'students_affected_company' => $studentsAffectedCompany,
                'percentage_affected_company' => $totalStudents ? round(($studentsAffectedCompany / $totalStudents) * 100, 2) : 0,
                'departments' => $departments
            ];
        });


        // 3. إحصائيات المناقشات حسب الجلسة
        $soutenanceStats = SoutenanceSession::withCount([
            'soutenances as total_soutenances' => function ($query) {
                $query->whereHas('stage.stageType', function ($subQuery) {
                    $subQuery->where('level', 3);
                });
            }
        ])->get();

        $stagesWithoutSoutenance = Stage::whereHas('stageType', function ($query) {
            $query->where('level', 3);
        })->doesntHave('soutenance')->count();

        // 4. إحصائيات PFE لكل قسم
        $pfeStats = Department::all()->map(function ($department) use($selectedYear) {
            $totalPFE = Stage::where('department_id', $department->id)->whereHas('stageType', function ($query) use($selectedYear) {
                $query->where('level', 3)->where('year_id' , $selectedYear->id);
            })->count();

            $pfeWithSoutenance = Soutenance::whereHas('stage', function ($query) use ($department) {
                $query->where('department_id', $department->id)->whereHas('stageType', function ($q) {
                    $q->where('level', 3);
                });
            })->count();

            return [
                'department' => $department->designation_fr,
                'total_pfe' => $totalPFE,
                'pfe_with_soutenance' => $pfeWithSoutenance,
                'pfe_without_soutenance' => $totalPFE - $pfeWithSoutenance,
            ];
        });

        return view('voyager::specific.stage_stats', compact('selectedYear' ,'levelStatistics',  'soutenanceStats', 'stagesWithoutSoutenance', 'pfeStats'));

    }
}
