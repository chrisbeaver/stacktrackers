<?php

// Home Page
Route::get('/', function () {
    return view('welcome');
});


Route::group(['middleware' => 'guest'], function () {
    
    // New User Registration
    Route::get('signup', 'SignupController@signupForm');
    Route::post('signup', 'SignupController@registerUser');

    // Authentication
    Route::get('login', 'AuthController@loginForm');
    Route::get('logout', 'AuthController@logout');
    Route::post('login','AuthController@login');
});


