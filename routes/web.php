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

Route::get('/', 'BlogPostsController@index')->name('home');

Auth::routes();

Route::get('/post/{post}', 'BlogPostDetailController@index')->name('post.show');
Route::get('/p/create', 'BlogPostsController@create');
Route::post('/p', 'BlogPostsController@store');
Route::get('/p/edit/{post}', 'BlogPostsController@edit');
Route::post('/p/edit/{post}', 'BlogPostsController@update');
Route::post('/p/delete/{post}', 'BlogPostsController@delete');
Route::post('/c/{post}', 'BlogPostDetailController@store');

