<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::get('/register', 'Api\RegisterController@showRegisterForm');
Route::post('/register', 'Api\RegisterController@register');

Route::resource('news', 'Api\NewsController');
Route::middleware('auth:api')->group( function () {

});
