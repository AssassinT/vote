<?php

namespace App\Http\Controllers;

use App\User;
use Mrgoon\AliSms;
// namespace App\Http\Controllers\Ajax;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    //登录
    public function login()
    {	
    	return view('home.login.index');
    }
    // 执行登录
    public function dologin(Request $request)
    {
        
        //获取用户的数据
        $user = User::where('user_name', $request->user_name)->first();

        if(!$user){
            return back()->with('false','登陆失败!');
        }
        
        //校验密码
        if(Hash::check($request->password, $user->password)){
            session(['user_name'=>$user->user_name, 'has_vip'=>$user->has_vip,'id'=>$user->id,'head_pic'=>$user->head_pic]);
            echo "<script>alert('登录成功');window.location.href='/';</script>";
           
        }else{
            echo "<script>alert('登录失败,账号或密码错误');window.location.href='/home/login';</script>";
        }
    }






    // 注册
    public function reg()
    {
    	return view('home.login.reg');
    }

    // 执行注册
    public function doreg(Request $request)
    {
    	$user = new User;
        $user -> user_name = $request->user_name;
        $user -> password = Hash::make($request->password);
        $user -> user_phone = $request->user_phone;
          if($user->save()){   
           	echo "<script>alert('注册成功');window.location.href='/home/login';</script>";  
        }else{
           echo "<script>alert('注册失败');window.location.href='/home/reg';</script>";
        }
    	
    }

    // ajax
    public function req()
    {
        $user = User::where('user_name',$_POST['user_name'])->first();
        if(!count($user)){
            echo '1';
        }else{
            echo '0';
        }

        
    }

    public function reqq()
    {
      $phone = User::where('user_phone',$_POST['user_phone'])->first();
        if(!count($phone)){
            echo '1';
        }else{
            echo '0';
        }  
    }

    // 退出登录
    public function loginout(Request $request)
    {
        $request->session()->flush();
        return redirect('/home/login')->with('true','退出成功');
    }

     public function findp()
    {
        return view('home.login.fpass');
    }


    // 找回密码
    public  function verify()
    {

        $aliSms = new \Mrgoon\AliSms\AliSms();
        $code = mt_rand(100000,999999);
        $response = $aliSms->sendSms(request()->phone, 'SMS_141565001', ['code'=>$code]);
        if($response->Code=='OK'){
            if(request()->session()->has('verify')){
                request()->session()->forget('verify');
                session(['verify' => $code]);
            }else{
                session(['verify' => $code]);
            }
            echo true;
        }else{
            echo false;
        }
    }

     public  function pass()
    {
        if(request()->verify==session('verify')){
            $users = User::where('user_phone',request()->user_phone)->first();
            $users->password = Hash::make(request()->password);
            if($users->save()){
                request()->session()->forget('verify');
                echo "<script>alert('修改成功');window.location.href='/home/login';</script>";
            }else{
                echo "<script>alert('修改失败');history.go(-1);</script>";
            }
        }else{
            echo "<script>alert('验证码不正确');history.go(-1);</script>";
        }
        

    }


}
