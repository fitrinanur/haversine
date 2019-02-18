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
    Route::resource('/attraction-type', 'AttractionTypeController')->except(['show']);
});
Route::group(['middleware' => ['web','auth']], function(){
    Route::resource('/attraction', 'AttractionController');
    Route::post('/attraction/{attraction}/image', 'AttachmentController@store')->name('attraction.image');
    Route::delete('/attraction/{attraction}/image-management/{image}', 'AttachmentController@destroy')->name('attraction.image-management.destroy');
});

Route::get('province/{cities}/cities.json', function($cities) {
    return App\City::where('province_id', $cities)->get();
});


Route::delete('/lodging/{lodging}/image-management/{image}', 'AttachmentController@destroy')->name('lodging.image-management.destroy');