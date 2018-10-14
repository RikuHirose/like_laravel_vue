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


Auth::routes();
Route::group(['middleware' => ['auth']], function () {

  Route::resource('post', 'PostController', ['except' => ['index']]);

  // like
  Route::post('/post/{post}/like',   'LikeController@like');
  Route::post('/post/{post}/unlike', 'LikeController@unlike');

});

Route::get('/', 'PostController@index')->name('index');
