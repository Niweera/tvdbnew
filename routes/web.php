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


// Route::get('/', 'PagesController@index');
Route::get('/dmca', 'PagesController@dmca')->name('dmca');
Route::get('/help', 'PagesController@help')->name('help');
Route::get('/', 'LiveSearch@index')->name('landing');
Route::get('/user/action', 'LiveSearch@action')->name('user.index.action');
Route::get('/action', 'TVSeriesController@userAction')->name('pages.index.action');
Route::resource('user','TVSeriesController');
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');


