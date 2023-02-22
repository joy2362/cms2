<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\backend\{
    AdminAuthController,
    AdminLoginController
};


/*
 * Admin authentication related route
 *
 * */
Route::post('/login', AdminLoginController::class);
Route::middleware('auth:sanctum')
    ->controller(AdminAuthController::class)
    ->group(function () {
    Route::get('/me', 'me');
    Route::post('/logout', 'logout');
});
