<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\URL;


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

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/profile','UserController@edit')->name('profile');
Route::post('/profile','UserController@update')->name('update');

Route::get('categories','CategoryController@index')->name('categories.index');
Route::get('categories/create','CategoryController@create')->name('categories.create');
Route::post('categories/store','CategoryController@store')->name('categories.store');
Route::get('categories/{categoryId}/edit','CategoryController@edit')->name('categories.edit');
Route::post('categories/{categoryId}/update','CategoryController@update')->name('categories.update');
Route::get('categories/{categoryId}/delete','CategoryController@destroy')->name('categories.delete');


Route::get('products','ProductController@index')->name('products.index');
Route::get('products/create','ProductController@create')->name('products.create');
Route::post('products/store','ProductController@store')->name('products.store');
Route::get('products/{productId}/edit','ProductController@edit')->name('products.edit');
Route::post('products/{productId}/update','ProductController@update')->name('products.update');
Route::get('products/{productId}/delete','ProductController@destroy')->name('products.delete');
Route::get('products/export','ProductController@export')->name('products.export');
Route::post('products/import','ProductController@import')->name('products.import');
Route::get('products/importdisplay','ProductController@importdisplay')->name('products.importdisplay');
// Route::post('/prod_import_sub', 'ProductsController@import')->name('prod_import_sub');
// URL::to('products.import');






// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
