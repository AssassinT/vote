<?php

namespace App\Http\Controllers;

use App\help;
use Illuminate\Http\Request;

class HelpController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $helps = help::orderBy('id','desc')
            ->where('question','like', '%'.request()->keywords.'%')
            ->paginate(10);
        return view('admin.help.index', ['helps'=>$helps]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('admin.help.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $help = new help;

        $help -> question = $request->question;
        $help -> answer = $request->answer;

        

        if($help -> save()){
            return redirect('/help')->with('true', '添加成功');
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
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $help = help::findOrFail($id);

        return view('admin.help.edit', ['help'=>$help]);
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
        $help = help::findOrFail($id);
        $help -> question = $request->question;
        $help -> answer = $request->answer;
        if($help -> save()){
            return redirect('/help')->with('true', '添加成功');
        }else{
            return back()->with('false','添加失败');
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
        $help = help::findOrFail($id);
        
        if($help->delete()){
            return back()->with('true','删除成功');
        }else{
            return back()->with('false','删除失败!');
        }

    }

    public function list(Request $request)
    {
        $helps = help::all();

        return view('home.help.index', compact('helps'));
    }

     public function cont(Request $request)
    {
       $helps = help::all();

        return view('home.help.edit', compact('helps'));
    }

    public function none(Request $request)
    {
       $helps = help::all();

        return view('home.help.create', compact('helps'));
    }

    public function nonet(Request $request)
    {
       $helps = help::all();

        return view('home.option.edit', compact('helps'));
    }
}
