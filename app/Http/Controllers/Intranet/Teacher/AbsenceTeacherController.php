<?php

namespace App\Http\Controllers\Intranet\Teacher;

use App\Absence;
use App\AbsenceSetting;
use App\AbsenceStudent;
use App\Coordinate;
use App\Group;
use App\GroupTd;
use App\Http\Controllers\Controller;
use App\Http\Services\NotificationService;
use App\Models\User;
use App\Period;
use App\StudentsPredefinedList;
use App\Subject;
use App\Teacher;
use Carbon\Carbon;
use Auth;
use Illuminate\Http\Request;

class AbsenceTeacherController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth', 'auth_teacher']);
    }
    public function showAbsencesGroups()
    {
        $teacher_info = Teacher::where('cin', auth()->user()->cin)->first();
        $seances = Period::all();
        $groups = Group::where('publier', 1)->get();
        $subjects = @$teacher_info->subjects;
        $active_page = 'absences_groupes';
        $page = 'listOfGroupsForTeacher';

        // absence settings
        $absence_settings = AbsenceSetting::first();
        if($absence_settings){
            $min_date = Carbon::now()->subDays($absence_settings->nb_passed_days)->format('Y-m-d');
            if($absence_settings->auto_period == 1){
                // add 1 hour to current time carbon
                $seances = Period::where('start_hour', '<=', Carbon::now()->addHour()->format('H:i:s'))
                    ->where('end_hour', '>=', Carbon::now()->addHour()->format('H:i:s'))
                    ->get();
                    $min_date = Carbon::now()->format('Y-m-d');
            }

        }else{
            $min_date = Carbon::now()->subDays(30)->format('Y-m-d');
        }

        return view('intranet.teachers.absences_groupes', compact('groups', 'active_page', 'subjects', 'seances' , 'page' , 'min_date'));
    }

    public function markAbsents(Request $request)
    {
        $group_td = GroupTd::find($request->group_td_id);
        $students = $group_td->students;
        $coordonate = Coordinate::first();
        $subject = Subject::find($request->subject_id);
        //test if absence already exist
        $existingAbsence = Absence::where('group_td_id', $group_td->id)
        ->where('subject_id', $request->subject_id)
        ->where('teacher_cin', auth()->user()->cin)
        ->where('date', $request->input('date'))
        ->where('period_id', $request->period_id)
        ->first();

        if ($existingAbsence) {
            return redirect()->route('absences_groupes')->with('error', 'Cette absence est déjà enregistrée.');
        }

        $absent = new Absence();
        $absent->teacher_cin = auth()->user()->cin;
        $absent->teacher_name = auth()->user()->name;
        $absent->group_td_id = $group_td->id;
        $absent->group_td_designation = $group_td->designation_fr;
        $absent->subject_id = $request->subject_id;
        $absent->subject_designation = @$subject->designation_fr;
        $absent->year_id = $coordonate->current_year_id;
        $absent->date = $request->input('date');
        $absent->period_id  = $request->period_id;
        $absent->slug  = $absent->date.'-'.$absent->group_td_designation.'-'.$absent->subject_designation.'-'.$absent->teacher_name;

        $absent->save();

        foreach ($students as $student) {
            $input_name = 'absent' . $student->id;
            $etat = $request->input($input_name);
            if($etat == 1){
                $absence_student = new AbsenceStudent();
                $absence_student->absence_id = $absent->id;
                $absence_student->student_cin = $student->cin;
                $absence_student->student_name = $student->nom . ' ' . $student->prenom;

                $user = User::where('cin', $student->cin)->first();
                if ($user) {
                    (new NotificationService)->send($user->id, 'Vous etes marquer Absent(e)', '/intranet/suivi_absences');
                }
                $absence_student->save();
            }


        }
        return redirect()->route('absences_groupes')->with('success', 'Mise a jour effectue avec succes');
    }

        // Show details of absences for a specific date and group with optional search filter
        public function showDetailsAbsence($id, Request $request)
        {

            $absence_settings = AbsenceSetting::first();
            $absence = Absence::find($id);
            if($absence){

                $students = StudentsPredefinedList::where('groupe_td_id', $absence->group_td_id)->get();
                $absentStudents = AbsenceStudent::where('absence_id',$id)->pluck('student_cin')->toArray();
                $page = 'detailsAbsences';
                $active_page = 'absences_groupes';
                $diff_in_days = Carbon::parse($absence->date)->diffInDays(Carbon::now());
                $allow_update = true;

                if($absence_settings && $absence_settings->can_teacher_update == 1 && (!$absence_settings->nb_update_days ||   $diff_in_days  <=  $absence_settings->nb_update_days)){
                    $allow_update = true;

                }else{
                    $allow_update = false;
                }
                return view('intranet.teachers.absences_details', compact('absence', 'students', 'absentStudents' , 'page' , 'active_page','allow_update'));
            }else{
                return redirect()->back()->with('error', 'Absence introuvable');
            }
        }



        // Update absence status for multiple students
        public function updateAbsence(Request $request)
        {

            if($request->status == 'present'){
                $absence_student = AbsenceStudent::where('absence_id', $request->absence_id)->where('student_cin', $request->student_cin)->first();
                //delete
                if($absence_student){
                    $absence_student->delete();
                }
            }elseif($request->status == 'absent'){
                // create new absence
                $absence_student = new AbsenceStudent();
                $absence_student->absence_id = $request->absence_id;
                $absence_student->student_cin = $request->student_cin;
                $absence_student->student_name = $request->student_name;
                $absence_student->reclamation = 0;
                $absence_student->created_by = Auth::user()->name;
                $absence_student->save();
            }

            return redirect()->back()->with('success', 'Modification effectuée avec succès');
        }

        public function printGroupStudentsAbsences($id)
        {
            $group_td = GroupTd::where('publier', 1)->where('id', $id)->first();
            return view('intranet.teachers.absences_print_students_list', compact('group_td'));
        }







}
