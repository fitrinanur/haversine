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

Route::get('/', 'WebsiteController@index')->name('website.index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['web','auth']], function(){
    Route::resource('/user', 'UserController');
});

Route::group(['middleware' => ['web','auth']], function(){
    Route::resource('/attraction-type', 'AttractionTypeController');
});
Route::group(['middleware' => ['web','auth']], function(){
    Route::resource('/attraction', 'AttractionController');
});