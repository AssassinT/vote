<?php

namespace App\Http\Controllers;

use App\Link;
use Illuminate\Http\Request;
use App\Vote;
class HomeController extends Controller
{
    public function index(){
    	//友链前台显示
    	$votes = Vote::orderBy('id','desc')->limit(3)->get();
    	  // dd($votes[0]->end_time);
    	// dd(strtotime($votes[0]->created_at));
    	  	
    	$links = Link::all();
    	return view('/home/index',compact('links','votes'));
    }
}
