<?php


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/products', 'ProductController@index');
Route::get('/product/show/{id}', 'ProductController@show');
Route::get('/product/create', 'ProductController@create');
Route::post('/product/store', 'ProductController@store');
Route::get('/product/edit/{id}', 'ProductController@edit');
Route::post('/product/update', 'ProductController@update');
Route::delete('/product/destroy/{id}', 'ProductController@destroy');


Route::get('/', 'SaleController@index');
Route::get('/sale/show/{id}', 'SaleController@show');
Route::get('/sale/create', 'SaleController@create');
Route::post('/sale/store', 'SaleController@store');
Route::get('/sale/edit/{id}', 'SaleController@edit');
Route::post('/sale/update', 'SaleController@update');
Route::delete('/sale/destroy/{id}', 'SaleController@destroy');

Route::get('/services', 'ServiceController@index');
Route::get('/service/show/{id}', 'ServiceController@show');
Route::get('/service/create', 'ServiceController@create');
Route::post('/service/store', 'ServiceController@store');
Route::get('/service/edit/{id}', 'ServiceController@edit');
Route::post('/sservice/update', 'ServiceController@update');
Route::delete('/service/destroy/{id}', 'ServiceController@destroy');

Route::get('/records', 'RecordController@index');
Route::get('/record/show/{id}', 'RecordController@show');



