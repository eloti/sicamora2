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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', 'PagesController@index');
Route::get('/about', 'PagesController@about');
Route::get('/faq', 'PagesController@faq');
Route::get('/contact', 'PagesController@contact');
Route::resource('posts', 'PostController');
Route::resource('genres', 'GenreController');
Route::resource('languages', 'LanguageController');
Route::resource('assignments', 'AssignmentController');
Route::resource('comments', 'CommentController');
Route::resource('responses', 'ResponseController');
Route::get('/admin/admindashboard', 'AdminDashboardController@index')->name('admin');

//Auth::routes();
Auth::routes(['verify' => true]);
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/profile', 'UserController@profile')->middleware('verified')->name('profile');
Route::get('/editprofile', 'UserController@edit');
Route::put('/profile/{id}', 'UserController@update');

//Slugs routes();
//Route::get('/blog/{slug}', ['as' => 'blog.single', 'uses' => 'BlogController@getSingle'])->where('slug', '[\w\d\-\_]+');
Route::get('/blog/{slug}', 'BlogController@getSingle')->name('singlePost');
