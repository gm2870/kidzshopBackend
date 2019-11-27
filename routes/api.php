<?php

use Illuminate\Http\Request;

Route::group([
    'prefix' => 'auth'
], function () {
    Route::post('login', 'Auth\LoginController@login');
    Route::post('register', 'Auth\RegisterController@register');

    Route::group([
        'middleware' => 'auth:api'
    ], function () {
        Route::get('logout', 'Auth\LogoutController@logout');
        Route::get('CheckLoginStatus', 'Auth\LoginController@CheckLoginStatus');
        Route::get('user', 'Auth\LoginController@user');
    });
});
Route::apiResources(['products' => 'Products\ProductsController']);
// Route::get('CheckLoginStatus', 'Auth\LoginController@CheckLoginStatus')->middleware('auth:api');
