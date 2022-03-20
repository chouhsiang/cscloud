<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AppController;
use App\Http\Controllers\ChartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OauthLoginController;
use App\Http\Controllers\CallbackController;
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

Route::get('/oidc', [OauthLoginController::class, 'login']);
Route::get('/logout', [OauthLoginController::class, 'logout']);
Route::middleware('web')->get(
    config('oidc-auth.callback_route'),
    [CallbackController::class, 'callback']
)->name('oidc-auth.callback');

Route::resource('apps', AppController::class);
Route::resource('charts', ChartController::class);

// Route::get('/home', function () {
//     return view('home2');
// });



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





