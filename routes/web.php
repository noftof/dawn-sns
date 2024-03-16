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

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/home', 'HomeController@index')->name('home');

//Auth::routes();


//ログアウト中のページ
Route::get('/login', 'Auth\LoginController@login');
Route::post('/login', 'Auth\LoginController@login');

Route::get('/register', 'Auth\RegisterController@register');
Route::post('/register', 'Auth\RegisterController@register');

Route::get('/added', 'Auth\RegisterController@added');


//ログイン中のページ
Route::get('/top','PostsController@index');

Route::get('/profile','UsersController@profile')->name('users.profile');
Route::get('/otherProfile','UsersController@otherProfile');
// プロフィール編集
Route::put('/profile','UsersController@profileUpdate')->name('profile_edit');
// パスワード編集
Route::put('/password/update','UsersController@passwordUpdate')->name('password_edit');
// 検索ページ
Route::get('/search','UsersController@search')->name('users.search');

Route::get('/followList','FollowsController@followList');
Route::get('/followerList','FollowsController@followerList');

// 投稿内容を同一ページに表示するため
Route::post('/post/create','PostsController@create');

Route::group(['middleware' => 'auth'], function () {
// 編集機能
Route::get('/post/{id}/edit','PostsController@editform');
Route::post('/post/edit','PostsController@edit');
// delete機能
Route::get('/post/{id}/delete','PostsController@delete');
});
