<?php

use App\Http\Controllers\SearchController;
use App\Http\Controllers\ListController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


Route::get('/', function () {
    if (Auth::check()) {
        // If user is authenticated, redirect to search page
        return redirect('/search');
    }
    // If not authenticated, show the custom welcome page
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard', fn() => redirect('/search'));

Route::middleware(['auth'])->group(function () {
    Route::get('/search', [SearchController::class, 'index'])->name('search.index');
    Route::post('/search', [SearchController::class, 'filter'])->name('search.filter');
    Route::post('/search/save', [SearchController::class, 'saveList'])->name('search.save');

    Route::get('/lists', [ListController::class, 'index'])->name('lists.index');
    Route::get('/lists/{dogList}', [ListController::class, 'show'])->name('lists.show');
    Route::get('/lists/{dogList}/edit', [ListController::class, 'edit'])->name('lists.edit');
    Route::post('/lists/{dogList}/update', [ListController::class, 'update'])->name('lists.update');
    Route::delete('/lists/{dogList}', [ListController::class, 'destroy'])->name('lists.destroy');
});

require __DIR__.'/auth.php';


