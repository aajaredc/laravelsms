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
  Route::get('/post/new', 'PagesController@newpost');
  Route::post('/post/new', 'PostsController@upload');

  Route::post('/ratepost', 'PostsController@rate');
  Route::get('/ratepost', 'PagesController@board');
  Route::post('/ajaxRequest', 'PostsController@rate')->name('ajaxRequest');
});

Route::get('/', 'PagesController@board');
Route::get('/home', 'PagesController@board');
Route::get('/board', 'PagesController@board');

Route::get('/post/{id}', 'PostsController@show')->name('showpost');
Route::get('/user/{id}', 'ProfilesController@show')->name('showprofile');

Auth::routes();

Route::get('/hometwo', 'HomeController@index')->name('home');
