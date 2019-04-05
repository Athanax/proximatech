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
    return view('pages.index');
});
Route::get('/about', function () {
    return view('pages.about');
});
Route::get('/contact', function () {
    return view('pages.contact');
});
Route::get('/portfolio', function () {
    return view('pages.portfolio');
});

Auth::routes();
Route::resource('adminmessages','AdminmessagesController');



Route::middleware(['auth'])->group(function(){
  

    Route::get('/home', 'HomeController@index')->name('home');
    // Route::post('projects/adduser','ProjectsController@adduser')->name('projects.adduser');
    Route::resource('tasks','TasksController');
    Route::resource('profile','UsersController');
    Route::resource('roles','RolesController');
    Route::resource('posts','PostsController');
    Route::resource('messages','MessagesController');
    Route::resource('notifications','NotificationsController');
    //Route::post('notifications/mark_read','NotificationsController@mark_read')->name('notifications.mark_read');


    });
