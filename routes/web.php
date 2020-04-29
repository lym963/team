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
//登陆
Route::prefix("/login")->group(function(){
    Route::get("login","Admin\LoginController@login");
});
//首页
Route::get("/index","Admin\IndexController@index");
//客户管理
Route::prefix("/client")->group(function(){
    Route::get("index","Admin\ClientController@index");
    Route::get("create","Admin\ClientController@create");
    Route::post("store","Admin\ClientController@store");
    Route::get("edit/{id}","Admin\ClientController@edit");
    Route::post("update/{id}","Admin\ClientController@update");
    Route::get("destroy/{id}","Admin\ClientController@destroy");
});


//管理员管理
Route::prefix("/admin")->group(function(){
    Route::get("index","Admin\AdminController@index");
    Route::get("create","Admin\AdminController@create");
    Route::post("store","Admin\AdminController@store");
    Route::get("edit/{id}","Admin\AdminController@edit");
    Route::post("update/{id}","Admin\AdminController@update");
    Route::get("destroy/{id}","Admin\AdminController@destroy");
});

//业务员管理
Route::prefix("/sell")->group(function(){
    Route::get("index","Admin\SellController@index");
    Route::get("create","Admin\SellController@create");
    Route::post("store","Admin\SellController@store");//业务员添加
    Route::get("edit/{id}","Admin\SellController@edit");//业务员修改列表
    Route::post("update/{id}","Admin\SellController@update");//业务员修改方法
    Route::get("destroy/{id}","Admin\SellController@destroy");//业务员删除
});
//客户拜访管理
Route::prefix("/call")->group(function(){
    Route::get("index","Admin\CallController@index");//列表展示
    Route::get("create","Admin\CallController@create");//添加表单
    Route::post("store","Admin\CallController@store");//添加
    Route::get("edit/{id}","Admin\CallController@edit");//修改列表
    Route::post("update/{id}","Admin\CallController@update");//修改方法
    Route::get("destroy/{id}","Admin\CallController@destroy");//删除

});