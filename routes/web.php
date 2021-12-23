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
    return view('home');
});

Route::get('/market/apps', function () {
    return view('market');
});

Route::get('/market/apps/wordpress', function () {
    return view('wordpress');
});

Route::get('/apps/create/wordpress', function () {
    return view('create');
});


Route::get('/apps/create/custom', function () {
    return view('custom');
});

Route::get('/apps', function () {
    return view('apps');
});



