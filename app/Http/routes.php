<?php

Route::bind('content', function($value)
{
    return Content::whereSlug($value)->first();
});

Route::get('/', ['as' => 'home', 'uses' => 'WelcomeController@index']);

Route::group(['prefix' => 'i', 'middleware' => 'auth'], function()
{
    Route::get('/', ['as' => 'i.home', 'uses' => 'HomeController@index']);

    Route::resource('contents', 'ContentsController');
    Route::resource('authors', 'AuthorsController');
});

Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);