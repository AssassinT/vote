<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use EasyWeChat\Factory;
class WechatController extends Controller
{
    public function indexindex(){

		$config = [
		    'app_id' => 'wxeb8503aed05a2c1a',
		    'secret' => '052836c4dde956a0644acf0607c8934d',
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
