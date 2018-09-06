<?php

use think\Route;
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

Route::get('/home','index/Home/index');


 Route::get('/user/create','index/User/create');

  Route::post('/user','index/User/store');

  Route::get('/user','index/User/index');

  Route::get('/del/:id','index/User/del');


  Route::get('/updatall/:id','index/User/updatall');


  Route::post('/update/:id','index/User/update');

  Route::get('/login', 'index/User/login');



	Route::post('/login', 'index/User/dologin');


	Route::get('/logout', 'index/User/logout');


	Route::get('/center/:id', 'index/User/center');

