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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');

Route::get('/profile/{username}', 'ProfileController@profile')->name('profile')->middleware('auth');

Route::resource('articles','ArticlesController');

Route::get('/profile/{username}/edit','ProfileController@edit');

Route::post('/profile/{username}','ProfileController@update');

Route::get('/article/userarticle','ArticlesController@userArticle');

Route::get('/follow/{follow}' , 'FollowController@index');

Route::get('/follow/{follow}/remove' , 'FollowController@remove');