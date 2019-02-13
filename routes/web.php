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

Route::get('/', 'HomeController@index')->name('home');

Route::prefix('posts')->middleware('auth')->group(function() {
	Route::get('/', 'PostController@index')->name('posts.index');
	Route::get('/create', 'PostController@create')->name('posts.create');
    Route::post('/', 'PostController@store')->name('posts.store');
    Route::get('/{id}/view', 'PostController@show')->name('posts.show');
    Route::get('/{id}/edit', 'PostController@edit')->name('posts.edit');
    Route::patch('/{id}', 'PostController@update')->name('posts.update');
    Route::delete('/{id}', 'PostController@delete')->name('posts.delete');
});
