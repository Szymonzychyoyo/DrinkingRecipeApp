<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\BookOrderController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [RecipeController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('recipes', RecipeController::class)->middleware('auth');
Route::post('recipes/{recipe}/share', [RecipeController::class, 'share'])->name('recipes.share');
Route::get('shared-recipes', [RecipeController::class, 'shared'])->name('recipes.shared');
Route::post('recipes/{recipe}/comments', [CommentController::class, 'store'])->name('comments.store');
Route::delete('comments/{comment}', [CommentController::class, 'destroy'])->name('comments.destroy');
Route::middleware('auth')->group(function () {
    Route::get('/book-order/create', [BookOrderController::class, 'create'])->name('book-order.create');
    Route::post('/book-order/store', [BookOrderController::class, 'store'])->name('book-order.store');
});


require __DIR__.'/auth.php';
