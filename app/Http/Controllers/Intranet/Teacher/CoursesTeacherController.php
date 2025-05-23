<?php

namespace App\Http\Controllers\Intranet\Teacher;

use App\Chapter;
use App\Comment;
use App\Coordinate;
use App\Course;
use App\CourseRender;
use App\CourseRenderUser;
use App\CoursesGroupTd;
use App\Group;
use App\Http\Controllers\Controller;
use App\Http\Services\NotificationService;
use App\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CoursesTeacherController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'auth_teacher']);
    }

    public function showCours()
    {
        $teacher_info = Teacher::where('cin', auth()->user()->cin)->first();
        $subjects = @$teacher_info->subjects;
        $groups = @$teacher_info->groupes;
        $active_page = 'cours';
        $page = 'cour';
        return view('intranet.teachers.support_cours', compact('subjects', 'groups', 'active_page' , 'page'));
    }




    public function showSubject($subject_id)
    {
        $teacher_info = Teacher::where('cin', auth()->user()->cin)->first();
        $subjects = @$teacher_info->subjects;
        $coordinate = Coordinate::first();
        $groups = @$teacher_info->groupes;
        $courses = Course::where('subject_id', $subject_id)
            ->where('teacher_cin', Auth::user()->cin)
            ->paginate(25);
        // dd($courses);
        // $renders = CourseRender::where('subject_id', $subject_id)
        // ->where('teacher_cin', Auth::user()->cin)->orderBy('created_at', 'desc')->get();

        $page = 'cour';
        $active_page = 'cours';
        return view('intranet.teachers.support_cours', compact('subjects', 'courses', 'subject_id', 'groups', 'page', 'active_page' ));
    }


    //********************************** Function Add Start*****************************************//
    public function addCourse(Request $request)
    {
        $teacher_info = Teacher::where('cin', auth()->user()->cin)->first();
        $coordinate = Coordinate::first();
        $new_course = new Course();
        $new_course->subject_id = @$request->subject_id;
        $new_course->designation_fr = $request->designation_fr;
        $new_course->permission_comment = $request->permission_comment;
        if($request->publier == '1' || $request->publier == 'on'){
            $new_course->publier = 1;
        }else{
            $new_course->publier = 0;
        }
        $order = array("\r\n", "\n", "\r");
        $replace = '<br>';
        $content = str_replace($order, $replace, $request->input('description_fr'));
        $new_course->description_fr = $content;
        $new_course->teacher_cin = $teacher_info->cin;
        $new_course->year_id = $coordinate->current_year_id;
        $new_course->save();
        if ($request->group) {
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

    public function addCompteRendu(Request $request)
    {

        $teacher_info = Teacher::where('cin', auth()->user()->cin)->first();
        $coordinate = Coordinate::first();
        $active_tab = 'compte_rendu';

        $validator = Validator::make($request->all(), [
            'group' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with('error', 'Veuillez vérifier les champs obligatoires');
        }
        if ($request->group) {
            foreach ($request->group as $group_td_id) {
                $new_render = new CourseRender();
                $new_render->course_id = @$request->course_id;
                $new_render->group_td_id = $group_td_id;
                $new_render->designation = $request->designation;
                $new_render->publier = $request->publier;
                $new_render->expiration_date = $request->expiration_date;

                $order = array("\r\n", "\n", "\r");
                $replace = '<br>';
                $content = str_replace($order, $replace, $request->input('description'));
                $new_render->description = $content;

                $new_render->teacher_cin = $teacher_info->cin;
                $new_render->year_id = $coordinate->current_year_id;
                if ($request->hasfile('files')) {
                    $tab = [];
                    $path = $request->file('files')->store('course_render');
                    $tab[] = ['download_link' => $path, 'original_name' => $request->file('files')->getClientOriginalName()];
                    $new_render->files =json_encode($tab) ;
                }

                $new_render->save();
                if($request->publier){
                    (new NotificationService)->sendToGroupTd($group_td_id , 'Compte rendu publier' , '/intranet/subjects_student/'. @$request->subject_id);
                }
            }
        }

        return back()->with(['success', 'Compte rendu ajouté avec succès',
            'active_tab' => $active_tab,
        ]);
    }

    public function updateCompteRendu(Request $request, $id)
    {


        $active_tab = 'compte_rendu';
        $new_render = CourseRender::find($id);
        $new_render->designation = $request->designation;
        if($request->publier == null){
            $new_render->publier = 0;
        }else{
            $new_render->publier = 1;
        }
        $new_render->expiration_date = $request->expiration_date;

        $order = array("\r\n", "\n", "\r");
        $replace = '<br>';
        $content = str_replace($order, $replace, $request->input('description'));

        $new_render->description = $content;
        // $new_render->group_td_id = $request->group_td_id;
        if ($request->hasfile('files')) {
            $tab = [];
            $path = $request->file('files')->store('course_render');
            $tab[] = ['download_link' => $path, 'original_name' => $request->file('files')->getClientOriginalName()];
            $new_render->files =json_encode($tab) ;
        }

        $new_render->save();
        return back()->with(['success', 'Modification terminée avec succès' ,  'active_tab' => $active_tab]);
    }

    public function deleteCompteRendu($id){
        $active_tab = 'compte_rendu';
        $render = CourseRender::find($id);
        $render->delete();
        return back()->with(['success', 'Compte rendu supprimé avec succès',  'active_tab' => $active_tab]);
    }
    public function renderDetails($id){

        $render = CourseRender::find($id);
        $student_renders = CourseRenderUser::where('course_render_id' , $id)->get();
        $active_page = 'cours';
        return view('intranet.teachers.render_details' , compact('render' , 'active_page' , 'student_renders'));
    }


    // public function addChapter(Request $request)
    // {
    //     $new_chapter = new Chapter();
    //     $new_chapter->course_id = @$request->course_id;
    //     $new_chapter->designation_fr = $request->designation_fr;
    //     $new_chapter->type = $request->type;
    //     if ($request->hasfile('files')) {
    //         $path = $request->file('files')->store('chapters');
    //         $new_chapter->files = $path;
    //     }
    //     $new_chapter->created_by = Auth::user()->id;
    //     $new_chapter->save();
    //     return back()->with('success', 'Chapitre ajouté avec succès');
    // }

    public function addChapter(Request $request){

        $request->validate([
            'type' => 'required|string',
        ], [
            'type.required' => 'Le champ Type est requis.'

        ]);
        if($request->hasfile('files') || $request->description_fr){

            $new_chapter = new Chapter();
            $new_chapter->course_id = @$request->course_id;
            // $new_chapter->designation_fr = $request->designation_fr;
            $new_chapter->type = $request->type;
            $new_chapter->description_fr = $request->description_fr;

            if($request->hasFile('files')) {

                $filePaths = [];

                foreach ($request->file('files') as $file) {
                    $path = $file->store('chapters' . '/' . $file->getClientOriginalName());
                    $filePaths[] = ['download_link' => $path, 'original_name' => $file->getClientOriginalName()];
                }

                $new_chapter->files = json_encode($filePaths);
            }
            $new_chapter->created_by = Auth::user()->id;

            $new_chapter->save();
            return back()->with('success', 'Chapitre ajouté avec succès');
        }else{
            return back()->with('error', 'Veuillez ajouter un fichier ou une description');
        }
    }
    //********************************** Function Add End*****************************************//

    //********************************** Function Edit Start*****************************************//
    public function editCourse($id, $subject_id)
    {
        $teacher_info = Teacher::where('cin', auth()->user()->cin)->first();
        $subjects = @$teacher_info->subjects;
        $coordinate = Coordinate::first();
        $groups = Group::get();
        $courses = Course::where('subject_id', $subject_id)
            ->where('created_by', Auth::user()->id)
            ->paginate(4);
        $page = 'cour';
        $course = Course::find($id);
        $active_page = 'cours';
        return view('intranet.teachers.support_cours', compact('subjects', 'courses', 'subject_id', 'groups', 'page', 'course', 'active_page'));
    }

    public function editChapter($id, $subject_id)
    {
        $teacher_info = Teacher::where('cin', auth()->user()->cin)->first();
        $subjects = @$teacher_info->subjects;
        $coordinate = Coordinate::first();
        $groups = Group::get();
        $courses = Course::where('subject_id', $subject_id)
            ->where('created_by', Auth::user()->id)
            ->paginate(4);
        $page = 'cour';
        $active_page = 'cours';
        $chapter = Chapter::find($id);
        return view('intranet.teachers.support_cours', compact('subjects', 'courses', 'subject_id', 'groups', 'page', 'chapter' , 'active_page'));
    }

    //********************************** Function Edit End*****************************************//

    public function updateCourse(Request $request, $id)
    {
        $new_course = Course::find($id);
        $new_course->designation_fr = $request->designation_fr;
        $new_course->permission_comment = $request->permission_comment;
        if($request->publier == '1' || $request->publier == 'on'){
            $new_course->publier = 1;
        }else{
            $new_course->publier = 0;
        }

        $order = array("\r\n", "\n", "\r");
        $replace = '<br>';
        $content = str_replace($order, $replace, $request->input('description_fr'));
        $new_course->description_fr = $content;
        $new_course->save();
        CoursesGroupTd::where('course_id', $id)->delete();
        if ($request->group) {
            foreach ($request->group as $group_td_id) {
                $pivot = new CoursesGroupTd();
                $pivot->group_td_id = @$group_td_id;
                $pivot->course_id = @$new_course->id;
                $pivot->save();
            }
        }
        return redirect()->route('subject', ['subject_id' => $new_course->subject_id])->with('success', 'Modification terminée avec succès');
    }

    public function updateChapter(Request $request, $id)
    {
        $new_chapter = Chapter::find($id);
        $new_chapter->description_fr = $request->description_fr;
        $new_chapter->type = $request->type;
        // if ($request->hasfile('files')) {
        //     $path = $request->file('files')->store('chapters');
        //     $new_chapter->files = $path;
        // }

        if($request->hasFile('files')) {

            $filePaths = [];

            foreach ($request->file('files') as $file) {
                $path = $file->store('chapters' . '/' . $file->getClientOriginalName());
                $filePaths[] = ['download_link' => $path, 'original_name' => $file->getClientOriginalName()];
            }


            $new_chapter->files = json_encode($filePaths);
        }
        $new_chapter->save();
        return back()->with('success', 'Chapitre Modifié avec succès');
    }

    public function update_chapter(Request $request, $id)
{

    $chapter = Chapter::findOrFail($id);

    $validated = $request->validate([
        'course_id' => 'required|exists:courses,id',
        'type' => 'required|string',
        'description_fr' => 'nullable|string',
        'files.*' => 'nullable|file',
    ]);

    $chapter->update($validated);

    if ($request->hasFile('files')) {
        $files = [];
        foreach ($request->file('files') as $file) {
            $files[] = [
                'path' => $file->store('chapters', 'public'),
                'original_name' => $file->getClientOriginalName(),
            ];
        }
        $chapter->files = json_encode($files);
    }

    return redirect()->back()->with('success', 'Chapter updated successfully!');
}



    //********************************** Function Update End*****************************************//


    //********************************** Function Delete Start*****************************************//
    public function deleteCourse($id)
    {
        $course = Course::find($id)->delete();
        Chapter::where('course_id', $id)->delete();
        Comment::where('course_id', $id)->delete();
        return back()->with('success', 'Suppression terminée avec succès');
    }

    public function deleteChapter($id)
    {
        $chapter = Chapter::find($id)->delete();
        return back()->with('success', 'Suppression terminée avec succès');
    }



    //********************************** Function Delete End*****************************************//

}
