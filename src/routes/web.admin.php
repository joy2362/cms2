<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register admin web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

foreach (config('admin.route.routes', []) as $route) {
    Route::view($route['url'], config('admin.route.view'))->name($route['name'] ?? '');
}
