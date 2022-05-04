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

Route::get('/', 'LoginController@index');

Route::post('/register', 'LoginController@signUp')->name('register');
Route::post('/login', 'LoginController@signIn')->name('login');

//Session active
Route::group(['prefix' => 'signIn', 'as' => 'sign.'], function(){
    Route::get('/home', 'HomeController@index')->name('index');
    Route::get('/procfile', 'ProcfileController@index')->name('procfile');

    // Route::post('/comments', 'CommentController@read');
});





