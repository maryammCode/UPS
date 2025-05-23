<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Intranet\SharedController;
use App\Http\Controllers\TranslationController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use TCG\Voyager\Facades\Voyager;
use App\Http\Controllers\Intranet\SupplierController;
use App\Http\Controllers\Intranet\GestionnaireController;
use App\Http\Controllers\Intranet\RessourceController;
use App\Http\Controllers\Intranet\ReservationController;
use App\Http\Controllers\Intranet\RapportController;
use App\Http\Controllers\Intranet\DashboardController;
use App\Http\Controllers\RetourController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|App\Supplier::count();
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

// Route::get('/', function () {
//     return view('publique.contact');
// });

Route::get('/intranet/statistique', [DashboardController::class, 'index'])
->name('intranet.stat');

Route::get('/intranet/statistique/magasin', [DashboardController::class, 'magasinStat'])
->name('intranet.magasin');


Route::get('/intranet/rapport', [RapportController::class, 'download'])
->name('rapport.download');

Route::get('/intranet/reservation', [RessourceController::class, 'reserve'])
    ->name('intranet.ressources.reserve');

Route::post('/intranet/reservation', [ReservationController::class, 'store'])
    ->name('intranet.ressources.reserve.store');


Route::get('/intranet/reservation/{id}', [ReservationController::class, 'create'])
    ->name('intranet.ressources.reserve.create');

// Show all reservations for admins
Route::get('/intranet/reservdemandes', [ReservationController::class, 'index'])
     ->name('intranet.reservations.index');

// Accept a reservation
Route::post('/intranet/reservdemandes/{id}/accept', [ReservationController::class, 'accept'])
     ->name('intranet.reservations.accept');

// Refuse a reservation
Route::post('/intranet/reservdemandes/{id}/refuse', [ReservationController::class, 'refuse'])
     ->name('intranet.reservations.refuse');



Route::get('intranet/mes-reservations', [ReservationController::class, 'myReservations'])
     ->name('intranet.user.reservations.demandes');

Route::get('intranet/mes-reservations/{id}/edit', [ReservationController::class, 'edit'])
     ->name('intranet.user.reservations.edit');

Route::put('intranet/mes-reservations/{id}/update', [ReservationController::class, 'update'])
     ->name('intranet.user.reservations.update');
 
Route::post('intranet/mes-reservations/{id}/cancel', [ReservationController::class, 'cancel'])
     ->name('intranet.user.reservations.cancel');

     //wuivi des retours
     Route::get('/retours-aujourd-hui', [RetourController::class, 'index'])->name('retours.index');
     Route::post('/retours-aujourd-hui/{id}/retourner', [RetourController::class, 'retourner'])->name('retours.retourner');


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

require __DIR__.'/public.php';


//****************************************** Intranet ***************************************************/
Route::get('/intranet/welcome', [GestionnaireController::class, 'welcome'])->middleware('auth_magasinier')
       ->name('intranet.welcome');
       

