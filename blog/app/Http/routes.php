<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::group(['middleware'=>'web'], function () {
   	Route::get('/', function () {
    	return view('welcome');
	});
   	Route::any('admin/login','Admin\LoginController@login');
   	Route::any('admin/code','Admin\LoginController@code');
	Route::any('admin/getCode','Admin\LoginController@getCode');

});

Route:: group(['middleware'=>['admin.login','web'],'namespace'=>'Admin','prefix'=>'admin'], function(){
	Route::any('index','IndexController@index');
	Route::any('info','IndexController@info');
	Route::any('logout','LogoutController@logout');
	Route::any('editPasswordShow','UserController@editPasswordShow');
	Route::any('editPassword','UserController@editPassword');
	Route::resource('category','CategoryController'); //资源路由(增删改查)
});