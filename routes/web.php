<?php

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

Route::get('/welcome', function () {
    return view('welcome');
})->name('shopflower');

Route::middleware('auth')->get('/', function (){
    return view('welcome');
});

Route::get('/index', 'FlowerController@index') -> name('index');

Route::get('/show/{id}', 'FlowerController@show') -> name('show');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');



Route::get('/add-to-cart/{id}', 'FlowerController@addCart') ->name('addCart');
Route::get('/delete-to-cart/{id}', 'FlowerController@delete') ->name('delete-cart');

Route::get('/cart', 'FlowerController@cart') ->name('cart');

