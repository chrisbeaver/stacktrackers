<?php

// Home Page
Route::get('/', function () {
    return view('welcome');
});

// Public Holding Routes
Route::get('browse', 'BrowseController@index');
Route::get('holdings/view/{id}', 'HoldingController@showHolding');
Route::get('holdings-image/{user_id}/{image_id}', 'ImageController@showImage');
Route::get('holdings-thumb/{user_id}/{image_id}', 'ImageController@showThumb');

Route::group(['middleware' => 'auth'], function() {
       Route::get('logout', 'AuthController@logout');
   });

Route::group(['middleware' => 'guest'], function () {

    // New User Registration
    Route::get('signup', 'SignupController@signupForm');
    Route::post('signup', 'SignupController@registerUser');

    // Authentication
    Route::get('login', 'AuthController@loginForm');
    Route::post('login','AuthController@login');
});

// Require Authentication for Holdings
Route::group(['prefix' => 'holdings', 'middleware' => 'auth'], function () {

    Route::get('/', 'HoldingController@showMyHoldings');

    Route::get('create', 'HoldingController@showNewForm');
    Route::post('/', 'HoldingController@store');

    Route::group(['prefix' => 'images'], function() {

        Route::get('add', 'ImageController@addImagesForm');
        Route::post('/', 'ImageController@saveImage');
    });

});

// Home Controller is for Authenticated Users
Route::group(['prefix' => 'home', 'middleware' => 'auth'], function() {
    Route::get('/', 'HomeController@showHomePage');
});

