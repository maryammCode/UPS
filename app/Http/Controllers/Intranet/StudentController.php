<?php

namespace App\Http\Controllers\Intranet;

use App\Coordinate;
use App\FormFicheRenseignement;
use App\GroupTd;
use App\Group;
use App\Http\Controllers\Controller;
use App\Note;
use App\Student;
use App\StudentsPredefinedList;
use App\Year;
use App\Subject;
use App\Course;
use App\Stage;
use Auth;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'auth_student']);
    }

    // public function showProfile(){
    //     return view('intranet.students.profile' , ['page'=>'profile']);
    // }

    public function showRenseignements(){
        $coordinate = Coordinate::first();
        $year = Year::find($coordinate->current_year_id);
        $fiche = FormFicheRenseignement::where('student_id' , Auth::user()->id)->where('year_id' , $coordinate->current_year_id)->first();
        $student = Student::find( Auth::user()->id);

        return view('intranet.students.renseignements', compact('year','fiche','student','coordinate'));
    }

    public function showGroupsStudent(){
        $student = StudentsPredefinedList::where('cin', Auth::user()->cin)->first();
        $group_td = GroupTd::find($student->groupe_td_id);
       
        $active_page = 'liste_groupes_stud';

        if($group_td){
            return view('intranet.students.liste_groupes', compact('group_td' , 'active_page'));
        }else{
            return redirect()->route('intranet.home');
        }
            

    }

    public function showNotes(){
        $coordonne = Coordinate::first();
        $notes_s1 = Note::where('student_cin', Auth::user()->cin)->where('year_id', $coordonne->current_year_id)->where('semestre', 'semestre_1')->get();
        $notes_s2 = Note::where('student_cin', Auth::user()->cin)->where('year_id', $coordonne->current_year_id)->where('semestre', 'semestre_2')->get();
        $active_page = 'notes';
        return view('intranet.students.notes', compact('notes_s1', 'notes_s2' ,'active_page'));
    }
    public function showStudentSubjects(){
        $student = StudentsPredefinedList::where('cin', Auth::user()->cin)->first();
        $group_td_id = $student->group_td_id;
        $subjects = Subject::whereHas('courses', function ($c) use ($group_td_id) {
            $c->join('courses_group_tds', 'courses.id', 'courses_group_tds.course_id')
            ->where('courses_group_tds.group_td_id', $group_td_id);
        })->get();


        $active_page = 'courses_student';
        return view('intranet.students.support_cours' , compact('subjects' ,'active_page'));
    }


    public function showCourses($subject_id){
        $student = StudentsPredefinedList::where('cin', Auth::user()->cin)->first();
        $group_td_id =$student->group_td_id;
        $subjects = Subject::whereHas('courses', function ($c) use ($group_td_id) {
            $c->join('courses_group_tds', 'courses.id', 'courses_group_tds.course_id')->where('group_td_id', $group_td_id);
        })->get();
        $coordinate = Coordinate::first();
        $groups = Group::get();
        $courses = Course::
        where('subject_id' , $subject_id)
        ->join('courses_group_tds', 'courses.id', 'courses_group_tds.course_id')
        ->where('courses_group_tds.group_td_id', $group_td_id)
        ->select('courses.*')
        ->paginate(25);
        $page = 'cour';

        return view('intranet.students.support_cours' , compact('subjects' , 'courses' , 'subject_id' , 'groups' ,'page'));
    }

    public function showStages(){
        $active_page ='satges_students';
        $stages = Stage::where('candidat_1_id', Auth::user()->id)
        ->orWhere('candidat_2_id', Auth::user()->id)
        ->orWhere('candidat_3_id', Auth::user()->id)
        ->get();
       
        return view('intranet.students.stages', compact('active_page' , 'stages'));
    }


    public function addRapport( Request $request , $id){
      
        if ($request->hasfile('rapport')) {
            $tab =[];
            $path = $request->file('rapport')->store('rapport');
            $tab[] = ['download_link' => $path, 'original_name' => $request->file('rapport')->getClientOriginalName()];
            $stage = Stage::find($id);
            $stage->rapport = json_encode($tab); 
            $stage->etat = 3;
            $stage->save();
      
            return back()->with('success', 'Votre Rapport a été déposé');
        } else {
            return back()->with('error', 'Veuillez');
        }
    }


    /*   public function showCoursStudents(){
        return view('intranet.students.support_cours');
        }
    */
}
