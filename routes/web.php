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
//===HOME
Route::get('/', function () {
    return view('welcome');
});


//===CATEGORY
Route::resource('categories','Category\CategoryController',['except'=>['create','edit']]);
Route::get('categories/{category}', 'Category\CategoryController@show')->name('edit');

//===USER
Route::resource('users','User\UserController',['except'=>['create','edit']]);
Route::get('login', function(){
	return view('user.login');
})->name('login');
Route::get('logout', 'User\UserController@logout');
Route::post('login','User\UserController@checkLogin');
Route::get('signup', 'User\UserController@viewSignup');

