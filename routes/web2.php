<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Intranet\SharedController;
use App\Http\Controllers\Intranet\Student\StageStudentController;
use App\Http\Controllers\Intranet\TeacherController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use TCG\Voyager\Facades\Voyager;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

// Route::get('/', function () {
//     return view('publique.contact');
// });

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

    require __DIR__.'/public.php';


//****************************************** Intranet ***************************************************/


// route::get('chat/{chat_id}', [ChatController::class, 'chatForm'])->middleware('auth')->name('chat');
// route::post('chat/{chatid}', [ChatController::class, 'sendMessage'])->middleware('auth');


Route::group(['prefix' => 'intranet'], function () {
    // shared :
    // register company start

    Route::get('/edit_info_company', [SharedController::class, 'editInfoCompany'])->name('edit_info_company');
    Route::post('/updateInfoCompany', [SharedController::class, 'updateInfoCompany'])->name('updateInfoCompany');
    Route::post('register_company', [RegisterController::class, 'registerCompany'])->name('register_company');
    Route::get('show_register_company', [RegisterController::class, 'showRegisterCompany'])->name('show_register_company');
    // register company end
    Route::get('company_offers', [SharedController::class, 'showCompanyOffers'])->name('company_offers');
    Route::post('addOffers', [SharedController::class, 'addOffers'])->name('addOffers');
    Route::post('/updateOffre/{id}', [SharedController::class, 'updateOffre'])->name('updateOffre');
    Route::delete('/delete_offre/{id}', [SharedController::class, 'deleteOffre'])->name('delete_offre');

    Route::get('/', [SharedController::class, 'home'])->name('intranet.home');
    Route::get('/details_actualite/{id}', [SharedController::class, 'actualite'])->name('details_actualite');
    Route::get('/notifications', [SharedController::class, 'notifications'])->name('notifications');
    Route::get('/notification/{id}', [SharedController::class, 'notificationDetails'])->name('notification');
    Route::get('/profile', [SharedController::class, 'profile'])->name('profile');
    Route::post('/update_profil', [SharedController::class, 'updateProfil'])->name('update_profil');
    Route::post('/update_avatar', [SharedController::class, 'updateAvatar'])->name('update_avatar');
    Route::post('/update_password', [SharedController::class, 'updatePassword'])->name('update_password');
    Route::get('/offres', [SharedController::class, 'showOffres'])->name('offres');
    Route::get('/documents', [SharedController::class, 'showDocuments'])->name('documents');
    Route::get('/details_offre/{id}', [SharedController::class, 'showDetailsOffre'])->name('details_offre');
    Route::get('/fiche_renseignements', [SharedController::class, 'fiche_renseignements'])->name('fiche_renseignements');
    Route::post('/info_student', [SharedController::class, 'add_info_student'])->name('info_student');
    Route::get('/claims', [SharedController::class, 'showclaims'])->name('claims');
    Route::get('/claimDetails/{id}', [SharedController::class, 'claimDetails'])->name('claimDetails');
    Route::post('/ClaimComment', [SharedController::class, 'ClaimComment'])->name('ClaimComment');
    Route::post('/add_responsable_claim', [SharedController::class, 'addResponsableClaim'])->name('add_responsable_claim');
    Route::post('/updateStatusClaim', [SharedController::class, 'updateStatusClaim'])->name('updateStatusClaim');


    Route::post('/send_feedback', [SharedController::class, 'sendFeedback'])->name('send_feedback');

    Route::get('/testimonialForm', [SharedController::class, 'testimonialForm'])->name('testimonialForm');
    Route::post('/sendTestimonial', [SharedController::class, 'sendTestimonial'])->name('sendTestimonial');

    Route::get('/showAllCvStudents', [SharedController::class, 'showAllCvStudents'])->name('showAllCvStudents');

    Route::get('/showCompanies', [SharedController::class, 'showCompanies'])->name('showCompanies');
    Route::get('/company_details/{id}', [SharedController::class, 'companyDetails'])->name('company_details');


    Route::get('/afficher/{type}', [SharedController::class, 'emploi'])->name('emploi');

    //teachers :
    Route::get('/print/{id}', [SharedController::class, 'print'])->name('print')->middleware('auth_teacher');
    Route::get('/liste_groupes_ens', [SharedController::class, 'showGroups'])->name('liste_groupes_ens')->middleware('auth_teacher');
    Route::post('/mark_absents', [SharedController::class, 'markAbsents'])->name('mark_absents')->middleware('auth_teacher');


    // student :
    Route::get('/renseignements', [SharedController::class, 'showRenseignements'])->name('renseignements')->middleware('auth_student');
    Route::get('/liste_groupes_stud', [SharedController::class, 'showGroupsStudent'])->name('liste_groupes_stud')->middleware('auth_student');

    Route::get('/library', [SharedController::class, 'library'])->name('library')->middleware('auth');
    Route::post('/booking/{book_id}', [SharedController::class, 'booking'])->name('booking')->middleware('auth');



    Route::get('/nachd_ums', [SharedController::class, 'nachdUms'])->name('nachd_ums')->middleware('auth');

    // Route::get('/doctorale_form', [SharedController::class, 'DoctoraleForm'])->name('doctorale_form');





    /*  Route::get('/cours_students' , [StudentController::class, 'showCoursStudents'])->name('cours_students');  */

    require __DIR__.'/notes.php';

    require __DIR__.'/stages.php';

    require __DIR__.'/chat.php';

    require __DIR__.'/courses.php';

    require __DIR__.'/cv.php';
    require __DIR__.'/eforms.php';

    // auth :

});
Auth::routes();

/* Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
 */
