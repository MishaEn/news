<?php

use Illuminate\Support\Facades\Auth;

Auth::routes();
Route::get('/', function(){
    return view('web.index');
})->name('welcome');
Route::group(['prefix' => 'news'], function(){
/*------------------------------------------Маршруты дла новостей-----------------------------------------------------------------------*/
    Route::get('/', 'Web\NewsController@index')->name('web.index.news');
    Route::get('/{news_id}', 'Web\NewsController@show')->name('web.show.news');
/*------------------------------------------Маршруты дла комментариев-----------------------------------------------------------------------*/
    Route::group(['prefix' => '/{news_id}/comments'], function(){
        Route::get('/', 'Web\CommentController@index')->name('web.index.comments');
        Route::get('/{comment_id}', 'Web\CommentController@show')->name('web.show.comments');
        Route::middleware('auth:web')->group(function() {
            Route::post('/', 'Web\CommentController@store')->name('web.store.comments');
            Route::delete('/{id}', 'Web\CommentController@destroy')->name('web.destroy.comments');
        });
    });
});
Route::middleware('auth:web', 'admin')->group(function() {

    Route::group(['prefix' => 'admin'], function(){
        Route::get('/', function(){
            return view('admin.index', ['title' => 'Админка']);
        })->name('welcome');
        Route::group(['prefix' => 'news'], function(){

            Route::get('/', 'Web\NewsController@index')->name('admin.index.news');
            Route::get('/create', 'Web\NewsController@create')->name('admin.create.news');
            Route::get('/{news_id}', 'Web\NewsController@show')->name('admin.show.news');
            Route::get('{news_id}/edit', 'Web\NewsController@edit')->name('admin.edit.news');
            Route::post('/', 'Web\NewsController@store')->name('admin.store.news');
            Route::put('/{news_id}', 'Web\NewsController@update')->name('admin.update.news');
            Route::delete('/{news_id}', 'Web\NewsController@destroy')->name('admin.destroy.news');

            Route::group(['prefix' => '/{news_id}/comments'], function(){
                Route::get('/', 'Web\CommentController@index')->name('admin.index.comments');
                Route::get('/{comment_id}', 'Web\CommentController@index')->name('admin.show.comments');
                Route::get('/create', 'Web\CommentController@create')->name('admin.create.comments');
                Route::get('{comment_id}/edit', 'Web\CommentController@edit')->name('admin.edit.comments');
                Route::post('/', 'Web\CommentController@store')->name('admin.store.comments');
                Route::put('/{comment_id}', 'Web\CommentController@update')->name('admin.update.comments');
                Route::delete('/{comment_id}', 'Web\CommentController@destroy')->name('admin.destroy.comments');
            });
        });

        Route::group(['prefix' => '/rss'], function(){
            Route::get('/', 'Web\RssFeedController@index')->name('admin.index.rss');
            Route::get('/create', 'Web\RssFeedController@create')->name('admin.create.rss');
            Route::get('/{rss_id}', 'Web\RssFeedController@show')->name('admin.show.rss');
            Route::get('{rss_id}/edit', 'Web\RssFeedController@edit')->name('admin.edit.rss');
            Route::post('/', 'Web\RssFeedController@store')->name('admin.store.rss');
            Route::put('/{rss_id}', 'Web\RssFeedController@update')->name('admin.update.rss');
            Route::delete('/{rss_id}', 'Web\RssFeedController@destroy')->name('admin.destroy.rss');
        });
    });
});




