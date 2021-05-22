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
    return view('list');
});

Auth::routes();

Route::get('/list', 'App\Http\Controllers\ShopController@index')->name('list');


Route::get('voivodship/{name}', 'App\Http\Controllers\VoivodshipController@index')->name('voivodship.index');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
