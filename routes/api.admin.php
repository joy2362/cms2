<?php

use App\Http\Controllers\Backend\{Auth\AdminAuthController, Auth\LoginController, Auth\ProfileController};
use Illuminate\Support\Facades\Route;


/*
 * Admin authentication related route
 *
 * */
Route::post('/login', LoginController::class);


Route::middleware('auth:sanctum')
    ->group(function () {

        //auth related route
        Route::controller(AdminAuthController::class)->group(function () {
            Route::get('/me', 'me');
            Route::post('/logout', 'logout');
        });

        //profile related route
        Route::controller(ProfileController::class)->prefix('profile')->group(function () {
            Route::get('/', 'profile');
            Route::post('/password', 'changePassword');
            Route::post('/general', 'changeGeneral');
        });
    });
