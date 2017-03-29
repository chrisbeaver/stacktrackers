<?php

// Home Page
Route::get('/', function () {
    return view('welcome');
});
Route::get('test', function() { return view('test'); });
// Public Holding Routes
Route::get('browse', 'BrowseController@index');
Route::get('holdings/view/{id}', 'HoldingController@showHolding');
Route::get('users/{user}/holdings', 'HoldingController@showUserHoldings');

Route::get('holdings-image/{user_id}/{image_id}', 'ImageController@showImage');
Route::get('holdings-thumb/{user_id}/{image_id}', 'ImageController@showThumb');

Route::group(['middleware' => 'auth'], function() {
   Route::post('logout', 'Auth\LoginController@logout')->name('logout');
});

Route::group(['middleware' => 'guest'], function () {

    // New User Registration
    Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
    Route::post('register', 'Auth\RegisterController@register');

    // Authentication
    Route::get('login', 'Auth\LoginController@showLoginForm');
    Route::post('login', 'Auth\LoginController@login');

    // Forgotten Password Routes
    Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
    Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
    Route::post('password/reset', 'Auth\ResetPasswordController@reset');
    Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
});

// Require Authentication for Holdings
Route::group(['prefix' => 'holdings', 'middleware' => 'auth'], function () {

    Route::get('/', 'HoldingController@showMyHoldings');

    Route::get('create', 'HoldingController@showNewForm');
    Route::get('{id}/edit', 'HoldingController@showEditForm');
    Route::post('/', 'HoldingController@store');

    Route::group(['prefix' => 'images'], function() {

        Route::get('add', 'ImageController@addImagesForm');
        Route::post('/', 'ImageController@saveImage');
    });

});

Route::group(['prefix' => 'pieces', 'middleware' => 'auth'], function () {
    Route::get('/', 'PieceController@all')->name('pieces.ajax');
});


// Route::group(['prefix' => 'profile', 'middleware' => 'auth'], function() {
//     Route::get('/', 'ProfileController@showEditProfilePage');
// });

Route::group(['prefix' => 'account', 'middleware' => 'auth'], function() {
    Route::get('/', 'AccountController@showAccountDetails');
    Route::put('/', 'AccountController@update');
});
// Home Controller is for Authenticated Users
Route::group(['prefix' => 'home', 'middleware' => 'auth'], function() {
    Route::get('/', 'HomeController@showHomePage');
});

