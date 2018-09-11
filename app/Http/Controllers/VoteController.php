<?php

namespace App\Http\Controllers;

use App\Option;
use App\Vote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class VoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $votes = Vote::where('user_id','10')->get();//session
        return view('/home/list',['votes'=>$votes]);
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
        $votes -> comment  = request() -> has_comment;
        $votes -> has_a_d  = request() -> has_a_d;
        $votes -> has_top  = request() -> has_top;
        $votes -> has_checkbox  = request() -> has_checkbox;
        $votes -> has_repeat  = request() -> has_repeat;
        $votes -> has_password  = request() -> has_password;
        $votes -> end_time  = request() -> end_time;
        $votes -> vote_pic = '12345';
        $votes -> user_id  = '10';//后期改成session

        $votes->save();
        $vote_id = Vote::where([['user_id','10'],['vote_title',request()->vote_title]])->get();//10-session

        
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



    public function count(Request $request,$id)
    {

        $options =  Option::orderBy('vote_num','desc')->where('vote_id',$id)->get();
        $arry = DB::select('select  sum(vote_num) as total from options where vote_id ='.$id);
        $arrys = $arry[0]->total;
        if($arrys==0){
            $arrys = 0.1;
        }
     return view('/home/option/index',['options'=>$options,'arrys'=>$arrys]);
    }
}
