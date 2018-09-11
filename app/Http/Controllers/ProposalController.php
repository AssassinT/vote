<?php

namespace App\Http\Controllers;

use App\User;
use App\Proposal;
use Illuminate\Http\Request;

class ProposalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // 显示建议列表
        $proposals = Proposal::orderBy('id','desc')
            ->where('proposal_name','like','%'.request()->keywords.'%')
            ->paginate(10);
            // dd($proposals);
        return view('admin.proposal.index',compact('proposals'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    public function home_index()
    {
        $users = User::all();
        $proposals = Proposal::orderBy('id','desc')
            ->where('proposal_name','like','%'.request()->keywords.'%')
            ->paginate(5);
        return view('home.proposal',compact('users','proposals'));
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
        $proposal = new Proposal;
        $proposal -> user_id = 16;//16改成session
        $proposal -> proposal_name = $request->proposal_name;
        $proposal -> proposal_content = $request->proposal_content;
        if($proposal -> save()){
            return redirect('/home/proposal')->with('true','添加成功');
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
        //修改数据模板
        $proposal = Proposal::findOrFail($id);
        return view('admin.proposal.edit',compact('proposal'));
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
        $proposal = Proposal::findOrFail($id);
        $proposal -> proposal_name = $request->proposal_name;
        $proposal -> proposal_content = $request->proposal_content;
        if($proposal -> save()){
            return redirect('/proposal')->with('true', '添加成功');
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
        //删除建议数据
        $proposal = Proposal::findOrFail($id);

        if($proposal->delete()){
            return back()->with('true','删除成功');
        }else{
            return back()->with('false','删除失败!');
        }

    }

    
}
