<?php
use App\Http\Controllers\FormulaireController;
use App\Http\Controllers\Intranet\CvController;
use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;

Route::fallback(function () {
    return View::make('public.emptystate.not-found');
});

Route::get('/ENIS/TV', [MainController::class, 'show_tv'])->name('show_tv');
Route::get('/', [MainController::class, 'index'])->name('index');
Route::get('set-language/{locale}', [MainController::class, 'setLanguage'])->name('set.language');
Route::get('/search', [MainController::class, 'search_general'])->name('search');
Route::get('/logout', [MainController::class, 'logout'])->name('logout');

// news
Route::get('/news', [MainController::class, 'actualites'])->name('actualites');
Route::get('/news/{slug}', [MainController::class, 'actualite'])->name('news.details');
//events
Route::get('/events', [MainController::class, 'events'])->name('events');
Route::get('/events/{slug}', [MainController::class, 'event'])->name('events.details');

//Publications
Route::get('/publications', [MainController::class, 'publications'])->name('publications')->middleware('auth');
Route::get('/publications/{slug}', [MainController::class, 'publication'])->name('publications.details');
//Pages
Route::get('/pages/{slug}', [MainController::class, 'pages'])->name('pages');
//Sectors
Route::get('/sectors/{slug}', [MainController::class, 'formations'])->name('sectors');

//Organisms
Route::get('/organisms/{type_slug}/{slug}', [MainController::class, 'organism'])->name('organisms.details');
Route::get('/organisms/{slug}', [MainController::class, 'organisms_by_type'])->name('organisms.type');
// Route::get('/organisms', [MainController::class, 'organisms_by_type'])->name('organisms.type');
Route::get('/adherer/{club_id}/{type_slug}/{slug}', [MainController::class, 'adherer'])->middleware('auth')->name('adherer');

//tender_OFFERS
Route::get('/tenders', [MainController::class, 'tender'])->name('tenders');
Route::get('/tenders/{slug}',[MainController::class, 'tender_details'])->name('tenders.details')->middleware('auth')->middleware('CheckEntrepriseRole');
Route::post('/tenders/download', [MainController::class,'tender_download'])->name('tenders.download');
Route::post('/submission/upload/{tender_id}', [MainController::class, 'tender_upload'])->name('upload.submissionfiles');


// documents
Route::get('/public_documents',[MainController::class, 'documents'])->name('public_documents');
Route::post('/public_documents/download', [MainController::class,'documents_download'])->name('public_documents.download');

//Departements
Route::get('/departments', [MainController::class,'departments'])->name('departments');
Route::get('/departments/{slug}', [MainController::class,'departments_details'])->name('department.details');





// contact & newsletter
Route::get('/contact', [MainController::class, 'showContactForm'])->name('contact');
Route::post('/contact-send', [MainController::class, 'submitContactForm'])->name('submit.form');
Route::post('/newslettre', [MainController::class, 'newslettre'])->name('newslettre');


//gallery
// Route::get('/galleries/{type}',[MainController::class, 'gallery'])->name('gallery');
// Route::get('/gallery/{slug}',[MainController::class, 'gallery_details'])->name('gallery.details');

Route::get('/gallery',[MainController::class, 'gallery'])->name('gallery');
Route::get('/gallery/{slug}',[MainController::class, 'gallery_details'])->name('gallery.details');
Route::get('/videos',[MainController::class, 'video'])->name('videos');
Route::get('/videos/{slug}',[MainController::class, 'video_details'])->name('videos.details');

// laureates
Route::get('/laureates', [MainController::class, 'laureates'])->name('laureates');


// siteMap
Route::get('/sitemap', function () {
    return view('public.site_map');
})->name('sitemap');

// staff
Route::get('/staff/academic',[MainController::class, 'teachers'])->name('staff/academic');
Route::get('/staff/administrative',[MainController::class, 'personals'])->name('staff/administrative');


// Route::get('/processMenuClick',[MainController::class, 'processMenuClick'] );
// Route::get('/fetchMenu',[MainController::class, 'fetchMenu'] )->name('fetch.menu');

Route::get('/partenaires/{slug}', [MainController::class, 'partenaires'])->name('partenaires');




Route::get('/public_cv/{user_id}' , [MainController::class, 'userCV'])->name('public_cv');


;






Route::get('/formulaires', [FormulaireController::class, 'publicForms'])->name('public_formulaires');

Route::get('/formulaires', [FormulaireController::class, 'publicForms'])->name('formulaires');
Route::get('/formulaire/{code}/{source}', [FormulaireController::class, 'formulaire'])->name('formulaire');
Route::post('/save_formulaire_request', [FormulaireController::class, 'save_formulaire_request'])->name('save_formulaire_request');
Route::get('/demandes', [FormulaireController::class, 'account_formulaires_en_ligne'])->name('demandes');
Route::get('/public_print_form/{from}/{tentative}', [FormulaireController::class, 'public_print_form'])->name('public_print_form');

// Route::get('/formulaires', [MainController::class, 'formulaires'])->name('formulaires');


Route::get('/ouvrages', [MainController::class, 'ouvrages'])->name('ouvrages')->middleware('auth');
Route::post('/booking/{book_id}', [MainController::class, 'booking'])->name('booking')->middleware('auth');
