<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Intranet\ChatController;

//***************************** routes chat messagerie start ***********************************************
Route::get('/messages', [ChatController::class, 'showMessage'])->name('messages')->middleware('auth');


/* select chat from recent list */
Route::get('/messages/{chat_id}', [ChatController::class, 'message'])->name('message')->middleware('auth');

/* select new user from dropdown */
Route::get('/new_messages/{user_id}', [ChatController::class, 'newMessage'])->name('new_message')->middleware('auth');


Route::post('/sendMessage', [ChatController::class, 'sendMessage'])->middleware('auth');

//create chat group from modal
Route::post('/sendMessageGroup', [ChatController::class, 'sendMessageGroup'])->name('sendMessageGroup')->middleware('auth');
//*************************** routes chat messagerie end ********************************************************
