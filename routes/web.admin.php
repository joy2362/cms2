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

Route::get('/dashboard',function(){
    return view('admin');
});

Route::get('/profile',function(){
    return view('admin');
});

Route::get('/login',function(){
    return view('admin');
});

Route::get('/chat',function(){
    return view('admin');
});
