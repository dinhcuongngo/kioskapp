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
Route::get('home',function(){
	return view('home');
})->name('home');

//===CATEGORY
Route::resource('categories','Category\CategoryController',['except'=>['create','edit']]);
Route::get('categories/{category}', 'Category\CategoryController@show')->name('edit');

//===USER
Route::resource('users','User\UserController',['except'=>['create','edit']])->middleware('role');

Route::get('login', 'User\CommonUserController@viewLogin');
Route::post('login','User\CommonUserController@checkLogin');

Route::get('logout', 'User\CommonUserController@logout');

Route::get('signup', 'User\CommonUserController@viewSignUp');
Route::post('signup', 'User\CommonUserController@signUp');

Route::get('changePasswd/{user}', 'User\UserController@viewChangePasswd');
Route::put('changePasswd/{user}', 'User\UserController@changePasswd');

//===PRODUCT
Route::resource('products', 'Product\ProductController', ['except'=>['create','edit']]);
Route::get('products/{product}', 'Product\ProductController@show');
Route::get('product/{product}/category','Product\ProductCategoryController@index');
Route::post('product/{product}/category','Product\ProductCategoryController@store');
Route::delete('product/{product}/category/{category}','Product\ProductCategoryController@destroy');


