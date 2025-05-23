<?php
 use App\Http\Controllers\MainController;
 use Illuminate\Support\Facades\Route;
Route::get('/forms', [MainController::class, 'index'])->name('forms')->middleware('auth');
Route::get('/formulaire/{code}/{source}', [MainController::class, 'index'])->name('formulaire');
Route::post('/save_formulaire_request', [MainController::class, 'index'])->name('save_formulaire_request')->middleware('auth');
Route::get('/demandes', [MainController::class, 'index'])->name('demandes');
Route::get('/print_form/{from}/{tentative}', [MainController::class, 'index'])->name('print_form');
