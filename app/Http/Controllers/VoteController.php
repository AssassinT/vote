<?php

namespace App\Http\Controllers;
use EasyWeChat\Factory;

use App\Option;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\User;
use App\Vote;
use App\Ip;



class VoteController extends Controller
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

        $votes = Vote::where('user_id','10')->get();//session
        return view('/home/list',['votes'=>$votes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('/home/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $votes = new Vote;
        $votes -> vote_title  = request() -> vote_title;
        $votes -> vote_explain  = request() -> vote_explain;
        $votes -> has_wechat  = request() -> has_wechat;
        $votes -> has_gift  = request() -> has_gift;
        $votes -> comment  = request() -> has_comment;
        $votes -> has_a_d  = request() -> has_a_d;
        $votes -> has_top  = request() -> has_top;
        $votes -> has_checkbox  = request() -> has_checkbox;
        $votes -> has_repeat  = request() -> has_repeat;
        $votes -> has_password  = request() -> has_password;
        $votes -> end_time  = request() -> end_time;

        $votes -> vote_type = request() -> vote_type;
        // $votes -> vote_pic = '12345';
        $votes -> user_id  = '10';//后期改成session


          if ($request->hasFile('vote_pic')) {
            $votes->vote_pic = '/uploads/'.$request->vote_pic->store('admin/'.date('Ymd'));
        }

        $votes->save();
        $vote_id = Vote::where([['user_id','10'],['vote_title',request()->vote_title]])->get();//10-session

        
        for($i=1000;$i<=request()->num;$i++){
            // dd($_FILES);

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
                    // dd(12);
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
            $response = $app->oauth->scopes(['snsapi_userinfo'])->redirect('http://www.zczl.shop/wechat/redirect');
            return $response;

           
            // $ips -> openid_ip = $user->getId();

            // $wechat = true;
        }
        $wechat = false;
        


        $votes = Vote::findOrfail($id);
        $ipss = Ip::orderBy('id','asc')->where([['vote_id',$id],['openid_ip',$_SERVER["REMOTE_ADDR"]]])->get();
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
        $ips = Ip::where([['vote_id',$id],['openid_ip',$_SERVER["REMOTE_ADDR"]]])->get();
        for ($i=0; $i < count($ips); $i++) { 
            $option_id[] = $ips[$i]->option_id;
        }
        

        return view('/home/show',compact('votes','wechat','option_id','userid'));

    }

    public function redirect(){
        // echo 123;
        $app = Factory::officialAccount($this->config);
        echo $app->oauth->user()->getId();
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
        // dd(request()->all());
        $votes = Vote::findOrfail($id);
        // dd($votes);
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
        // $vote_id = Vote::where([['user_id','$id'],['vote_title',request()->vote_title]])->get();//10-session

        // echo "<pre>";
        for($i=0;$i<=request()->num;$i++){
            // dd($_FILES);

            $temp = 'option'.$i;
            if(isset(request()->$temp)){
                $options = Option::findOrfail(request()->$temp['option_id']);
               // $options -> vote_id =  $vote_id[0]->id;
               $options -> option_title = request()->$temp['option_title'];
               $options -> option_content = request()->$temp['option_content'];
               if($request->vote_type == 2){
               $options -> video = request()->$temp['video'];
                }
               // $options -> option_pic = '12345';
               // $filename = $temp.'[option_pic]';
               // dd($votes->vote_pic);

                 if ($request->hasFile($temp)) {
                    // dd(12);
            $options -> option_pic = '/uploads/'.$request->$temp['option_pic']->store('admin/'.date('Ymd'));
        }
               $options->save();
            }
            
        }
        $vote_idd = request()->option0['option_id'];

        for($i=1002;$i<=request()->numm;$i++){
            // dd($_FILES);

            $temp = 'option'.$i;
            if(isset(request()->$temp)){
                $options = new Option;
               $options -> vote_id = $id;
               $options -> option_title = request()->$temp['option_title'];
               $options -> option_content = request()->$temp['option_content'];
               $options -> video = request()->$temp['video'];
               // $options -> option_pic = '12345';
               // $filename = $temp.'[option_pic]';
               // dd($votes->vote_pic);

                 if ($request->hasFile($temp)) {
                    // dd(12);
            $options -> option_pic = '/uploads/'.$request->$temp['option_pic']->store('admin/'.date('Ymd'));
        }
               $options->save();
            }
            
        }
        


        // return view('/home/list',compact('votes'));
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
        // dd($options[3]['id']);
        for($i=0;$i<count($options);$i++){
            Option::findOrFail($options[$i]['id'])->delete();   
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
        // dd($options);
        $arry = DB::select('select  sum(vote_num) as total from options where vote_id ='.$id);
        $arrys = $arry[0]->total;
        if($arrys==0){
            $arrys = 0.1;
        }
     return view('/home/option/index',['options'=>$options,'arrys'=>$arrys]);
    }
}