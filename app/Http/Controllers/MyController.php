<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class MyController extends Controller
{
    public function index(Request $request)
    {
    	$user = User::findorfail(4);
    	return view('home.myindex',compact('user'));
    }


    public function store(Request $request,$id)
    {
    	// 

    	// $olduser = User::findorfail($id);
        // 更新
        // $olduser -> user_name = $request->user_name;
        // $olduser -> password = Hash::make($request->password);
        // $olduser -> user_phone = (int)$request->user_phone;
        // $olduser -> has_vip = $request->has_vip;
        // $olduser -> integral = $request->integral;


    	$user = User::findOrFail(4);
    	// dd($user);
    	// $user-> password = Hash::make($request -> password);
    	// $user-> user_phone = $request -> user_phone;

    	 // 检测头像是否上传
        if($request->hasfile('head_pic')){
           $user->head_pic = '/uploads/'.$request->head_pic->store('admin/'.date('Ymd'));
        }
         // dd($user);

         // 检测手机号是否修改
        if(isset($request->user_phone)){
           $user -> user_phone = $request -> user_phone;
        }

        //检测是否修改账户
         // if(isset($request->user_name)){
         // 	$user -> name = $request -> user_name ;
         // }	
         

        //检测是否修改密码
         if(isset($request->password)){
         	$user -> password = Hash::make($request->password);
         }	

        if($user->save()){
        	return redirect('/myindex')->with('true','修改成功');;
        }else{
        	return back()->with('false','修改失败');
        }
    }



}
