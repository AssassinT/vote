<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use EasyWeChat\Factory;
class WechatController extends Controller
{
    public function indexindex(){

		$config = [
		    'app_id' => 'wx8ed34585c55c40e3',
		    'secret' => '4fe71cddb3bd8ce8dc892de307f726ae',
		    'token' => 'easywechat',
		    'response_type' => 'array',

		    'log' => [
		        'level' => 'debug',
		        'file' => __DIR__.'/wechat.log',
		    ],
		];

		$app = Factory::officialAccount($config);

		$response = $app->server->serve();

		// 将响应输出
		return $response;
    }
}
