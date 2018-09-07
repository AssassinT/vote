<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
class AdminController extends Controller
{
    public function index(){
    	return view('/admin/admin');
    }

	 // 登陆页面
    
    public function login()
	{
		return view('admin.login');
	}

	//登录操作
	public function dologin(Request $request)
	{
		//获取用户的数据
		$user = User::where('user_name', $request->username)->first();
// dd($user);
		if(!$user){
			return back()->with('false','登陆失败!');
		}

		//校验密码
		if(Hash::check($request->password, $user->password)){
			session(['user_name'=>$user->user_name, 'id'=>$user->id,'head_pic'=>$user->head_pic]);
 // dd(session('head_pic'));
			return redirect('/admin/index')->with('true','登陆成功');
		}else{
			return back()->with('false','登陆失败!');
		}
	}

	public function logout(Request $request)
	{
		$request->session()->flush();
		return redirect('/admin/login')->with('true','退出成功');
	}

}
