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


    // 注册
    public function reg()
    {
    	return view('home.login.reg');
    }

    public function doreg(Request $request)
    {
    	$user = new User;
        // dd($request->all());

        $user -> user_name = $request->user_name;
        $user -> password = Hash::make($request->password);
        $user -> user_phone = $request->user_phone;
          if($user->save()){   
            // return redirect('/home/login')->with('true','注册成功'); 
           	echo "<script>alert('注册成功');window.location.href='/home/login';</script>";  
        }else{
            return back()->with('false','注册失败!');
        }
    	
    }
}
