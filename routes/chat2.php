<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Intranet\ChatController;

//***************************** routes chat messagerie start ***********************************************
Route::get('/messages', [ChatController::class, 'showMessage'])->name('messages')->middleware('auth');
Route::get('/messages/{chat_id}', [ChatController::class, 'message'])->name('message')->middleware('auth');
Route::get('/new_messages/{user_id}', [ChatController::class, 'newMessage'])->name('new_message')->middleware('auth');
Route::post('/sendMessageGroup', [ChatController::class, 'sendMessageGroup'])->name('sendMessageGroup')->middleware('auth');
//*************************** routes chat messagerie end ********************************************************