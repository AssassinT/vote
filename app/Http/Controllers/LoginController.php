<?php

namespace App\Http\Controllers;

use App\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    //登录
    public function login()
    {	
    	return view('home.login.index');
    }

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
 
            return redirect('/')->with('true','登陆成功');
        }else{
            return back()->with('false','登陆失败!');
        }
    }






    // 注册
    public function reg()
    {
    	return view('home.login.reg');
    }

    public function doreg(Request $request)
    {
    	$user = new User;
        

        $user -> user_name = $request->user_name;
        $user -> password = Hash::make($request->password);
        $user -> user_phone = $request->user_phone;
          if($user->save()){   
            // return redirect('/home/login')->with('true','注册成功'); 
           	echo "<script>alert('注册成功');window.location.href='/home/login';</script>";  

        }else{
           echo "<script>alert('注册失败');window.location.href='/home/reg';</script>";
        }
    	
    }
}
