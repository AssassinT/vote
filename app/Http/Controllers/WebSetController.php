<?php

namespace App\Http\Controllers;

use App\web_set;
use Illuminate\Http\Request;

class WebSetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
         $websets = web_set::first();
        if(!$websets){
            $websets = false;
        }
          return view('/admin/webset/index',compact('websets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
      
        $websets = web_set::first();
        if(!$websets){
            $websets = new web_set;
        }

        $websets -> has_off = $request -> has_off;
        // $websets -> web_pic = $request -> web_pic;
        if($request->hasFile('web_pic')){
            $websets->web_pic = '/uploads/'.$request->web_pic->store('admin/'.date('Ymd'));
        }

        $websets -> web_title = $request -> web_title ;
        $websets -> record = $request -> record;
        $websets -> web_url = $request -> web_url;
        $websets -> web_keyword = $request -> web_keyword;
        // $websets -> wechat_qrcode = $request -> wechat_qrcode;
         if($request->hasFile('wechat_qrcode')){
            $websets->wechat_qrcode = '/uploads/'.$request->wechat_qrcode->store('admin/'.date('Ymd'));
        }
        //微博
        // $websets -> blog = $request -> blog;
        $websets -> web_email = $request -> web_email;
        $websets -> web_qq = $request -> web_qq;
        $websets -> web_phone = $request -> web_phone;

        if($websets->save()){
            return back()->with('true','设置成功');
        } else{
            return back()->with('false','设置失败');
        }

        return view('/admin/webset/index',['websets' => $websets]);
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
    }
}
