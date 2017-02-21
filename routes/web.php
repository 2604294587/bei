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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('404', function () {
	return abort('404');
});
// 系统页
Route::get('/','IndexController@index');
// 控制显示新闻列表的路由
Route::get('/news','NewsController@index');
// 显示发布新闻的路由
Route::get('/news/add','NewsController@add');
// 执行发布的路由
Route::post('/news/insert','NewsController@insert');
// 显示修改页面
Route::get('/news/edit/{id}','NewsController@edit');
// 执行修改的路由
Route::post('/news/update','NewsController@update');
// 执行删除的路由
Route::get('/news/delete/{id}','NewsController@delete');
// 进入登录页的路由
Route::get('/login','LoginController@index');
// 登录
Route::post('/dologin','LoginController@login');
// 退出登录
Route::get('/logout','LoginController@logout');
// 注册页
Route::get('/sign','SignupController@index');
// 注册
Route::post('/signup','SignupController@signup');

