<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Option;
class DellController extends Controller
{
    //介绍页面
    public function index($id)
    {
    	 // $options = Option::where('id',$id)->get(); 
        // dd($options[3]['id']);
        // for($i=0;$i<count($options);$i++){
            if(Option::findOrFail($id)->delete()){
                echo true;
            } else{
                echo false;
            }
        // }
        // $vote = Vote::findOrFail($id);
        // if($vptions->delete()){
        //     return back()->with('true','删除成功');
        // }else{
        //     return back()->with('false','删除失败!');
        // }
    }
}
