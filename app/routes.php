<?php

Route::get('/', 'BookController@index');

Route::get('user/edit', 'UserController@edit');
Route::post('user/edit', 'UserController@edit');

Route::get('book/index', 'BookController@index');
Route::get('book/create', 'BookController@create');
Route::get('book/delete/{id}', 'BookController@delete');
Route::get('book/edit/{id}', 'BookController@edit');
Route::post('book/edit/{id}', 'BookController@edit');

Route::get('order/index', 'OrderController@index');
Route::get('order/create', 'OrderController@create');
Route::get('order/delete/{id}', 'OrderController@delete');
Route::get('order/edit/{id}', 'OrderController@edit');
Route::post('order/edit/{id}', 'OrderController@edit');

Route::get('admin/login', 'GuestController@login');
Route::post('admin/login', 'GuestController@login');
Route::get('admin/logout', 'AdminController@logout');

Route::get('cart/confirm', 'CartController@confirm');
Route::post('cart/confirm', 'CartController@confirm');