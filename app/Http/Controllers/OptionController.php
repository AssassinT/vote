<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Option;
use App\Vote;
use App\Ip;
use EasyWeChat\Factory;

class OptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public $config = [
        'app_id' => 'wxeb8503aed05a2c1a',
        'secret' => '052836c4dde956a0644acf0607c8934d',
        'token' => 'easywechat',
        'response_type' => 'array',

        'log' => [
            'level' => 'debug',
            'file' => __DIR__.'/wechat.log',
        ],
    ];
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
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $options = Option::findOrfail($id);
        $votes = Vote::findOrfail($options->vote_id);
        if(request()->openid){
            $nn = request()->openid;
        }else{
            $nn = $_SERVER["REMOTE_ADDR"];
        }
        $ipss = Ip::orderBy('id','asc')->where([['vote_id',$options->vote_id],['openid_ip',$nn]])->get();
if(count($ipss)>0){
        $ctime = strtotime($ipss[0]->created_at);

        if((time()-$ctime>$votes->has_repeat*1800 || $votes->has_repeat=='0')||count($ipss)<$votes->has_checkbox){
            $zt = true;
        }else{
            $zt = false;
        }

        for ($j=0; $j < count($ipss); $j++) { 
                if(strtotime($ipss[$j]->created_at)<time()-$votes->has_repeat*1800){
                    $nnn = Ip::findOrFail($ipss[$j]->id);
                    $nnn->delete();
                }
            }

}else{
    $zt=true;
}
        if($zt && count($ipss)<$votes->has_checkbox){
        
            $num = $options -> vote_num;
            $options -> vote_num = $num+1;
            $options->save();
        
            $ips = new Ip;
            $ips -> option_id = $id;
            $ips -> vote_id = $options -> vote_id;

        if (request()->openid) {

            $ips -> openid_ip = request()->openid;
            

        } else {
            $ips -> openid_ip = $_SERVER["REMOTE_ADDR"];
 
        }


            


            $ips->save();

            echo '投票成功';
        }else{
            echo $votes->has_repeat.'小时后可再投票';
            // echo date('H:i:s',strtotime($ipss[0]->created_at));
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
}
