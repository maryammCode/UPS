<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Intranet\SharedController;
use App\Http\Controllers\Intranet\Student\CoursesStudentController;
use App\Http\Controllers\Intranet\Teacher\CoursesTeacherController;





// ********************************** Route courses start *************************************
    // teacher :
    Route::get('/cours', [CoursesTeacherController::class, 'showCours'])->name('cours');
    Route::post('/course/add_course', [CoursesTeacherController::class, 'addCourse'])->name('add_course');
    Route::post('/course/compte_rendu', [CoursesTeacherController::class, 'addCompteRendu'])->name('add_rendu');
    Route::get('/render_details/{id}', [CoursesTeacherController::class, 'renderDetails'])->name('render_details');
    Route::post('/update_compte_rendu/{id}', [CoursesTeacherController::class, 'updateCompteRendu'])->name('update_compte_rendu');
    Route::delete('/delete_compte_rendu/{id}', [CoursesTeacherController::class, 'deleteCompteRendu'])->name('delete_compte_rendu');
    Route::post('/add_compte_rendu_student', [CoursesStudentController::class, 'addCompteRenduStudent'])->name('add_compte_rendu_student');

    Route::post('/course/update_course/{id}', [CoursesTeacherController::class, 'updateCourse'])->name('update_course');
    Route::get('/course/edit_course/{id}/{subject_id}', [CoursesTeacherController::class, 'editCourse'])->name('edit_course');
    Route::get('/course/subject/{subject_id}', [CoursesTeacherController::class, 'showSubject'])->name('subject');
    Route::delete('/delete_course/{id}', [CoursesTeacherController::class, 'deleteCourse'])->name('delete_course');
    Route::delete('/delete_chapter/{id}', [CoursesTeacherController::class, 'deleteChapter'])->name('delete_chapter');
    Route::get('/edit_chapter/{id}/{subject_id}', [CoursesTeacherController::class, 'editChapter'])->name('edit_chapter');
    Route::post('/update_chapter/{id}', [CoursesTeacherController::class, 'updateChapter'])->name('update_chapter');
    Route::post('/add_chapter', [CoursesTeacherController::class, 'addChapter'])->name('add_chapter');

    // student :
    Route::get('/subjects_student/{subject_id}', [CoursesStudentController::class, 'showCourses'])->name('subjects_student');
    Route::get('/courses_student', [CoursesStudentController::class, 'showStudentSubjects'])->name('courses_student');
    // teacher and student :
    Route::delete('/delete_comment/{id}', [SharedController::class, 'deleteComment'])->name('delete_comment');
    Route::get('/course_details/{id}', [SharedController::class, 'courseDetails'])->name('course_details');
    Route::post('/send_comment', [SharedController::class, 'sendComment'])->name('send_comment');
    //******************************** route courses end **********************************************************

