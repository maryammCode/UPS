<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Intranet\Student\AbsenceStudentController;
use App\Http\Controllers\Intranet\Teacher\AbsenceTeacherController;





Route::get('/absences_groupes', [AbsenceTeacherController::class, 'showAbsencesGroups'])->name('absences_groupes')->middleware('auth_teacher');
Route::post('/mark_absents', [AbsenceTeacherController::class, 'markAbsents'])->name('mark_absents')->middleware('auth_teacher');

 // Route to display absence details for a specific date and group
 Route::get('/absences/{id}/details', [AbsenceTeacherController::class, 'showDetailsAbsence'])->name('absences.details');
 // Route to update absence status (for within 24 hours only)
 // Route::post('/absences/{absence}/update', [SharedController::class, 'updateAbsence'])->name('absences.update');
 Route::post('/absences/update', [AbsenceTeacherController::class, 'updateAbsence'])->name('absences.update');

 Route::get('/suivi_absences', [AbsenceStudentController::class, 'suiviAbsences'])->name('suivi_absences');
 Route::post('/reclamationAbsence/{id}', [AbsenceStudentController::class, 'reclamationAbsence'])->name('reclamationAbsence');

 Route::get('/print/{id}', [AbsenceTeacherController::class, 'printGroupStudentsAbsences'])->name('print_absences')->middleware('auth_teacher');
