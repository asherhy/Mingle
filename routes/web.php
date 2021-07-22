<?php

use Illuminate\Support\Facades\Route;

// for testing mentor search
use App\Module;
use App\User;

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

Auth::routes(['verify' => true]);

//users
Route::get('/home/change', 'UserController@edit')->name('changePw');
Route::put('/home', 'UserController@update')->name('updatePw');
Route::get('/profile', 'UserController@show')->name('profile');
Route::put('/profile', 'UserController@profileUpdate')->name('updateProfile');
Route::put('/profile/photo', 'UserController@photoUpdate')->name('user.changePhoto');

Route::get('/home', 'HomeController@index')->name('home');                                          

Route::get('/boards/allposts', 'PostController@index')->name('post.index');
Route::get('/boards/myposts', 'PostController@myposts')->name('post.myposts');    
Route::get('/boards/create', 'PostController@create')->name('post.create');  
Route::post('/boards/create', 'PostController@store')->name('post.store');                                          
Route::get('/boards/{post}', 'PostController@show')->name('post.show');
Route::put('/boards/{post}', 'PostController@update')->name('post.update');
Route::delete('/boards/{post}', 'PostController@destroy')->name('post.delete');

Route::get('/requests/post', 'PostRequestController@index')->name('request.post.index');    
Route::post('/posts/{post}/request', 'PostRequestController@store')->name('request.post.store');    
Route::put('/posts/request/{postRequest}', 'PostRequestController@update')->name('request.post.update');    

Route::get('/groups', 'GroupController@index')->name('group.index');    

Route::get('/QuickMatch/module-group', 'ModuleMatchController@create')->name('quickmatch.module.create');    
Route::post('/QuickMatch/module-group', 'ModuleMatchController@store')->name('quickmatch.module.store');    

Route::get('/mentors', 'MentorRequestController@index')->name('mentor.index');
Route::get('/requests/mentors', 'MentorRequestController@showRequests')->name('request.mentor.index');
Route::get('/mentees', 'MentorRequestController@showMentees')->name('mentor.show.mentees');
Route::get('/mentors/mail', 'MentorRequestController@mail')->name('mentor.mail');
Route::get('/mentors/{user}', 'UserController@showMentor')->name('user.mentor.show');
Route::post('/mentors/{user}', 'MentorRequestController@store')->name('mentor.request.store');
Route::put('/mentors/accept/{mentorRequest}', 'MentorRequestController@accept')->name('mentor.request.accept');
Route::put('/mentors/reject/{mentorRequest}', 'MentorRequestController@reject')->name('mentor.request.reject');







