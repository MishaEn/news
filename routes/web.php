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

use Illuminate\Support\Facades\Auth;

Auth::routes();
Route::middleware('auth:web', 'admin')->group(function() {
    Route::get('/news', 'Web\NewsController@index')->name('web.index.news');
    Route::get('/news/{id}', 'Web\NewsController@show')->name('web.show.news');
    Route::get('/news/create', 'Web\NewsController@create');
    Route::post('/news', 'Web\NewsController@store')->name('web.store.news');
    Route::put('/news/{id}', 'Web\NewsController@update')->name('web.put.news');
    Route::delete('/news/{id}', 'Web\NewsController@destroy')->name('web.destroy.news');
});
