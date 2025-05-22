<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QuestionController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/question', [QuestionController::class, 'index'])->name('question.index');
Route::post('/question/store', [QuestionController::class, 'store'])->name('question.store');
Route::get('/question/{question}/edit', [QuestionController::class, 'edit'])->name('question.edit');
Route::put('/question/{question}', [QuestionController::class, 'update'])->name('question.update');
Route::patch('/question/{question}/archive', [QuestionController::class, 'archive'])->name('question.archive');
Route::patch('/question/{question}/restore', [QuestionController::class, 'restore'])->name('question.restore');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
