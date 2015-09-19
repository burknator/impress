<?php

// Backend routes, you need to be logged in to access these routes.
Route::group(['prefix' => 'i', 'middleware' => 'auth'], function () {
    Route::get('/', ['as' => 'i.home', 'uses' => 'HomeController@index']);

    Route::get('settings', ['as' => 'i.settings.index', 'uses' => 'SettingsController@index']);
    Route::put('settings', ['as' => 'i.settings.update', 'uses' => 'SettingsController@update']);

    Route::resource('contents', 'ContentsController');
    Route::resource('authors', 'AuthorsController');
    Route::resource('categories', 'CategoryController');
    Route::resource('tags', 'TagsController');
});

// Login, logout and password reset routes
Route::match(['get', 'head'], '/register', 'Auth\AuthController@getRegister');
Route::post('/register', 'Auth\AuthController@postRegister');

Route::match(['get', 'head'], '/login', ['as' => 'login', 'uses' => 'Auth\AuthController@getLogin']);
Route::post('/login', 'Auth\AuthController@postLogin');

Route::get('/logout', ['as' => 'logout', 'uses' => 'Auth\AuthController@getLogout']);

Route::match(['get', 'head'], '/password/email', 'Auth\PasswordController@getEmail');
Route::post('/password/email', 'Auth\PasswordController@postEmail');

Route::match(['get', 'head'], '/password/reset', 'Auth\PasswordController@getReset');
Route::post('/password/reset', 'Auth\PasswordController@postReset');

// Frontcontroller routes, this is what the normal visitor sees.
Route::get('/', ['as' => 'front.index', 'uses' => 'FrontController@index']);
Route::get('/{contents}', ['as' => 'front.show',  'uses' => 'FrontController@show']);
