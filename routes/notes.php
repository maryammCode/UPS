<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Intranet\Student\NotesStudentController;
use App\Http\Controllers\Intranet\Teacher\NotesTeacherController;

    // ********************************** Route Notes start *************************************
    Route::get('/notes', [NotesStudentController::class, 'showNotes'])->name('notes');
    Route::post('/store-marks', [NotesStudentController::class, 'storeClaim'])->name('storeMarks');

    Route::post('/mark_notes', [NotesTeacherController::class, 'markNotes'])->name('mark_notes')->middleware('auth_teacher');

    Route::get('/print_notes/{id}', [NotesTeacherController::class, 'printGroupStudentsNotes'])->name('print_notes')->middleware('auth_teacher');
    Route::get('/show_note_students', [NotesTeacherController::class, 'showNoteStudents'])->name('showNoteStudents')->middleware('auth_teacher');
    // ********************************** Route Notes start *************************************
