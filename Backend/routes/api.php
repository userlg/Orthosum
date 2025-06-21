<?php

use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {

    Route::get('/ping', [App\Http\Controllers\Api\PingController::class, 'ping']);

    Route::controller(UserController::class)->group(function () {
        Route::post('/users/register', 'register');
        Route::get('/users/get_all_users', 'getUsers');
    });

    Route::get('/user', function (Request $request) {
        return $request->user();
    })->middleware('auth:sanctum');
});
