<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Option;
use App\Ip;

class OptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $options = Option::findOrfail($id);
        $num = $options -> vote_num;
        $options -> vote_num = $num+1;
        $options->save();
        $ipss = Ip::where([['vote_id',$options->vote_id],['openid_ip',$_SERVER["REMOTE_ADDR"]]])->get();
        if(count($ipss)<=0){
            $ips = new Ip;
            $ips -> option_id = $id;
            $ips -> vote_id = $options -> vote_id;
            $ips -> openid_ip = $_SERVER["REMOTE_ADDR"];
            $ips->save();
            echo '投票成功'; 
        }else{
            echo '您已经投过票了';
        }
        
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
