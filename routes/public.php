<?php
use App\Http\Controllers\Intranet\CvController;
use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;

Route::fallback(function () {
    return View::make('public.emptystate.not-found');
});

Route::get('/', [MainController::class, 'index'])->name('index');


