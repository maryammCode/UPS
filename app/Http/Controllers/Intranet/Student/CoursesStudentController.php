<?php

namespace App\Http\Controllers\Intranet\Student;

use App\Coordinate;
use App\Course;
use App\CourseRender;
use App\CourseRenderUser;
use App\Group;
use App\Http\Controllers\Controller;
use App\StudentsPredefinedList;
use App\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CoursesStudentController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'auth_student']);
    }

    public function showCourses($subject_id){
        $student = StudentsPredefinedList::where('cin', Auth::user()->cin)->first();
        $group_td_id =$student->groupe_td_id;
        $subjects = Subject::where('publier', 1)->whereHas('courses', function ($c) use ($group_td_id) {
            $c->join('courses_group_tds', 'courses.id', 'courses_group_tds.course_id')
            ->where('courses_group_tds.group_td_id', $group_td_id);
        })->get();
        // $subjects = Subject::all();
        $coordinate = Coordinate::first();
        $groups = Group::where('publier', 1)->get();
        $courses = Course::
        where('subject_id' , $subject_id)->where('publier' , 1)
        ->join('courses_group_tds', 'courses.id', 'courses_group_tds.course_id')
        ->where('courses_group_tds.group_td_id', $group_td_id)
        ->select('courses.*')
        ->paginate(25);
        $page = 'cour';
        $active_page =  'courses_student';
        $renders = CourseRender::where('publier', 1)->where('group_td_id', $group_td_id)/* ->where('subject_id' , $subject_id) */->orderBy('created_at' , 'desc')->get();

        return view('intranet.students.support_cours' , compact('subjects' , 'courses' , 'subject_id' , 'groups' ,'page' ,'active_page' ,'renders'));
    }

    public function showStudentSubjects(){
        $student = StudentsPredefinedList::where('cin', Auth::user()->cin)->first();
        $group_td_id = $student->groupe_td_id;
        $subjects = Subject::where('publier', 1)->whereHas('courses', function ($c) use ($group_td_id) {
            $c->join('courses_group_tds', 'courses.id', 'courses_group_tds.course_id')
            ->where('courses_group_tds.group_td_id', $group_td_id);
        })->get();
        // $subjects = Subject::all();
        $student = StudentsPredefinedList::where('cin', Auth::user()->cin)->first();
        $group_td_id =$student->groupe_td_id;

        $page='cv';

        $active_page = 'courses_student';

        return view('intranet.students.support_cours' , compact('subjects' ,'active_page' ,'page'));
    }

    public function addCompteRenduStudent(Request $request){
        $active_tab = 'compte_rendu';
        $new_course_render = new CourseRenderUser();

        $new_course_render->user_id = Auth::user()->id;
        $new_course_render->course_render_id = $request->course_render_id;
        if ($request->hasfile('files')) {
            $tab = [];
            $path = $request->file('files')->store('course_render_user');
            $tab[] = ['download_link' => $path, 'original_name' => $request->file('files')->getClientOriginalName()];
            $new_course_render->files =json_encode($tab) ;
        }


        $new_course_render->save();
        return back()->with(['success'=> 'Compte rendu ajouté avec succès' , 'active_tab' => $active_tab]);
    }


}
