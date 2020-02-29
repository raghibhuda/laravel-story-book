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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', 'StoryController@index')->name('story');
Route::get('/create', 'StoryController@create')->name('story.create');
Route::post('/create', 'StoryController@store')->name('story.store');
Route::get('/show/{id}', 'StoryController@show')->name('story.show');
Route::get('/edit/{id}', 'StoryController@edit')->name('story.edit');
Route::post('/edit/{id}', 'StoryController@update')->name('story.update');
Route::post('/delete/{id}', 'StoryController@update')->name('story.update');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
