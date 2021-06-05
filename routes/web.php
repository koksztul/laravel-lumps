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

Route::get('/voivodeship/{name}', 'App\Http\Controllers\VoivodshipController@index')->name('voivodship.index');
Route::get('/voivodeship/{voivodeship}/city/{city}', 'App\Http\Controllers\CityController@index')->name('city.index');

Route::get('/voivodeship/{voivodship}/city/{city}/shop-id/{shop}', 'App\Http\Controllers\ShopController@show')->name('shop.show');

Route::get('/add-shop', 'App\Http\Controllers\ShopController@create')->middleware('auth')->name('shop.create');
Route::post('/add-shop', 'App\Http\Controllers\ShopController@store')->middleware('auth');

Route::get('/voivodeship/{voivodship}/city/{city}/shop-id/{shop}/edit', 'App\Http\Controllers\ShopController@edit')->name('shop.edit');
Route::put('/voivodeship/{voivodship}/city/{city}/shop-id/{shop}/edit', 'App\Http\Controllers\ShopController@update');

Route::post('getCities', 'App\Http\Controllers\CityController@getCities')->name('cities.getCites');

Route::delete('shop/image/{image}', 'App\Http\Controllers\ImageController@destroy')->name('image.delete');

Route::post('shop/rate/{id}', 'App\Http\Controllers\ShopController@rating')->name('shop.rating');

Route::post('/comment/store/{shop}', 'App\Http\Controllers\User\CommentController@store')->name('comment.store');
Route::delete('/comment/delete/{comment}', 'App\Http\Controllers\User\CommentController@destroy')->name('comment.delete');
Route::put('/comment/edit/{comment}', 'App\Http\Controllers\User\CommentController@update')->name('comment.edit');

Route::get('/user/my-shops', 'App\Http\Controllers\User\ShopController@index')->name('user.shops.index');
