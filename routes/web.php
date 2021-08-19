<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/structured', function () {
    return view('structured');
});

Route::get('/fire', function () {
    return view('fire');
});

Route::get('/cctv', function () {
    return view('cctv');
});

Route::get('/access', function () {
    return view('access');
});

Route::get('/home', function () {
    return view('home');
});
