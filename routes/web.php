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

Route::get('/', 'TinyMceController@index')->name('post.index');
Route::get('/post/{id}', 'TinyMceController@show')->name('post.show');
Route::get('/post/{id}/edit', 'TinyMceController@edit')->name('post.edit');
Route::post('/post', 'TinyMceController@store')->name('post.store');
Route::put('/post/{id}', 'TinyMceController@update')->name('post.update');
Route::post('/post/image/upload', 'TinyMceController@uploadImage')->name('post.image.upload');
