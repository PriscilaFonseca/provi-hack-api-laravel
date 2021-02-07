<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ChallengeController;
use App\Http\Controllers\UserChallengeCompletedController;

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

Route::group(['middleware' => 'auth:sanctum'], function(){

    // safe

    Route::prefix('user')->group(function () {
        Route::get('', [UserController::class, 'getAll']);        
    });

    Route::prefix('challenge')->group(function () {        
        Route::post('register', [ChallengeController::class, 'register']);
        Route::get('{id}', [ChallengeController::class, 'getById']);
    });

    Route::prefix('challenge-completed')->group(function () {        
        Route::post('register', [UserChallengeCompletedController::class, 'register']);
        Route::get('{id}', [UserChallengeCompletedController::class, 'getById']);
    });

});

Route::prefix('user')->group(function () {
    Route::post("authenticate", [UserController::class,'authenticate']);
    Route::post("register", [UserController::class,'register']);
    Route::get("{id}", [UserController::class,'getById']);
});

Route::prefix('challenge')->group(function () {
    Route::get('', [ChallengeController::class, 'getAll']);
    Route::get('{id}', [ChallengeController::class, 'getById']);
});