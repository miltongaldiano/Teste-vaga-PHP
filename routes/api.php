<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\MovieController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::prefix('users')->group(function () {
    Route::post('/store', [UserController::class, 'store'])->name('user.store');
});


Route::middleware('auth:api')->prefix('users')->group(function () {
    Route::get('/movies', [UserController::class, 'movies'])->name('user.movies');
    Route::post('/favorite-movie', [UserController::class, 'favoriteMovie'])->name('user.favoritemovie');
    Route::delete('/favorite-movie-delete/{id}', [UserController::class, 'deleteFavoriteMovie'])->name('user.favoritemovie.delete');
});

Route::resource('movies', MovieController::class)->middleware('auth:api');