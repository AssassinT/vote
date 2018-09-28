<?php

namespace App\Http\Controllers;

use App\Gift;
use App\Gift_gx;
use App\Option;
use App\Order;
use App\User;
use App\Vote;
use Illuminate\Http\Request;
class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $order = Order::all();

        return view('admin.order.index',[]);
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
        $orders = new Order;
        $orders->money = $request->money;
        $orders->user_id = session('id');
        $orders->info = $request->info;
        $orders->mode = $request->mode;
        if($orders->save()){
        $users = User::findOrFail(session('id'));
        $users->balance -= $request->money / 0.8;
        $users->save();
           return redirect('/order/1');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $votes = Vote::where('user_id',session('id'))->get();
        // $options = Option::findOrFail($id);
         $users = User::findOrFail(session('id'));
        // dd($user);


       return view('home.order',compact('votes','users'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        //
    }
}
