<?php

use App\Http\Controllers\Intranet\CvController;
use Illuminate\Support\Facades\Route;

// Route::get('/profil/{id}' , [CvController::class, 'showProfil'])->name('profil');

Route::get('/print_cv', [CvController::class, 'printCv'])->name('print_cv');
Route::get('/print_cv_2', [CvController::class, 'printCv2'])->name('print_cv_2');
Route::get('/customize_cv' , [CvController::class, 'showCv'])->name('customize_cv');
Route::post('/update_cv_settings' , [CvController::class, 'updateCvSettings'])->name('update_cv_settings');

Route::post('addLanguage',[CvController::class ,'addLanguage'])->name('addLanguage');
Route::post('addExperience',[CvController::class ,'addExperience'])->name('addExperience');
Route::post('addCompetence',[CvController::class ,'addCompetence'])->name('addCompetence');
Route::post('addFormations',[CvController::class ,'addFormations'])->name('addFormations');

Route::post('/edit_formation',[CvController::class, 'edit_formation'])->name('edit_formation');
Route::post('/edit_experience',[CvController::class, 'edit_experience'])->name('edit_experience');
Route::post('/edit_competence',[CvController::class, 'edit_competence'])->name('edit_competence');
Route::post('/edit_add_title_cv',[CvController::class, 'edit_add_title_cv'])->name('edit_add_title_cv');


Route::get('/delete_formation/{id}',[CvController::class, 'delete_formation'])->name('delete_formation');
Route::get('/delete_experience/{id}',[CvController::class, 'delete_experience'])->name('delete_experience');
Route::get('/delete_competence/{id}',[CvController::class, 'delete_competence'])->name('delete_competence');
Route::get('/delete_lg/{id}',[CvController::class, 'delete_lg'])->name('delete_lg');


Route::get('/cv_theme_1/{user_id}' , [CvController::class, 'userCV'])->name('cv_theme_1');
Route::get('/cv_theme_2/{user_id}' , [CvController::class, 'userCVTheme2'])->name('cv_theme_2');
