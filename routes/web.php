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

Route::group(['middleware' => ['auth']], function() {
  // Only users who are signed in may enter...
  Route::get('/newpost', 'PagesController@newpost');
  Route::post('/newpost', 'PostsController@upload');
});

Route::get('/', 'PagesController@board');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
