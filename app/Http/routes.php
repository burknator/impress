<?php

// Backend routes, you need to be logged in to access these routes.
Route::group(['prefix' => 'i', 'middleware' => 'auth'], function()
{
    Route::get('/', ['as' => 'i.home', 'uses' => 'HomeController@index']);

    Route::resource('contents', 'ContentsController');
    Route::resource('authors', 'AuthorsController');
    Route::resource('categories', 'CategoryController');
});

// Login, logout and password reset routes
Route::controllers([
    'auth'     => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);

// Frontcontroller routes, this is what the normal visitor sees.
Route::get('/',           ['as' => 'front.index', 'uses' => 'FrontController@index']);
Route::get('/{contents}', ['as' => 'front.show',  'uses' => 'FrontController@show']);