Route::group(['prefix' => 'intranet', 'middleware' => ['auth_magasinier_or_webmaster']], function () {

    // Browse Suppliers (Index)
    Route::get('suppliers', [SupplierController::class, 'index'])
        ->name('intranet.suppliers.index');

    Route::get('suppliers/export', [SupplierController::class, 'export'])
        ->name('intranet.suppliers.export');

    // Create Supplier (Form View)
    Route::get('suppliers/create', [SupplierController::class, 'create'])
        ->name('intranet.suppliers.create');

    // Show Supplier (Read)
    Route::get('suppliers/{id}', [SupplierController::class, 'show'])
        ->name('intranet.suppliers.show');

    // Store Supplier (Save New)
    Route::post('suppliers', [SupplierController::class, 'store'])
        ->name('intranet.suppliers.store');

    // Edit Supplier (Form View)
    Route::get('suppliers/{id}/edit', [SupplierController::class, 'edit'])
        ->name('intranet.suppliers.edit');

    // Update Supplier (Save Changes)
    Route::put('suppliers/{id}', [SupplierController::class, 'update'])
        ->name('intranet.suppliers.update');

    // Delete Supplier
    Route::delete('suppliers/{id}', [SupplierController::class, 'destroy'])
        ->name('intranet.suppliers.destroy');

    Route::post('suppliers/import', [SupplierController::class, 'import'])
        ->name('intranet.suppliers.import');

    //search
    Route::get('/suppliers/search', [SupplierController::class, 'search'])
        ->name('intranet.suppliers.search');


        //ressources routes


    // Browse Resources (Index)
    Route::get('ressources', [RessourceController::class, 'index'])
        ->name('intranet.ressources.index');

    // Create Resource (Form View)
     Route::get('ressources/create', [RessourceController::class, 'create'])
        ->name('intranet.ressources.create');

    // Show Resource (Read)
     Route::get('ressources/{id}', [RessourceController::class, 'show'])
        ->name('intranet.ressources.show');

    // Store Resource (Save New)
     Route::post('ressources', [RessourceController::class, 'store'])
        ->name('intranet.ressources.store');

    // Edit Resource (Form View)
     Route::get('ressources/{id}/edit', [RessourceController::class, 'edit'])
        ->name('intranet.ressources.edit');

    // Update Resource (Save Changes)
    Route::put('ressources/{id}', [RessourceController::class, 'update'])
        ->name('intranet.ressources.update');

    // Delete Resource
     Route::delete('ressources/{id}', [RessourceController::class, 'destroy'])
        ->name('intranet.ressources.destroy');



});


// Route::get('/' , function(){
//     return view('test');
// });


//out of group because the group is protected by auth_completed middleware
Route::get('/intranet/fiche_renseignements', [SharedController::class, 'fiche_renseignements'])->name('fiche_renseignements')->middleware('auth');
Route::post('/intranet/info_student', [SharedController::class, 'add_info_student'])->name('info_student');

    //translate

