<?php

use App\Http\Controllers\Backend\{
    AdminRole\AdminRoleController,
    Auth\AdminAuthController,
    Auth\ProfileController
};
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin authentication related route
|--------------------------------------------------------------------------
*/

Route::controller(AdminAuthController::class)->group(function () {
    Route::get('/forget-password', 'forgetPassword');
    Route::post('/password-reset', 'passwordReset');
    Route::post('/login', 'login');
});

Route::middleware('auth:sanctum')
    ->group(function () {
        /*
        |--------------------------------------------------------------------------
        | Auth related route
        |--------------------------------------------------------------------------
        */
        Route::controller(AdminAuthController::class)->group(function () {
            Route::get('/me', 'me');
            Route::post('/logout', 'logout');
        });
        /*
        |--------------------------------------------------------------------------
        | profile related route
        |--------------------------------------------------------------------------
        */
        Route::controller(ProfileController::class)->prefix('profile')->group(function () {
            Route::get('/', 'profile');
            Route::post('/password', 'changePassword');
            Route::post('/general', 'changeGeneral');
            Route::post('/image', 'changeProfileImage');
        });
        /*
        |--------------------------------------------------------------------------
        | Resource routes
        |--------------------------------------------------------------------------
        */
        Route::middleware('permission:admin')->group(function () {
            Route::apiResources([
                'role' => AdminRoleController::class,
                'demo' => ProfileController::class,
            ]);
        });
        Route::get('get-permissions', [AdminRoleController::class, 'getPermissions']);
    });
