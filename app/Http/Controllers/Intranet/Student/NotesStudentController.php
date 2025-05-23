<?php

namespace App\Http\Controllers\Intranet\Student;

use App\Claim;
use App\ClaimType;
use App\Coordinate;
use App\Destination;
use App\GroupTd;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Note;
use App\NoteClaim;
use App\StudentsPredefinedList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotesStudentController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'auth_student']);
    }

    public function showNotes()
    {
        $coordonne = Coordinate::first();
        $notes_s1 = Note::where('publier', 1)
        ->where('student_cin', Auth::user()->cin)
        ->where('year_id', $coordonne->current_year_id)
        ->where('semestre', '1')->get();
        $notes_s2 = Note::where('publier', 1)
        ->where('student_cin', Auth::user()->cin)
        ->where('year_id', $coordonne->current_year_id)
        ->where('semestre', '2')->get();
        $rattrapages = Note::where('publier', 1)
        ->where('student_cin', Auth::user()->cin)
        ->where('year_id', $coordonne->current_year_id)
        ->where('semestre', '3')->get();
        $active_page = 'notes';
        $student = StudentsPredefinedList::where('cin', Auth::user()->cin)->first();
        $group_td = GroupTd::find($student->groupe_td_id);

        return view('intranet.students.notes', compact('notes_s1', 'notes_s2', 'active_page', 'rattrapages', 'group_td'));
    }



    public function storeClaim(Request $request)
    {
        $request->validate([
            'note_id' => 'required|exists:notes,id',
            'semester' => 'required|string',
            'description' => 'required|string|min:5'
        ]);

        $note = Note::find($request->note_id);

        if (!$note) {
            return back()->with('error', 'Note non trouvée.');
        }

        // Check if a claim already exists for this note and user
        $claim_type = ClaimType::where('module', 'note')->first();
        $existingClaim = Claim::where('ref_id', $note->id)
            ->where('user_id', Auth::user()->id)
            ->where('claim_type_id', @$claim_type->id)
            ->first();

        if ($existingClaim) {
            return back()->with('error', 'Vous avez déjà soumis une réclamation pour cette note.');
        }

        // Update the note to indicate a reclamation request
        $note->reclamation = 1;
        $note->desc_reclamation = $request->description;
        $note->save();

        // Get the teacher associated with the note
        $teacher = User::where('cin', $note->teacher_cin)->first();

        // Get claim destination
        $destination = Destination::where('module', 'note')->first();

        // Create a new claim record
        $claim = new Claim();
        $claim->ref_id = $note->id;
        $claim->claim_type_id = @$claim_type->id;
        $claim->destination_id = @$destination->id;
        $claim->email = Auth::user()->email;
        $claim->priority = 0;
        $claim->status = 0;
        $claim->subject = "Réclamation de note - " . $note->student_name . " | " . $note->subject;
        $claim->message = "Matière : " . $note->subject . "<br>"
            . "Note : " . $note->note . "<br>"
            . "Semestre : " . $note->semestre . "<br>"
            . "Groupe: " . $note->group_td_designation . "<br>"
            . "Enseignant(e): " . $note->teacher_name . "<br>"
            . "Description : " . $request->description;
        $claim->responsible_id = @$teacher->id;
        $claim->user_id = Auth::user()->id;
        $claim->save();

        return back()->with('success', 'Réclamation envoyée avec succès!');
    }
}
