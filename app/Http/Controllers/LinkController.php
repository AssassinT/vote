<?php

namespace App\Http\Controllers;

use App\Link;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class LinkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //读取数据库
        $links = Link::orderBy('id','desc')
            ->where('link_name','like','%'.request()->keywords.'%')
            ->paginate(10);
        return view('admin.link.index',compact('links'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.link.create');
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
        $link = new Link;
        $link -> link_name = $request->link_name;
        $link -> weight = $request->weight;
        $link -> link_url = $request->link_url;
        

        //文件上传
        //检测文件是否上传
        if($request->hasFile('link_pic')){
            $link -> link_pic = '/uploads/'.$request->link_pic->store('admin/'.date('Ymd'));
        }

        if($link->save()){
            return redirect('/link')->with('true','添加成功');
        }else{
            return back()->with('false','添加失败');
        }


        // if(empty($link->save())){
        //     $link -> error('您输入有误,不润徐为空','/link/create');
        //     return redirect('/link')->with('true','添加成功');
        // }else{
        //     return back()->with('false','添加失败');
        // }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $links = Link::all();
        
        // echo
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //显示列表模板
        $link = Link::findOrFail($id);

        return view('admin.link.edit',compact('link'));
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
        //插入数据
        $link = Link::findOrFail($id);
        $link -> link_name = $request->link_name;
        $link -> weight = $request->weight;
        $link -> link_url = $request->link_url;

        // dd($link);
        //文件上传
        //检测文件是否上传
        if($request->hasFile('link_pic')){
            $link -> link_pic = '/uploads/'.$request->link_pic->store('admin/'.date('Ymd'));
        }

        if($link->save()){
            return redirect('/link')->with('true','修改成功');
        }else{
            return back()->with('false','修改失败');
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
        //删除数据
        $link = link::findOrFail($id);

        if($link->delete()){
            return back()->with('true','删除成功');
        }else{
            return back()->with('false','删除失败!');
        }
    }
}
