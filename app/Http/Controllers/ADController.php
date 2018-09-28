<?php

namespace App\Http\Controllers;

use App\aD;
use Illuminate\Http\Request;

class ADController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $a_ds = aD::orderBy('id','desc')
            ->where('a_d_name','like', '%'.request()->keywords.'%')
            ->paginate(1);
        return view('admin.a_d.index', ['a_ds'=>$a_ds]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.a_d.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $a_d = new aD;

        $a_d -> a_d_name = $request->a_d_name;
        $a_d -> a_d_url = $request->a_d_url;
        $a_d -> position = $request->position;

        if ($request->hasFile('a_d_pic')) {
            $a_d->a_d_pic = '/uploads/'.$request->a_d_pic->store('admin/'.date('Ymd'));
        }

        if($a_d -> save()){
            return redirect('/a_d')->with('true', '添加成功');
        }else{
            return back()->with('false','添加失败');
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
       $a_d = aD::findOrFail($id);

        return view('admin.a_d.edit', ['a_d'=>$a_d]);
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
        $a_d = aD::findOrFail($id);
        $a_d -> a_d_name = $request->a_d_name;
        $a_d -> a_d_url = $request->a_d_url;
        $a_d -> position = $request->position;

        if ($request->hasFile('a_d_pic')) {
            $a_d->a_d_pic = '/uploads/'.$request->a_d_pic->store('admin/'.date('Ymd'));
        }

        if($a_d -> save()){
            return redirect('/a_d')->with('true','更新成功');
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
        $a_d = aD::findOrFail($id);
        if($a_d->delete()){
            return back()->with('true','删除成功');
        }else{
            return back()->with('false','删除失败!');
        }
    }
}

