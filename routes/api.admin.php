<?php

use App\Http\Controllers\backend\{
    AdminAuthController,
    AdminLoginController
};
use Illuminate\Support\Facades\Route;

Route::post('/login', AdminLoginController::class);
Route::middleware('auth:sanctum')->controller(AdminAuthController::class)->group(function (){
    Route::get('/me','me');
});
