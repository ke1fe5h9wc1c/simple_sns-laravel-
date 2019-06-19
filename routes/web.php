<?php
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('users', 'UserController');
Route::get('/', 'UserController@index');
Route::get('/logout', 'UserController@logout');
Route::post('/follow', 'UserController@follow');
Route::post('/un_follow', 'UserController@un_follow');
