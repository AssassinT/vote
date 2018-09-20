<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Gift;

class GiftController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gifts = Gift::all();   
        return view('/admin/gift/index',compact('gifts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('/admin/gift/create');
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //插入数据
        $gifts = new Gift;
        $gifts -> gift_name = $request -> gift_name;
        $gifts -> price = $request -> price;

        //文件上传
        //检测是否有文件上传
        if ($request->hasFile('gift_pic')) {
            $gifts->gift_pic = '/uploads/'.$request->gift_pic->store('admin/'.date('Ymd'));
        }
        //插入
        if($gifts->save()){
                return redirect('/gift')->with('true','添加成功');
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
        echo 123;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $gifts = Gift::findOrFail($id);
       return view('admin.gift.edit',compact('gifts'));
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
        $gifts = Gift::findOrFail($id);
        $gifts -> gift_name = $request -> gift_name;
        $gifts -> price = $request -> price;

        if($request->hasFile('gift_pic')){
            $gifts->gift_pic = '/uploads/'.$request->gift_pic->store('admin/'.date('Ymd'));
        }

         if($gifts-> save()){
            return redirect('/gift')->with('true', '更新成功');
        }else{
            return back()->with('false','更新失败');
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
        $gifts = Gift::findOrFail($id);
        if($gifts->delete()){
           return redirect('/gift')->with('true','删除成功');
        }else{
            return back()->with('false','删除失败');
        }
    }
}
