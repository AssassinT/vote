<?php

namespace App\Http\Controllers;

use App\Link;
use Illuminate\Http\Request;
use App\Vote;
use App\Option;
class HomeController extends Controller
{
    public function index(){
    	//倒序取3条
    	$votes = Vote::orderBy('id','desc')->limit(6)->get();
    	  // dd($votes[0]->end_time);
    	$tops = Vote::where('has_top', '=', '1')->get();
    
    	// dd($options);
    	

    	// dd($tops[1]->id);
    	$links = Link::all();
    	return view('/home/index',compact('links','votes','tops','options'));
    }
}
