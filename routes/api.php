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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/register', [\App\Http\Controllers\API\UserController::class, 'store']);

Route::group(['prefix' => 'user'], function () {
    Route::get('/', [\App\Http\Controllers\API\UserController::class, 'index']);
    Route::patch('/', [\App\Http\Controllers\API\UserController::class, 'update']);
});

Route::group(['prefix' => 'films'], function () {
    Route::get('/', [\App\Http\Controllers\API\FilmController::class, 'index']);
    Route::post('/', [\App\Http\Controllers\API\FilmController::class, 'store']);
    Route::patch('/{id}', [\App\Http\Controllers\API\FilmController::class, 'update'])
        ->where('id', '\d+');
    Route::get('/{id}', [\App\Http\Controllers\API\FilmController::class, 'show'])
        ->where('id', '\d+');
    Route::post('/{id}/favorite', [\App\Http\Controllers\API\FavoriteController::class, 'store'])
        ->where('id', '\d+');
    Route::delete('/{id}/favorite', [\App\Http\Controllers\API\FavoriteController::class, 'destroy'])
        ->where('id', '\d+');
    Route::get('/{id}/similar', [\App\Http\Controllers\API\FilmController::class, 'getSimilar'])
        ->where('id', '\d+');
    Route::get('/{id}/comments', [\App\Http\Controllers\API\CommentController::class, 'show'])
        ->where('id', '\d+');
    Route::post('/{id}/comments', [\App\Http\Controllers\API\CommentController::class, 'store'])
        ->where('id', '\d+');
});

Route::group(['prefix' => 'genres'], function () {
    Route::get('/', [\App\Http\Controllers\API\GenreController::class, 'index']);
    Route::patch('/{genre}', [\App\Http\Controllers\API\GenreController::class, 'update']);
});

Route::get('/favorite', [\App\Http\Controllers\API\FavoriteController::class, 'index']);

Route::group(['prefix' => 'comments'], function () {
    Route::patch('/{comment}', [\App\Http\Controllers\API\CommentController::class, 'update']);
    Route::delete('/{comment}', [\App\Http\Controllers\API\CommentController::class, 'destroy']);
});

Route::group(['prefix' => 'promo'], function () {
    Route::get('/', [\App\Http\Controllers\API\PromoController::class, 'index']);
    Route::post('/{id}', [\App\Http\Controllers\API\PromoController::class, 'store'])
        ->where('id', '\d+');
});




