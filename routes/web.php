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

Route::get('/', 'HomeController@home');
Route::get('/services','HomeController@services');
Route::get('/about','HomeController@about');
Route::get('/contact-us','HomeController@contactUs');

Route::get('query','HomeController@query');