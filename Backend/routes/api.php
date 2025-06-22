<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\SummaryController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {

    Route::get('/ping', [App\Http\Controllers\Api\PingController::class, 'ping']);

    // ** Login Endpoints **
    Route::post('/login', [AuthController::class, 'login'])->name('login');

    Route::controller(UserController::class)->group(function () {
        Route::post('/users/register', 'register');
        Route::get('/users/get_all', 'getUsers');
    });

    Route::middleware('auth:sanctum')->group(function () {

        Route::controller(SummaryController::class)->group(function () {
            Route::get('/summaries', 'getSummaries');
        });

        Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

        Route::get('/user', function (Request $request) {
            return $request->user();
        });
    });
});
