<?php

namespace App\Http\Controllers;

use App\User;
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
            session(['user_name'=>$user->user_name, 'id'=>$user->id,'head_pic'=>$user->head_pic]);
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
      $phone = User::where([['user_phone',$_POST['user_phone']],['user_name',$_GET['user_name']]])->first();
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
    public  function pass()
    {

    }


}
