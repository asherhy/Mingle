<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();  

//users
Route::get('/home/change', 'UserController@edit')->name('changePw');
Route::put('/home', 'UserController@update')->name('updatePw');
Route::get('/profile', 'UserController@show')->name('profile');
Route::put('/profile', 'UserController@profileUpdate')->name('updateProfile');

Route::get('/home', 'HomeController@index')->name('home');                                          

Route::get('/boards/allposts', 'PostController@index')->name('post.index');
Route::get('/boards/myposts', 'PostController@myposts')->name('post.myposts');    
Route::get('/boards/create', 'PostController@create')->name('post.create');  
Route::post('/boards/store', 'PostController@store')->name('post.store');                                          
Route::get('/boards/{post}', 'PostController@show')->name('post.show');

Route::get('/test', function () {
    return view('request.index');
});