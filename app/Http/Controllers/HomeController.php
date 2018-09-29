<?php

namespace App\Http\Controllers;

use App\Link;
use Illuminate\Http\Request;
use App\Vote;
use App\Option;
use App\Web_set;
class HomeController extends Controller
{
    public function index(){
    	//轮播倒序取3条
    	$votes = Vote::orderBy('id','desc')->limit(6)->get();
    	  // dd($votes[0]->end_time);
        //获取所有置顶
    	$top = Vote::where('has_top', '=', '1')->get();
        //置顶倒序排序
        $tops = Vote::orderBy('id','desc')->get();
    	// dd($options);
    	
    	$websets = Web_set::first();
    	// dd($tops[1]->id);
    	$links = Link::all();
    	return view('/home/index',compact('websets','links','votes','tops','options'));
    }
}
