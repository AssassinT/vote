<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vote;
use App\Option;

class VoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('/home/list');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('/home/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $votes = new Vote;
        $votes -> vote_title  = request() -> vote_title;
        $votes -> vote_explain  = request() -> vote_explain;
        $votes -> has_wechat  = request() -> has_wechat;
        $votes -> has_gift  = request() -> has_gift;
        $votes -> has_comment  = request() -> has_comment;
        $votes -> has_a_d  = request() -> has_a_d;
        $votes -> has_top  = request() -> has_top;
        $votes -> has_checkbox  = request() -> has_checkbox;
        $votes -> has_repeat  = request() -> has_repeat;
        $votes -> has_password  = request() -> has_password;
        $votes -> end_time  = request() -> end_time;
        $votes -> vote_pic = '12345';
        $votes -> user_id  = '10';//后期改成session

        $votes->save();
        $vote_id = Vote::where([['user_id','10'],['vote_title',request()->vote_title]])->get();

        
        for($i=0;$i<=request()->num;$i++){

            $temp = 'option'.$i;
            if(isset(request()->$temp)){
                $options = new Option;
               $options -> vote_id = $vote_id[0]->id;
               $options -> option_title = request()->$temp['option_title'];
               $options -> option_content = request()->$temp['option_content'];
               $options -> video = request()->$temp['video'];
               $options -> option_pic = '12345';
               $options->save();
            }
            
        }

        return redirect('/vote');

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
        return view('/home/edit');
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
