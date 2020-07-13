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

Route::get('/', 'PostController@index')->name('index');
Route::delete('/', 'UserController@destroy')->name('deleteuser');
Route::get('/home', 'PostController@index');
Route::delete('/home', 'UserController@destroy')->name('deleteuser');
Route::view('/posts/create', 'create')->name('create');
Route::post('/posts/create', 'PostController@store');
Route::get('/post/{id}', 'PostController@show')->name('post');
Route::get('/post1/{id}', 'PostController@show_noti')->name('postnoti');
Route::get('/today', 'PostController@today')->name('today');
Route::get('/myposts', 'PostController@userPosts')->name('myposts');
Route::delete('/myposts', 'PostController@destroy');
Route::get('/user/edit', 'UserController@edit')->name('useredit');
Route::put('/user/update', 'UserController@update')->name('userupdate');
Route::post('/comments', 'CommentController@store');
Route::get('notificaciones','UserController@notifications')->name('notifications');
Auth::routes();
