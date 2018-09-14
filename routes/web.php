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

//前台
Route::get('/home/login', 'LoginController@login');
Route::post('/home/dologin', 'LoginController@dologin');
Route::get('/loginout', 'LoginController@loginout');
Route::get('/home/reg', 'LoginController@reg');
Route::post('home/doreg', 'LoginController@doreg');
Route::post('home/req', 'LoginController@req');



Route::get('/myindex', 'MyController@index');
Route::post('/myindex/{id}', 'MyController@store');


Route::get('/home/proposal', 'ProposalController@home_index');


Route::get('/help/none', 'HelpController@none');

Route::get('/help/nonet', 'HelpController@nonet');


Route::get('/helps', 'HelpController@list');
Route::get('/home/webset', 'HelpController@cont');

//vip
Route::get('/del/{id}','DellController@index');
// Route::get('/del/{id}','DellController@index');

//前台礼物是否
Route::get('/gift/brush','GiftGxController@brush');











Route::get('/', 'HomeController@index');
Route::resource('vote', 'VoteController');//投票
Route::get('/vote/{id}/count', 'VoteController@count');//


Route::get('/admin/login', 'AdminController@login');


Route::post('/admin/login', 'AdminController@dologin');


Route::get('/admin/logout', 'AdminController@logout');


Route::group(['middleware'=>'admin'],function(){
Route::get('/admin/index','AdminController@index');//后台首页


//后台的后台
Route::resource('user', 'UserController');//用户
Route::resource('a_d', 'ADController');//广告
Route::resource('webset', 'WebSetController');//网站设置
Route::resource('link', 'LinkController');//友情链接
Route::resource('proposal', 'ProposalController');//建议
Route::resource('help', 'HelpController');//帮助
Route::resource('gift', 'GiftController');//礼物
});
//前台的后台
Route::resource('comment', 'CommentController');//留言
Route::resource('gift_gx', 'GiftGxController');//礼物关系
Route::resource('option', 'OptionController');//选项

Route::get('/wechat','WechatController@index');//微信







