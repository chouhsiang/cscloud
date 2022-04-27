<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AppController;
use App\Http\Controllers\ChartController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;

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

Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/home', function()
{
    return redirect('/');
});

Route::resource('apps', AppController::class);
Route::resource('charts', ChartController::class);

/*
Route::get('/', function () {
    return view('home');
});*/



/*
Route::get('/apps/create/wordpress', function () {
    return view('create');
});


Route::get('/apps/create/custom', function () {
    return view('custom');
});

Route::get('/apps', function () {
    return view('apps');
});

Route::get('/apps/1', function () {
    return view('app');
});
*/





