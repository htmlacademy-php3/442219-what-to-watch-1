<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::post('/register', [\App\Http\Controllers\Api\RegisterController::class, 'store']);
Route::post('/login', [\App\Http\Controllers\Api\LoginController::class, 'store']);


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/logout', [\App\Http\Controllers\Api\LogoutController::class, 'destroy']);

Route::group(['prefix' => 'user'], function () {
    Route::get('/', [\App\Http\Controllers\Api\UserController::class, 'show']);
    Route::patch('/', [\App\Http\Controllers\Api\UserController::class, 'update']);
});

Route::group(['prefix' => 'films'], function () {
    Route::get('/', [\App\Http\Controllers\Api\FilmController::class, 'index']);
    Route::post('/', [\App\Http\Controllers\Api\FilmController::class, 'store']);
    Route::patch('/{id}', [\App\Http\Controllers\Api\FilmController::class, 'update'])
        ->where('id', '\d+');
    Route::get('/{id}', [\App\Http\Controllers\Api\FilmController::class, 'show'])
        ->where('id', '\d+');
    Route::post('/{id}/favorite', [\App\Http\Controllers\Api\FavoriteController::class, 'store'])
        ->where('id', '\d+');
    Route::delete('/{id}/favorite', [\App\Http\Controllers\Api\FavoriteController::class, 'destroy'])
        ->where('id', '\d+');
    Route::get('/{id}/similar', [\App\Http\Controllers\Api\FilmController::class, 'getSimilar'])
        ->where('id', '\d+');
    Route::get('/{id}/comments', [\App\Http\Controllers\Api\CommentController::class, 'show'])
        ->where('id', '\d+');
    Route::post('/{id}/comments', [\App\Http\Controllers\Api\CommentController::class, 'store'])
        ->where('id', '\d+');
});

Route::group(['prefix' => 'genres'], function () {
    Route::get('/', [\App\Http\Controllers\Api\GenreController::class, 'index']);
    Route::patch('/{genre}', [\App\Http\Controllers\Api\GenreController::class, 'update']);
});

Route::get('/favorite', [\App\Http\Controllers\Api\FavoriteController::class, 'index']);

Route::group(['prefix' => 'comments'], function () {
    Route::patch('/{comment}', [\App\Http\Controllers\Api\CommentController::class, 'update']);
    Route::delete('/{comment}', [\App\Http\Controllers\Api\CommentController::class, 'destroy']);
});

Route::group(['prefix' => 'promo'], function () {
    Route::get('/', [\App\Http\Controllers\Api\PromoController::class, 'index']);
    Route::post('/{id}', [\App\Http\Controllers\Api\PromoController::class, 'store'])
        ->where('id', '\d+');
});




