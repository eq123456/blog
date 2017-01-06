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

Route::get('/', function () {
    return view('welcome');
});
//Route::get('/login','Admin\IndexController@index');
Route::group(['middleware'=>['web'],'namespace'=>'Admin','prefix'=>'admin'],function(){
	Route::any('login','LoginController@login');//加载登录界面
	Route::get('code','LoginController@code');
	//Route::any('index', 'IndexController@index');
	//Route::any('info', 'IndexController@info');
});
//web中间件从5.2.27版本以后默认全局加载，不需要自己手动载入，如果自己手动重复载入，会导致session无法加载的情况
Route::group(['middleware'=>['Login'],'namespace'=>'Admin','prefix'=>'admin'],function(){	
	Route::get('index', 'IndexController@index');
	Route::get('info', 'IndexController@info');
	Route::get('quit', 'IndexController@quit');
	Route::any('pass', 'IndexController@pass');
//	Route::any('element', 'IndexController@element');
	
});
Route::group(['middleware'=>['web'],'namespace'=>'Admin','prefix'=>'admin'],function (){
	Route::any('add', 'HandleController@add');
 	Route::any('list', 'HandleController@lists');
	Route::any('tab', 'HandleController@tab');
	Route::any('img', 'HandleController@img');
});
Route::group(['namespace'=>'Home'],function(){
// 	Route::get('/hw',function(){
// 		echo "hello world!";
// 	});
	Route::get('index','IndexController@index');
	Route::get('new','NewController@index');
	Route::get('list','ListController@index');
});

Route::group(['middleware' => 'web'], function () {
    Route::auth();

    Route::get('/home', 'HomeController@index');
});