Route::group(['prefix' => 'intranet'], function () {
    // shared :
    // register company start

    Route::get('/test', function () {
    return view('intranet.shared.testpagination');
    });



    Route::get('/all_notifications', [SharedController::class, 'allNotifications'])->name('all_notifications');
    Route::get('/notification_seen/{id}', [SharedController::class, 'notificationSeen'])->name('notification_seen');
    Route::post('/last_notifications', [SharedController::class, 'getLastNotifications'])->name('last_notifications');


    Route::get('/edit_info_company', [SharedController::class, 'editInfoCompany'])->name('edit_info_company');
    Route::post('/updateInfoCompany', [SharedController::class, 'updateInfoCompany'])->name('updateInfoCompany');
    Route::post('register_company', [RegisterController::class, 'registerCompany'])->name('register_company');
    Route::get('show_register_company', [RegisterController::class, 'showRegisterCompany'])->name('show_register_company');
    // register company end
    Route::get('company_offers', [SharedController::class, 'showCompanyOffers'])->name('company_offers');
    Route::post('addOffers', [SharedController::class, 'addOffers'])->name('addOffers');
    Route::post('/updateOffre/{id}', [SharedController::class, 'updateOffre'])->name('updateOffre');
    Route::delete('/delete_offre/{id}', [SharedController::class, 'deleteOffre'])->name('delete_offre');

    Route::post('applyOffer', [SharedController::class, 'applyOffer'])->name('applyOffer');


    // applyOffer from students  (modal in left sidebar)
    Route::post('applyOfferStageStudent', [SharedController::class, 'applyOfferStageStudent'])->name('applyOfferStageStudent');
    Route::post('/updateApplyOfferStageStudent/{id}', [SharedController::class, 'updateApplyOfferStageStudent'])->name('updateApplyOfferStageStudent');

    Route::get('/', [SharedController::class, 'home'])->name('intranet.home');
    Route::get('/forum', [SharedController::class, 'showForum'])->name('forum');
    Route::post('/addForum', [SharedController::class, 'addForum'])->name('addForum');
    Route::get('/forum_details/{id}', [SharedController::class, 'showForumDetails'])->name('forum_details');
    Route::post('/forumComment', [SharedController::class, 'forumComment'])->name('forumComment');
    Route::delete('/deleteCommentForum/{id}', [SharedController::class, 'deleteCommentForum'])->name('deleteCommentForum');
    Route::delete('/deleteForum/{id}', [SharedController::class, 'deleteForum'])->name('deleteForum');

    Route::get('/details_actualite/{id}', [SharedController::class, 'actualite'])->name('details_actualite');
    Route::get('/notifications', [SharedController::class, 'notifications'])->name('notifications');
    Route::get('/notification/{id}', [SharedController::class, 'notificationDetails'])->name('notification');
    Route::get('/profile', [SharedController::class, 'profile'])->name('profile');
    Route::post('/update_profil', [SharedController::class, 'updateProfil'])->name('update_profil');
    Route::post('/update_avatar', [SharedController::class, 'updateAvatar'])->name('update_avatar');
    Route::post('/update_password', [SharedController::class, 'updatePassword'])->name('update_password');
    Route::get('/offres', [SharedController::class, 'showOffres'])->name('offres');
    Route::get('/offers/filter', [SharedController::class, 'filterOffres'])->name('offers_filter');
    Route::get('/documents', [SharedController::class, 'showDocuments'])->name('documents');
    Route::get('/details_offre/{id}', [SharedController::class, 'showDetailsOffre'])->name('details_offre');
    Route::get('/claims', [SharedController::class, 'showclaims'])->name('claims');
    Route::get('/claimDetails/{id}', [SharedController::class, 'claimDetails'])->name('claimDetails');
    Route::post('/ClaimComment', [SharedController::class, 'ClaimComment'])->name('ClaimComment');
    Route::post('/add_responsable_claim', [SharedController::class, 'addResponsableClaim'])->name('add_responsable_claim');
    Route::post('/update_priority_claim', [SharedController::class, 'updatePriorityClaim'])->name('update_priority_claim');
    Route::post('/updateStatusClaim', [SharedController::class, 'updateStatusClaim'])->name('updateStatusClaim');


    Route::post('/send_feedback', [SharedController::class, 'sendFeedback'])->name('send_feedback');

    Route::get('/testimonialForm', [SharedController::class, 'testimonialForm'])->name('testimonialForm');
    Route::post('/sendTestimonial', [SharedController::class, 'sendTestimonial'])->name('sendTestimonial');

    Route::get('/showAllCvStudents', [SharedController::class, 'showAllCvStudents'])->name('showAllCvStudents');

    Route::get('/showCompanies', [SharedController::class, 'showCompanies'])->name('showCompanies');
    Route::get('/company_details/{id}', [SharedController::class, 'companyDetails'])->name('company_details');


    Route::get('/afficher/{type}', [SharedController::class, 'emploi'])->name('emploi');

    //teachers :
  

    // absdense routes :



    // absdense routes  end:

    // student :
    Route::get('/renseignements', [SharedController::class, 'showRenseignements'])->name('renseignements')->middleware('auth_student');
    Route::get('/liste_groupes_stud', [SharedController::class, 'showGroupsStudent'])->name('liste_groupes_stud')->middleware('auth_student');



    Route::get('/library', [SharedController::class, 'library'])->name('library')->middleware('auth');
    Route::post('/booking/{book_id}', [SharedController::class, 'booking'])->name('booking')->middleware('auth');
    Route::post('/library', [SharedController::class, 'filterByTheme'])->name('filterByTheme')->middleware('auth');



    Route::get('/nachd_ums', [SharedController::class, 'nachdUms'])->name('nachd_ums')->middleware('auth');
    Route::get('/folder', [SharedController::class, 'userFolder'])->name('userFolder')->middleware('auth');


    // Route::get('/doctorale_form', [SharedController::class, 'DoctoraleForm'])->name('doctorale_form');






    /*  Route::get('/cours_students' , [StudentController::class, 'showCoursStudents'])->name('cours_students');  */

    require __DIR__.'/notes.php';

    require __DIR__.'/absences.php';

    require __DIR__.'/stages.php';

    require __DIR__.'/chat.php';

    require __DIR__.'/courses.php';

    require __DIR__.'/cv.php';
    require __DIR__.'/eforms.php';
    require __DIR__.'/admin.php';

    // auth :


});
Auth::routes();
// Route::group(['prefix' => 'admin'], function () {
//     Route::post('/users/{user}/approve', 'UserController@approve')->name('users.approve');
//     Voyager::routes();
// });
/* Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
 */
