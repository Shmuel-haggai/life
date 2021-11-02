<?php

use Illuminate\Support\Facades\Auth;
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




Auth::routes();

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    Route::resource('listes', App\Http\Controllers\Admin\ListeController::class, ["as" => 'admin']);
    Route::resource('liens', App\Http\Controllers\Admin\LienController::class, ["as" => 'admin']);
    Route::resource('photos', App\Http\Controllers\Admin\PhotoController::class, ["as" => 'admin']);
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::group(['prefix' => 'admin'], function () {
    Route::resource('tests', App\Http\Controllers\Admin\TestController::class, ["as" => 'admin']);
});


Route::group(['prefix' => 'admin'], function () {
    Route::resource('jagos', App\Http\Controllers\Admin\JagoController::class, ["as" => 'admin']);
});


Route::group(['prefix' => 'admin'], function () {
    Route::resource('personnes', App\Http\Controllers\Admin\PersonneController::class, ["as" => 'admin']);
});