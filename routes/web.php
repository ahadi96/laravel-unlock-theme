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

// authentication routes 
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', 'HomeController@home');
Route::get('/services', 'HomeController@services');
Route::get('/about', 'HomeController@about');
//Route::get('/contact-us', 'HomeController@contactUs');

Route::get('query', 'HomeController@query');
Route::get('category', 'HomeController@category');

Route::get('client/{id}', 'HomeController@client');
Route::get('client-details', 'HomeController@clientDetails');
Route::get('client-addresses', 'HomeController@clientAddresses');
Route::get('add-client', 'HomeController@addClient');

// many-many relations
Route::get('teachers', 'HomeController@teachers');

// many-many relations
Route::get('trainers/{id}', 'HomeController@trainers');

// add new trainer & course
Route::get('create-trainer', 'HomeController@createTrainerCourse');

// add new post with image
Route::get('create-post', 'HomeController@createPost');
Route::get('create-page', 'HomeController@createPage');

Route::get('posts-countries','HomeController@postsByCountry');

// contact us section 
Route::get('contact-us','ContactController@index')->middleware('isAdmin');
Route::post('contact-us','ContactController@store');
