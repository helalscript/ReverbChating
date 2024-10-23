<?php

use App\Http\Controllers\ChatController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/chat-room', [MessageController::class, 'index'])->name('chat.room');
    Route::get('/chat-show/{id}', [MessageController::class, 'show'])->name('chat.show');
    Route::post('/send-message/{id}', [MessageController::class, 'sendMessage'])->name('send.message');
});

require __DIR__.'/auth.php';
