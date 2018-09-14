<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use EasyWeChat\Factory;
class WechatController extends Controller
{
    public function index(){

		$config = [
		    'app_id' => 'wxc6503c9cdfc17b02',
		    'secret' => '8ee369c04b09bbdba74ea049334b3eba',
		    'token' => 'wechat',
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
