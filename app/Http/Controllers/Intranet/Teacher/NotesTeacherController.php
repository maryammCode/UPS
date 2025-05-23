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
use App\Note;
use App\Period;
use App\Subject;
use App\Teacher;
use Carbon\Carbon;
use Illuminate\Http\Request;

class NotesTeacherController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'auth_teacher']);
    }

    public function showNoteStudents()
    {
        $teacher_info = Teacher::where('cin', auth()->user()->cin)->first();
        $seances = Period::all();
        $groups = Group::where('publier', 1)->get();
        $subjects = @$teacher_info->subjects;
        $active_page = 'showNoteStudents';
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

        return view('intranet.teachers.notes_students', compact('groups', 'active_page', 'subjects', 'seances' , 'page' , 'min_date'));
    }

    public function markNotes(Request $request)
    {

        $request->validate([
            'group_td_id' => 'required',
            'subject_id' => 'required',
        ]);
        $current_semester = Coordinate::first()->current_semester;

        $group_td = GroupTd::find($request->group_td_id);
        $teacherCin = auth()->user()->cin;
        $subject = Subject::find($request->subject_id);
        $existingNote = Note::where('group_td_id', $group_td->id)
        ->where('subject',  $subject->designation_fr.' '.$request->type_subject)
        ->where('semestre', $current_semester) //!!!!!!!!!!!!!!!!!!!!!!!!!!
        ->where('teacher_cin', $teacherCin)
        ->first();

        if ($existingNote) {
            return redirect()->route('showNoteStudents')->with('error', "Vous avez déjà saisi les notes pour ce groupe");
        }
        $students = $group_td->students;
        $subject = Subject::find($request->subject_id);

        $yearId = Coordinate::first()->current_year_id;
        $date = $request->input('date');

        foreach ($students as $student) {
            $noteInput = 'note' . $student->id;
            $noteValue = $request->input($noteInput);

            if ($noteValue !== null) {



                $note = new Note();
                $note->student_cin = $student->cin;
                $note->student_name = $student->nom . ' ' . $student->prenom;
                $note->subject_id = $request->subject_id;
                $note->subject = $subject->designation_fr.' '.$request->type_subject;
                $note->note = $noteValue;
                $note->semestre = $current_semester;
                $note->year_id = $yearId;
                $note->created_by = auth()->user()->name;
                $note->teacher_cin = $teacherCin;
                $note->teacher_name = auth()->user()->name;
                $note->reclamation = 0;
                $note->group_td_id = $group_td->id;
                $note->group_td_designation = $group_td->designation_fr;
                $note->save();
            }
        }


        return redirect()->route('showNoteStudents')->with('success', 'Mise a jour effectue avec succes');
    }

    public function printGroupStudentsNotes($id)
    {
        $group_td = GroupTd::where('publier', 1)->where('id', $id)->first();
        return view('intranet.teachers.notes_print_students_list', compact('group_td'));
    }

}
