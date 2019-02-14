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
// Category Routes
Route::get('/', 'CategoryController@index');
Route::get('/category/new', 'CategoryController@create');
Route::post('/category', 'CategoryController@store');
Route::get('/category/{category}/edit', 'CategoryController@edit');
Route::patch('/category/{category}', 'CategoryController@update');
Route::delete('/category/{category}', 'CategoryController@destroy');

// Sales Routes
Route::get('/sales', 'SaleController@index');
Route::get('/sales/new', 'SaleController@create');
Route::post('/sales', 'SaleController@store');
Route::get('/sales/{id}/edit', 'SaleController@edit');
Route::patch('/sales/{id}', 'SaleController@update');
Route::delete('/sales/{id}', 'SaleController@destroy');