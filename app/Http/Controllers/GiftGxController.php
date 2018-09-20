<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Gift_gx;
use App\Gift;
use App\Option;
use EasyWeChat\Factory;

class GiftGxController extends Controller
{
    public $config = [
        'app_id' => 'wx8ed34585c55c40e3',
        'secret' => '4fe71cddb3bd8ce8dc892de307f726ae',
        'token' => 'easywechat',
        'response_type' => 'array',
        'mch_id' => '1364808702',
        'key' => 'lamplamplamplamplamplamplamplamp',

        'log' => [
            'level' => 'debug',
            'file' => __DIR__.'/wechat.log',
        ],
    ];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        if(!isset($_GET['code'])){
            $app = Factory::officialAccount($this->config);
            $response = $app->oauth->scopes(['snsapi_userinfo'])->redirect('http://ws.xiaohigh.com/gift_gx/'.$id);
            return $response;
        }else{
            $app = Factory::officialAccount($this->config);

            $user = $app->oauth->user();

            $openid = $user->id;

            $username = $user->name;

            $avatar = $user->avatar;

            $gift_gxs = Gift_gx::where([['option_id',$id],['zt',4]])->get();

            $options = Option::findOrFail($id);

            $gifts = Gift::all();

            return view('/home/gift',compact('gift_gxs','gifts','options','openid','username','avatar'));

        }
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function brush()
    {
        //是否刷礼物
        return view('home.brush');
    }

}
