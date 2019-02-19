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

Route::middleware('auth')->group(function() {
	Route::prefix('posts')->group(function() {
		Route::get('/', 'PostController@index')->name('posts/index');
		Route::get('/create', 'PostController@create')->name('posts/create');
		Route::post('/', 'PostController@store')->name('posts/store');
		Route::get('/{id}/view', 'PostController@show')->name('posts/show');
		Route::get('/{id}/edit', 'PostController@edit')->name('posts/edit');
		Route::patch('/{id}', 'PostController@update')->name('posts/update');
		Route::delete('/{id}', 'PostController@delete')->name('posts/delete');
		Route::get('/drafts', 'PostController@drafts')->name('posts/drafts');
		Route::get('/{id}/publish', 'PostController@publish')->name('posts/publish');
	});

	Route::prefix('policies')->group(function() {
		Route::get('/', 'PoliciesController@index')->name('policies/index');
		Route::get('/create', 'PoliciesController@create')->name('policies/create');
		Route::get('/{id}/edit', 'PoliciesController@edit')->name('policies/edit');
		Route::patch('/{id}', 'PoliciesController@update')->name('policies/update');
	});

	Route::prefix('roles')->group(function() {
		Route::get('/create', 'RolesController@create')->name('roles/create');
		Route::post('/', 'RolesController@store')->name('roles/store');
		Route::delete('/{id}', 'RolesController@delete')->name('roles/delete');
		Route::get('/link', 'RolesController@link')->name('roles/link');
		Route::post('/link', 'RolesController@linkUser')->name('roles/link');
	});

	Route::prefix('comments')->group(function() {
		Route::post('/', 'CommentController@store')->name('comments/store');
		Route::delete('/{id}', 'CommentController@delete')->name('posts/delete');
	});
});

Route::prefix('posts')->group(function() {
	Route::get('/{id}/view', 'PostController@show')->name('posts/show');
});