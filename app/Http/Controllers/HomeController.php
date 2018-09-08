<?php

namespace App\Http\Controllers;

use App\Link;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
    	//友链前台显示
    	$links = Link::all();
    	return view('/home/index',compact('links'));
    }
}
