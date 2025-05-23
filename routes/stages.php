<?php

use App\Http\Controllers\Intranet\Company\StageCompanyController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Intranet\SharedController;
use App\Http\Controllers\Intranet\Teacher\StageTeacherController;
use App\Http\Controllers\Intranet\Student\StageStudentController;



   //******************************** routes stage start **********************************************************
    // student :
    Route::post('applyOfferFromStudent/{id}', [StageStudentController::class, 'applyOfferFromStudent'])->name('applyOfferFromStudent');
    Route::post('CompanyApply', [StageStudentController::class, 'CompanyApply'])->name('CompanyApply');

    Route::get('/candidatureStudent', [StageStudentController::class, 'candidatureStudent'])->name('candidatureStudent')->middleware('auth');
    Route::get('/candidatureCompany', [StageCompanyController::class, 'candidatureCompany'])->name('candidatureCompany')->middleware('auth');
    Route::get('/stagesCompany', [StageCompanyController::class, 'stagesCompany'])->name('stagesCompany')->middleware('auth');
    Route::post('/updateStatusStage', [StageCompanyController::class, 'updateStatusStage'])->name('updateStatusStage')->middleware('auth');


    Route::get('/stages_students', [StageStudentController::class, 'showStages'])->name('stages_students')->middleware('auth_student');
    Route::post('/add_version_rapport/{stage_id}', [StageStudentController::class, 'addVersionRapport'])->name('add_version_rapport')->middleware('auth_student');
    //teacher :
    Route::get('/stages_encadrant', [StageTeacherController::class, 'showStagesEns'])->name('stages_encadrant')->middleware('auth_teacher');
    Route::post('/add_avis_encadrant/{id}', [StageTeacherController::class, 'addAvisEncadrant'])->name('add_avis_encadrant');
    Route::post('/update_rapport/{rapport_id}', [StageTeacherController::class, 'updateRapport'])->name('update_rapport');
    Route::post('/autorise_rapport/{id}', [StageTeacherController::class, 'autoriseRapport'])->name('autorise_rapport');
    Route::delete('/delete_rapport/{id}', [StageTeacherController::class, 'deleteRapport'])->name('delete_rapport')->middleware('auth_teacher');
    Route::post('/add_rapport_ens/{rapport_id}', [StageTeacherController::class, 'addRapportEns'])->name('add_rapport_ens')->middleware('auth_teacher');
    //teacher and student (blade details stage) :
    Route::get('/stage_details/{id}', [SharedController::class, 'showStageDetails'])->name('stage_details');
    Route::post('/update_stage_status' , [StageTeacherController::class, 'updateStageStatus'])->name('update_stage_status');
    Route::post('/teacherAcceptStage' , [StageTeacherController::class, 'teacherAcceptStage'])->name('teacherAcceptStage');

    Route::post('/generate_activity_report' , [StageStudentController::class , 'generateActivityReport'])->name('generate_activity_report');
    /* company */

    Route::get('/trainings_list' , [StageCompanyController::class , 'showStages'])->name('stages_companies')->middleware('auth_company');
    Route::post('/CompanyAcceptStage' , [StageCompanyController::class, 'CompanyAcceptStage'])->name('CompanyAcceptStage');
    Route::post('/upload_file_company' , [StageCompanyController::class, 'uploadFileCompany'])->name('upload_file_company');






    Route::post('/deleteStageStudent/{id}' , [StageStudentController::class, 'deleteStageStudent'])->name('deleteStageStudent');
    Route::post('/create_stage' , [StageStudentController::class, 'createStage'])->name('create_stage');
    Route::post('/create_activity' , [StageStudentController::class, 'createActivity'])->name('create_activity');
    Route::delete('/delete_activity' , [StageStudentController::class, 'deleteActivity'])->name('delete_activity');
   // ********************************* route stages end ***********************************************************
