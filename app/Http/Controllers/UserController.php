<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $user = User::orderBy('id','desc')
        // dd($user);
        ->where('user_name','like','%'.request()->keywords.'%')
        ->paginate(10);
        // 解析模板显示用户数据
        return view('admin.user.index',['user'=>$user]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.user.create');
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
        $user = new User;
        // dd($request->all());

        $user -> user_name = $request->user_name;
        $user -> password = Hash::make($request->password);
        $user -> user_phone = (int)$request->user_phone;
        $user -> has_vip = $request->has_vip;
        $user -> integral = $request->integral;
        $user -> has_admin = $request->has_admin;
         // 检测文件是否上传
        if($request->hasfile('head_pic')){
           $user->head_pic = '/uploads/'.$request->head_pic->store('admin/'.date('Ymd'));
        }

        
          if($user->save()){   
            return redirect('/user')->with('true','添加成功');   
        }else{
            return back()->with('false','添加失败!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        $user = User::findOrFail($id);
        return view('admin.user.edit',['user'=>$user]);
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
        
        $user = User::findOrFail($id);
        // 更新
        $user -> user_name = $request->user_name;
        if(!empty($request->password)){
            $user -> password = Hash::make($request->password);
        }
        $user -> user_phone = $request->user_phone;
        $user -> has_vip = $request->has_vip;
        $user -> integral = $request->integral;
        $user -> has_admin = $request->has_admin;
       
         // 检测文件是否上传
        if($request->hasfile('head_pic')){
           $user->head_pic = '/uploads/'.$request->head_pic->store('admin/'.date('Ymd'));
        }

        if($user->save()){
            return redirect('/user')->with('true','更新成功');
        }else{
            return back()->with('false','更新成功');
        }
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
        $user = User::findorfail($id);

        if($user->delete()){
            return back()->with('true','删除成功');
        }else{
            return back()->with('false','删除失败');
        }
    }
}
