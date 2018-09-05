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

Route::get('/admin/index', function () {
    return view('/admin/admin');
});

Route::get('/admin/index','AdminController@index');//后台首页


//后台的后台
Route::resource('user', 'UserController');//用户
Route::resource('a_d', 'ADController');//广告
Route::resource('webset', 'WebSetController');//网站设置
Route::resource('link', 'LinkController');//友情链接
Route::resource('proposal', 'ProposalController');//建议
Route::resource('help', 'HelpController');//帮助
Route::resource('gift', 'GiftController');//礼物

//前台的后台
Route::resource('comment', 'CommentController');//留言
Route::resource('gift_gx', 'GiftGxController');//礼物关系
Route::resource('option', 'OptionController');//选项
Route::resource('vote', 'VoteController');//投票


