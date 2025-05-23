<?php

namespace App\Http\Controllers\Intranet;

use App\Group;
use App\Teacher;
use App\CoursesGroupTd;
use App\Chapter;
use App\Comment;
use App\Course;
use App\GroupTd;
use App\Coordinate;
use App\Http\Controllers\Controller;
use App\Stage;
use App\TeachersPredefinedList;
use Illuminate\Http\Request;
use Auth;

class TeacherController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'auth_teacher']);
    }

    //********************************** Function Show Start*****************************************//

        public function showProfile(){
            $info_teacher = TeachersPredefinedList::where('cin', auth()->user()->cin)->first();
            return view('intranet.teachers.profile' , ['page'=>'profile','info_teacher'=>$info_teacher]);
        }

        public function showGroups(){
            $teacher_info = Teacher::where('cin', auth()->user()->cin)->first();
            $groups = Group::all();
            $subjects = @$teacher_info->subjects;
            $active_page='liste_groupes_ens';
            return view('intranet.teachers.liste_groupes', compact('groups' , 'active_page' , 'subjects'));
        }


        public function print($id){
            $group_td =GroupTd::where('id' , $id)->first();
            return view('intranet.teachers.print_students_list' , compact( 'group_td'));
        }

        public function showCours(){
            $teacher_info = Teacher::where('cin', auth()->user()->cin)->first();
            $subjects = @$teacher_info->subjects;
            $groups = @$teacher_info->groupes;
            $active_page='cours';
            return view('intranet.teachers.support_cours' , compact('subjects', 'groups','active_page'));
        }

        public function showSubject($subject_id){
            $teacher_info = Teacher::where('cin', auth()->user()->cin)->first();
            $subjects = @$teacher_info->subjects;
            $coordinate = Coordinate::first();
            $groups = @$teacher_info->groupes;
            $courses = Course::
            where('subject_id' , $subject_id)
            ->where('teacher_cin', Auth::user()->cin)
            ->paginate(25);
            // dd($courses);
            $page = 'cour';
            $active_page='cours';
            return view('intranet.teachers.support_cours' , compact('subjects' , 'courses' , 'subject_id' , 'groups' ,'page','active_page'));
        }

        public function courseDetails($id){
            $course = Course::find($id);
            if (!$course) {
                return redirect()->route('cours');
            }
            $comments = Comment::orderBy('created_at', 'desc')->where('course_id' , $id)->where('parent_id' , null)->paginate(3);
            return view('intranet.teachers.details_cours', compact('course' ,'comments'));
        }

        public function showStages(){
            $active_page ='satges_encadrant';
            $stages = Stage::where('encadrant_id', Auth::user()->id)->get();

            return view('intranet.teachers.stages', compact('active_page' , 'stages'));
        }

    //********************************** Function Show End*****************************************//

    //********************************** Function Add Start*****************************************//

        public function addCourse(Request $request){
            $teacher_info = Teacher::where('cin', auth()->user()->cin)->first();
            $coordinate = Coordinate::first();
            $new_course = new Course();
            $new_course->subject_id = @$request->subject_id;
            $new_course->designation_fr = $request->designation_fr;
            $new_course->permission_comment = $request->permission_comment;
            $new_course->publier = $request->publier;

            $order   = array("\r\n", "\n", "\r");
            $replace = '<br>';
            $content = str_replace($order, $replace, $request->input('description_fr'));
            $new_course->description_fr = $content;

            $new_course->teacher_cin = $teacher_info->cin ;
            $new_course->year_id =$coordinate->current_year_id;
            $new_course->save();
            if($request->group){
                foreach ($request->group as $group_td_id) {
                    $pivot = new CoursesGroupTd();
                    $pivot->group_td_id = @$group_td_id;
                    $pivot->course_id = @$new_course->id;
                    $pivot->save();
                }
            }
            // dd($new_course);
            return back()->with('success', 'Cours ajouté avec succès');
        }





        public function sendComment(Request $request){
            $new_comment = new Comment();
            $new_comment->course_id = $request->course_id;
            $order   = array("\r\n", "\n", "\r");
            $replace = '<br>';
            $content = str_replace($order, $replace, $request->input('content'));
            $new_comment->content = $content;
            $new_comment->parent_id = @$request->parent_id;
            $new_comment->user_id = Auth::user()->id;
            $new_comment->save();
            return back();
        }


    //********************************** Function Add End*****************************************//

    //********************************** Function Update Start*****************************************//
        public function updateCourse(Request $request , $id){
            $new_course = Course::find($id);
            $new_course->designation_fr = $request->designation_fr;
            $new_course->permission_comment = $request->permission_comment;
            $order   = array("\r\n", "\n", "\r");
            $replace = '<br>';
            $content = str_replace($order, $replace, $request->input('description_fr'));
            $new_course->description_fr = $content;
            $new_course->save();
            CoursesGroupTd::where('course_id' , $id)->delete();
            if($request->group){
                foreach ($request->group as $group_td_id) {
                    $pivot = new CoursesGroupTd();
                    $pivot->group_td_id = @$group_td_id;
                    $pivot->course_id = @$new_course->id;
                    $pivot->save();
                }
            }
            return redirect()->route('subject' , ['subject_id'=> $new_course->subject_id])->with('success', 'Modification terminée avec succès');

        }

        public function updateChapter(Request $request , $id , $subject_id){
            $new_chapter =Chapter::find($id);
            $new_chapter->designation_fr = $request->designation_fr;
            if($request->hasfile('files')){
                $path = $request->file('files')->store('chapters');
                $new_chapter->files = $path;
            }
            $new_chapter->save();
            return redirect()->route('subject' , ['subject_id'=> $subject_id])->with('success', 'Modification terminée avec succès');

        }

    //********************************** Function Update End*****************************************//

    //********************************** Function Edit Start*****************************************//

        public function editCourse($id , $subject_id){
            $teacher_info = Teacher::where('cin', auth()->user()->cin)->first();
            $subjects = @$teacher_info->subjects;
            $coordinate = Coordinate::first();
            $groups = Group::get();
            $courses = Course::where('subject_id' , $subject_id)
                        ->where('created_by' , Auth::user()->id)
                        ->paginate(4);
                        $page = 'cour';
            $course = Course::find($id);
            return view('intranet.teachers.support_cours' , compact('subjects' , 'courses' , 'subject_id' , 'groups' ,'page','course'));
        }

        public function editChapter($id , $subject_id){
            $teacher_info = Teacher::where('cin', auth()->user()->cin)->first();
            $subjects = @$teacher_info->subjects;
            $coordinate = Coordinate::first();
            $groups = Group::get();
            $courses = Course::where('subject_id' , $subject_id)
                        ->where('created_by' , Auth::user()->id)
                        ->paginate(4);
                        $page = 'cour';
            $chapter = Chapter::find($id);
            return view('intranet.teachers.support_cours' , compact('subjects' , 'courses' , 'subject_id' , 'groups' ,'page','chapter'));
        }

    //********************************** Function Edit End*****************************************//

    //********************************** Function Delete Start*****************************************//


        public function deleteCourse($id){
            $course = Course::find($id)->delete();
            Chapter::where('course_id' , $id)->delete();
            Comment::where('course_id' , $id)->delete();
            return back()->with('success', 'Suppression terminée avec succès');
        }

        public function deleteChapter($id){
            $chapter = Chapter::find($id)->delete();
            return back()->with('success', 'Suppression terminée avec succès');
        }

        public function deleteComment($id){
            $comment = Comment::where('id' ,$id)->orWhere('parent_id' , $id)->delete();

            return back();
        }
    //********************************** Function Delete End*****************************************//

}
