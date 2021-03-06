<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::auth();
// Route::get('home/book', 'Home/BookController@index');
// Route::get('/home', 'HomeController@index');
Route::get('/', 'HomeController@index');

Route::get('now', function () {
    return date("Y-m-d H:i:s");
});
Route::get('article/{id}', 'ArticleController@show');
Route::post('comment', 'CommentController@store');
Route::group(['middleware' => 'auth', 'namespace' => 'Admin', 'prefix' => 'admin'], function() {
    Route::get('/', 'HomeController@index');
    Route::resource('article', 'ArticleController');
});

Route::group(['middleware' => 'auth','namespace' => 'Home'], function() {

    Route::get('home/book', 'BookController@index');
    Route::resource('home/book', 'BookController');
    // Route::resource('article', 'ArticleController');
});



