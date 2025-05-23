<?php

/*
|--------------------------------------------------------------------------
| Web Routes ISSATSo
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Http\Controllers\FormulaireController;
use App\Http\Controllers\frontControllers\FormationController;
use App\Http\Controllers\frontControllers\MailToNewslettreController;
use App\Http\Controllers\frontControllers\ServiceController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MaatwebsiteDemoController;
use TCG\Voyager\Http\Controllers\SpecificController;
use Illuminate\Http\Request;

Route::get('/', function(){
    return redirect()->route('voyager.dashboard');
    //return view('welcome');
    //return redirect()->route('get_liste_absences');
});
/*Route::get('/liste_absences', function(){
    return view('liste_absences');
})->name('get_liste_absences');*/
/*Route::post('/liste_absences', function(Request $request){
    $specific_absences = App\Absence::where('cin', @$request->input('cin'))->get();
    $student_info = App\Absence::where('cin', @$request->input('cin'))->first();
    if($student_info){
        return view('liste_absences', [
        	'nom' => @$student_info->nom,
        	'prenom' => @$student_info->prenom,
        	'groupe' => @$student_info->groupe,
        	'cin' => @$request->input('cin'),
        	'specific_absences' => $specific_absences
        ]);
    }else{
        return redirect()->route('get_liste_absences')->with('msg', 'Vous n\'êtes pas concerné(e) par l\'élimination.');
    }
})->name('liste_absences');*/

//Route::get('/', [WelcomeController::class , 'index'])->name('index');
Route::get('/delete_absences', function () {
    $all_absences = App\Absence::all();
    foreach ($all_absences as $the_absence) {
        $specific_absence = App\Absence::find($the_absence->id);
        $specific_absence->delete();
    }
    return redirect()->route('voyager.absences.index');
})->middleware('admin.user');

Route::get('changelang/{lang}', ['as' => 'changelang', 'uses' => 'frontControllers\WelcomeController@lang']);

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});






//formation
Route::get('/formations/{id}', [FormationController::class, 'index'])->name('formations');


//MailtoNewsLettres
Route::get('/mailtonewslettre', [MailToNewslettreController::class, 'index'])->name('mailtonewslettre')->middleware('admin.user');
Route::post('/mailtonewslettre', [MailToNewslettreController::class, 'send'])->name('mailtonewslettre')->middleware('admin.user');





//services
Route::get('/formulaires', [ServiceController::class, 'formulaires'])->name('formulaires');

Route::get('/documents', [ServiceController::class, 'documents'])->name('demandes');
Route::get('/documents/{type}', [ServiceController::class, 'specific_documents'])->name('demande');

Route::get('/inscription', [ServiceController::class, 'inscription'])->name('inscription');
Route::get('/fiche_renseignement', [ServiceController::class, 'fiche_renseignement'])->name('fiche_renseignement');
Route::get('/fiche_renseignement_ens', [ServiceController::class, 'fiche_renseignement_ens'])->name('fiche_renseignement_ens');


Route::get('/imprim_admin_fiche_renseignement/{id}', [ServiceController::class, 'imprim_admin_fiche_renseignement'])->name('imprim_admin_fiche_renseignement')->middleware('admin.user');
Route::get('/imprim_admin_fiche_renseignement_ens/{id}', [ServiceController::class, 'imprim_admin_fiche_renseignement_ens'])->name('imprim_admin_fiche_renseignement_ens')->middleware('admin.user');

Route::post('/consult_file', [ServiceController::class, 'consult_file'])->name('consult_file');
Route::post('/verify_cin', [ServiceController::class, 'verify_cin'])->name('verify_cin');
Route::get('/candidature', [ServiceController::class, 'candidature'])->name('candidature');
Route::get('/consultation', [ServiceController::class, 'consultation'])->name('consultation');

Auth::routes();





Route::get('/liste_groupes', [ServiceController::class, 'liste_groupes'])->name('liste_groupes');
Route::get('/print_liste_groupes/{groupe_type}/{groupe_id}', [ServiceController::class, 'print_liste_groupes'])->name('print_liste_groupes');
Route::get('/examens', [ServiceController::class, 'examens'])->name('examens');
Route::get('/calendrier_universitaire', [ServiceController::class, 'calendrier_universitaire'])->name('calendrier_universitaire');
Route::get('/orientations_strategiques', [ServiceController::class, 'orientations_strategiques'])->name('orientations_strategiques');


//Route::get('/print_form/{from}/{tentative}' , [IntranetController::class , 'print_form'])->name('print_form');
Route::get('/print_form/{from}/{tentative}', [FormulaireController::class, 'print_form'])->name('print_form');

//Route::get('/admin_print_form/{tentative}' , [IntranetController::class , 'admin_print_form'])->name('admin_print_form');


//Routes for ExportImport Excel
Route::get('importExport/{model}', [MaatwebsiteDemoController::class, 'importExport'])->name('import_export')->middleware('admin.user');
Route::get('downloadExcel/{model}/{type}', [MaatwebsiteDemoController::class, 'downloadExcel'])->name('download_excel')->middleware('admin.user');
Route::post('importExcel', [MaatwebsiteDemoController::class, 'importExcel'])->name('importExcel')->middleware('admin.user');

