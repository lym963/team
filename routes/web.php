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
});

//业务员管理
Route::prefix("/sell")->group(function(){
    Route::get("index","Admin\SellController@index");
    Route::get("create","Admin\SellController@create");
});
        

