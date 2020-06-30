<?php

use Illuminate\Http\Request;

Route::post('/register', 'AuthController@register');
Route::post('/login', 'AuthController@login');
// Route::get('/user', 'AuthController@user');
Route::group(['middleware' => 'auth:api'], function () {
    Route::get('/user', 'MeController@current');
});
Route::post('/logout', 'AuthController@logout');

Route::group(['prefix'=>'topics'], function(){
    Route::post('/','TopicController@store')->middleware('auth:api');
});

// Route::group(['prefix' => '/auth', ['middleware' => 'throttle:20,5']], function() {
//     Route::post('','');
// });

Route::group(['middleware' => 'jwt.auth'], function() {
    Route::get('/me','MeController@index');
});