<?php

namespace App\Http\Controllers\Intranet\Student;

use App\Absence;
use App\AbsenceStudent;
use App\Claim;
use App\ClaimType;
use App\Coordinate;
use App\Destination;
use App\Group;
use App\GroupTd;
use App\Http\Controllers\Controller;

use App\Http\Services\NotificationService;
use App\Models\User;
use App\Period;
use App\Subject;
use App\Teacher;
use Carbon\Carbon;
use Auth;
use Illuminate\Http\Request;

class AbsenceStudentController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'auth_student']);
    }

    public function reclamationAbsence($id)
    {


        $absence_student = AbsenceStudent::find($id);
        if (!$absence_student) {
            return back()->with('error', 'Absence non trouvée.');
        };
        $absence_student->reclamation = 1;
        $absence_student->save();

        if($absence_student->absence){
            $teacher = User::where('cin', $absence_student->absence->teacher_cin)->first();

            $claim_type = ClaimType::where('module', 'absence')->first();
            $destination =Destination::where('module', 'absence')->first();

            $claim  = new Claim();
            $claim->ref_id = $absence_student->id;
            $claim->claim_type_id = @$claim_type->id;
            $claim->destination_id = @$destination->id;
            $claim->email = Auth::user()->email;
            $claim->priority = 0;
            $claim->status = 0;
            $claim->subject = "Réclamation d'absence - " . $absence_student->student_name . " | " . $absence_student->absence->subject_designation;
            $claim->message ="Matière : " . $absence_student->absence->subject_designation . "<br>"
                . "Date : " . $absence_student->absence->date . "<br>"
                . "Semestre : " . $absence_student->absence->semestre . "<br>"
                . "Groupe: " . $absence_student->absence->group_td_designation . "<br>"
                . "Enseignant(e): " . $absence_student->absence->teacher_name . "<br>"
                . "Séacne: " . @$absence_student->absence->seance->designation_fr ;
            $claim->responsible_id = @$teacher->id;
            $claim->user_id = Auth::user()->id;
            $claim->save();

        }
        return back()->with('success', 'Reclamation envoyer avec succes');
    }

    public function suiviAbsences()
    {

        // $coordonne = Coordinate::first();

        // $absences = Absence::where('student_cin', Auth::user()->cin)->where('year_id', $coordonne->current_year_id)->orderBy('date', 'desc')->where('status', 0)->get();
        $studentCin = Auth::user()->cin; // Assuming 'cin' is stored in users table

        // $absences = AbsenceStudent::where('student_cin', $studentCin)
        //     ->with('absence')
        //     ->get()
        //     ->groupBy('absence.subject_designation');


        $absences = AbsenceStudent::where('student_cin', $studentCin)
            ->with(['absence.seance']) // Load period details
            ->get()
            ->groupBy('absence.subject_designation');
    
        $active_page = 'suivi_absences';

        return view('intranet.shared.suivi_absences', compact('active_page' , 'absences'));
    }
}
