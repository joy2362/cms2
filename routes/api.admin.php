<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\backend\AdminLoginController;

Route::post('/login', AdminLoginController::class);