//Routes Upload Images for Emploi
Route::get('upload_emplois/{type}', [FormationController::class, 'UploadEmploi'])->name('upload_emplois')->middleware('admin.user');
Route::post('upload_images', [FormationController::class, 'UploadImages'])->name('upload_images')->middleware('admin.user');

//Route Confirmation users
//Route::get('action_session_users/{id}/{action}', [HomeController::class , 'ActionSessionUsers'])->name('action_session_users')->middleware('admin.user');




//Route::get('delete_all/{table}', [HomeController::class , 'DeleteAll'])->name('delete_all')->middleware('admin.user');
//Route::get('maj_site', [HomeController::class , 'Maj'])->name('maj_site')->middleware('admin.user');
Route::post('inscription_sheet_save', [ServiceController::class, 'inscription_sheet_save'])->name('inscription_sheet_save');
Route::post('inscription_sheet_ens_save', [ServiceController::class, 'inscription_sheet_ens_save'])->name('inscription_sheet_ens_save');



//Partie Formulaire
Route::get('/formulaire_ligne/{code}', [FormulaireController::class, 'formulaire_ligne'])->name('formulaire_ligne');
Route::get('/formulaire_ligne', [FormulaireController::class, 'formulaire_en_ligne'])->name('formulaire_en_ligne');
Route::post('save_form', [FormulaireController::class, 'save_form'])->name('save_form');
/*Route::get('/admin/request_formulaires/{form_id}', [
    'uses' => [FormulaireController::class , 'request_formulaires'],
    'as' => 'request_formulaires',
    'middleware' => 'admin.user'
]);*/


//Route Confirmation confidentiel content POSTS
//Route::get('action_confidentiel_content_posts/{id}/{action}/{from}', [HomeController::class , 'ActionConfidentielContentPosts'])->name('action_confidentiel_content_posts')->middleware('admin.user');




/*
//Importation_Exportaiton_Excel
Route::post('/import' , [SpecificController::class , 'import'])->name('import');
Route::post('/export' , [SpecificController::class , 'export'])->name('export');
//Consulter_réponses_formulaires
Route::get('/request_formulaires/{form_id}' , [SpecificController::class , 'request_formulaires'])->name('request_formulaires')->middleware('admin.user');
//Partie Article confidentiel
Route::get('/confidentiel_article' , [SpecificController::class , 'confidentiel_article'])->name('confidentiel_article')->middleware('admin.user');
//MailtoNewsLettres
Route::get('/mailtonewslettre' , [SpecificController::class , 'index'])->name('mailtonewslettre')->middleware('admin.user');
Route::post('/mailtonewslettre' , [SpecificController::class , 'send'])->name('mailtonewslettre')->middleware('admin.user');
//MAJ_reservation
Route::get('/modifier_etat_reservation/{id}/{action}', [SpecificController::class, 'ModifierEtatReservationBibliotheque'])->name('modifier_etat_reservation_bibliotheque')->middleware('admin.user');
//Imprime_fiche_renseignement
Route::get('/imprim_admin_fiche_renseignement/{id}', [SpecificController::class, 'imprim_admin_fiche_renseignement'])->name('imprim_admin_fiche_renseignement')->middleware('admin.user');
Route::get('/imprim_admin_fiche_renseignement_ens/{id}', [SpecificController::class, 'imprim_admin_fiche_renseignement_ens'])->name('imprim_admin_fiche_renseignement_ens')->middleware('admin.user');
//Route Confirmation users
Route::get('action_session_users/{id}/{action}', [SpecificController::class, 'ActionSessionUsers'])->name('action_session_users')->middleware('admin.user');
//Delete_all_specific_data
Route::get('delete_all/{table}', [SpecificController::class, 'DeleteAll'])->name('delete_all')->middleware('admin.user');
//MAJ_site
Route::get('maj_site', [SpecificController::class, 'Maj'])->name('maj_site')->middleware('admin.user');
//Route Confirmation confidentiel content POSTS
Route::get('action_confidentiel_content_posts/{id}/{action}/{from}', [SpecificController::class , 'ActionConfidentielContentPosts'])->name('action_confidentiel_content_posts')->middleware('admin.user');
//save_note_article_confidentil
Route::post('save_note_post' , [SpecificController::class , 'save_note_post'])->name('save_note_post');
*/
//Your All Empty Cache facade value:


Route::get('/route_cache', function() {
     $exitCode = Artisan::call('route:clear');
     return 'Routes cache cleared';
 });

 Route::get('/config-cache', function() {
     $exitCode = Artisan::call('config:cache');
     return 'Config cache cleared';
 });

 Route::get('/clear-cache', function() {
     $exitCode = Artisan::call('cache:clear');
     return 'Application cache cleared';
 });

 Route::get('/view-clear', function() {
     $exitCode = Artisan::call('view:clear');
     return 'View cache cleared';
 });
