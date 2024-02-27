<?php

use App\Http\Controllers\GenreController;
use App\Http\Controllers\MovieController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/genres/create', [GenreController::class, 'create'])->name('genres.create');
Route::post('/genres', [GenreController::class, 'store'])->name('genres.store');

Route::get('/genres', [GenreController::class, 'index'])->name('genres.index');

Route::delete('/genres/{id}', [GenreController::class, 'destroy'])->name('genres.destroy');
Route::get('/genres/{id}/edit', [GenreController::class, 'edit'])->name('genres.edit');
Route::put('/genres/{id}', [GenreController::class, 'update'])->name('genres.update');

//Movie
Route::get('/movies', [MovieController::class, 'index'])->name('movies.index');
Route::get('/all-movies', [MovieController::class, 'allMovie'])->name('movies.allMovie');

Route::get('/movies/create', [MovieController::class, 'create'])->name('movies.create');

Route::post('/movies', [MovieController::class, 'store'])->name('movies.store');
Route::get('/movies/{id}/edit', [MovieController::class, 'edit'])->name('movies.edit');
Route::delete('/movies/{id}', [MovieController::class, 'destroy'])->name('movies.destroy');

Route::put('/movies/{id}', [MovieController::class, 'update'])->name('movies.update');
Route::post('/movies/{id}/publish', [MovieController::class, 'publish'])->name('movies.publish');
Route::get('/movies/{id}/show', [MovieController::class, 'show'])->name('movies.show');

Route::get('/', function () {
    return view('welcome');
});
