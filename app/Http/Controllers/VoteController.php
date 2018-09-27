<?php

namespace App\Http\Controllers;
use EasyWeChat\Factory;
// use App\Http\Controllers\Session;

use App\Option;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\User;
use App\Vote;
use App\Gift;
use App\Ip;

use App\Gift_gx;

use App\Comment;



class VoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
    public function index()
    {

        $votes = Vote::where('user_id',session('id'))->get();//session

        return view('/home/list',['votes'=>$votes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $votes = new Vote;
        $user = User::findOrFail(session('id'));
        
        return view('/home/create',compact('user','votes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //积分
        $user = User::findOrFail(session('id'));
        if(request()->has_top){

            $user->integral -= 50;

        }
        $user -> save();
        $votes = new Vote;

        $votes -> vote_title  = request() -> vote_title;
        $votes -> vote_explain  = request() -> vote_explain;
        $votes -> has_wechat  = request() -> has_wechat;
        $votes -> has_gift  = request() -> has_gift;
        $votes -> comment  = request() -> has_comment;
        $votes -> has_a_d  = request() -> has_a_d;
        $votes -> has_top  = request() -> has_top;
        $votes -> end_time  = request() -> end_time;
        $votes -> vote_type = request() -> vote_type;

        //允许多选默认值
        if(empty(request() -> has_checkbox)){

            $votes -> has_checkbox  = 1;

        }else{

            $votes -> has_checkbox  = request() -> has_checkbox;

        }

        //允许重复默认值
        if(empty(request() -> has_repeat)){

            $votes -> has_repeat  = 1000000;

        }else{

            $votes -> has_repeat  = request() -> has_repeat;

        }

        //密码默认值
        if(empty(request() -> has_password)){

            $votes -> has_password  = 0;

        }else{

            $votes -> has_password  = request() -> has_password;

        }

        // $votes -> vote_pic = '12345';
        $votes -> user_id  = session('id');//后期改成session


        if ($request->hasFile('vote_pic')) {

            $votes->vote_pic = '/uploads/'.$request->vote_pic->store('admin/'.date('Ymd'));

        }

        $votes->save();

        $vote_id = Vote::where([['user_id',session('id')],['vote_title',request()->vote_title]])->get();//10-session

        
        for($i=1000;$i<=request()->num;$i++){

            $temp = 'option'.$i;

            if(isset(request()->$temp)){

                $options = new Option;
                $options -> vote_id = $vote_id[0]->id;
                $options -> option_title = request()->$temp['option_title'];
                $options -> option_content = request()->$temp['option_content'];
                $options -> video = request()->$temp['video'];
                // $options -> option_pic = '12345';
                // $filename = $temp.'[option_pic]';
                // dd($votes->vote_pic);

                if ($request->hasFile($temp)) {

                    $options -> option_pic = '/uploads/'.$request->$temp['option_pic']->store('admin/'.date('Ymd'));

                }

                $options->save();
            }  
        }

        return redirect('/vote');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $user_agent = $_SERVER['HTTP_USER_AGENT'];

        if (strpos($user_agent, 'MicroMessenger') === false) {

            $wechat = false;

        } else {

            $app = Factory::officialAccount($this->config);
            $response = $app->oauth->scopes(['snsapi_base'])->redirect('http://ws.xiaohigh.com/wechat/redirect?id='.$id);
            return $response;
        }
        


        $votes = Vote::findOrfail($id);

        $ipss = Ip::orderBy('id','asc')->where([['vote_id',$id],['openid_ip',$_SERVER["REMOTE_ADDR"]]])->get();

        if(count($ipss)>0 && $votes->has_repeat!=0){//删除超过时间段的ip表数据
            $ctime = strtotime($ipss[0]->created_at);

            for ($j=0; $j < count($ipss); $j++) {

                    if(strtotime($ipss[$j]->created_at)<time()-$votes->has_repeat*3600){
                        $nnn = Ip::findOrFail($ipss[$j]->id);
                        $nnn->delete();
                    }
                }
        }

        //查出该ip投过的该投票信息的哪些选项
        $option_id = [];


        $ips = Ip::where([['vote_id',$id],['openid_ip',$_SERVER["REMOTE_ADDR"]]])->get();

        for ($i=0; $i < count($ips); $i++) { 
            $option_id[] = $ips[$i]->option_id;
        }


        $openid = false;

        $comments = Comment::orderBy('id','asc')
            ->where('vote_id',$votes->id)

             ->paginate(5);       
            // dd($comments->user());
        // return view('/home/show',compact('votes','wechat','option_id','openid','comments'));

             
        $gift_gxs = Gift_gx::orderBy('id','desc')->where('vote_id',$votes->id)->get();
        return view('/home/show',compact('gift_gxs','votes','wechat','option_id','openid','comments'));


    }

    public function redirect(){
        $id = $_GET['id'];
        
        $app = Factory::officialAccount($this->config);

        $openid = $app->oauth->user()->getId();

        session(['openid'=>$openid]);
        
        $votes = Vote::findOrfail($id);

        $ipss = Ip::orderBy('id','asc')->where([['vote_id',$id],['openid_ip',$openid]])->get();

        if(count($ipss)>0){//删除超过时间段的ip表数据

            $ctime = strtotime($ipss[0]->created_at);

            for ($j=0; $j < count($ipss); $j++) { 

                if(strtotime($ipss[$j]->created_at)<time()-$votes->has_repeat*3600){

                    $nnn = Ip::findOrFail($ipss[$j]->id);

                    $nnn->delete();

                }
            }
        }
        //查出该ip投过的该投票信息的哪些选项
        $option_id = [];

        $ips = Ip::where([['vote_id',$id],['openid_ip',$openid]])->get();

        for ($i=0; $i < count($ips); $i++) { 

            $option_id[] = $ips[$i]->option_id;

        }

        $wechat = true;

        $comments = Comment::orderBy('id','asc')
            ->where('id',$votes->id)
            ->paginate(5);  
         $gift_gxs = Gift_gx::orderBy('id','desc')->where('vote_id',$votes->id)->get();
        return view('/home/show',compact('gift_gxs','votes','wechat','option_id','comments','openid'));

    }

    public function pay(){

        $gifts = Gift::findOrfail(request()->gift_id);

        $options = Option::findOrfail(request()->option_id);

        $username = request()->username;

        $app = Factory::payment($this->config);

        $order_id = time().mt_rand(10000,99999);

        $result = $app->order->unify([
            'body' => '购买测试',
            'out_trade_no' => $order_id,
            'total_fee' => $gifts->price,
            // 'spbill_create_ip' => '123.12.12.123', // 可选，如不传该参数，SDK 将会自动获取相应 IP 地址
            'notify_url' => 'http://ws.xiaohigh.com/wechat/pay/redirect', // 支付结果通知网址，如果不设置则会使用配置里的默认地址
            'trade_type' => 'JSAPI',
            'openid' => request()->openid,
        ]);

        // return $result['prepay_id'];

        $app->jssdk->setUrl('http://ws.xiaohigh.com');

        $baseJson = $app->jssdk->buildConfig(array('chooseWXPay'), false);

        $prepayId = $result['prepay_id'];

        $config = $app->jssdk->sdkConfig($prepayId);

        $gift_gxs = new Gift_gx;

        $gift_gxs->gift_id = request()->gift_id;
        $gift_gxs->option_id = request()->option_id;
        $gift_gxs->openid = request()->openid;
        $gift_gxs->user_name = request()->username;
        $gift_gxs->price = $gifts->price;
        $gift_gxs->prepay_id = $prepayId;
        $gift_gxs->order_id = $order_id;
        $gift_gxs->vote_id = $options->vote_id;
        $gift_gxs->head_pic = request()->avatar;
        $gift_gxs->zt = 1;

        $gift_gxs->save();

        return view('home/wechatPay',compact('config','username','options','baseJson','gifts'));
    }

    public function payRedirect(){
        // $app = Factory::officialAccount($this->config);
        $app = Factory::payment($this->config);

        $response = $app->handlePaidNotify(function($message, $fail){

        $orders = Gift_gx::where('order_id',$message['out_trade_no'])->get();

        $order = $orders[0];

        if (!$order || $order->zt==4) { // 如果订单不存在 或者 订单已经支付过了
            return true; // 告诉微信，我已经处理完了，订单没找到，别再通知我了
        }

    // <- 建议在这里调用微信的【订单查询】接口查一下该笔订单的情况，确认是已经支付 

        if ($message['return_code'] === 'SUCCESS') { // return_code 表示通信状态，不代表支付状态
            // 用户是否支付成功
            if (array_get($message, 'result_code') === 'SUCCESS') {
                $order->zt = 4; // 更新支付时间为当前时间
                // $order->status = 'paid';
                if(count($orders)>0){
                    $options = Option::findOrfail($order->option_id);
                    $options->vote_num += $message['total_fee']*0.5;
                    $options->save();
                }

            // 用户支付失败
            } elseif (array_get($message, 'result_code') === 'FAIL') {
                $order->zt = 2;
            }
        } else {
            $order->zt = 2;
            // return $fail('通信失败，请稍后再通知我');
            return false;
        }

        $order->save(); // 保存订单

        return true; // 返回处理完成
    });

    return $response;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,$id)
    {
        // $user = User::findOrfail($id);
        // dd($user);
        $votes = Vote::findOrfail($id);
        // dd($votes->vote_type);

        
        return view('/home/edit',compact('votes','nowtime'));
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
        $votes = Vote::findOrfail($id);

        $votes -> vote_title  = request() -> vote_title;  //
        $votes -> vote_explain  = request() -> vote_explain;  //
        $votes -> has_wechat  = request() -> has_wechat; //
        $votes -> has_gift  = request() -> has_gift;   //
        $votes -> comment  = request() -> comment;  //
        $votes -> has_a_d  = request() -> has_a_d;    //
        $votes -> has_top  = request() -> has_top;  //
        $votes -> has_checkbox  = request() -> has_checkbox; //
        $votes -> has_repeat  = request() -> has_repeat; //
        $votes -> has_password  = request() -> has_password;  //
        $votes -> end_time  = request() -> end_time;  //
        $votes -> vote_type = request() -> vote_type;  //

        if ($request->hasFile('vote_pic')) {
            $votes->vote_pic = '/uploads/'.$request->vote_pic->store('admin/'.date('Ymd'));
        }

        $votes->save();
        
        for($i=0;$i<=request()->num;$i++){

            $temp = 'option'.$i;

            if(isset(request()->$temp)){

                $options = Option::findOrfail(request()->$temp['option_id']);
                $options -> option_title = request()->$temp['option_title'];
                $options -> option_content = request()->$temp['option_content'];

                if($request->vote_type == 2){
                    $options -> video = request()->$temp['video'];
                }

                if ($request->hasFile($temp)) {
                
                    $options -> option_pic = '/uploads/'.$request->$temp['option_pic']->store('admin/'.date('Ymd'));
                }

               $options->save();
            }
            
        }

        $vote_idd = request()->option0['option_id'];

        for($i=1002;$i<=request()->numm;$i++){

            $temp = 'option'.$i;

            if(isset(request()->$temp)){

                $options = new Option;

                $options -> vote_id = $id;
                $options -> option_title = request()->$temp['option_title'];
                $options -> option_content = request()->$temp['option_content'];
                $options -> video = request()->$temp['video'];

                if ($request->hasFile($temp)) {
                    $options -> option_pic = '/uploads/'.$request->$temp['option_pic']->store('admin/'.date('Ymd'));
                }

               $options->save();
            }  
        }

        return redirect('/vote');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //删除投票数据,投票中选项数据
        $options = Option::where('vote_id',$id)->get(); 

        for($i=0;$i<count($options);$i++){

            Option::findOrFail($options[$i]['id'])->delete();  

        }

        //删除保存的Ip以及openid信息
        $ips = Ip::where('vote_id',$id)->get(); 

        for($i=0;$i<count($ips);$i++){

            Ip::findOrFail($ips[$i]['id'])->delete();  

        }

        //删除对应的评论信息表
        $comments = Comment::where('vote_id',$id)->get(); 

        for($i=0;$i<count($comments);$i++){

            Comment::findOrFail($comments[$i]['id'])->delete();  

        }


        $vote = Vote::findOrFail($id);

        if($vote->delete()){

            return back()->with('true','删除成功');

        }else{

            return back()->with('false','删除失败!');

        }
    }



    public function count(Request $request,$id)
    {
        $options =  Option::orderBy('vote_num','desc')->where('vote_id',$id)->get();
        
        $arry = DB::select('select  sum(vote_num) as total from options where vote_id ='.$id);

        $giftnum = DB::select('select sum(price) as total from gift_gxes where zt = 4 and vote_id ='.$id);

        $giftnums = $giftnum[0]->total;

        $arrys = $arry[0]->total;

        if($arrys==0){
            $arrys = 0.1;
        }

        return view('/home/option/index',['options'=>$options,'giftnums'=>$giftnums,'arrys'=>$arrys]);
        
    }
}