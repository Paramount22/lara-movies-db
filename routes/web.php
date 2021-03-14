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



// route - movies
Route::resource('movie', 'MovieController', ['except' => 'index']);
Route::get('/', 'MovieController@index');
Route::get('movie/{movie}/delete', ['as'=>'movie.delete','uses'=>'MovieController@delete']);

// route - directors
Route::resource('director', 'DirectorController');
Route::post('director/choose', 'DirectorController@choose');/* Choose director via dropdown */
Route::get('director/{director}/delete', ['as'=>'director.delete','uses'=>'DirectorController@delete']);

// route - genre
Route::resource('genre', 'GenreController');
Route::get('genre/{genre}/edit', ['as'=>'genre.edit','uses'=>'GenreController@edit']);
Route::get('genre/{genre}/delete', ['as'=>'genre.delete','uses'=>'GenreController@delete']);

//search
Route::get('queries', 'QueryController@search');




