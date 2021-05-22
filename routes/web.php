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


Auth::routes();

Route::get('/', 'App\Http\Controllers\ShopController@index')->name('shop.index');

Route::get('{name}', 'App\Http\Controllers\VoivodshipController@index')->name('voivodship.index');
Route::get('/{voivodeship}/{city}', 'App\Http\Controllers\CityController@index')->name('city.index');

Route::get('/{voivodeship}/{city}/shop-id/{shop}', 'App\Http\Controllers\ShopController@show')->name('shop.show');
